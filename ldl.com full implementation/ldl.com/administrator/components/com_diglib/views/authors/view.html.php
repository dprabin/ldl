<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewAuthors extends JView
{
	protected $items;
	protected $pagination;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		
		$this->addToolbar();

		parent::display($tpl);
	}
	
	public function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_DIGLIB_AUTHORS_TITLE'));

		JToolBarHelper::addNew('activity.add');
		JToolBarHelper::editList('activity.edit');

		JToolBarHelper::divider();

		JToolBarHelper::publishList('activities.publish');
		JToolBarHelper::unpublishList('activities.unpublish');

		JToolBarHelper::divider();

		JToolBarHelper::archiveList('activities.archive');

		JToolBarHelper::trash('activities.trash');
	}
}