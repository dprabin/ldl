<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewTags extends JView
{
	protected $tags;

	public function display($tpl = null)
	{
		$this->tags = $this->get('Tags');
		
		parent::display($tpl);
	}
}