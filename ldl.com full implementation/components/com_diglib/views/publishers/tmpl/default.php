<?php defined( '_JEXEC' ) or die; ?>
<h1>Publishers <?php JText::_('COM_DIGLIB_SUBJECTS_HEADING') ?>
</h1>

<ul>
<?php foreach ($this->publishers as $value): ?>
	<?php $url = 'index.php?option=com_diglib&view=publisher&id=' . $value->id; ?>
	<li><a href="<?php echo JRoute::_($url); ?>"><?php echo $this->escape($value->name) ?></a></li>
<?php endforeach ?>
</ul>