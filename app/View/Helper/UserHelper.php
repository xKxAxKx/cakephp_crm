<?php

class UserHelper extends AppHelper{
  public $helpers = ['Html'];

  public function photoImage($image, $options =[]){

    $defaultPhoto = Configure::read('image.default');

    if(empty($image['image'])){
      $path = $defaultPhoto;
    } else {
      $path = $image['image_url'];
    }

    return $this->Html->image($path, $options);
  }


}
