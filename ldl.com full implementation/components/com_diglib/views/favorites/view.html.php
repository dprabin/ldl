<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewFavorites extends JView
{
	protected $favorites;

	public function display($tpl = null)
	{
		if (!JFactory::getUser()->id) {
			throw new Exception(JText::_('COM_DIGLIB_FAVORITES_ACCESS_DENIED'), 403);
		} else {
			$this->favorites = $this->get('Favorites');

			parent::display($tpl);
		}
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