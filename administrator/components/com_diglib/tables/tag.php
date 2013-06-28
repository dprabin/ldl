<?php
defined( '_JEXEC' ) or die;

class DiglibTableTag extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__tags', 'id', $db);
	}
}
