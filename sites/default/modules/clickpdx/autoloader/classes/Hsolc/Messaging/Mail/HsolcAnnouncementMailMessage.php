<?php
namespace Hsolc\Messaging\Mail;
use Messaging\Mail\MailMessage;

class HsolcAnnouncementMailMessage extends \Messaging\Mail\MailMessage {

	public function __construct($to)
	{
		parent::__construct();
		$this->recipients = $to;
		$this->subject = 'HSOLC Announcements';
		$this->addMailHeader('From','HSOLC Admin');
	}
	
	public function sendAnnouncements()
	{
		return $this->sendWithParameters($this->recipients, $this->subject, $this->getMultiBody());
	}
	
}