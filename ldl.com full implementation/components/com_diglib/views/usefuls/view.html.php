<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewUsefuls extends JView
{
	protected $usefuls;

	public function display($tpl = null)
	{
		$this->usefuls = $this->get('Usefuls');
		
		parent::display($tpl);
	}
}