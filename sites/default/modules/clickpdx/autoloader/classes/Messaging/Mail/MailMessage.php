<?php
namespace Messaging\Mail;

class MailMessage {


	private $recipients;
	private $from;
	private $subject;
	private $headers;
	
	private $htmlBody;
	
	private $textBody;
	
	private $boundary; 
	
	private $multipart = false;

	public function __construct()
	{

	}
	
	public function multipart($boolean)
	{
		if(isset($boolean))
		{
			$this->multipart = $boolean;
			$this->boundary = '----=_NextPart_';
		}
		return $this->multipart;
	}
	private function getHeaders()
	{
		$params = array(
		 'MIME-Version' => '1.0',
		 'Content-Type' => 'multipart/alternative; boundary="'.$this->boundary.'"',
		 'Content-Transfer-Encoding' => '8Bit'
		);
		return $params;
	}
	private function formatHeaders(){
		$out = '';
		foreach($this->getHeaders() as $header=>$value)
		{
			$out .= $header.':'.$value ."\r\n";
		}
		return $out;
	}
	public function textBody($str)
	{
		$this->textBody = $str;	
	}
	public function htmlBody($str)
	{
		$this->htmlBody = $str;
	}
	private function getMultiBody()
	{
$multi_body="

This is a multi-part message in MIME format.

--{$this->boundary}
Content-Type: text/plain; charset=UTF-8; format=flowed; 
Content-Transfer-Encoding: 8bit

{$this->textBody}


--{$this->boundary}
Content-Type: text/html; charset=UTF-8; format=flowed; 
Content-Transfer-Encoding: 8bit

{$this->htmlBody}
";
	return $multi_body;
	}
	
	public function send()
	{
		return mail('jbernal.web.dev@gmail.com','HSOLC Announcements', $this->getMultiBody(), $this->formatHeaders());
	}
	
}