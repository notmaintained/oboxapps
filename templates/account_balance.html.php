<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
		<a href="<?php echo absolute_uri('/') ?>" data-icon="arrow-l" data-rel="back">Back</a>
		<h1>Account Balance</h1>
		<a onclick="$.mobile.pageLoading(); location.reload();" href="<?php echo absolute_uri('/apps/account_balance') ?>" data-icon="refresh" data-iconpos="notext" class="ui-btn-right">Refresh</a>
	</div>

	<div data-role="content">
		<p>Your Account Balance is <strong><?php echo "{$result['sellingcurrencysymbol']} {$result['sellingcurrencybalance']}" ?></strong></p>
	</div>

</div>