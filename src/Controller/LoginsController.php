<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logins Controller
 *
 * @property \App\Model\Table\LoginsTable $Logins
 */
class LoginsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		
		$this->Auth->allow('login');
		$this->Auth->allow('updateGcm');
		$this->Auth->allow('signup');
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $logins = $this->paginate($this->Logins);

        $this->set(compact('logins'));
        $this->set('_serialize', ['logins']);
    }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => ['Gcms']
        ]);

        $this->set('login', $login);
        $this->set('_serialize', ['login']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $login = $this->Logins->newEntity();
        if ($this->request->is('post')) {
            $login = $this->Logins->patchEntity($login, $this->request->data);
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The login could not be saved. Please, try again.'));
            }
        }
        $gcms = $this->Logins->Gcms->find('list', ['limit' => 200]);
        $this->set(compact('login', 'gcms'));
        $this->set('_serialize', ['login']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $login = $this->Logins->patchEntity($login, $this->request->data);
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The login could not be saved. Please, try again.'));
            }
        }
        $gcms = $this->Logins->Gcms->find('list', ['limit' => 200]);
        $this->set(compact('login', 'gcms'));
        $this->set('_serialize', ['login']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $login = $this->Logins->get($id);
        if ($this->Logins->delete($login)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function login(){
		if ($this->request->is('post')) {
            $mobile=$this->request->data['mobile'];
			$password=$this->request->data['password'];
			$gcm_id=$this->request->data['gcm_id'];
			$Login=$this->Logins->find()->where(['mobile'=>$mobile,'password'=>$password])->first();
			if($Login){
				$result=['login_status'=>true,'user_data'=>$Login];
				$Login = $this->Logins->get($Login->id);
				
				$Login->gcm=$gcm_id;
				$this->Logins->save($Login);
			}else{
				$result=['login_status'=>false];
			}
			//$result=['username'=>$username,'password'=>$password];
			$this->set(array(
				'result' => $result,
				'_serialize' => array('result')
			));
        }
	}
	
	public function signup(){
		if ($this->request->is('post')) {
            $name=$this->request->data['name'];
			$gcm_id=$this->request->data['gcm_id'];
			$password=$this->request->data['password'];
			$mobile=$this->request->data['mobile'];
			$email=$this->request->data['email'];
			$address=$this->request->data['address'];
			
			$Login = $this->Logins->newEntity();

			$Login->name = $name;
			$Login->gcm = $gcm_id;
			$Login->password = $password;
			$Login->mobile = $mobile;
			$Login->email = $email;
			$Login->address = $address;

			if($this->Logins->save($Login)){
				$response=['status'=>true,'user_id'=>$Login->id];
			}else{
				$response=['status'=>false];
			}
			
			$this->set(array(
				'result' => $response,
				'_serialize' => array('result')
			));
        }
	}
	
	public function updateGcm(){
		$user_id=$this->request->query('user_id');
		$gcm_id=$this->request->query('gcm_id');
		$Login = $this->Logins->get($user_id);
		$Login->gcm=$gcm_id;
		$this->Logins->save($Login);
		$result=['status'=>true];
		$this->set(array(
				'result' => $result,
				'_serialize' => array('result')
			));
	}
}
