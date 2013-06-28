<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelTags extends JModelList
{
	public function getPublishers()
	{
		$book_id=JRequest::getInt('id');
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*');
		$query->from('#__publishers');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
}
