<?php
defined( '_JEXEC' ) or die;

class DiglibTableBook extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__books', 'id', $db);
	}
	
	public function check()
	{
		if (trim($this->book_alias) == '') {
			//this requires a field named book_alias in table books
			//so we must save this in a different table, 
			//first create table alias (id,type,type_id,alias)
			//call the model for this table, and copy/save data from this table
			
			//$this->book_alias = $this->title;
		}

		//$this->book_alias = JApplication::stringURLSafe($this->activity_alias);

		// log save the errors
		jimport('joomla.error.log');

		$log = JLog::getInstance('book_saves.php');

		$entry = array(
			'comment' => 'Book ' . $this->id . ' modified by ' . JFactory::getUser()->name
		);

		$log->addEntry($entry);

		return true;
	}
}
