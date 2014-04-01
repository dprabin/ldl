<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelFavorites extends JModelList
{

	public function getFavorites()
	{
		//$book_id=JRequest::getInt('id');

		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select("
				b.id,b.title as book,
				group_concat(distinct a.id separator '|') as author_ids,
				group_concat(distinct a.name separator '|') as authors, 
				p.id as publisher_id, p.name as publisher,
				group_concat(distinct t.id separator '|') as tag_ids,
				group_concat(distinct t.name separator '|') as tags");
		$query->from('#__ldl_favorites as f');
		$query->leftjoin('#__books as b on b.id=f.type_id');
		$query->leftjoin('#__books_authors_link as ba on b.id=ba.book');
		$query->leftjoin('#__authors as a on a.id=ba.author');
		$query->leftjoin('#__books_publishers_link as bp on b.id=bp.book');
		$query->leftjoin('#__publishers as p on p.id=bp.publisher');
		$query->leftjoin('#__books_tags_link as bt on b.id=bt.book');
		$query->leftjoin('#__tags as t on t.id=bt.tag');
		$query->where("f.user_id='" . JFactory::getUser()->id . "'");
		//$query->where("f.type='Book'");
		/*
		//I am hardcoding for book, since there is favorite only for book now
		//Find if there is any shortcut method for including all types of favorite
		//One possible solution may be defining separate methods 
		//getBooks, getAuthors, getPublishers etc.
		//so that we can display different lists ina a same display
		//Another may be supplying argument to this method from view layouts
		//of differennt models for displaying different favorites from 
		//different models like
		//getAlldetails($type)
		*/
		$query->group('b.id');
		$query->order('b.title');

		$db->setQuery($query);
		$row = $db->loadObjectList();

		return $row;
	}

	public function addFavorite($type,$type_id, $user_id)
	{
		$item = $this->getTable('Favorites', 'DiglibTable');

		$item->type = $type;
		$item->type_id = $type_id;
		$item->user_id = $user_id;
		$item->store();
	}

	public function removeFavorite($type,$type_id, $user_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->delete('#__ldl_favorites');
		$query->where("type = '{$type}'");
		$query->where('user_id = ' . $user_id);
		$query->where('type_id = ' . $type_id);

		$db->setQuery($query)->query();
	}
}