<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewBooks extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		
		$this->addToolbar();

		parent::display($tpl);
	}
	
	public function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_DIGLIB_BOOKS_TITLE'));

		JToolBarHelper::addNew('book.add');
		JToolBarHelper::editList('book.edit');

		JToolBarHelper::divider();

		JToolBarHelper::publishList('books.publish');
		JToolBarHelper::unpublishList('books.unpublish');

		JToolBarHelper::divider();

		JToolBarHelper::archiveList('books.archive');

		JToolBarHelper::trash('books.trash');
		
		JToolBarHelper::preferences('com_diglib');
	}
	
}