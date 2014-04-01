<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class DiglibViewbook extends JView
{
	protected $item;
	protected $form;

	public function display($tpl = null)
	{
		$this->item = $this->get('Item');
		$this->form = $this->get('Form');

		$this->addToolbar();

		parent::display($tpl);
	}

	public function addToolbar()
	{
		if ($this->item->id) {
			JToolBarHelper::title(JText::_('COM_DIGLIB_EDIT_BOOKS_TITLE'));
		} else {
			JToolBarHelper::title(JText::_('COM_DIGLIB_ADD_BOOKS_TITLE'));
		}

		JToolBarHelper::apply('book.apply', 'JTOOLBAR_APPLY');
		JToolBarHelper::save('book.save', 'JTOOLBAR_SAVE');
		JToolBarHelper::save2new('book.save2new', 'JTOOLBAR_SAVE_AND_NEW');

		JToolBarHelper::cancel('book.cancel');
	}
}