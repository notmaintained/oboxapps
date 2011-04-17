<div data-role="page" data-theme="b">

	<div data-role="header">
		<h1>Account Balance</h1>

	</div>

	<div data-role="content">

		<p>Fill out the form below to check your account balance:</p>

		<form method="post" action="<?php echo relative_uri('/apps/account_balance'); ?>" data-direction="reverse">

			<div data-role="fieldcontain">
				<label for="gappsconf-rid">Your Reseller ID:</label>
				<input type="number" name="rid" id="account_balance-rid" value="" />
			</div>

			<div data-role="fieldcontain">
				<label for="gappsconf-password">Your password:</label>
				<input type="password" name="password" id="account_balance-password" value="" />
			</div>

			<input name="action" type="submit" value="Get Account Balance" data-theme="e" />

		</form>

	</div>

</div>