<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewBook extends JView
{
	protected $alldetails;
	protected $favorite;
	
	
	//following variables are not required if we use autologinbyip plugin by Prabhu Bhakta
	protected $userip;
	protected $validip;
	
	protected $allowedip;
	protected $userid;
	protected $subnet;
	//end of not required variables

	public function display($tpl = null)
	{
		$levels = JFactory::getUser()->getAuthorisedViewLevels();

		if($this->item->book_access && !in_array($this->item->book_access, $levels)) {
			$tpl = 'upgrade';
		}

		$this->alldetails = $this->get('Alldetails');
		if (!$this->alldetails) {
			throw new Exception(JText::_('COM_DIGLIB_BOOK_404'), 404);
		}
		$this->favorite = $this->get('Favorite');
		
		//following variables are not required if we use autologinbyip plugin by Prabhu Bhakta
		// Get Details - Userid, IP and subnet of the permitted ip
		$ips = $this->get('Iplist');
		$this->allowedip = $ips->ip;
		$this->userid = $ips->userid;
		$this->subnet = $ips->subnet;
		
		$this->userip = ip2long($this->get('UserIP'));
		$this->validip = $this->isPermittedIP();
		//end of replace by autologinbyip plugin

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
	
	//
	//following functions are not required if we use autologinbyip plugin by Prabhu Bhakta
	//
	//IP functions
	//To check if the supplied IP is permitted
	protected function isPermittedIP()
	{
		//check IP params and incoming IP for validity
		// XOR gives 0s if equivalent bits are the same same,
		//  and clear "don't care" range of LSBs by ANDing with subnet mask
		//  (This method avoids differing behaviour in 32- and 64-bit implementations of PHP.)
		if (!(($this->userip ^ $this->allowedip) & $this->subnet)){
			return true;
		} else {
			return false;
		}
	}
	//check whether ip is valid
	protected function isValid()
	{
		if($this->userIP && $this->allowedip && $this->subnet)
		{
			return true;
		} else {
			return false;
		}
	}
	//end of replace by autologinbyip plugin
}