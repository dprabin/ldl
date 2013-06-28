<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelAuthors extends JModelList
{
	public function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select('name as author_name');
		$query->from('#__authors');
		//$query->where('#__authors.id=#__books_authors_link.author AND #__books_authors_link.book=#__books.id ');


		return $query;
	}
}
