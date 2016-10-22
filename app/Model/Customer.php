<?php
class Customer extends AppModel{
  public $belongsTo = [
    'Post' => ['className' => 'Post'],
    'Company' => ['className' => 'Company']
  ];

  public $hasMany = [
    'Comment' => ['className' => 'Comment', 'foreignKey' => 'customer_id', 'dependent' => true,]
  ];

  public $actsAs = ['Search.Searchable'];
  public $filterArgs = [
        'family_name' => ['type' => 'like'],
        'given_name' => ['type' => 'like'],
        'email' => ['type' => 'like'],
        'name' => ['type' => 'like', 'field' => 'Company.name'],
        'body' => ['type' => 'subquery', 'field' => 'Comment.body', 'method' => 'searchByComment'],
      ];

  // public function searchByComment($data = array()){
  //   $this->Behaviors->attach('Search.Searchable');
  //   $comment_id = Set::extract($data,'/id');
  //   $options = array(
  //     'conditions' => array('Comment.body'  => $comment_id),
  //     'contain' => $this->alias,
  //   );
  //   if (( $c = count ( $comment_id )) !== 1 ){
  //     $options['group'] = 'Comment.customer_id HAVING COUNT(Comment.customer_id) = '.$c;
  //   }
  //   $data = $this->Customer->find('all',$options);
  //   $condition = implode(', ', Set::extract($data,'/Customer/id'));
  //   if ( empty( $condition )){
  //     $condition = 'NULL';
  //   }
  //   return $condition;
  // }

}
