<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewBooks extends JView
{
	protected $items;
	protected $pagination;
	protected $state;
	
	//to read parameters from configuration
	protected $params;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		$this->params = JFactory::getApplication()->getParams();

		parent::display($tpl);
	}
}