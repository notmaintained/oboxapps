<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>Renew Domain</h1>

	</div>

	<div data-role="content">

		<p>Fill out the form below to renew a domain name:</p>

		<form method="post" action="<?php echo relative_uri('/apps/renew_domain'); ?>" data-direction="reverse">

			<div data-role="fieldcontain">
				<label for="gappsconf-domain">Domain Name:</label>
				<input type="text" name="domain" id="renew_domain-domain" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="renew_domain-years">Years:</label>
				<input type="range" name="years" id="renew_domain-years" value="1" min="1" max="10"  />
			</div>

			<div data-role="fieldcontain">
				<label for="renew_domain-invoice-option" class="select">Invoice Option:</label>
				<select name="invoice_option" id="renew_domain-invoice-option" data-native-menu="false">
					<option value="NoInvoice" selected="selected">NoInvoice</option>
					<option value="PayInvoice">PayInvoice</option>
					<option value="KeepInvoice">KeepInvoice</option>
					<option value="OnlyAdd">OnlyAdd</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="gappsconf-rid">Your Reseller ID:</label>
				<input type="number" name="rid" id="renew_domain-rid" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="gappsconf-password">Your password:</label>
				<input type="password" name="password" id="renew_domain-password" value="" />
			</div>

			<input name="action" type="submit" value="Renew Domain" data-theme="e" />

		</form>

	</div>

</div>