<?php
class Comment extends AppModel{
  public $actsAs = ['Containable'];
  public $belongsTo = [
    'Customer' => ['className' => 'Customer'],
    'User' => ['className' => 'User']
  ];

}
