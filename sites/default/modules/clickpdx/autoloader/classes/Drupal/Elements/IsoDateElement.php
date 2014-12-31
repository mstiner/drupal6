<?php

namespace Drupal\Elements;

class IsoDateElement extends ElementBase {

	public function __construct($name,$value){
		parent::__construct($name,$value);
	}
	public function toDrupal(){
    return array(
    	'iso_date' => array(
    		'#title' => t('!title',array('!title'=>$this->title)),
				'#type' => $this->type,
				'#default_value' => $this->default_value,
				'#maxlength' => 25,
				'#size' => 10,
				'#weight' => $this->weight,
				'#description' => t('!description',array('!description'=>$this->description)),
      )
    );
	}
	
}