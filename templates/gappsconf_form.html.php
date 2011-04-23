<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>Google Apps Configurator</h1>

	</div>

	<div data-role="content">

		<form method="post" action="<?php echo relative_uri('/apps/gappsconf'); ?>" data-direction="reverse">

			<div data-role="fieldcontain">
				<label for="gappsconf-domain">Enter the domain name for which you want the required DNS records automatically added to enable Google Apps:</label>
				<input type="text" name="domain" id="gappsconf-domain" value="" />
			</div>

			<input name="action" type="submit" value="Configure DNS" data-theme="e" />

		</form>

	</div>

</div>