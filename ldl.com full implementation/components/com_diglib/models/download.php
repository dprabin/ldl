<?php // download.php

session_start(); // start or resume a session

// always sanitize user input
$fileId  = filter_input(INPUT_GET, 'fileId', FILTER_SANITIZE_NUMBER_INT);
$token   = filter_input(INPUT_GET, 'token', FILTER_UNSAFE_RAW);
$referer = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_SANITIZE_URL);
$script  = filter_input(INPUT_SERVER, 'SCRIPT_NAME', FILTER_SANITIZE_URL);

// mush session_id and fileId into an access token
$secret        = 'i can haz salt?';
$expectedToken = md5($secret . session_id() . $fileId);

// check if request came from download.php and has the valid access token
if(($expectedToken === $token) && ($referer === $script)) {
   $file = realpath('path/to/files/' . $fileId . '.zip');
   if(is_readable($file)) {
        session_destroy(); // optional
        header(/* stuff */);
        fpassthru($file);
        exit;
    }
}
// if no file was sent, send the page with the download link.
?>
<html ...

<?php printf('a href="/download.php?fileId=%s&amp;token=%s', 
              $fileId, $expectedToken); ?>

...
</html>




<?php
	//another implementation
	$dir='secret-directory-name-here/';
	if ((!$file=realpath($dir.$_GET['file'])) || strpos($file,realpath($dir))!==0 || substr($file,-4)=='.php'){
		header('HTTP/1.0 404 Not Found');
	exit();
	}
	$ref=$_SERVER['HTTP_REFERER'];
	if (strpos($ref,'http://www.example.com/')===0 || strpos($ref,'http')!==0){
		$mime=array(
			'jpg'=>'image/jpeg',
			'png'=>'image/png',
			'mid'=>'audio/x-midi',
			'wav'=>'audio/x-wav'
		);
		$stat=stat($file);
		header('Content-Type: '.$mime[substr($file,-3)]);
		header('Content-Length: '.$stat[7]);
		header('Last-Modified: '.gmdate('D, d M Y H:i:s',$stat[9]).' GMT');
		readfile($file);
		exit();
	}
	header('Pragma: no-cache');
	header('Cache-Control: no-cache, no-store, must-revalidate');
	include($file.'.php');
?>




<?php
	//another example
	if ($passesallyoursecurity) {
		set_time_limit(0);
		header("Pragma: public");
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Cache-Control: private",false);
		header("Content-Type: application/download"); 
		header("Content-Disposition: filename=filetheyget.ext");

		$ch = curl_init("http://remotedomain.com/dir/file.ext");
		curl_exec($ch);
		curl_close($ch);        
		exit();
	}


?>


<?php
//here, read the decline ips from database with flags=0 
//to add an extra layer of security to download
$decline_ips = array('ip_1' => '127.0.0.1');
if ($_SERVER['REMOTE_ADDR'] == $decline_ips['ip_1']) {
   die("You aren't permitted direct access to this page.\n\n\n\n
   Sources are blank.");
}


?>
