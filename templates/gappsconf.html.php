<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
		<a href="<?php echo absolute_uri('/') ?>" data-icon="home" class="ui-btn-left" onclick="history.go(-2);">Home</a>
		<h1>Google Apps Configurator</h1>
	</div>

	<div data-role="content">
		<?php foreach($results as $result) { ?>
		<p><?php echo "$result[0]: {$result[1]['status']} ({$result[1]['msg']})" ?></p>
		<?php } ?>
	</div>

</div>