<?php
class CustomersController extends AppController{

  public $helpers = ['User'];

  public $uses = ['Customer', 'Comment', 'Company', 'Post'];

  public $components = [
    'Search.Prg' => ['commonProcess'],
    'Paginator' => ['limit' => 10, 'order' => ['updated' =>'desc']]
  ];
  public $presetVars = true;

  public function index(){
    $this->set('customers', $this->Paginator->paginate());
  }

  public function view($id = null){
    $customer = $this->Customer->findById($id);
    $this->set('customer', $customer);

    $comments = $this->Comment->find('all', ['conditions'=> ['Comment.customer_id' => $id]]);
    $this->set('comments', $comments);
  }

  public function add(){
    $company = $this->Company->find('list', ['fields' => ['id', 'name']]);
    $post = $this->Post->find('list', ['fields' => ['id', 'position_name']]);
    $this->set('post', $post);
    $this->set('company', $company);

    if($this->request->is('post')){
      $this->Customer->create();
      if($this->Customer->save($this->request->data)){
        $this->Flash->success('顧客を登録しました');
        return $this->redirect(['action' => 'index']);
      }
    }
  }

  public function edit($id = null){
    if ($this->request->is(['post', 'put'])) {

      if ($this->Customer->save($this->request->data)) {
        $this->Flash->success('会員情報を変更しました');
        return $this->redirect(['action' => 'view', $id]);
      }
    } else {
      $company = $this->Company->find('list', ['fields' => ['id', 'name']]);
      $post = $this->Post->find('list', ['fields' => ['id', 'position_name']]);
      $customer = $this->Customer->findById($id);
      $this->set('post', $post);
      $this->set('company', $company);
      $this->set('customer', $customer);
      $this->request->data = $this->Customer->findById($id);
    }
  }

  public function delete($id = null){
    $this->request->allowMethod('post', 'delete');

    if($this->Customer->Delete($id, $cascade = true)){
      $this->Flash->success('顧客を削除しました');
    } else {
      $this->Flash->error('顧客を削除できませんでした');
    }

    return $this->redirect($this->Auth->redirectUrl());
  }

  public function search(){
    $this->Prg->commonProcess();

    if($this->request->data){
      $passedArgs = $this->passedArgs;
      $customers = $this->Customer->find('all', ['conditions' => $this->Customer->parseCriteria($this->passedArgs)]);
      $this->set('customers', $customers);
    } else {
      $passedArgs = null;
    }
  }

}
