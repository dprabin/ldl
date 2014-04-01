<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.model');

class DiglibModelBook extends JModel
{
	public function getItem()
	{
		$book_id = JRequest::getInt('id');

		$row = JTable::getInstance('book', 'DiglibTable');
		$row->load($book_id);

		return $row;
	}
	
	
	public function getBookdetails()
	{
	//I wanted to get all related data of book in one function
	//but writing sql was preety hard. So I have separated the
	//functions with individual functions
		$author_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('b.*');
		$query->from('#__books as b');//#__authors AS a, #__books_authors_link AS bal');
		$query->join('LEFT', '#__authors AS b ON b.id');
		$query->where("a.id=bal.author and b.id=bal.book and a.id='{$author_id}'");
		
		/*SELECT b.id,b.title,a.name
		FROM diglib_books as b, diglib_books_authors_link as bal
		left join diglib_authors as a on a.id
		where a.id=bal.author and b.id=bal.book and b.id=117*/
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Get Authors of the book
	public function getAuthorsofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.name authors');
		$query->from('#__authors as a, #__books_authors_link as bl');
		$query->where("a.id=bl.author and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();//loadObjectList because query returns multi value

		return $row;
	}
	
	//Subject of the book like Science, Mathematics, Medical, Management
	public function getSubjectofbook() //custom_column_1
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.value subject');
		$query->from('#__custom_column_1 as a, #__books_custom_column_1_link as bl');
		$query->where("a.id=bl.id and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Book useful for levels like BBA, BBS, MBS, BE Computer, +2 etc
	public function getBookusefulfor() //custom_column_2
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.value useful');
		$query->from('#__custom_column_2 as a, #__books_custom_column_2_link as bl');
		$query->where("a.id=bl.id and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//keywords or genere of the book
	public function getTagsofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.name tags');
		$query->from('#__tags as a, #__books_tags_link as bl');
		$query->where("a.id=bl.tag and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Ratings of the book
	public function getRatingsofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.name ratings');
		$query->from('#__ratings as a, #__books_ratings_link as bl');
		$query->where("a.id=bl.rating and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Series of the book
	public function getSeriesofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.name series');
		$query->from('#__series as a, #__books_series_link as bl');
		$query->where("a.id=bl.series and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Publisher of the book
	public function getPublisherofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.name publisher');
		$query->from('#__publishers as a, #__books_publishers_link as bl');
		$query->where("a.id=bl.publisher and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Language of the book
	public function getLanguageofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.id,a.lang_code language');
		$query->from('#__languages as a, #__books_languages_link as bl');
		$query->where("a.id=bl.lang_code and bl.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}
	
	//Comments of the book
	public function getCommentofbook()
	{
		$book_id = JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.text comment');
		$query->from('#__comments as a');
		$query->where("a.book='{$book_id}'");
		
		$db->setQuery($query);
		$row = $db->loadObject();//Not loadObjectList but loadObject because it returns single value

		return $row;
	}
}