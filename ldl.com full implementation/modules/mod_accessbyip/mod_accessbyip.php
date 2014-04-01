<?php
/**
 * @package Module mod_accessbyip for Joomla! 2.5 and later
 * @version $Id: mod_accessbip.php
 * @author James brice
 * @copyright Copyright (C) 2012 James Brice. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * based on the 'mod_login' module of Joomla! V2.5.4
**/

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$params->def('greeting', 1);

//get encoded return URLs

$login_redirect		= modAccessbyipHelper::getReturnURL($params, 'login');
$autologin_redirect	= modAccessbyipHelper::getReturnURL($params, 'autologin');
$logout_redirect 	= modAccessbyipHelper::getReturnURL($params, 'logout');
$selected_user 	= & JFactory::getUser($params->get('autologin_user'));

// Set up so default is no login but also
// no error message about missing password
$autologin_uname	='';
$autologin_pword	= 'not_empty';

if ($params->get('autologin_by_username', FALSE)) {
	$autologin_uname 	= $selected_user->username;
	$autologin_pword 	= $params->get('autologin_pword');
}

$user	= JFactory::getUser();

require JModuleHelper::getLayoutPath('mod_accessbyip', $params->get('layout', 'default'));
