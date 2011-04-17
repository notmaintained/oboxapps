<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>Google Apps Configurator</h1>

	</div>

	<div data-role="content">
		<p>Fill out the form below to automatically add the required DNS records for a domain name to enable Google Apps on it.</p>

		<form method="post" action="<?php echo relative_uri('/apps/gappsconf'); ?>" data-direction="reverse">

			<div data-role="fieldcontain">
				<label for="gappsconf-domain">Domain Name:</label>
				<input type="text" name="domain" id="gappsconf-domain" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="gappsconf-rid">Your Reseller ID:</label>
				<input type="number" name="rid" id="gappsconf-rid" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="gappsconf-password">Your password:</label>
				<input type="password" name="password" id="gappsconf-password" value="" />
			</div>

			<input name="action" type="submit" value="Configure DNS" data-theme="e" />

		</form>

	</div>

</div>