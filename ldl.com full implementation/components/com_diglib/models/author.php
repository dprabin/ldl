<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.model');

class DiglibModelAuthor extends JModel
{
	public function getItem()
	{
	//this function is currently not used
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.name,b.title');
		$query->from('#__authors AS a, #__books_authors_link AS bal');
		$query->join('LEFT', '#__books AS b ON b.id');
		$query->where("a.id=bal.author and b.id=bal.book and a.id='{$author_id}'");

		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	public function getAuthor()
	{
		$author_id=JRequest::getInt('id');
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id, name');
		$query->from('#__authors');
		$query->where("id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObject();

		return $row;
	}
	public function getBooks()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.title');
		$query->from('#__authors AS a, #__books_authors_link AS bal, #__books AS b');
		$query->where("a.id=bal.author and b.id=bal.book and a.id='{$author_id}'")
				->order('b.title');
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	public function getAlldetails()
	{
		$book_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select("
				b.id,b.title as book,
				group_concat(distinct a.id separator '|') as author_ids,
				group_concat(distinct a.name separator '|') as authors, 
				p.id as publisher_id, p.name as publisher,
				MAX(CASE WHEN i.type = 'isbn' THEN i.val END) AS isbn,
				MAX(CASE WHEN i.type = 'lccn' THEN i.val END) AS lccn,
				group_concat(distinct t.id separator '|') as tag_ids,
				group_concat(distinct t.name separator '|') as tags,
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
		$query->where("a.id='{$author_id}'");
		$query->group('b.id');
		//$query->order('b.id');

		$db->setQuery($query);
		$row = $db->loadObject();

		return $row;
	}
	
	
}