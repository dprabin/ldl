<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.model');

class DiglibModelTag extends JModel
{

/*
Tag, Books, Authors, Publishers, Series
*/
	public function getTag()
	{
		$tag_id = JRequest::getInt('id');

		$row = JTable::getInstance('tag', 'DiglibTable');
		$row->load($tag_id);

		return $row;
	}
	
	public function getBooks()
	{
		$tag_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.title');
		$query->from('#__books_tags_link AS bt, #__books AS b');
		$query->where("b.id=bt.book and bt.tag='{$tag_id}'");

		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}

	public function getAuthors()
	{
		$tag_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('distinct a.id,a.name,a.sort ');
		$query->from('#__authors as a,#__books_tags_link as bt ,#__books_authors_link as ba');
		$query->where("bt.book=ba.book and ba.author=a.id and bt.tag='{$tag_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	public function getPublishers()
	{
		$tag_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('p.id,p.name,p.sort ');
		$query->from('#__publishers as p,#__books_tags_link as bt ,#__books_publishers_link as bp');
		$query->where("bt.book=bp.book and bp.publisher=p.id and bt.tag='{$tag_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	public function getSeries()
	{
		$tag_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('s.id,s.name,s.sort');
		$query->from('#__series as s,#__books_tags_link as bt ,#__books_series_link as bs');
		$query->where("bt.book=bs.book and bs.series=s.id and bt.tag='{$tag_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	
	public function getAlldetails()
	{
		$tag_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);

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
		$query->leftjoin('#__books_custom_column_1_link as cl1 on b.id=cl1.book');
		$query->leftjoin('#__custom_column_1 as c1 on c1.id=cl1.value');
		$query->leftjoin('#__books_custom_column_2_link as cl2 on b.id=cl2.book');
		$query->leftjoin('#__custom_column_2 as c2 on c2.id=cl2.value');
		$query->leftjoin('#__identifiers as i on b.id=i.book');
		$query->where("bt.tag='{$tag_id}'");
		$query->group('b.id');
		$query->order('b.id');

		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	

}