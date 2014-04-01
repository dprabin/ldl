<?php
defined( '_JEXEC' ) or die;

class DiglibTableFavorites extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__ldl_favorites', 'id', $db);
	}
}
