<?php
error_reporting(-1);
ini_set('memory_limit','256M');
// ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "/var/www/www.hsolc.org-php_errors.log");
require('includes.php');
define('ANNOUNCEMENT_EMAIL_TEST_MODE',true);


/**
get and set the location of a template file for to be used to send HTML email
define a set of tokens that are to be replaced within the template file
set the headers for plain text vs. html email or both, i.e., multipart/alternative
send mail to a specific email from a specific email
set the subject of the email
*/
//trigger_error( 'some user error.',E_USER_WARNING );
//print $foobar;
$from = "admin@hsolc.org";
// $subject = "HSOLC Announcements";
$subject = "HSOLC Announcements";
$t="HSOLC Announcements";


// $e='everyone@hsolc.org';
$test = (isset($_GET['test']) || strtolower($_GET['test']) == 'true') ? true : false;
$test = ANNOUNCEMENT_EMAIL_TEST_MODE;

$e = $test ? 'jbernal.web.dev@gmail.com, sbower@hsolc.org' : 'everyone@hsolc.org';
/* Look-up seminar id here and insert the data in the rideshare table, if necessary */


print getHtmlBody();




function getHtmlBody(){
	$html = file_get_contents('template.html', true);
	$text_body = file_get_contents('template.txt', true);
	$boundary = '----=_NextPart_';

	//for HTML
	//$body = str_replace("[Title]",$t,$html);
	$htmlBody = str_replace("[Announcements]", getAnnouncements(), $html);
	return $htmlBody;
}



$htmlBody = getHtmlBody();
// for text file
$text_body = str_replace("[Announcements]",getAnnouncements( "text" ),$text_body);
//$text_body = str_replace("[Title]",$t,$text_body);

$multi_body="

This is a multi-part message in MIME format.

--$boundary
Content-Type: text/plain; charset=UTF-8; format=flowed; 
Content-Transfer-Encoding: 8bit

$text_body


--$boundary
Content-Type: text/html; charset=UTF-8; format=flowed; 
Content-Transfer-Encoding: 8bit

$htmlBody


";



$headers='From: HSOLC <' . $from . '>'."\r\n".'MIME-Version: 1.0'."\r\n".'Content-Type: multipart/alternative; boundary="'.$boundary.'"'."\r\n".'Content-Transfer-Encoding: 8Bit'."\r\n";
 

 
$sent2 = mail($e, $subject, $multi_body, $headers);


if( $sent2 ) echo "<h2>Thanks, Sami for sending this email...</h2>";

//if($sent2) echo "your rideshare email was sent successfully!"; else echo "your mail could not be sent...";