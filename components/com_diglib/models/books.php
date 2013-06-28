<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelBooks extends JModelList
{
	public function getBooks()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id,title');
		$query->from('#__books');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}

}
