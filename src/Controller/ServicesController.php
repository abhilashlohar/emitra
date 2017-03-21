<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
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
        $services = $this->paginate($this->Services);

        $this->set(compact('services'));
        $this->set('_serialize', ['services']);
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);

        $this->set('service', $service);
        $this->set('_serialize', ['service']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

				$message="New service has been added name: ".$service->name;
				
				$Logins=$this->Services->Logins->find();
				foreach($Logins as $Login){
					$Notification = $this->Services->Notifications->newEntity();
					$Notification->message = $message;
					$Notification->user_id = $Login->id;
					$Notification->button_text = 'View';
					$Notification->deep_link = 'emitra://home';
					$Notification->n_type = 'Service';
					
					$this->Services->Notifications->save($Notification);
					
				
					
					
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
				}
               
				
				
					} else {
						$this->Flash->error(__('The service could not be saved. Please, try again.'));
					}
				}
				$this->set(compact('service'));
				$this->set('_serialize', ['service']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The service could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('service'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
