<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Session;
use App\Controller\OrdersController;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add','logout');


    }
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    public function add()
    {
        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user','username']);
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
                $this->Users->save($user);
            }
            $username=$this->getCurrentUser();
            $this->request->session->write('username',$username);
            $this->Flash->error(__('Invalid username or password, try again'));
            $this->set('username',$username);

        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    private function getCurrentUser(){
        return $this->Auth->user('username');

    }
    public  function getCurrentUserInfo(){
        $username=$this->getCurrentUser();
        $userinfo=$this->Users->find()->where(['username'=>$username])->first();
        return $userinfo;
    }
}
