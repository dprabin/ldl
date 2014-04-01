<?php defined( '_JEXEC' ) or die; ?>

<?php if ($params->get('message')): ?>
	<p><?php echo $params->get('message'); ?></p>
<?php endif ?>

<ul>
	<?php foreach ($rows as $row): ?>
		<?php if ($params->get('linked')):?>
			<?php $url = 'index.php?option=com_diglib&amp;view=book&amp;id=' . $row->id; ?>
		<?php endif ?>
		<li>
			<?php if ($params->get('linked')):?>
				<a href="<?php echo JRoute::_($url); ?>" title="<?php echo htmlspecialchars($row->title); ?>">
					<?php echo htmlspecialchars($row->title); ?>
				</a>
			<?php else :?>
				<?php echo htmlspecialchars($row->title); ?>
			<?php endif ?>
		</li>
	<?php endforeach ?>
</ul>