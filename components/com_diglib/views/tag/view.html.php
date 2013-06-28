<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewTag extends JView
{
	protected $tag;
	protected $alldetails;

	public function display($tpl = null)
	{
		$this->tag = $this->get('Tag');
		$this->alldetails = $this->get('Alldetails');

		parent::display($tpl);
	}
	
	public function makeUrl($id,$value,$view)
	{
		$value_names = explode("|", $value);
		$value_ids = explode("|", $id);
		foreach ($value_names as $key=>$value_name)
		{
			$value_id = $value_ids[$key];
			$url = 'index.php?option=com_diglib&view=' . $view . '&id=' . $value_id; 
			$valuelist[$key] = "<a href='" . JRoute::_($url) . "'>" . $value_name . "</a>"; 
		}
		return implode(" | ",$valuelist);
	}
}
