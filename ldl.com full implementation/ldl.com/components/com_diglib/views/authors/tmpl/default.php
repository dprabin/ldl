<?php defined( '_JEXEC' ) or die; ?>
<h1><?php echo $this->header ?></h1>


<ol>
	<?php foreach ($this->items as $item): ?>
		<li><?php echo $item->author_name; ?></li>
	<?php endforeach ?>
</ol>
<?php echo $this->pagination->getListFooter(); ?>