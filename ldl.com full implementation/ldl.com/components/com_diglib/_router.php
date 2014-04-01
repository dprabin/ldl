<?php
defined( '_JEXEC' ) or die;

jimport('joomla.database.databasequery');

function DiglibBuildRoute(&$query)
{
	$segments = array();

	if (isset($query['view'])) {
		if ($query['view'] == 'book' || $query['view'] == 'author') {
			$segments[] = DiglibGetAlias($query['id'], $query['view']);
			unset($query['id']);
		}

		// look up Itemid
		$query['Itemid'] = DiglibGetItemid($query['view']);

		unset($query['view']);
	}

	return $segments;
}

function DiglibParseRoute($segments)
{
	$vars = array();

	$item = JFactory::getApplication()->getMenu()->getActive();

	if (isset($item)) {
		$vars['view'] = $item->query['view'];
	}

	if (count($segments) == 1) {
		$vars['id'] = DiglibGetIDFromAlias($segments[0], $vars['view']);
	}

	return $vars;
}

function DiglibGetAlias($id, $view)
{
	$db = JFactory::getDbo();

	$query = $db->getQuery(true);

	if ($view == 'activity') {
		$query->select('activity_alias');
		$query->from('#__explore_activities');
		$query->where('activity_id = ' . $id);
	} else if ($view == 'tour') {
		$query->select('tour_alias');
		$query->from('#__explore_tours');
		$query->where('tour_id = ' . $id);
	} else {
		return '';
	}

	return $db->setQuery($query)->loadResult();
}

function DiglibGetIDFromAlias($alias, $view)
{
	$db = JFactory::getDbo();

	$query = $db->getQuery(true);

	$alias = str_replace(':', '-', $alias);
	$alias = $db->getEscaped($alias);

	if ($view == 'activity') {
		$query->select('activity_id');
		$query->from('#__explore_activities');
		$query->where("activity_alias = '{$alias}'");
	} else if ($view == 'tour') {
		$query->select('tour_id');
		$query->from('#__explore_tours');
		$query->where("tour_alias = '{$alias}'");
	} else {
		return 0;
	}

	return $db->setQuery($query)->loadResult();
}

function DiglibGetItemid($view)
{
	$db = JFactory::getDbo();

	$db_query = $db->getQuery(true);
	$db_query->select('id')
			->from('#__menu')
			->where("link = 'index.php?option=com_explore&view=" . $view . "' AND client_id = 0");

	$db->setQuery($db_query);

	return $db->loadResult();
}