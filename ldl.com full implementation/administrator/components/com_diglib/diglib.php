<?php
defined( '_JEXEC' ) or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_diglib')) {
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
}

jimport('joomla.application.component.controller');

$controller = JController::getInstance('Diglib');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();