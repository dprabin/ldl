<?php
defined( '_JEXEC' ) or die;

class DiglibTableSubject extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__custom_column_1', 'id', $db);
	}
}
