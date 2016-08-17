<?php

/** Sets up the WordPress Environment. */
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require( $path_to_wp . '/wp-load.php' );


define("WEBMASTER_EMAIL", $_POST['sendto']);
if (WEBMASTER_EMAIL == '' || WEBMASTER_EMAIL == 'Testemail') {
	die('<span class="error_message">The recipient email is not correct</span>');	
} 

define("EMAIL_SUBJECT", $_POST['subject']);
if (EMAIL_SUBJECT == '' || EMAIL_SUBJECT == 'Subject') {
	define("EMAIL_SUBJECT",'Contact');	
}

$sr_contact_name = stripslashes($_POST['name']);
$sr_contact_email = trim($_POST['email']);
$sr_contact_message = stripslashes($_POST['message']);

$sr_contact_custom = $_POST['fields'];
$sr_contact_custom = substr($sr_contact_custom, 0, -1);
$sr_contact_custom = explode(',', $sr_contact_custom);

$sr_contact_message_addition = '';
foreach ($sr_contact_custom as $c) {
	if ($c !== 'name' && $c !== 'email' && $c !== 'message') {
		$sr_contact_message_addition .= '<b>'.$c.'</b>: '.$_POST[$c].'<br />';
	}
}

if ($sr_contact_message_addition !== '') {
	$sr_contact_message = $sr_contact_message.'<br /><br />'.$sr_contact_message_addition;
}


$sr_contact_message = '<html><body>'.nl2br($sr_contact_message)."</body></html>";
$sr_contact_mail = wp_mail(WEBMASTER_EMAIL, EMAIL_SUBJECT, $sr_contact_message,
     "From: ".$sr_contact_name." <".$sr_contact_email.">\r\n"
    ."Reply-To: ".$sr_contact_email."\r\n"
    ."X-Mailer: PHP/" . phpversion()
	."MIME-Version: 1.0\r\n"
	."Content-Type: text/html; charset=utf-8");


if($sr_contact_mail)
{
echo '			<div class="alert alert-confirm">
					<strong>'.__("Your message has been sent. Thank You.", 'sr_avoc_theme').'
				</div>
			';
}
else
{
echo '			<div class="alert alert-error">
					<strong>'.__("Your message has not been sent", 'sr_avoc_theme').'
				</div>
			';
}

?>