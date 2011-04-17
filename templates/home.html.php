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
		<p>If you are a Logicboxes or Resellerclub user then OboxApps will automate common tasks for you by making API calls on your behalf. To start using OboxApps you need to:</p>
		<ul>
			<li>Authorize <strong>173.255.240.129</strong> to make API calls on your behalf from the <code>Setting > API</code> page within your Control Panel.</li>
			<li>To make API calls on your behalf, you have to provide OboxApps your Reseller ID and password. You can get your Reseller ID from the <code>Setting > Personal Information > Primary Profile</code> page within your Control Panel. <strong>OboxApps does not store your Reseller ID and password</strong> and only requires it to make API calls on your behalf.</li>
		</ul>

		<p>OboxApps is <a href="http://madebysandeepshetty.com/" rel="external">Made by Sandeep Shetty</a>.</p>

	</div>

</div>