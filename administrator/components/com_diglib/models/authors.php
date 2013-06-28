<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelAuthors extends JModelList
{
	public function getItems()
	{
		$items = parent::getItems();

		foreach ($items as &$item) {
			$item->url = 'index.php?option=com_diglib&amp;task=book.edit&amp;id=' . $item->id;
		}

		return $items;
	}

	public function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select('b.id as id,b.name as author');
		$query->from('#__authors as b');

		return $query;
	}
}