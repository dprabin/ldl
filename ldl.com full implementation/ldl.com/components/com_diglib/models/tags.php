<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelTags extends JModelList
{
	public function getTags()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*');
		$query->from('#__tags');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
}
