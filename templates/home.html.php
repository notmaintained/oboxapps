<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>OboxApps &beta;</h1>
		<?php if (isset($_SESSION['authenticated']) and is_equal($_SESSION['authenticated'], true)) { ?>
		<a href="<?php echo absolute_uri('/logout') ?>" data-icon="gear" class="ui-btn-right" data-theme="e" data-ajax="false">Logout</a>
		<?php } else { ?>
		<a href="<?php echo absolute_uri('#login') ?>" data-icon="gear" class="ui-btn-right" data-rel="dialog" data-transition="slidedown">Login</a>
		<?php } ?>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<li data-icon="info" data-theme="d"><a href="#getting-started">Getting Started</a></li>
		</ul>

		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Apps</li>
			<li><a href="<?php echo absolute_uri('/apps/account_balance') ?>">Account Balance</a></li>
			<li><a href="<?php echo absolute_uri('/apps/expiring_domains') ?>">Domains Expiring in 90 days</a></li>
			<li><a href="<?php echo absolute_uri('/apps/renew_domain') ?>">Renew Domain</a></li>
			<li><a href="<?php echo absolute_uri('/apps/gappsconf') ?>">Google Apps Configurator</a></li>
		</ul>

	</div>

	<!--div data-role="footer">	</div-->
</div>


<div data-role="page" id="getting-started" data-theme="b">

	<div data-role="header">
		<h1>Getting Started</h1>
	</div>

	<div data-role="content">
		<p>OboxApps is an app suite for LogicBoxes and ResellerClub users that can be used on the go on all popular smartphone and tablet platforms (iOS, Android, BlackBerry, Windows Mobile, webOS, Symbian, Maemo, MeeGo and bada). To start using OboxApps you need to:</p>
		<ul>
			<li>Authorize <strong>173.255.240.129</strong> to make API calls on your behalf from the <code>Setting > API</code> page within your Control Panel.</li>
			<li>Get your <strong>Reseller ID</strong>. The Logicboxes and Resellerclub APIs require your Reseller ID (a numeric id) for authentication and not your username (email address). You can get your Reseller ID from the <code>Setting > Personal Information > Primary Profile</code> page within your Control Panel. <strong>OboxApps does not store your password on its servers</strong>. Instead, it stores your encrypted password securly in a cookie on your device (<a href="http://sandeep.shetty.in/2011/04/secure-transient-storage-of-passwords.html">details</a>) </li>
		</ul>

		<p>OboxApps is <a href="http://madebysandeepshetty.com/" rel="external">Made by Sandeep Shetty</a>. It is <a href="http://www.gnu.org/philosophy/free-sw.html">free software</a> (<a href="https://github.com/sandeepshetty/oboxapps">source</a>) and distributed under the terms of the <a href="http://www.gnu.org/licenses/agpl.txt">GNU Affero General Public License</a>.</p>

	</div>

</div>

<div data-role="page" id="login" data-theme="b">

	<div data-role="header">
		<h1>Login</h1>

	</div>

	<div data-role="content">

		<form method="post" action="<?php echo relative_uri('/login'); ?>" data-direction="reverse" data-ajax="false">

			<div data-role="fieldcontain">
				<label for="login-rid">Your Reseller ID:</label>
				<input type="number" name="rid" id="login-rid" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="login-password">Your password:</label>
				<input type="password" name="password" id="login-password" value="" />
			</div>

			<input name="action" type="submit" value="Login" data-theme="e" />

		</form>

	</div>

</div>