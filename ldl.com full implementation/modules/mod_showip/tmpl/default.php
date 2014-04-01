<?php defined( '_JEXEC' ) or die; ?>

<h3>
	<?php if ($params->get('message')): ?>
		<?php echo $params->get('message'); ?>
	<?php endif ?>
</h3>

<?php if($params->get('showip')): ?>
	<div id="ip-address">
		
		<?php echo $incoming_ip,getUserIP() ?><br>
		Permitted ip: <?php echo $permitted_ip; ?><br>
		Subnet mask: <?php echo $subnet_mask; ?><br>
		Selected user: <?php echo $selected_user->username; ?><br>
		Allow Backend: <?php echo $allow_backend; ?><br>
		No Backend: <?php echo $no_backend; ?><br>
		IPs Invalid: <?php echo $ips_invalid; ?><br>
		Ip permitted: <?php echo isPermittedIP(); ?><br>
		all headers:<?php //echo "<PRE>" . print_r($_SERVER, true) . "</PRE>"; ?>
		<?php print_r(getIplist()); ?>
		<?php echo print_r(getReport()); ?>
	</div>
<?php else: ?>
	<div id="ip-address">
		IP address is hidden.
	</div>
<?php endif ?>

