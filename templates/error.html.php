<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
	<?php //TODO: needs a $back_to var ?>
		<a href="<?php echo absolute_uri('/') ?>" data-icon="arrow-l">Back</a>
		<h1>Error</h1>
		<a href="<?php echo absolute_uri('/') ?>" data-icon="home" class="ui-btn-right" data-iconpos="notext">Home</a>
	</div>

	<div data-role="content">
		<p><?php echo $error_msg ?></p>
	</div>

</div>