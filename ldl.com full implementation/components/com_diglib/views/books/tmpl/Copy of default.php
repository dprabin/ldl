<?php defined( '_JEXEC' ) or die; ?>
<h1>Libra Digital Library</h1>



<div id="book">
	<h2>The Library has <?php echo count($this->books); ?> books in total.</h2>
	<ol>
		<?php foreach ($this->books as $value): ?>
			<?php $url = 'index.php?option=com_diglib&view=subject&id=' . $value->id; ?>
			<li><a href="<?php echo JRoute::_($url); ?>"><?php echo $this->escape($value->title) ?></a></li>
		<?php endforeach ?>
	</ol>
</div>