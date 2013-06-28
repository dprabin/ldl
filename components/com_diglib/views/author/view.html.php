<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewAuthor extends JView
{
	protected $author;
	protected $books;

	public function display($tpl = null)
	{
		$this->author = $this->get('Author');
		$this->books = $this->get('Books');

		parent::display($tpl);
	}
	
	public function makeAurl($id,$value,$view)
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
	
	public function makeUrl($id,$value,$view)
	{
		$url = 'index.php?option=com_diglib&view=' . $view . '&id=' . $id; 
		$valuelist = "<a href='" . JRoute::_($url) . "'>" . $value . "</a>";
		return $valuelist;
	}
}
