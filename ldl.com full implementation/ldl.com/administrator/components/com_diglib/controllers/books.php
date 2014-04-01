<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.controlleradmin');

class DiglibControllerBooks extends JControllerAdmin
{
	protected $text_prefix = 'COM_DIGLIB_BOOKS';

	public function getModel($name = 'Book', $prefix = 'DiglibModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}