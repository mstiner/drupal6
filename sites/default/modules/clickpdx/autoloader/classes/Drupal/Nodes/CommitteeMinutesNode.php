<?php

namespace Drupal\Nodes;

use PhpUtilities\Date\USDate as USDate;
use PhpUtilities\DateFormats\DateFormat;

class CommitteeMinutesNode extends NodeBase {

	protected $date;
	
	protected $type;
	
	public function __construct($node){
		parent::__construct($node);
		$this->init();
	}
	private function init(){
		$this->load();
	}

	public function formAlter($form){
		// $form->addElement('Fieldset')->setName('iso_date')->setTitle('Meeting Date')->value('Announcement Date')->weight(-10)
		$form->addElement('Fieldset')->setName('iso_date')->setTitle('Meeting Date')->weight(-10)
		->addElement('IsoDate')->setTitle('Meeting Date')

		->setName('iso_date')->value($this->getDisplayDate());
	}

}