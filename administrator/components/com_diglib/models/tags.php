<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelBooks extends JModelList
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

		$query->select('b.id as id,b.title as book,b.flags as published,c.text as comment');
		$query->from('#__books as b');
		$query->leftjoin('#__comments as c on b.id=c.book');

		return $query;
	}
}