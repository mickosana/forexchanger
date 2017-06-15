<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\CurrenciesController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

class OrdersController extends AppController
{


    public $components = array('RequestHandler');

    public function index()
    {
        $userid = $this->getuserid();
        $query = $this->Orders->find()->where(['userid' => $userid]);
        $orders = $query->all();
        $orders = $orders->toArray();

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }


    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Currencies']
        ]);
        $currencyid=$order->currencyid;
        $currency=$this->getcurrencyinfo($currencyid);
        $currencyname=$currency->currency_name;
        $currency_surcharge=$currency->surcharge;

        $order->currencyid=$currencyname;
        $order->surcharge_amount=$currency_surcharge;

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    public function add()
    {
        $currencies = $this->loadModel('Currencies');
        $order = $this->Orders->newEntity();

        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            $currencyid = $order->currencyid;
            $currencydata = $currencies->find()->where(['currencyid' => $currencyid])->first();
            $order->exchange_rate = $currencydata->rate;
            $surcharge = ($currencydata->surcharge) * ($order->amount_purchased);
            $amount_due = round($surcharge + (($order->amount_purchased) / ($currencydata->rate)), 2);
            $order->surcharge = $surcharge;
            $order->amount_due = $amount_due;

            $order->Userid = $this->getuserid();
            $order->currencyid = $currencyid;
            //send mail for Pounds
            if ($currencydata->symbol='GBP') {
                $email = new Email();

            }
            //give discount for EURO
            if($currencydata->symbol='EUR'){
                $order->amount_due=$amount_due-($amount_due*0.02);
            }
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }

        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $currencies = $this->Orders->Currencies->find('list', ['limit' => 200]);


        $this->set(compact('order', 'users', 'currencies'));
        $this->set('_serialize', ['order']);
    }


    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());

            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $currencies = $this->Orders->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'currencies'));
        $this->set('_serialize', ['order']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function calculate_surcharge($amount, $surcharge_rate)
    {
        if ($this->request->is('ajax')) {
            return $amount * $surcharge_rate;
        }

    }

    private function getuserid()
    {
        $userctl = new UsersController();
        $userinfo = $userctl->getCurrentUserInfo();
        return $userinfo->userid;
    }

    private function getcurrencyinfo($id)
    {
        $currencytbl = TableRegistry::get('currencies');
        $currencyinfo = $currencytbl->find()->where(['currencyid' => $id])->first();
        return $currencyinfo;

    }
}


