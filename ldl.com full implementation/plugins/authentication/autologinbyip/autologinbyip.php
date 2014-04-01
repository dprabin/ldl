<?php
/**
 * @package Plugin accessbyip for Joomla! 2.5 and later
 * @version $Id: accessbyip.php
 * @author James brice
 * @copyright Copyright (C) 2012 Prabhu Bhakta. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access
defined('_JEXEC') or die;

class plgAuthenticationAutologinbyip extends JPlugin {
	/**
	 * This method should handle any authentication and report back to the subject
	 *
	 * @access	public
	 * @param  array	$credentials Array holding the user credentials (not used in this plugin)
	 * @param	array   $options	Array of extra options
	 * @param	object	$response	Authentication response object
	 */

	function onUserAuthenticate($credentials, $options, & $response)
	{
		// Get web client's IP address (NB ip2long() returns false if not a valid IP string)
		$incoming_ip 	= 	ip2long ($this->getUserIP());

		// load plugin params info
		$ipinfo			= $this->getIpinfo();
		
		$permitted_ip	= $ipinfo->ip;
		$subnet_mask	= $ipinfo->subnet;
		$selected_user 	= & JFactory::getUser($ipinfo->userid);

		//limit autologin only to requests coming from mod_autologinbyip
		/*$allow_opt_out	= $this->params->get('allow_opt_out', '0');
		$opt_out		= ($allow_opt_out !== '0')
						  &&
						  ($_POST['login_mode'] !== 'accessbyip');
		*/				  
		//Enable or disable authentication via this plugin for attempts to log into the site's backend.
		$allow_backend	= $this->params->get('allow_backend', '0');
		$no_backend		= ($allow_backend == '0')
						  &&
						  ($options['action'] == 'core.login.admin');

		// Look to see if IP addresses and sub-net mask look OK
		$ips_invalid	= !($incoming_ip && $permitted_ip && $subnet_mask);

		// by default - block any auto-login
		$permitted	= FALSE;

		$message	= '';

		switch (TRUE) {
			// check for valid IP address info.
		    case $ips_invalid:
		        break;
			// check if authentication required
			//case $opt_out:
			//	break;
			// don't authenticate here if login to the backend blocked
		    case $no_backend:
		       break;
		    // check that login is still using a valid user
		    case !isset($selected_user->username) || $selected_user->block:
		    	break;
		    //check IP params and incoming IP for validity
			// XOR gives 0s if equivalent bits are the same same,
			//  and clear "don't care" range of LSBs by ANDing with subnet mask
			//  (This method avoids differing behaviour in 32- and 64-bit implementations of PHP.)
		    case !(($incoming_ip ^ $permitted_ip) & $subnet_mask):
		        $permitted 	= TRUE;
		        break;
		}

		if ($permitted) {
			// set up response to confirm authentication
			$response->status		= JAuthentication::STATUS_SUCCESS;
			$response->error_message = '';
			// Use credentials of pre-set user to log in
			$response->username = $selected_user->username;
			$response->fullname = $selected_user->name;
		}
		else {
			// set up response to deny authentication at this stage
			$response->status		= JAuthentication::STATUS_FAILURE;
			$response->error_message	= JText::sprintf('JGLOBAL_AUTH_FAILED', '$message');
		}
	}
	
	// IP functions
	// get user IP
	public function getUserIP() {
		if (isset($_SERVER)) { 
			if(isset($_SERVER['HTTP_CLIENT_IP'])) {
				$ip=$_SERVER['HTTP_CLIENT_IP']; // share internet
			} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { 
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
			} elseif(isset($_SERVER["HTTP_CLIENT_IP"])) { 
				$ip = $_SERVER["HTTP_CLIENT_IP"]; 
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
	
	//Check if the user IP is in database  
	//If found, return userid, ip, subnet
	//return false if not found in the database
	//corresponding to the client IP
	public function getIpinfo()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$clientip = ip2long($this->getUserIP());
		
		$query->select("userid,ip,subnet")
				->from("#__ldl_iplist")
				->where("flag=1 and validity>=now() and ip='{$clientip}'");
		
		$db->setQuery($query);
		$row = $db->loadObject();
		
		if ($row){
			return $row;
		} else {
			return false;
		}
	}
	
	//this block of functions not currently used
	/*
	//To check if the supplied IP is permitted
	public function isPermittedIP()
	{
		//check IP params and incoming IP for validity
		// XOR gives 0s if equivalent bits are the same same,
		//  and clear "don't care" range of LSBs by ANDing with subnet mask
		//  (This method avoids differing behaviour in 32- and 64-bit implementations of PHP.)
		if (!(($this->userip ^ $this->allowedip) & $this->subnet)){
			return true;
		} else {
			return false;
		}
	}
	
	//check whether ip is valid
	private function isValid()
	{
		if($this->userIP && $this->allowedip && $this->subnet)
		{
			return true;
		} else {
			return false;
		}
	}
	*/
}





