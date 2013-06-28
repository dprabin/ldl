<?php
defined( '_JEXEC' ) or die;
/*
$db = JFactory::getDBO();

$query = $db->getQuery(true);

$query->select('id,title')
		->from('#__books')
		->order('timestamp desc');
$query .=' limit 5';
		//->limit('5');
		
$db->setQuery($query);

$rows = $db->loadObjectList();

require JModuleHelper::getLayoutPath('mod_diglib', $params->get('layout'));
*/











		// Get web client's IP address (NB ip2long() returns false if not a valid IP string)
		$incoming_ip 	= 	ip2long ($_SERVER['REMOTE_ADDR']);

		// load plugin params info
		$permitted_ip	= ip2long ($this->params->get('permitted_ip'));
		$subnet_mask	= ip2long ($this->params->get('subnet_mask'));
		$selected_user 	= & JFactory::getUser($this->params->get('user_id'));
		$allow_opt_out	= $this->params->get('allow_opt_out', '0');
		$opt_out		= ($allow_opt_out !== '0')
						  &&
						  ($_POST['login_mode'] !== 'accessbyip');
		$allow_backend	= $this->params->get('allow_backend', '0');
		$no_backend		= ($allow_backend == '0')
						  &&
						  ($options['action'] == 'core.login.admin');

		// Look to see if IP addresses and sub-net mask look OK
		$ips_invalid	= !($incoming_ip && $permitted_ip && $subnet_mask);

		// by default - block any auto-login
		$permitted	= FALSE;

		$message	= '';














require JModuleHelper::getLayoutPath('mod_showip', 'default');