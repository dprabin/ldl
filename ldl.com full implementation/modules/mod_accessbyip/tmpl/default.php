<?php
/**
 * @package Module mod_accessbyip for Joomla! 2.5 and later
 * @version $Id: mod_accessbyip.php
 * @author James brice
 * @copyright Copyright (C) 2012 James Brice. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * based on the 'mod_login' module of Joomla! V2.5.4
**/


// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<?php if (!JFactory::getUser()->get('guest')) : //anyone logged in? ?>
<form
	action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>"
	method="post" id="login-form">
	<?php if ($params->get('greeting')) : ?>
	<div class="login-greeting">
	<?php if($params->get('name') == 0) : {
		echo JText::sprintf('MOD_ACCESSBYIP_HINAME', htmlspecialchars($user->get('name')));
	} else : {
		echo JText::sprintf('MOD_ACCESSBYIP_HINAME', htmlspecialchars($user->get('username')));
	} endif; ?>
	</div>
	<?php endif; ?>
	<div class="logout-button">
		<input type="submit" name="Submit" class="button"
			value="<?php echo JText::_('JLOGOUT'); ?>" /> <input type="hidden"
			name="option" value="com_users" /> <input type="hidden" name="task"
			value="user.logout" /> <input type="hidden" name="return"
			value="<?php echo $logout_redirect; ?>" />
			<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
			<?php else : ?>
			<?php if (!$params->get('hide_normal_login')): ?>
<form
	action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>"
	method="post" id="login-form">
	<?php if ($params->get('pretext')): ?>
	<div class="pretext">
		<p>
		<?php echo $params->get('pretext'); ?>
		</p>
	</div>
	<?php endif; ?>
	<fieldset class="userdata">
		<p id="form-login-username">
			<label for="modlgn-username"><?php echo JText::_('MOD_ACCESSBYIP_VALUE_USERNAME') ?>
			</label> <input id="modlgn-username" type="text" name="username"
				class="inputbox" size="18" />
		</p>
		<p id="form-login-password">
			<label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?>
			</label> <input id="modlgn-passwd" type="password" name="password"
				class="inputbox" size="18" />
		</p>
		<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
		<p id="form-login-remember">
			<label for="modlgn-remember"><?php echo JText::_('MOD_ACCESSBYIP_REMEMBER_ME') ?>
			</label> <input id="modlgn-remember" type="checkbox" name="remember"
				class="inputbox" value="yes" />
		</p>
		<?php endif; ?>
		<input type="submit" name="Submit" class="button"
			value="<?php echo JText::_('JLOGIN') ?>" /> <input type="hidden"
			name="option" value="com_users" /> <input type="hidden" name="task"
			value="user.login" /> <input type="hidden" name="return"
			value="<?php echo $login_redirect; ?>" />
			<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	<ul>
		<li><a
			href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
			<?php echo JText::_('MOD_ACCESSBYIP_FORGOT_YOUR_PASSWORD'); ?> </a>
		</li>
		<li><a
			href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
			<?php echo JText::_('MOD_ACCESSBYIP_FORGOT_YOUR_USERNAME'); ?> </a>
		</li>
		<?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
		<li><a
			href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
			<?php echo JText::_('MOD_ACCESSBYIP_REGISTER'); ?> </a>
		</li>
		<?php endif; ?>
	</ul>
	<?php if ($params->get('posttext')): ?>
	<div class="posttext">
		<p>
		<?php echo $params->get('posttext'); ?>
		</p>
	</div>
	<?php endif; ?>
</form>
	<?php endif;
	// autologin form starts here: ?>
<form
	action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>"
	method="post" id="login-form2">
	<?php if ($params->get('autologin_text')): ?>
	<div class="posttext">
		<p>
		<?php echo $params->get('autologin_text'); ?>
		</p>
	</div>
	<?php endif; ?>
	<fieldset>
		<input type="hidden" name="username" id="username"
			value="<?php echo JText::_($autologin_uname) ?>" /> <input type="hidden"
			name="password" id="password" value="<?php echo JText::_($autologin_pword) ?>" />
		<button type="submit" class="button">
		<?php echo $params->get('auto_button_label'); ?>
		</button>
		<input type="hidden" name="login_mode" value="accessbyip" /> <input
			type="hidden" name="option" value="com_users" /> <input type="hidden"
			name="task" value="user.login" /> <input type="hidden" name="return"
			value="<?php echo $autologin_redirect; ?>" />
			<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
	<p id="form-login-remember">
		<label for="modlgn-remember"><?php echo JText::_('MOD_ACCESSBYIP_REMEMBER_ME') ?>
		</label> <input id="modlgn-remember" type="checkbox" name="remember"
			class="inputbox" value="yes" />
	</p>
	<?php endif; ?>
</form>
	<?php // auto-login form ends here
	endif; ?>