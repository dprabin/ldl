<?php 
defined( '_JEXEC' ) or die; 

//Here are codes for including javascript modals

//Code to load the moo tools
//JHTML::_('behavior.modal');

//Code for including jquery, which we use here in our case
$document = JFactory::getDocument();

//$document->addScript("http://maps.google.com/maps/api/js?sensor=false&language=en");

$document->addStyleSheet(JURI::base() . 'media/com_diglib/css/book.css');
$document->addStyleSheet(JURI::base() . 'media/com_diglib/css/book_map.css');


//if (!DiglibJQuery::already_loaded()) {
	$document->addScript(JURI::base() . 'media/com_diglib/js/jquery-1.6.1.min.js');
	$document->addScript(JURI::base() . 'media/com_diglib/js/jquery-noconflict.js');
//}

//$document->addScript(JURI::base() . 'media/com_diglib/js/jquery.gmap.min.js');
//$document->addScript(JURI::base() . 'media/com_diglib/js/book_map.js');
$document->addScript(JURI::base() . 'media/com_diglib/js/favorite.js');

?>

<h1 id="book_name">
	<?php if ($this->favorite): ?>
		<span id="favorite" rel="yes" class="favorite_active">&#9733;</span>
	<?php else: ?>
		<span id="favorite" rel="no" class="favorite_inactive">&#9733;</span>
	<?php endif ?>
	<?php echo $this->escape($this->alldetails->book); ?>
</h1>

<?php if(0): //this block is used to check if it gets userid,ip etc for error checking ?>
	<?php echo "Your ID: ",$this->userid,", Your IP: ",long2ip($this->userip),", Subnet: ",$this->subnet; ?>
	<?php if($this->validip){echo "IP Valid";}?>
<?php endif ?>


<?php if($detail=$this->alldetails){ ?>

	<div id="type" val="Book" rel="<?php echo $this->escape($detail->id); ?>"> </div>
	
	<div id="book">
		<?php //echo $this->makeUrl($detail->id,$detail->book,'book');?>  
		
		
		<?php if($detail->path): ?>
			<?php $image = JURI::base() . 'diglib/' . $detail->path . '/cover.jpg'; ?>
			<div id="book-cover">
				<img src="<?php echo $image; ?>" alt="<?php echo $this->escape($this->alldetails->book); ?>" width="150"/>
			</div>
			<?php if(JFactory::getUser()->id): ?>
				<?php $file = JURI::base() . 'diglib/' . $detail->path . '/' . $detail->filename . '.' . $detail->filetype ; 
						
						$downurl = 'index.php?option=com_diglib&amp;view=down&amp;id=' . $this->escape($detail->id);

						/*if (!copy($file, $newfile)) {
							echo "failed to open the book...\n";
						}*/
				?>
				<div id="download-book">
					<a href="<?php echo $file;//$downurl; ?>" title="Download the book <?php echo $this->escape($this->alldetails->book); ?> having File Size: <?php echo (int)$detail->size/1048576; ?>MB">
						<?php echo $this->escape($this->alldetails->book); ?>
					</a>
				</div>
			<?php endif ?>
		<?php else: ?>
			<div id="no-download">
				Please register to download <?php echo $this->escape($this->alldetails->book); ?>
			</div>
			<div id="size">
				File Size: <?php echo ($detail->size)/1048576; ?>MB
			</div>
		<?php endif ?>

		
		
		
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
		<?php if($detail->isbn): ?>
			<div id="isbn">
				ISBN: <?php echo $detail->isbn; ?>
			</div>
		<?php endif ?>
		<?php if($detail->lccn): ?>
			<div id="lccn">
				LCCN: <?php echo $detail->lccn; ?>
			</div>
		<?php endif ?>
		<?php if($detail->tags): ?>
			<div id="tags">
				Tags: <?php echo $this->makeUrl($detail->tag_ids, $detail->tags,'tag');?>
			</div>
		<?php endif ?>
		<?php if($detail->rating >0): ?>
			<div id="rating">
				Rating: <?php echo $detail->rating; ?>
			</div>
		<?php endif ?>
		<?php if($detail->subjects):?>
			<div id="subjects">
				Subject: <?php echo $this->makeUrl($detail->subject_ids, $detail->subjects,'subject'); ?>
			</div>
		<?php endif ?>
		<?php if($detail->usefuls): ?>
			<div id="usefuls">
				Useful for: <?php echo $this->makeUrl($detail->useful_ids, $detail->usefuls,'useful'); ?>
			</div>
		<?php endif ?>
		<?php if($detail->series):?>
			<div id="series">
				Series: <?php echo $this->makeUrl($detail->series_id,$detail->series,'series'); ?>
			</div>
		<?php endif ?>
	<?php if($detail->comment): ?>
		<div id="book_description">
			<p id="book_comments"><?php echo $detail->comment; ?></p>
		</div>
	<?php endif ?>


<?php } else {?>
<h2>The library dosen't have any book having title <?php echo $this->escape($this->book->title); ?></h2>
<?php } ?>


