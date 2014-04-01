<?php
defined( '_JEXEC' ) or die;

class DiglibTableUseful extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__custom_column_2', 'id', $db);
	}
}
