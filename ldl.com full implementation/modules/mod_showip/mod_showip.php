<?php
defined( '_JEXEC' ) or die;

	// get user IP
	function getUserIP() {
		if (isset($_SERVER)) { 
			if (isset($_SERVER["HTTP_CLIENT_IP"])){ 
				$ip=$_SERVER["HTTP_CLIENT_IP"];
			} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				//$proxy = $_SERVER["REMOTE_ADDR"];
				//$host = @gethostbyaddr($_SERVER["HTTP_X_FORWARDED_FOR"]);
			} elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$ip = $_SERVER["HTTP_CLIENT_IP"];
				//$proxy = "No proxy detected";
				//$host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
			} elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {
				$ip = $_SERVER["HTTP_FORWARDED_FOR"];
			} elseif(isset($_SERVER["HTTP_FORWARDED"])){
				$ip = $_SERVER["HTTP_FORWARDED"];
			} else { 
				$ip = $_SERVER["REMOTE_ADDR"]; 
			}
		} else { 
			if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
				$ip = getenv( 'HTTP_X_FORWARDED_FOR' ); 
			} elseif ( getenv( 'HTTP_CLIENT_IP' ) ) {
				$ip = getenv( 'HTTP_CLIENT_IP' ); 
			} else {
				$ip = getenv( 'REMOTE_ADDR' ); 
			}
		}
		return $ip;     
    }

	//check whether the found ip is permitted ip or not
	function isPermittedIP(){
		$db = JFactory::getDBO();

		$query = $db->getQuery(true);

		$query->select('ip')
				->from('#__ldl_iplist')
				->where('flag = 1 and validity>=now()')
				->having("ip='".ip2long(getUserIP())."'");
				
		$db->setQuery($query);

		if ($db->loadObject()){
			return true;
		} else {
			return false;
		}
	}
	
	function logIP(){
		$mainframe = JFactory::getApplication();
		$db = JFactory::getDBO();

		$query = $db->getQuery(true);

		$query .= "insert into #__ldl_iplog (book,userid,ip) values (" . $book . "," . $mainframe->getClientId() . "," . ip2long(getUserIP());
						
		$db->setQuery($query);

		if ($rowid=$db->insertid()){
			return $rowid;
		} else {
			return false;
		}
	}
	
	function getReport(){
		$db = JFactory::getDBO();

		$query = $db->getQuery(true);

		$query->select('*')
				->from('#__ldl_iplog');
				
		$db->setQuery($query);
		$row = $db->loadObjectList();
		
		return $row;
	}
	
	function getIplist()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		//$userIP=ip2long($this->getUserIP());
		
		$query->select("userid,ip,subnet")
				->from("#__ldl_iplist")
				->where("flag=1 and validity>=now()");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}




		// Get web client's IP address (NB ip2long() returns false if not a valid IP string)
		$incoming_ip 	= 	ip2long (getUserIP());

		// load plugin params info
		$permitted_ip	= ip2long ($params->get('permitted_ip'));
		$subnet_mask	= ip2long ($params->get('subnet_mask'));
		$selected_user 	= & JFactory::getUser($params->get('user_id'));
		//$allow_opt_out	= $this->params->get('allow_opt_out', '0');
		//$opt_out		= ($allow_opt_out !== '0') && ($_POST['login_mode'] !== 'accessbyip');
		$allow_backend	= $params->get('allow_backend', '0');
		$no_backend		= ($allow_backend == '0')
						  &&
						  ($options['action'] == 'core.login.admin');

		// Look to see if IP addresses and sub-net mask look OK
		$ips_invalid	= !($incoming_ip && $permitted_ip && $subnet_mask);

		// by default - block any auto-login
		$permitted	= FALSE;

		$message	= '';

    $host = $_SERVER["HTTP_HOST"];
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
	$accept = $_SERVER["HTTP_ACCEPT"];
	$language = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    $encoding = $_SERVER["HTTP_ACCEPT_ENCODING"];
    $connection = $_SERVER["HTTP_CONNECTION"];
    $referer = $_SERVER["HTTP_REFERER"];
    $cookie = $_SERVER["HTTP_COOKIE"];
    $path = $_SERVER["PATH"];
    $system_root = $_SERVER["SystemRoot"];
    $comspec = $_SERVER["COMSPEC"];
    $pathext = $_SERVER["PATHEXT"];
    $windir = $_SERVER["WINDIR"];
    $server_signature = $_SERVER["SERVER_SIGNATURE"];
    $server_software = $_SERVER["SERVER_SOFTWARE"];
    $server_name = $_SERVER["SERVER_NAME"];
    $server_addr = $_SERVER["SERVER_ADDR"];
    $server_port = $_SERVER["SERVER_PORT"];
    $remote_addr = $_SERVER["REMOTE_ADDR"];
    $document_root = $_SERVER["DOCUMENT_ROOT"];
    $server_admin = $_SERVER["SERVER_ADMIN"];
    $script = $_SERVER["SCRIPT_FILENAME"];
    $remote_port = $_SERVER["REMOTE_PORT"];
    $gateway_interface = $_SERVER["GATEWAY_INTERFACE"];
    $server_protocol = $_SERVER["SERVER_PROTOCOL"];
    $request_method = $_SERVER["REQUEST_METHOD"];
    $qurey_string = $_SERVER["QUERY_STRING"]; 
    $request_uri = $_SERVER["REQUEST_URI"];
    $script_name = $_SERVER["SCRIPT_NAME"];
    $php_self = $_SERVER["PHP_SELF"];
    $request_time = $_SERVER["REQUEST_TIME"];












require JModuleHelper::getLayoutPath('mod_showip', 'default');