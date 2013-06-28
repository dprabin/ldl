<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewAuthors extends JView
{
	protected $header;
	protected $items;
	//protected $pagination;

	public function display($tpl = null)
	{
		$this->header = 'Authors Contributing to LIBRA';
		$this->items = $this->get('Items');
		$//this->pagination = $this->get('Pagination');
		
		parent::display($tpl);
	}
}