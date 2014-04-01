<?php
defined( '_JEXEC' ) or die;

class plgContentLinker extends JPlugin
{
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		$cities = array('/(book)/i');
		$url = JRoute::_('index.php?option=com_diglib&view=books');
		$replacement = '<a href="' . $url . '">$1</a>';
		$article->text = preg_replace($cities, $replacement, $article->text);
	}
}
