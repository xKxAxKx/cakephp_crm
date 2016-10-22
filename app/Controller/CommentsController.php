<?php
class CommentsController extends AppController{

  public function add(){
    if($this->request->is(['post', 'put'])){
      $this->Comment->create();
      if($this->Comment->save($this->request->data)){
        $this->Flash->success('コメントを登録しました');
        $this->redirect($this->referer());
      }
    }
  }

  public function delete($id = null){
    $this->request->allowMethod('post', 'delete');

    if($this->Comment->Delete($id, $cascade = true)){
      $this->Flash->success('コメントを削除しました');
    } else {
      $this->Flash->error('コメントを削除できませんでした');
    }
    $this->redirect($this->referer());
  }

}
