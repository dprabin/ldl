<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewBooks extends JView
{
	protected $books;
	//protected $pagination;
	
	public function display($tpl = null)
	{
		$this->books = $this->get('Books');
		//$this->pagination = $this->get('Pagination');
		
		parent::display($tpl);
	}
}