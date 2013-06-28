<?php defined( '_JEXEC' ) or die; ?>
<h1 id="book_name"><?php echo $this->escape($this->alldetails->book) ?></h1>


<?php if($detail=$this->alldetails){ ?>
<h2>The book <?php echo $this->makeUrl($detail->id,$detail->book,'book'); ?> has following details</h2>
	<div id="book">
		<?php echo $this->makeUrl($detail->id,$detail->book,'book');?>: 
	</div>
		<?php if($detail->author_ids){?>
			<div id="authors">
				Author: <?php echo $this->makeUrl($this->escape($detail->author_ids),$this->escape($detail->authors), "author");?>
			</div>
		<?php }?>
		<?php if($detail->publisher){?>
			<div id="publisher">
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
				Tags: <?php echo $this->makeUrl($detail->tag_ids, $detail->tags,'tag');?>
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
		<?php if($detail->rating){?>
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
	<?php if($detail->comment){?>
		<div id="book_description">
			<p id="book_comments"><?php echo $detail->comment; ?></p>
		</div>
	<?php }?>

<?php } else {?>
<h2>The library dosen't have any book having title <?php echo $this->escape($this->book->title); ?></h2>
<?php }?>


