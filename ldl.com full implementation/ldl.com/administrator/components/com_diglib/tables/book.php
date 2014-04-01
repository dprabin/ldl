<?php
defined( '_JEXEC' ) or die;

class DiglibTableBook extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__books', 'id', $db);
	}
}
