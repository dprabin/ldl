<?php 
defined( '_JEXEC' ) or die; 
/*

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
$document->addScript(JURI::base() . 'media/com_diglib/js/book_favorite.js');
*/


$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

?>
<form action="index.php?option=com_diglib&amp;view=books" method="post" name="adminForm" id="adminForm">

	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="Search" />

			<button type="submit" class="btn"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
	
		<div class="filter-select fltrt">
			<select name="filter_published" class="inputbox" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
			</select>
		</div>
	</fieldset>
	
	<?php 
	$start=JRequest::getVar('start', 0, '', 'int'); 
	$start=($start>0? ($start+1):1);
	?>
	
	<?php if ($this->params->get('list_style') == 'list'):?>
		<ol start="<?php echo JRequest::getVar('start', 0, '', 'int')+1; ?>">
			<?php foreach ($this->items as $i =>$item): ?>
				<li class="book_links">
					<a href="<?php echo $item->url; ?>"><?php echo $this->escape($item->book) ?></a>
					By <?php echo $this->escape($item->authors) ?>,
					Tags: <?php echo $this->escape($item->tags); ?>,
					Publisher:<?php echo $this->escape($item->publisher); ?>
				</li>
			<?php endforeach?>
		</ol>
		<?php echo $this->pagination->getListFooter(); ?>
	<?php else: ?>
	<table width="90%" cellspacing="2" cellpadding="2">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>
				<th><?php echo JHtml::_('grid.sort', 'Title', 'title', $listDirn, $listOrder) ?></th>
				<th><?php echo JHtml::_('grid.sort', 'Author', 'a.name', $listDirn, $listOrder) ?></th>
				<th><?php echo JHtml::_('grid.sort', 'Tags', 't.name', $listDirn, $listOrder) ?></th>
				<th><?php echo JHtml::_('grid.sort', 'Publisher', 'p.name', $listDirn, $listOrder) ?></th>
			
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->items as $i => $item): ?>
				<tr class="row<?php echo $i % 2 ?>">
					<td class="center">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td>
						<a href="<?php echo $item->url; ?>">
						<?php echo $this->escape($item->book) ?></a>
					</td>
					<td><?php echo $this->escape($item->authors) ?></td>
					<td><?php echo $this->escape($item->tags); ?></td>
					<td><?php echo $this->escape($item->publisher); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr><td colspan="5"><?php echo $this->pagination->getListFooter(); ?></td></tr>
		</tfoot>
	</table>
	<?php endif ?>
	
	
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	
	<?php echo JHtml::_('form.token'); ?>
</form>