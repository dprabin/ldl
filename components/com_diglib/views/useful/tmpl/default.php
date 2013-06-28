<?php defined( '_JEXEC' ) or die; ?>
<h1><?php echo $this->escape($this->useful->value); ?></h1>

<?php if($this->alldetails){ ?>
<h2>
	The library has <?php echo count($this->alldetails);?> 
	books useful for <?php echo $this->escape($this->useful->value); ?>
</h2>
<ol>
<?php foreach ($this->alldetails as $detail): ?>
	<li>
		<div id="book">
			<?php echo $this->makeUrl($detail->id,$detail->book,'book');?>:
		</div>
		<?php if($detail->author_ids){?>
			<div id="authors">
				by: <?php echo $this->makeUrl($detail->author_ids,$detail->authors, "author");?>
			</div>
		<?php }?>
		<?php if($detail->publisher){?>
			<div id="publishers">
				Publisher: <?php echo $this->makeUrl($detail->publisher_id,$detail->publisher,'publisher'); ?>
			</div>
		<?php }?>
		<?php if($detail->isbn){?>
			<div id="isbn">
				ISBN: <?php echo $detail->isbn; ?>
			</div>
		<?php }?>
		<?php if($detail->lccn){?>
			<div id="lccn">
				LCCN: <?php echo $detail->lccn; ?>
			</div>
		<?php }?>
		<?php if($detail->tags){?>
			<div id="tags">
				Tags: <?php echo $this->makeUrl($detail->tag_ids,$detail->tags,'tag');?>
			</div>
		<?php }?>
		<?php if($detail->filename){?>
			<div id="filename">
				Location: <?php echo $detail->folder;?>\<?php $detail->filename; ?>
			</div>
		<?php }?>
		<?php if($detail->size){?>
			<div id="size">
				File Size: <?php echo $detail->size; ?>
			</div>
		<?php }?>
		<?php if($detail->rating>0){?>
			<div id="rating">
				Rating: <?php echo $detail->rating; ?>
			</div>
		<?php }?>
		<?php if($detail->subjects){?>
			<div id="subjects">
				Subject: <?php echo $this->makeUrl($detail->subject_ids, $detail->subjects,'subject'); ?>
			</div>
		<?php }?>
		<?php if($detail->usefuls){?>
			<div id="usefuls">
				Useful for: <?php echo $this->makeUrl($detail->useful_ids, $detail->usefuls,'useful'); ?>
			</div>
		<?php }?>
		<?php if($detail->series){?>
			<div id="series">
				Series: <?php echo $this->makeUrl($detail->series_id,$detail->series,'series'); ?>
			</div>
		<?php }?>
	</li>
<?php endforeach ?>
</ol>
<?php } else {?>
<h2>The library dosen't have any book useful for <?php echo $this->escape($this->useful->value); ?></h2>
<?php }?>

