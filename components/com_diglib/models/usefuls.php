<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelUsefuls extends JModelList
{
	public function getUsefuls()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*');
		$query->from('#__custom_column_2');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
}
