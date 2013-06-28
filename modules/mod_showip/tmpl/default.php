<?php defined( '_JEXEC' ) or die; ?>

<?php if($params->get('showip')): ?>
	<div id="ip-address">
		<?php if ($params->get('message')): ?>
			<?php echo $params->get('message'); ?>
		<?php endif ?>
		<?php echo $_SERVER['REMOTE_ADDR']; ?>
	</div>
<?php else: ?>
	<div id="ip-address">
		IP address is hidden.
	</div>
<?php endif ?>
