<?php
defined( '_JEXEC' ) or die;

class DiglibTablePublisher extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__publishers', 'id', $db);
	}
}
