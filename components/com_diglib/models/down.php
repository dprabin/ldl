<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelDown extends JModelList
{
	public function getPath()
	{
		$book_id = JRequest::getInt('id');
		
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select("b.title as book, b.path as path, d.name as filename, lcase(d.format) as filetype, d.uncompressed_size as size");
		$query->from('#__books as b');
		$query->leftjoin('#__data as d on b.id=d.book');
		$query->where("b.id='{$book_id}'");

		$db->setQuery($query);
		$row = $db->loadObject();

		return $row;
	}
	public function updateDownCount()
	{
		//echo 'Downloaded';
		//update bookcount set count=count+1 where book=$book_id;
		/*
		$book_id = JRequest::getInt('id');
		
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query .="insert into #__ldl_downloads (book,ip) values('{$book_id}','{getUserIP()}')";

		$db->setQuery($query);
		//$rownumber = $db->rownumber();

		return true;//$rownumber;
		*/
	}
}
