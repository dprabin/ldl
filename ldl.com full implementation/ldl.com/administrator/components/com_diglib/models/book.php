<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modeladmin');

class DiglibModelBook extends JModelAdmin
{
	public function getTable($type = 'Book', $prefix = 'DiglibTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm();

		return $form;
	}
}