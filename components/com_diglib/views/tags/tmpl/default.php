<?php defined( '_JEXEC' ) or die; ?>
<h1><?php JText::_('COM_DIGLIB_TAGS_HEADING') ?>
</h1>

<ul>
<?php foreach ($this->tags as $tag): ?>
	<?php $url = 'index.php?option=com_diglib&view=tag&id=' . $tag->id; ?>
	<li><a href="<?php echo JRoute::_($url); ?>"><?php echo $this->escape($tag->name) ?></a></li>
<?php endforeach ?>
</ul>