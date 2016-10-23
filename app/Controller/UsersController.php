<?php
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController{

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow(['signup', 'reminder']);
  }

  public function login(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }
    if($this->request->is('post')){
      if($this->Auth->login()){
        $this->Flash->success('ログインしました');
        $this->User->id = $this->Auth->user('id');

        //各種データの更新
        $count = $this->User->field('sign_in_count', ['id' => $this->User->id]);
        $last_sign_in_at = $this->User->field('current_sign_in_at', ['id' => $this->User->id]);
        $last_sign_in_ip = $this->User->field('current_sign_in_ip', ['id' => $this->User->id]);
        $this->User->save(
          ['id' => $this->User->id,
          'current_sign_in_at' => date('Y-m-d H:i:s'),
          'last_sign_in_at' => $last_sign_in_at,
          'current_sign_in_ip' => $this->request->clientIp(false),
          'last_sign_in_ip' => $last_sign_in_ip,
          'sign_in_count' =>  $count +1]
        );

        $this->redirect(['controller' => 'customers', 'action' => 'index']);
      }
      $this->Flash->error('メールアドレスかパスワードが違います');
    }
  }

  public function signup(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }

    $this->set('label', '新規登録');

    if($this->request->is('post')){
      $this->User->create();
      if($this->User->save($this->request->data)){
        $this->Flash->success('ユーザーを登録しました');
        return $this->redirect(['action' => 'login']);
      }
    }

  }

  public function logout(){
    $this->Flash->success('ログアウトしました');
    $this->redirect($this->Auth->logout());
  }

  public function edit(){
    if ($this->request->is(['post', 'put'])) {

      if ($this->User->save($this->request->data)) {
        $this->Flash->success('会員情報を変更しました');

        // Authコンポーネントのログインセッション情報をリフレッシュする
        $user = $this->User->find(
          'first',
          ['fields' => ['id', 'email', 'family_name', 'given_name','encrypted_password', 'image_url'],
          'conditions' => ['id' => $this->Auth->user('id')]]
        );
        $this->Auth->login($user['User']);

        return $this->redirect($this->Auth->redirectUrl());
      }
    } else {
      $this->request->data = $this->User->findById($this->Auth->user('id'));
    }

  }

  public function delete($id = null) {
    $this->request->allowMethod('post', 'delete');

    if($this->User->Delete($id, $cascade = true)){
      $this->Flash->success('ユーザを削除しました');
      $this->Auth->logout($user['User']);
    } else {
      $this->Flash->error('ユーザを削除できませんでした');
    }

    return $this->redirect(['controller' => 'customers', 'action' => 'index']);
  }

  public function reminder(){
    if($this->request->data){
      $user_email = $this->User->find('first',
        [
          'fields' => 'email',
          'conditions' => ['email' => $this->request->data['User']['email']]
        ]
      );

      if($user_email){
        $user_email = $user_email['User']['email'];

        $email = new CakeEmail('default');
        $email->from(['cakephpcrm@example.com' => 'CakephpCRM']);
        $email->to($user_email);
        $email->template('reset_mail');
        $email->subject('新規パスワードを送ります！');
        $email->send();

        $this->Flash->success('メールを送信しました');
      } else {
        $this->Flash->error('登録されていないメールアドレスです');
      }
    }

  }


}
