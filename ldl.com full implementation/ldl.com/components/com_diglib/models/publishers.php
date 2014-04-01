<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelPublishers extends JModelList
{
	public function getPublishers()
	{
		$book_id=JRequest::getInt('id');
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*');
		$query->from('#__publishers');
		$query->order('name');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
}
