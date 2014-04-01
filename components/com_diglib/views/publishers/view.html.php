<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewPublishers extends JView
{
	protected $publishers;

	public function display($tpl = null)
	{
		$this->publishers = $this->get('Publishers');
		
		parent::display($tpl);
	}
}