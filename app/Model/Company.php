<?php
class Company extends AppModel{
  public $actsAs = ['Containable'];

  public $hasMany = [
    'Customer' => ['className' => 'Customer', 'foreignKey' => 'company_id', 'dependent' => true,]
  ];

}
