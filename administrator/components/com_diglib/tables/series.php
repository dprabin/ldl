<?php
defined( '_JEXEC' ) or die;

class DiglibTableSeries extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__series', 'id', $db);
	}
}
