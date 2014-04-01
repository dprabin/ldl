<?php
defined( '_JEXEC' ) or die;

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
