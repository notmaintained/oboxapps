<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>OboxApps</h1>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<li data-icon="info" data-theme="d"><a href="#getting-started">Getting Started</a></li>
		</ul>

		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Apps</li>
			<li><a href="<?php echo absolute_uri('/apps/account_balance') ?>">Account Balance</a></li>
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
		<p>OboxApps is an app suite for Logicboxes and Resellerclub users that can be used on the go on all popular smartphone and tablet platforms (iOS, Android, BlackBerry, Windows Mobile, webOS, Symbian, Maemo, MeeGo and bada). To start using OboxApps you need to:</p>
		<ul>
			<li>Authorize <strong>173.255.240.129</strong> to make API calls on your behalf from the <code>Setting > API</code> page within your Control Panel.</li>
			<li>Each app will ask you for your Reseller ID and password to make the API calls. You can get your Reseller ID from the <code>Setting > Personal Information > Primary Profile</code> page within your Control Panel. <strong>OboxApps does not store your Reseller ID and password</strong> and only uses it to make API calls on your behalf.</li>
		</ul>

		<p>OboxApps is <a href="http://madebysandeepshetty.com/" rel="external">Made by Sandeep Shetty</a>.</p>

	</div>

</div>