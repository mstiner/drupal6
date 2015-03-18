<?php
namespace Hsolc\Messaging\Mail;
use Messaging\Mail\MailMessage;

class HsolcAnnouncementMailMessage extends \Messaging\Mail\MailMessage {

	public function __construct()
	{
		parent::__construct();
		$this->recipients = 'jbernal.web.dev@gmail.com, mstiner@hsolc.org, sbower@hsolc.org';
		$this->subject = 'HSOLC Announcements';
	}
	
	public function sendAnnouncements()
	{
		return $this->sendWithParameters($this->recipients, $this->subject, $this->getMultiBody());
	}
	
}