<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
		<h1>Google Apps Configurator</h1>
		<a href="<?php echo absolute_uri('/') ?>" data-icon="home" class="ui-btn-right" data-iconpos="notext">Home</a>
	</div>

	<div data-role="content">
		<?php foreach($results as $result) { ?>
		<p><?php echo "$result[0]: {$result[1]['status']} ({$result[1]['msg']})" ?></p>
		<?php } ?>
	</div>

</div>