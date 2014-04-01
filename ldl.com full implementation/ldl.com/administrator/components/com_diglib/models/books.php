<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelBooks extends JModelList
{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id',
				'title',
				'flags'
			);
		}

		parent::__construct($config);
	}
	
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
		

		//filtering the contents
		$published = $this->getState('filter.published');

		if ($published == '') {
			$query->where('(flags = 1 OR flags = 0)');
		} else if ($published != '*') {
			$published = (int) $published;
			$query->where("flags = '{$published}'");
		}

		//searching from admin
		$search = $this->getState('filter.search');

		$db = $this->getDbo();

		if (!empty($search)) {
			$search = '%' . $db->getEscaped($search, true) . '%';

			$field_searches =
				"(b.title LIKE '{$search}' OR " .
				"c.text LIKE '{$search}')";

			$query->where($field_searches);
		}

		// Column ordering or sorting
		$orderCol = $this->getState('list.ordering');
		$orderDirn = $this->getState('list.direction');

		if ($orderCol != '') {
			$query->order($db->getEscaped($orderCol.' '.$orderDirn));
		}
		
		return $query;
	}
	
// This function is used for filter purpose

	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published');
		$this->setState('filter.published', $published);

		parent::populateState($ordering, $direction);
	}

}