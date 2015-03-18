<?php
require('bootstrap.php');
require('includes.php');
use Messaging\Mail\MailMessage as MailMessage;
use Http\HttpRequest as HttpRequest;

define('ANNOUNCEMENT_EMAIL_TEST_MODE',true);
$from = "admin@hsolc.org";
$subject = "HSOLC Announcements";

// $e='everyone@hsolc.org';
$test = (isset($_GET['test']) || strtolower($_GET['test']) == 'true') ? true : false;
$test = ANNOUNCEMENT_EMAIL_TEST_MODE;

$e = $test ? 'jbernal.web.dev@gmail.com, sbower@hsolc.org' : 'everyone@hsolc.org';
/* Look-up seminar id here and insert the data in the rideshare table, if necessary */





if(true || $request->action()=='sendMail'){
	// $addressBookGroup = new AddressBookGroup($request->mailGroup());

	$mailMessage = new MailMessage($from,$subject);
	$mailMessage->multipart(true);
	$mailMessage->textBody(getTextBody());
	$mailMessage->htmlBody(getHtmlBody());
	$mailMessage->send();
} else {
	print getHtmlBody();
}

	print getHtmlBody();