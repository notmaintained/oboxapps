<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
		<h1>Account Balance</h1>
		<a href="<?php echo absolute_uri('/') ?>" data-icon="home" class="ui-btn-right" data-iconpos="notext">Home</a>
	</div>

	<div data-role="content">
		<p>Your Account Balance: <?php echo "{$result['sellingcurrencysymbol']} {$result['sellingcurrencybalance']}" ?></p>
	</div>

</div>