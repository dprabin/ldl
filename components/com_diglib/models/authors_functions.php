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
		
		//$q="SELECT a.*,b.title,b.id from diglib_authors as a, diglib_books_authors_link as bal left join diglib_books as b using(b.id) where a.id=bal.author and b.id=bal.book and a.id='90'"
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
		
		$query->select('name');
		$query->from('#__authors');
		$query->where("id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObject();

		return $row;
	}
	public function getBooksofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.title');
		$query->from('#__authors AS a, #__books_authors_link AS bal, #__books AS b');
		$query->where("a.id=bal.author and b.id=bal.book and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//subject or custom column 1
	public function getSubjectsofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.value subjects');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_custom_column_1_link AS bl, #__custom_column_1 AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.value and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Books written by author which are Useful for Levels or custom column 2
	public function getUsefulofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.value subjects');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_custom_column_2_link AS bl, #__custom_column_2 AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.value and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//tags of book, written by author
	public function getTagsofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.name tags');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_tags_link AS bl, #__tags AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.tag and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Series of book, written by author
	public function getSeriesofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.name series');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_series_link AS bl, #__series AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.series and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Publisher of book, written by author
	public function getPublishersofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.name publisher');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_publishers_link AS bl, #__publishers AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.publisher and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Ratings of book, written by author
	public function getRatingsofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('avg(b.rating) rating');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_ratings_link AS bl, #__ratings AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.rating and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObject();

		return $row;
	}
	
	//Languages of book, written by author
	public function getLanguagesofauthor()
	{
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.id,b.lang_code languages');
		$query->from('#__authors AS a,#__books_authors_link as bal, #__books_languages_link AS bl, #__languages AS b');
		$query->where("a.id=bal.author bal.book=bl.book and b.id=bl.lang_code and a.id='{$author_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	public function  getAuthorid()
	{
		$author_id = JRequest::getInt('id');
		return $author_id;
	}
}