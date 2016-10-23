<?php
class Customer extends AppModel{
  public $belongsTo = [
    'Post' => ['className' => 'Post'],
    'Company' => ['className' => 'Company']
  ];

  public $hasMany = [
    'Comment' => ['className' => 'Comment', 'foreignKey' => 'customer_id', 'dependent' => true,]
  ];

  public $actsAs = ['Search.Searchable','Containable'];
  public $filterArgs = [
        'family_name' => ['type' => 'like'],
        'given_name' => ['type' => 'like'],
        'email' => ['type' => 'like'],
        'name' => ['type' => 'like', 'field' => 'Company.name'],
        'body' => ['type' => 'subquery', 'field' => 'Comment.body', 'method' => ''],
      ];

  public function searchByBody($data = array()){
    // $this->Behaviors->attach('Search.Searchable');
    // $body = Set::extract($body,'/body');
    // $options = [
    //     'conditions' => ['Comment.body'  => $body],
    //     'contain' => $this->alias,
    // ];
    // if (( $c = count ( $body )) !== 1 ){
    //     //ここの条件を通すとAND条件として構成される。ここを通らないとOR条件として構成される。
    //     $options['group'] = 'Comment.customer_id HAVING COUNT(Comment.customer_id) = '.$c;
    // }
    // $data = $this->Comment->find('all',$options);
    // $condition = implode(', ', Set::extract($data,'/Customer/id'));
    // if ( empty( $condition )){
    //     $condition = 'NULL';
    // }
    // return $condition;

  }

}
