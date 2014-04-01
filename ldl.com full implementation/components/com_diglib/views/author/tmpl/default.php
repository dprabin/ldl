<?php 

defined( '_JEXEC' ) or die; 

echo JHtml::_('form.token');
?>
<h1><?php echo $this->escape($this->author->name); ?></h1>

<?php if($this->books){ ?>
	<h2>The library has following books authored by the author 
		<?php echo $this->makeUrl($this->escape($this->author->id),$this->escape($this->author->name),'author'); ?>
	</h2>
	<ol>
		<?php foreach ($this->alldetails as $book): ?>
			<li><?php echo $this->makeUrl($this->escape($book->id,$book->book,'book'));?>
			by: 
			</li>
		<?php endforeach ?>
	</ol>

<?php } else {?>
	<h2>The library don't have any book authored by the author 
		<?php echo $this->makeUrl($this->escape($this->author->id),$this->escape($this->author->name),'author'); ?>
	</h2>
<?php }?>
