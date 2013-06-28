<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewSeries extends JView
{
	protected $series;
	protected $aseries;
	protected $alldetails;

	public function display($tpl = null)
	{
		$series_id=JRequest::getInt('id');
		$this->aseries = $this->get('Aseries');
		if($series_id){
			$this->alldetails = $this->get('Alldetails');
		} else {
			$this->series = $this->get('Series');
		}

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
