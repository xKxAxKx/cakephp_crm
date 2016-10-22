<?php
class Company extends AppModel{
  public $hasMany = [
    'Customer' => ['className' => 'Customer', 'foreignKey' => 'company_id', 'dependent' => true,]
  ];

}
