<?php 

defined( '_JEXEC' ) or die; 

$document=JFactory::getDocument(); 
$document->addStyleSheet(JURI::base() . 'media/com_diglib/css/book.css'); 

?>

<h1><?php echo $this->escape($this->subject->value); ?></h1>

<?php if($this->alldetails){ ?>
<h2>
	The library has <?php echo count($this->alldetails);?> 
	books with the subject <?php echo $this->escape($this->subject->value); ?>
</h2>
<ol>
<?php foreach ($this->alldetails as $detail): ?>
	<li>
		<div class="book_title">
			<?php echo $this->makeUrl($detail->id,$detail->book,'book');?>:
		</div>
		<?php if($detail->author_ids){?>
			<div class="book_authors">
				by: <?php echo $this->makeUrl($detail->author_ids,$detail->authors, "author");?>
			</div>
		<?php }?>
		<?php if($detail->publisher){?>
			<div class="book_publishers">
				Publisher: <?php echo $this->makeUrl($detail->publisher_id,$detail->publisher,'publisher'); ?>
			</div>
		<?php }?>
		<?php if($detail->isbn){?>
			<div class="book_isbn">
				ISBN: <?php echo $detail->isbn; ?>
			</div>
		<?php }?>
		<?php if($detail->lccn){?>
			<div class="book_lccn">
				LCCN: <?php echo $detail->lccn; ?>
			</div>
		<?php }?>
		<?php if($detail->tags){?>
			<div class="book_tags">
				Tags: <?php echo $this->makeUrl($detail->tag_ids,$detail->tags,'tag');?>
			</div>
		<?php }?>
		<?php if($detail->filename){?>
			<div class="book_filename">
				Location: <?php echo $detail->folder;?>\<?php $detail->filename; ?>
			</div>
		<?php }?>
		<?php if($detail->size){?>
			<div class="book_size">
				File Size: <?php echo $detail->size; ?>
			</div>
		<?php }?>
		<?php if($detail->rating>0){?>
			<div class="book_rating">
				Rating: <?php echo $detail->rating; ?>
			</div>
		<?php }?>
		<?php if($detail->subjects){?>
			<div class="book_subjects">
				Subject: <?php echo $this->makeUrl($detail->subject_ids, $detail->subjects,'subject'); ?>
			</div>
		<?php }?>
		<?php if($detail->usefuls){?>
			<div class="book_usefuls">
				Useful for: <?php echo $this->makeUrl($detail->useful_ids, $detail->usefuls,'useful'); ?>
			</div>
		<?php }?>
		<?php if($detail->series){?>
			<div class="book_series">
				Series: <?php echo $this->makeUrl($detail->series_id,$detail->series,'series'); ?>
			</div>
		<?php }?>
	</li>
<?php endforeach ?>
</ol>
<?php } else {?>
<h2>The library dosen't have any book with the subject <?php echo $this->escape($this->subject->value); ?></h2>
<?php }?>

