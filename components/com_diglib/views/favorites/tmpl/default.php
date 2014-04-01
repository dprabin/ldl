<?php defined( '_JEXEC' ) or die; ?>
<h1><?php echo JText::_('COM_DIGLIB_FAVORITES_HEADING') ?></h1>

<?php if (!count($this->favorites)): ?>
	<p><?php echo JText::_('COM_DIGLIB_FAVORITES_PLACEHOLDER') ?></p>
<?php else: ?>
	<ol>
	<?php foreach ($this->favorites as $detail): ?>
		
		<li>
		<div id="book">
			<?php echo $this->makeUrl($detail->id,$detail->book,'book');?>
		</div>
			<?php if($detail->author_ids): ?>
				<div id="authors">
					Author: <?php echo $this->makeUrl($this->escape($detail->author_ids),$this->escape($detail->authors), "author");?>
				</div>
			<?php endif ?>
			<?php if($detail->publisher) :?>
				<div id="publisher">
					Publisher: <?php echo $this->makeUrl($detail->publisher_id,$detail->publisher,'publisher'); ?>
				</div>
			<?php endif ?>
			<?php if($detail->tags): ?>
				<div id="tags">
					Tags: <?php echo $this->makeUrl($detail->tag_ids, $detail->tags,'tag');?>
				</div>
			<?php endif ?>
			</li>
		<?php endforeach ?>
	<ol>
<?php endif ?>