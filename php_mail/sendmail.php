<?php
require('bootstrap.php');
require('includes.php');
use Messaging\Mail\MailMessage as MailMessage;
use Hsolc\Messaging\Mail\HsolcAnnouncementMailMessage as HsolcAnnouncementMail;
use Hsolc\Messaging\Mail\HsolcAnnouncementMailMessageForm as HsolcAnnouncementMailMessageForm;
use Http\HttpRequest as HttpRequest;

define('ANNOUNCEMENT_EMAIL_TEST_MODE',true);
$from = "admin@hsolc.org";
$subject = "HSOLC Announcements";

// $e='everyone@hsolc.org';
$test = (isset($_GET['test']) && strtolower($_GET['test']) == 'true') ? true : false;
$test = ANNOUNCEMENT_EMAIL_TEST_MODE;

$e = $test ? 'jbernal.web.dev@gmail.com, sbower@hsolc.org' : 'everyone@hsolc.org';
/* Look-up seminar id here and insert the data in the rideshare table, if necessary */


$request = new Hsolc\Messaging\Mail\HsolcAnnouncementMailMessageForm();
$messages = '';
$out = $request->render();

// print "Action is: ".$request->action();

if($request->action()=='sendMail'){
	$mailMessage = new HsolcAnnouncementMail($from,$subject);
	$mailMessage->multipart(true);
	$mailMessage->textBody($request->getMailMessageTextBody());
	$mailMessage->htmlBody($request->getMailMessageHtmlBody());
	if($mailMessage->sendAnnouncements())
	{
		$messages = 'Your mail was sent.';
	}	
	else
	{
		$messages = 'Your mail could not be sent.';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mail Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="mail-form.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<p class='messages'><?php print $messages; ?></p>
	<h2>HSOLC Announcement Email Form</h2>
	<p><span style='font-weight:bold;'>Description:</span> Use this form to send announcements from the HSOLC website to staff.  Also, use this form to test sending it to just one or two recipients.</p>
	<?php print $out; ?>
</body>
</html>  