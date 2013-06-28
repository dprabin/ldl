<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.model');

class DiglibModelComment extends JModel
{
	public function getItem()
	{
		$book_id = JRequest::getInt('id');

		$row = JTable::getInstance('comment', 'DiglibTable');
		$row->load($book_id);

		return $row;
	}
}