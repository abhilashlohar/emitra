<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\AesHelper;

/**
 * Grievances Controller
 *
 * @property \App\Model\Table\GrievancesTable $Grievances
 */
class GrievancesController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		
		$this->Auth->allow('index');
		$this->Auth->allow('addGrievance');
		$this->Auth->allow('fetchDetail');
		$this->Auth->allow('fetchDetailMakePayment');
		$this->Auth->allow('paymentForm');
		$this->Auth->allow('successPage');
		$this->Auth->allow('failurePage');
		$this->Auth->allow('listDepartment');
		$this->Auth->allow('addFile');
		$this->Auth->allow('userGrievances');
		$this->Auth->allow('grievanceHistory');
		$this->Auth->allow('paymentDetails');
		$this->Auth->allow('notifications');
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $grievances = $this->paginate($this->Grievances->find()->where(['user_id'=>$this->Auth->User('id')]));
		 $this->set('grievances', $grievances);
        $this->set('_serialize', ['grievances']);
    }

    /**
     * View method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grievance = $this->Grievances->get($id, [
            'contain' => []
        ]);
		
		$Users=$this->Grievances->Users->find()->where(['department_id'=>$grievance->department_id]);
		//pr($Users->toArray());
		//$Aes = new AesHelper(new \Cake\View\View());

        $this->set('grievance', $grievance);
        $this->set('_serialize', ['grievance']);
		 $this->set('Users', $Users);
        $this->set('_serialize', ['Users']);
    }
	
	public function assignToOther($grievance_id = null,$User_id = null)
    {
        $grievance = $this->Grievances->get($grievance_id);
		$grievance->user_id=$User_id;
		$this->Grievances->save($grievance);
		
		$GrievanceHistory = $this->Grievances->GrievanceHistories->newEntity();
		$GrievanceHistory->description = "some description";
		$GrievanceHistory->from_user_id = $this->Auth->User('id');
		$GrievanceHistory->to_user_id = $User_id;
		$this->Grievances->GrievanceHistories->save($GrievanceHistory);

        $this->set('grievance', $grievance);
        $this->set('_serialize', ['grievance']);
		
		
		$Login=$this->Grievances->Logins->get($grievance->login_id);
		
		$message='Your Grievance status had been updated.';
		
		$Notification = $this->Grievances->Notifications->newEntity();
		$Notification->message = $message;
		$Notification->user_id = $User_id;
		$Notification->button_text = 'View';
		$Notification->deep_link = 'emitra://grievance';
		$Notification->n_type = 'Grievance';
		
		if ($this->Grievances->Notifications->save($Notification)) {
			$Notification_id = $Notification->id;
		}
		
		
		
		define( 'API_ACCESS_KEY', 'AAAAs8dTHBM:APA91bFwlElGbWfSQNl_rgTZNOgcZ5KRrZaAXVllPWiXmyjmIzIxrvJoFEQriSp6kRIDzIQ8viTnyJ13D-L-rYvhL_yTOvGkL1TzPuKnLrrn_zCcW5RwmIqTnOynGqBCzGgfp_ayGD8v' );
		$registrationIds = array( $Login->gcm );
		// prep the bundle
		$msg = array
		(
			'message' 	=> $message,
			'button_text'	=> 'View',
			'deep_link'	=> 'emitra://paymentDetail',
			'notification_id'	=> $Notification_id,
		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		
		
		
		
		 
		$this->Flash->success(__('The grievance has been assigned.'));
		 return $this->redirect(['action' => 'view',$grievance_id]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grievance = $this->Grievances->newEntity();
        if ($this->request->is('post')) {
            $grievance = $this->Grievances->patchEntity($grievance, $this->request->data);
            if ($this->Grievances->save($grievance)) {
                $this->Flash->success(__('The grievance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grievance could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('grievance'));
        $this->set('_serialize', ['grievance']);
    }
	
	public function addGrievance()
    {
        if ($this->request->is('post')) {
            $subject=$this->request->data['subject'];
			$description=$this->request->data['description'];
			$department_id=$this->request->data['department_id'];
			$login_id=$this->request->data['login_id'];
			
			
			$Grievance = $this->Grievances->newEntity();

			$Grievance->subject = $subject;
			$Grievance->description = $description;
			$Grievance->department_id = $department_id;
			$Grievance->login_id = $login_id;
			$Grievance->current_status = 'open';
			
			$Level=$this->Grievances->Levels->find()->where(['department_id'=>$department_id])->order(['level_order'=>'DESC'])->first();
			$User=$this->Grievances->Users->find()->where(['level_id'=>$Level->id])->first();
			
			$Grievance->user_id = $User->id;
			
			
			
			if ($this->Grievances->save($Grievance)) {
				
				$GrievanceHistory = $this->Grievances->GrievanceHistories->newEntity();
				$GrievanceHistory->description = $description;
				$GrievanceHistory->from_user_id = 0;
				$GrievanceHistory->to_user_id = $User->id;
				$this->Grievances->GrievanceHistories->save($GrievanceHistory);
		
		
				$response=['status'=>true,'grievance_id'=>$Grievance->id];
			}else{
				$response=['status'=>false,'message'=>'Grievance did not submited.'];
			}
			
			$this->set(array(
				'result' => $response,
				'_serialize' => array('result')
			));
        }
    }
	
	public function addFile(){
		if ($this->request->is('post')) {
            $file = $this->request->data['file'];
            $grievance_id = $this->request->data['grievance_id'];
			
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
			
			$setNewFileName = uniqid();
			$file_name=$setNewFileName. '.' . $ext;
			move_uploaded_file($file['tmp_name'], WWW_ROOT . '/gfiles/' . $setNewFileName . '.' . $ext);
			
			$GrievanceAttachment = $this->Grievances->GrievanceAttachments->newEntity();
			$GrievanceAttachment->name = $file_name;
			$this->Grievances->GrievanceAttachments->save($GrievanceAttachment);
			
			$response=['status'=>true,'message'=>'file uploaded successfully.'];
			
			$this->set(array(
				'result' => $response,
				'_serialize' => array('result')
			));
        }
	}

    /**
     * Edit method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grievance = $this->Grievances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grievance = $this->Grievances->patchEntity($grievance, $this->request->data);
            if ($this->Grievances->save($grievance)) {
                $this->Flash->success(__('The grievance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grievance could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('grievance'));
        $this->set('_serialize', ['grievance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grievance = $this->Grievances->get($id);
        if ($this->Grievances->delete($grievance)) {
            $this->Flash->success(__('The grievance has been deleted.'));
        } else {
            $this->Flash->error(__('The grievance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	function fetchDetail(){
		$user_id=$this->request->query('user_id');
		$data=$this->request->query('data');
		
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraAESEncryption");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeEncrypt=".$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);

		

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/getFetchDetailsEncryptedBySso");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"encData=".$server_output);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output2 = curl_exec ($ch);
		curl_close ($ch);
		
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraAESDecryption");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeDecrypt=".$server_output2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output3 = curl_exec ($ch);
		curl_close ($ch);
		
			
		$this->set(array(
			'result' => json_decode($server_output3),
			'_serialize' => array('result')
		));
	}
	
	function fetchDetailMakePayment(){
		$user_id=$this->request->query('user_id');
		
		$Login=$this->Grievances->Logins->get($user_id);
		
		$data=$this->request->query('data');
		$make_payment=$this->request->query('make_payment');
		
		//$data="{'SRVID':'1214','searchKey':'9352423664','SSOID':'SSOTESTKIOSK'}";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraAESEncryption");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeEncrypt=".$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);

		

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/getFetchDetailsEncryptedBySso");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"encData=".$server_output);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output2 = curl_exec ($ch);
		curl_close ($ch);
		
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraAESDecryption");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeDecrypt=".$server_output2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output3 = curl_exec ($ch);
		curl_close ($ch);
		
		
		$server_output_ar=json_decode($server_output3);
		
		$prn=uniqid();
		$murchant_code='HACKATHON2017';
		date_default_timezone_set('Asia/Kolkata');
		$timestamp=date('Ymdhmst');
		//echo $purpose=$server_output_ar["FetchDetails"]["TransactionDetails"]["ServiceName"];
		$purpose=$server_output_ar->FetchDetails->TransactionDetails->ServiceName;
		$amount=$server_output_ar->FetchDetails->TransactionDetails->BillAmount;
		$success_url=$this->request->webroot . 'Grievances/successPage'; 
		$failur_url='http://www.google.com';
		$cancel_url='http://www.google.com';
		$user_name=$server_output_ar->FetchDetails->TransactionDetails->ConsumerName;
		$user_mobile=$Login->mobile;
		$user_email=$Login->email;
		$checksum=$this->makeChecksumForRequest($murchant_code,$prn,$amount,urlencode('#2&[W<nJ*K"xO_z'));
		
		
		
		$response=["MERCHANTCODE"=>$murchant_code,"PRN"=>$prn,"REQTIMESTAMP"=>$timestamp,"PURPOSE"=>$purpose,"AMOUNT"=>$amount,"SUCCESSURL"=>$success_url,"FAILUREURL"=>$failur_url,"CANCELURL"=>$cancel_url,"USERNAME"=>$user_name,"USERMOBILE"=>$user_mobile,"USEREMAIL"=>$user_email,"CHECKSUM"=>$checksum,'user_id'=>$user_id];
		
			
		$this->set(array(
			'result' => ($response),
			'_serialize' => array('result')
		));
	}
	
	function makeChecksumForRequest($murchant_code=null,$prn=null,$amount=null,$checksum_key=null){
		$data=$murchant_code.'|'.$prn.'|'.$amount.'|'.$checksum_key;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraMD5Checksum");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeCheckSumString=".$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output3 = curl_exec ($ch);
		curl_close ($ch);
		return $server_output3;
	}
	
	function paymentForm(){
		$this->viewBuilder()->layout('');
	}
	
	function successPage(){
		$this->viewBuilder()->layout('');

		$PRN=$this->request->query('PRN');
		$AMOUNT=$this->request->query('AMOUNT');
		$user_id=$this->request->query('user_id'); 
		
		$Login=$this->Grievances->Logins->get($user_id);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/payments/v1/services/txnStatus");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"MERCHANTCODE=HACKATHON2017&PRN=".$PRN."&AMOUNT=".$AMOUNT);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output3 = curl_exec ($ch);
		curl_close ($ch);
		$server_output3=json_decode($server_output3);

$RPPTXNID=$server_output3->RPPTXNID;
$CHECKSUM=$server_output3->CHECKSUM; 
	$murchant_code='HACKATHON2017';	
$data=$murchant_code.'|'.$PRN.'|'.$RPPTXNID.'|'.$AMOUNT.'|'.urlencode('#2&[W<nJ*K"xO_z');

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://emitrauat.rajasthan.gov.in/webServicesRepositoryUat/emitraMD5Checksum");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"toBeCheckSumString=".$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output3 = curl_exec ($ch);
		curl_close ($ch);
		
		
		
		
		
		
		if($server_output3==$CHECKSUM){
		echo '<br/><br/><div style="width:60%;margin:auto;border:solid 2px green;padding:10px;"><h3>Success!</h3></div>';
			$message ="Your trasanction status: success.";
		}else{
		echo '<br/><br/><div style="width:60%;margin:auto;border:solid 2px red;padding:10px;"><h3>Checksum Error!</h3></div>';
			$message ="Your trasanction status: failure.";
		}
		
		$Notification = $this->Grievances->Notifications->newEntity();
		$Notification->message = $message;
		$Notification->user_id = $user_id;
		$Notification->button_text = 'View Transaction';
		$Notification->deep_link = 'emitra://paymentDetail?id='.$PRN;
		$Notification->n_type = 'Payment';
		
		if ($this->Grievances->Notifications->save($Notification)) {
			
			$Notification_id = $Notification->id;
		}
		
		
		$Trasanction = $this->Grievances->Trasanctions->newEntity();
		$Trasanction->user_id = $user_id;
		$Trasanction->prn = $PRN;
		$Trasanction->rpptxnid = $RPPTXNID;
		$Trasanction->amount = $AMOUNT;
		$Trasanction->responce = $message;
		$this->Grievances->Trasanctions->save($Trasanction);
		
		
		// API access key from Google API's Console
		define( 'API_ACCESS_KEY', 'AAAAs8dTHBM:APA91bFwlElGbWfSQNl_rgTZNOgcZ5KRrZaAXVllPWiXmyjmIzIxrvJoFEQriSp6kRIDzIQ8viTnyJ13D-L-rYvhL_yTOvGkL1TzPuKnLrrn_zCcW5RwmIqTnOynGqBCzGgfp_ayGD8v' );
		$registrationIds = array( $Login->gcm );
		// prep the bundle
		$msg = array
		(
			'message' 	=> $message,
			'button_text'	=> 'View Transaction',
			'deep_link'	=> 'emitra://paymentDetail?id='.$PRN,
			'notification_id'	=> $Notification_id,
		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		//echo $result;
		
		
	}
	
	function failurePage(){
		$this->viewBuilder()->layout('');
	}
	
	function listDepartment(){
		
		
		$Departments=$this->Grievances->Departments->find();
		
		
		$this->set(array(
			'result' => ($Departments),
			'_serialize' => array('result')
		));
	}
	
	function userGrievances(){
		$login_id=$this->request->query('login_id');
		$Grievances=$this->Grievances->find()->where(['login_id'=>$login_id])->contain(["Departments"]);
		//pr($Grievances->toArray());
		$this->set(array(
			'result' => ($Grievances),
			'_serialize' => array('result')
		));
	}
	
	function grievanceHistory(){
		$grievance_id=$this->request->query('grievance_id');
		$GrievanceHistories=$this->Grievances->GrievanceHistories->find()->where(['grievance_id'=>$grievance_id])->order(['time'=>'DESC']);
		//pr($Grievances->toArray());
		$this->set(array(
			'result' => ($GrievanceHistories),
			'_serialize' => array('result')
		));
	}
	
	function paymentDetails(){
		$login_id=$this->request->query('login_id');
		$Trasanctions=$this->Grievances->Trasanctions->find()->where(['user_id'=>$login_id]);
		//pr($Grievances->toArray());
		$this->set(array(
			'result' => ($Trasanctions),
			'_serialize' => array('result')
		));
	}
	
	function notifications(){
		$login_id=$this->request->query('login_id');
		$Notifications=$this->Grievances->Notifications->find()->where(['user_id'=>$login_id]);
		
		//$converted = date('d M Y h.i.s A', strtotime('2011-08-27 18:29:31'));
		
		$this->set(array(
			'result' => ($Notifications),
			'_serialize' => array('result')
		));
	}

}
