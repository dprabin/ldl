<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modeladmin');

class DiglibModelBook extends JModelAdmin
{
	public function getTable($type = 'Book', $prefix = 'DiglibTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_diglib.edit.book.data', array());

		if (empty($data)) {
			$data = $this->getItem();
		}

		return $data;
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm('com_diglib.book', 'book', array('control' => 'jform', 'load_data'=> $loadData));;

		return $form;
	}
}