<div data-role="page" data-theme="b">

	<div data-role="header"  data-backbtn="true">
		<h1>Renew Domain</h1>

	</div>

	<div data-role="content">

		<form method="post" action="<?php echo relative_uri('/apps/renew_domain'); ?>" data-direction="reverse">

			<div data-role="fieldcontain">
				<label for="gappsconf-domain">Domain Name to renew:</label>
				<input type="text" name="domain" id="renew_domain-domain" value="<?php if (isset($query['domain'])) echo $query['domain'] ?>" />
			</div>

			<div data-role="fieldcontain">
				<label for="renew_domain-years">No. of years to renew the domain for:</label>
				<input type="range" name="years" id="renew_domain-years" value="1" min="1" max="10"  />
			</div>

			<div data-role="fieldcontain">
				<label for="renew_domain-invoice-option" class="select">Choose an Invoice Option:</label>
				<select name="invoice_option" id="renew_domain-invoice-option" data-native-menu="false">
					<option value="NoInvoice" selected="selected">Cancel Invoice & Execute</option>
					<option value="PayInvoice">Pay Invoice & Execute</option>
					<option value="KeepInvoice">Keep Invoice & Execute</option>
					<option value="OnlyAdd">Only Add Invoice</option>
				</select>
			</div>

			<input name="action" type="submit" value="Renew Domain" data-theme="e" />

		</form>

	</div>

</div>