<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.modellist');

class DiglibModelAuthors extends JModelList
{
	public function getItems()
	{
		$items = parent::getItems();

		$params = JFactory::getApplication()->getParams();
		$book_count='';

		//for making this function more efficient,
		//nest separate foreach inside if statements
		foreach ($items as &$item) {
			if ($params->get('show_book_count')) {
						$book_count=' ('.$item->book_count.') ';
					} //else{$book_count='';}
			if ($params->get('show_books')) {

					$item->author_name = $this->makeUrl($item->author_id,$item->author_name,'author');
					$item->books = $this->makeUrl($item->ids,$item->books,'book');
					
					$item->author_name .= $book_count.':- ' . $item->books;

			} else {
				$item->author_name = $this->makeUrl($item->author_id,$item->author_name,'author');
				//$item->books = $this->makeUrl($item->ids,$item->books,'book');
				
				$item->author_name .=$book_count ; // . ': - ' . $item->books;
				
			}
		}
		

		return $items;
	}
	
	public function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select("a.id as author_id,
						a.name as author_name, 
						count(b.id) as book_count,
						group_concat(distinct b.id separator '|') as ids,
						group_concat(distinct b.title separator '|') as books");
		$query->from('#__authors AS a')
				->leftjoin('#__books_authors_link as ba on a.id=ba.author')
				->join('LEFT', '#__books AS b on ba.book=b.id')
				->where('b.flags = 1')
				->group('a.id');

		return $query;
	}
	
	public function makeUrl($id,$value,$view)
	{
		$value_names = explode("|", $value);
		$value_ids = explode("|", $id);
		foreach ($value_names as $key=>$value_name)
		{
			$value_id = $value_ids[$key];
			$url = 'index.php?option=com_diglib&view=' . $view . '&id=' . $value_id; 
			$valuelist[$key] = "<a href='" . JRoute::_($url) . "'>" . $value_name . "</a>"; 
		}
		return implode(" | ",$valuelist);
	}
}
