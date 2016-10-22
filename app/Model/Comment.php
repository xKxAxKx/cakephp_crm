<?php
class Comment extends AppModel{
  public $belongsTo = [
    'Customer' => ['className' => 'Customer'],
    'User' => ['className' => 'User']
  ];

  public $actsAs = ['Search.Searchable'];
  public $filterArgs = [
        'body' => ['type' => 'like'],
      ];


}
