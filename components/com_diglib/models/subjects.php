<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelSubjects extends JModelList
{
	public function getSubjects()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*');
		$query->from('#__custom_column_1');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
}
