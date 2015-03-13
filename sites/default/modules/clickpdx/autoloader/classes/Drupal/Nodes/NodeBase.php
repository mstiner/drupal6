<?php

namespace Drupal\Nodes;

class NodeBase {

	protected $nid;
	
	protected $vid;
	
	protected $node;
	
	protected $content;
	
	public function __construct($node){
		$this->nid = $node->nid;
		$this->vid = $node->vid;
		$this->node = $node;
		$this->content = &$node->content;
	}
	private function init(){
		// Load data here
	}
	public function addContent($args){
		$args = func_get_args();
		$name = array_shift($args);
		$markup = array_shift($args);
		$this->content[$name] = array(
			'#value' => $markup,
			'#weight' => -10,
		);
	}
}