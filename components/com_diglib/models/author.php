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
}