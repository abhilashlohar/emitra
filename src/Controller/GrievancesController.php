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
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $grievances = $this->paginate($this->Grievances);
		$this->set(array(
            'grievances' => $grievances,
            '_serialize' => array('grievances')
        ));
        // API access key from Google API's Console
		define( 'API_ACCESS_KEY', 'AAAAs8dTHBM:APA91bFwlElGbWfSQNl_rgTZNOgcZ5KRrZaAXVllPWiXmyjmIzIxrvJoFEQriSp6kRIDzIQ8viTnyJ13D-L-rYvhL_yTOvGkL1TzPuKnLrrn_zCcW5RwmIqTnOynGqBCzGgfp_ayGD8v' );
		$registrationIds = array( 'ehfpAOEJAm0:APA91bHTg3M1z19vz7iMhjknX-AAYj9nSfU8wKVyP7W2PDkYtfossknNd5BbD1QpMzTQud_-bQdEySqiCPmAQgSlDPps1uRL7QohMxMBerAHi7EhhKNvGhiguwn0Dflhf2k9dChd_Uul' );
		// prep the bundle
		$msg = array
		(
			'message' 	=> 'hello',
			'button_text'	=> 'View Event',
			'link'	=> '',
			'notification_id'	=> '11',
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
		echo $result;
				
		
		
		
		
		/*$msg = array
			(
			'message' 	=> 'hello',
			'button_text'	=> 'View Event',
			'link'	=> 'notice://event?id=1',
			'notification_id'	=> 1,
			);
			
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array
		(
			'registration_ids' 	=> array(''),
			'data'			=> $msg
		);
		$headers = array
		(
			'Authorization: key=nocXI54Zl_5F0:APA91bFKK5d2eQFgi0W9eQpPiWf4fhlkiBfxBwGvyHHyrBWPyAb-u9bb2A7D4OEyB45MBTQsxQw9u5Mrk13FoMkdlMYcif0guOPiwjeK2C3WGtSzVdVeNVKYNMQg8Zf3zhgXokJh38PE',
			'Content-Type: application/json'
		);

		  json_encode($fields);
		  $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		$l[]=$result;*/
		
		/*$ch = curl_init();

		$data = array(['username'=>'abhi','password'=>'abhi','gcm_id'=>'abhi']);

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "http://localhost/grievance/Logins/login");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

		// grab URL and pass it to the browser
		$result = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);

		print_r($result); // output result for all the kings*/


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
		
		
		
		//$Aes = new AesHelper(new \Cake\View\View());

        $this->set('grievance', $grievance);
        $this->set('_serialize', ['grievance']);
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
}
