<?php defined( '_JEXEC' ) or die; ?>
<h1>Subjects <?php JText::_('COM_DIGLIB_SUBJECTS_HEADING') ?>
</h1>

<ul>
<?php foreach ($this->subjects as $value): ?>
	<?php $url = 'index.php?option=com_diglib&view=subject&id=' . $value->id; ?>
	<li><a href="<?php echo JRoute::_($url); ?>"><?php echo $this->escape($value->value) ?></a></li>
<?php endforeach ?>
</ul>