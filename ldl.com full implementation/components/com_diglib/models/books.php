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

        parent::__construct();
 	}

	public function getItems()
	{
		$items = parent::getItems();

		foreach ($items as &$item) {
			$item->url = 'index.php?option=com_diglib&amp;view=book&amp;id=' . $item->id;
		}

		return $items;
	}

	public function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select("
				b.id,b.title as book, b.path as path,
				group_concat(distinct a.id separator '|') as author_ids,
				group_concat(distinct a.name separator '|') as authors, 
				p.id as publisher_id, p.name as publisher,
				MAX(CASE WHEN i.type = 'isbn' THEN i.val END) AS isbn,
				MAX(CASE WHEN i.type = 'lccn' THEN i.val END) AS lccn,
				group_concat(distinct t.id separator '|') as tag_ids,
				group_concat(distinct t.name separator '|') as tags,
				d.uncompressed_size as size,a.sort as folder,d.name as filename,
				s.id as series_id, s.name as series,
				avg(r.rating) as rating,
				c.text as comment,
				group_concat(distinct c2.id separator '|') as useful_ids,
				group_concat(distinct c2.value separator '|') as usefuls,
				group_concat(distinct c1.id separator '|') as subject_ids,
				group_concat(distinct c1.value separator '|') as subjects");
		$query->from('#__books as b');
		$query->leftjoin('#__books_authors_link as ba on b.id=ba.book');
		$query->leftjoin('#__authors as a on a.id=ba.author');
		$query->leftjoin('#__books_publishers_link as bp on b.id=bp.book');
		$query->leftjoin('#__publishers as p on p.id=bp.publisher');
		$query->leftjoin('#__books_tags_link as bt on b.id=bt.book');
		$query->leftjoin('#__tags as t on t.id=bt.tag');
		$query->leftjoin('#__data as d on b.id=d.book');
		$query->leftjoin('#__books_series_link as bs on b.id=bs.book');
		$query->leftjoin('#__series as s on s.id=bs.series');
		$query->leftjoin('#__books_ratings_link as br on b.id=br.book');
		$query->leftjoin('#__ratings as r on r.id=br.rating');
		$query->leftjoin('#__comments as c on b.id=c.book');
		$query->leftjoin('#__books_custom_column_1_link as cl1 on b.id=cl1.book');
		$query->leftjoin('#__custom_column_1 as c1 on c1.id=cl1.value');
		$query->leftjoin('#__books_custom_column_2_link as cl2 on b.id=cl2.book');
		$query->leftjoin('#__custom_column_2 as c2 on c2.id=cl2.value');
		$query->leftjoin('#__identifiers as i on b.id=i.book');
		$query->group('b.id');
		

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
				"a.name LIKE '{$search}' OR " .
				"t.name LIKE '{$search}' OR " .
				"c1.value LIKE '{$search}' OR " .
				"c2.value LIKE '{$search}' OR " .
				"p.name LIKE '{$search}' OR " .
				"s.name LIKE '{$search}' OR " .
				"c.text LIKE '{$search}')";

			$query->where($field_searches);
		}

		// Column ordering or sorting
		$orderCol = $this->getState('list.ordering');
		$orderDirn = $this->getState('list.direction');

		if ($orderCol != '') {
			$query->order($db->getEscaped($orderCol.' '.$orderDirn));
		} else {
			$query->order('b.title asc');
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