<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewSubjects extends JView
{
	protected $subjects;

	public function display($tpl = null)
	{
		$this->subjects = $this->get('Subjects');
		
		parent::display($tpl);
	}
}