<?php
namespace Messaging\Mail;
use Http\HttpRequest;

class MailMessageForm extends \Http\HttpRequest {


	private $recipients;
	
	private $from;
	
	private $subject;
	
	private $headers;
	
	protected $htmlBody;
	
	protected $textBody;
	
	private $boundary; 
	
	private $multipart = false;
	
	protected $action;

	public function __construct()
	{
		parent::__construct();
		$this->action = isset($_POST['action']) ? $_POST['action'] : 'view';
	}
	
	public function action(){
		return $this->action;
	}
	public function textBody($str)
	{
		$this->textBody = $str;	
	}
	public function htmlBody($str)
	{
		$this->htmlBody = $str;
	}

	protected function submit()
	{
		// $this new mail message blah blah blah...
	}
	
}