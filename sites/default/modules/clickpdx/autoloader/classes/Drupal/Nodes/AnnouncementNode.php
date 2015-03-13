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
				if(!$this->node->is_new){
					if(ISODATE_SHOW_DEBUG_MESSAGES)
						drupal_set_message($this->node->title .' is an existing node with vid: '.$this->node->vid);
				}
				db_query("INSERT INTO {clickpdx_iso_announcement_date} VALUES(%d,%d,'%s')",$this->vid,$this->nid,$this->getDefaultDate());
			break;
			case 'update':
				$this->setDate($this->node->iso_date);
				if(!empty($this->node->revision)){
					if(ISODATE_SHOW_DEBUG_MESSAGES)
					{
						drupal_set_message($this->node->title .' is a request for a new node revision with vid: '.$this->node->vid);
					}
					drupal_set_message("A new revision for isodate will be inserted with vid, {$this->vid}; nid, {$this->nid}; and date, {$this->getDefaultDate()}");
					db_query("INSERT INTO {clickpdx_iso_announcement_date} VALUES(%d,%d,'%s')",$this->vid,$this->nid,$this->getDefaultDate());
				}
				else {
					if(ISODATE_SHOW_DEBUG_MESSAGES)
					{
						drupal_set_message($this->node->title .' won\'t have a new revision and is an EXISTING node with vid: '.$this->node->vid);
					}
					// print "Default date for update will be: {$this->getDefaultDate()}.";
					db_query("UPDATE {clickpdx_iso_announcement_date} SET isodate='%s' WHERE vid=%d",$this->getDefaultDate(),$this->vid);
				}
			break;
			default:
				throw new Exception("No \$op specified in ".__METHOD__);
		}
	}
	public function load(){
		$dateString=\db_result(\db_query("SELECT isodate FROM {clickpdx_iso_announcement_date} WHERE vid = %d LIMIT 1",$this->vid));
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