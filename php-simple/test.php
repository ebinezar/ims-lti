<?php 
// Load up the LTI Support code
require_once 'ims-blti/blti.php';
require_once 'adlist/db.php';

header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
//ini_set('session.use_cookies', '0');
try {
    session_start(); 
} catch (Exception $e) {
    $warning_session = true;
}

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

// Initialize, all secrets are 'secret', do not set session, and do not redirect
// Establish the context
$context = new BLTI(array('table' => 'blti_keys'));

if ( $context->complete ) exit();
if ( ! $context->valid ) {
    print "Could not establish context: ".$context->message."<p>\n";
    exit();
}
$baseurl = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']);
?>
<html>
<head>
	<title>IMS Learning Tools Interoperability 1.1</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/colorbox.css" />
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.colorbox-min.js"></script>
	<script>
			$(document).ready(function(){
				$(".group1").colorbox({rel:'group1', width:"400px", height:"300px"});
			});
	</script>
</head>
<body style="font-family:sans-serif; background-color:#add8e6">
<?php
echo("<p><b>IMS LTI 1.1 PHP Provider</b></p>\n");
echo("<p>This is a very simple reference implementaton of the Tool side (i.e. provider) 
for IMS LTI 1.1.</p>\n");

echo '<p><a class="group1" href="http://widget.dropthought.com/feedback?qr_token=MF6ilTtwndVW" title="">Grouped Photo 1</a></p>
		<p><a class="group1" href="'.$baseurl.'/images/childdd.jpg" title="">Grouped Photo 2</a></p>
		<p><a class="group1" href="'.$baseurl.'/images/KingdomOfHeaven.jpg" title="">Grouped Photo 3</a></p>';
?>
<a onclick="window.open('http://smwidget.dropthought.com/widgets/feedback%20form%20popup/feedback.php?device_type=qr&qr_token=<?php echo $context->info['qr_token']?>', 'DropThought Feedback Form', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollable=yes, scrollbars=yes, resizable=no, copyhistory=no, width=440, height=600, top=148, left=240');"><img src="https://dt-assets.s3-us-west-1.amazonaws.com/17dtwidget.png"/></a>
