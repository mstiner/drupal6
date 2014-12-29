<?php

namespace Drupal\Nodes;

use PhpUtilities\Date\USDate as USDate;
use PhpUtilities\DateFormats\DateFormat;

class AnnouncementNode extends NodeBase {

	private $date;
	
	private $type;
	
	public function __construct($node){
		parent::__construct($node);
		$this->init();
	}
	private function init(){
		$this->load();
	}
	public function doapi($op='view'){
		switch($op){
			case 'view':
				$this->load();
			break;
			case 'insert':
				$this->setDate($this->node->iso_date);
				db_query("INSERT INTO {clickpdx_iso_announcement_date} VALUES('%s',%d",$this->getDefaultDate(),$this->nid);
			break;
			case 'update':
				$this->setDate($this->node->iso_date);
				// print "Default date for update will be: {$this->getDefaultDate()}.";
				db_query("UPDATE {clickpdx_iso_announcement_date} SET isodate='%s' WHERE nid=%d",$this->getDefaultDate(),$this->nid);
			break;
			default:
				throw new Exception("No \$op specified in ".__METHOD__);
		}
	}
	public function load(){
		$dateString=\db_result(\db_query("SELECT isodate FROM {clickpdx_iso_announcement_date} WHERE nid = %d LIMIT 1",$this->nid));
		$this->setDate($dateString);
	}
	public function getDefaultDate(){
		return $this->date->getFormat(new \PhpUtilities\DateFormats\DefaultDateFormat());
	}
	public function getDisplayDate(){
		return $this->date->getFormat(new \PhpUtilities\DateFormats\JQueryUIDefaultDateFormat());
	}
	private function setDate($dateString){
		$this->date = new USDate($dateString);
	}
	public function getDate(){
		return $this->date;
	}
}