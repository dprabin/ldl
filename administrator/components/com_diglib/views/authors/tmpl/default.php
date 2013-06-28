<?php defined( '_JEXEC' ) or die; ?>
<form action="index.php?option=com_diglib&amp;view=books" method="post" name="adminForm" id="adminForm">

	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>
				<th><?php echo JText::_('COM_DIGLIB_FIELD_AUTHOR_NAME_LABEL') ?></th>
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
						<?php echo $this->escape($item->author) ?></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>