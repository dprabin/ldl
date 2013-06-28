<?php defined( '_JEXEC' ) or die; ?>
<h1><?php echo $this->escape($this->author->name); ?></h1>

<?php if($this->books){ ?>
	<h2>The library has following books authored by the author 
		<?php echo $this->makeUrl($this->escape($this->author->id),$this->escape($this->author->name),'author'); ?>
	</h2>
	<ol>
		<?php foreach ($this->books as $book): ?>
			<li><?php echo $this->makeUrl($book->id,$book->title,'book');?></li>
		<?php endforeach ?>
	</ol>

<?php } else {?>
	<h2>The library don't have any book authored by the author 
		<?php echo $this->makeUrl($this->escape($this->author->id),$this->escape($this->author->name),'author'); ?>
	</h2>
<?php }?>
