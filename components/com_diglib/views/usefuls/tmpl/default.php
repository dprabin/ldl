<?php defined( '_JEXEC' ) or die; ?>
<h1>Usefuls<?php JText::_('COM_DIGLIB_USEFULS_HEADING') ?>
</h1>

<ul>
<?php foreach ($this->usefuls as $value): ?>
	<?php $url = 'index.php?option=com_diglib&view=useful&id=' . $value->id; ?>
	<li><a href="<?php echo JRoute::_($url); ?>"><?php echo $this->escape($value->value) ?></a></li>
<?php endforeach ?>
</ul>