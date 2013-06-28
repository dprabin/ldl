<?php defined( '_JEXEC' ) or die; ?>
<h1><?php echo $this->header ?></h1>

<?php //echo $this->pagination->getListFooter(); ?>
<ul>
<?php foreach ($this->items as $item): ?>
	<li><?php echo $this->escape($item->author_name) ?></li>
<?php endforeach ?>
</ul>