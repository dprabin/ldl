<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewDown extends JView
{
	protected $path;

	public function display($tpl = null)
	{
		$this->path = $this->get('Path');
		DiglibModelDown::updateDownCount();
		$this->download();
		$this->path = $this->path->book;

		parent::display($tpl);
	}
	protected function makeUrl(){}
	
	/* 
	//This method is giving error while downloading
	//The error is due to absolute path problem.
	protected function download(){
		//path to file
		$filedir = JURI::base() . 'diglib/cover.jpg';// . $this->path->path.'/cover.jpg';//$this->path->filename.$this->path->filetype;
		//name of file (can be whatever you like--i.e. doesn't have to be the same as actual file--whatever you name it is what the user will see)
		$filename = 'ldl_book_'.md5($this->path->filename).'.jpg';//.$this->path->filetype;
		//see http://www.w3schools.com/media/media_mimeref.asp for full list of mime types
		$mimetype = 'application/pdf';
		//see http://php.net/file_get_contents
		$data = file_get_contents($filedir);
		// see http://php.net/strlen
		$size = strlen($data);
		//trigger HTTP request - see http://php.net/header
		header("Content-Disposition: attachment; filename = $filename"); 
		header("Content-Length: $size");
		header("Content-Type: $mimetype");
		//see http://php.net/echo
		echo $data;
	}
	*/
	
	protected function download()
	{
		// Allow direct file download (hotlinking)?
		// Empty - allow hotlinking
		// If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text
		define('ALLOWED_REFERRER', 'ldl.com');

		// Download folder, i.e. folder where you keep all files for download.
		// MUST end with slash (i.e. "/" )
		//$basedir=JURI::base() . 'diglib/';
		//define('BASE_DIR',$basedir);

		// log downloads?  true/false
		//define('LOG_DOWNLOADS',false);

		// log file name
		//define('LOG_FILE','downloads.log');
		
		// transfer rate of the file in KBps
		define('TRANSFER_RATE',1024*10); //10 MBps

		// Allowed extensions list in format 'extension' => 'mime type'
		// If myme type is set to empty string then script will try to detect mime type 
		// itself, which would only work if you have Mimetype or Fileinfo extensions
		// installed on server.
		$allowed_ext = array (

		  // archives
		  'zip' => 'application/zip',

		  // documents
		  'pdf' => 'application/pdf',
		  'doc' => 'application/msword',
		  'xls' => 'application/vnd.ms-excel',
		  'ppt' => 'application/vnd.ms-powerpoint',
		  
		  // executables
		  'exe' => 'application/octet-stream',

		  // images
		  'gif' => 'image/gif',
		  'png' => 'image/png',
		  'jpg' => 'image/jpeg',
		  'jpeg' => 'image/jpeg',

		  // audio
		  'mp3' => 'audio/mpeg',
		  'wav' => 'audio/x-wav',

		  // video
		  'mpeg' => 'video/mpeg',
		  'mpg' => 'video/mpeg',
		  'mpe' => 'video/mpeg',
		  'mov' => 'video/quicktime',
		  'avi' => 'video/x-msvideo'
		);

		// If hotlinking not allowed then make hackers think there are some server problems
		if (ALLOWED_REFERRER !== ''
		&& (!isset($_SERVER['HTTP_REFERER']) || strpos(strtoupper($_SERVER['HTTP_REFERER']),strtoupper(ALLOWED_REFERRER)) === false)
		) {
		  die("Internal server error. Please contact system administrator.");
		}

		// Make sure program execution doesn't time out
		// Set maximum script execution time in seconds (0 means no limit)
		set_time_limit(0);

		/* //prabin changed to get $path from above
		if (!isset($_GET['f']) || empty($_GET['f'])) {
		  die("Please specify file name for download.");
		}

		// Nullbyte hack fix
		if (strpos($_GET['f'], "\0") !== FALSE) die('');
		*/
		
		// Get real file name.
		// Remove any path info to avoid hacking by adding relative path, etc.
		$fname = basename(md5($this->path->filename).'.'.$this->path->filetype);//($_GET['f']);

	
		// get full file path (including subfolders)
		// Here these two lines not working, it is requiring the absolute path
		//$file_path = JURI::base() . 'diglib/cover.jpg';
		//$file_path = 'd:/program files/wamp/www/ldl.com/diglib/';
		$file_path .= $this->path->path.'/'.$this->path->filename.'.'.$this->path->filetype;
		//find_file(BASE_DIR, $fname, $file_path);
		//$file_path = JURI::base() . 'diglib/cover.jpg';

		if (!is_file($file_path)) {
		  die("File does not exist. Make sure you specified correct file name."); 
		}

		// file size in bytes
		$fsize = filesize($file_path); 

		// file extension
		$fext = strtolower(substr(strrchr($fname,"."),1));

		// check if allowed extension
		if (!array_key_exists($fext, $allowed_ext)) {
		  die("Not allowed file type."); 
		}

		// get mime type
		if ($allowed_ext[$fext] == '') {
		  $mtype = '';
		  // mime type is not set, get from server settings
		  if (function_exists('mime_content_type')) {
			$mtype = mime_content_type($file_path);
		  }
		  else if (function_exists('finfo_file')) {
			$finfo = finfo_open(FILEINFO_MIME); // return mime type
			$mtype = finfo_file($finfo, $file_path);
			finfo_close($finfo);  
		  }
		  if ($mtype == '') {
			$mtype = "application/force-download";
		  }
		}
		else {
		  // get mime type defined by admin
		  $mtype = $allowed_ext[$fext];
		}

		// Browser will try to save file with this filename, regardless original filename.
		// You can override it if needed.

		if (!isset($_GET['fc']) || empty($_GET['fc'])) {
		  $asfname = $fname;
		}
		else {
		  // remove some bad chars
		  $asfname = str_replace(array('"',"'",'\\','/'), '', $_GET['fc']);
		  if ($asfname === '') $asfname = 'NoName';
		}

		// set headers
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: $mtype");
		header("Content-Disposition: attachment; filename=\"$asfname\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . $fsize);

		// download
		// @readfile($file_path);
		$file = @fopen($file_path,"rb");
		if ($file) {
		  while(!feof($file)) {
			print(fread($file, 1024*8));//*TRANSFER_RATE));//Transfer Rate of file//this is not useful here because it takes time to make file, not download//may only be useful in localhost
			flush();
			if (connection_status()!=0) {
			  @fclose($file);
			  die();
			}
			//sleep(1);///TRANSFER_RATE);
		  }
		  @fclose($file);
		}
	}
	
}
