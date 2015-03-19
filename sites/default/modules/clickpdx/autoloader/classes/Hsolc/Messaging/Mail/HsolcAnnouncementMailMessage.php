<?php
namespace Hsolc\Messaging\Mail;
use Messaging\Mail\MailMessage;

class HsolcAnnouncementMailMessage extends \Messaging\Mail\MailMessage {

	public function __construct($to)
	{
		parent::__construct();
		$this->recipients = $to;
		$this->subject = 'HSOLC Announcements';
		$this->addMailHeader('From',"HSOLC Admin <admin@hsolc.org>");
	}
	
	public function sendAnnouncements()
	{
		// $this->recipients = 'jbernal.web.dev@gmail.com,redderx@yahoo.com';
		// print $this->recipients;
		return $this->sendWithParameters($this->recipients, $this->subject, $this->getMultiBody());
	}
	
}