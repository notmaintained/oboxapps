<div data-role="page" data-theme="b">

	<div data-role="header" data-backbtn="true">
		<a href="<?php echo absolute_uri('/') ?>" data-icon="arrow-l" data-rel="back">Back</a>
		<h1>Last 10 Domains</h1>
		<a onclick="$.mobile.pageLoading(); location.reload();" href="<?php echo absolute_uri('/apps/expiring_domains') ?>" data-icon="refresh" data-iconpos="notext" class="ui-btn-right">Refresh</a>
	</div>

	<div data-role="content">
		<?php unset($result['recsindb']) ?>
		<?php unset($result['recsonpage']) ?>

		<ul data-role="listview" >
			<?php for ($i=1; $i<=count($result); $i++) {
				$endtime = $result[$i]['orders.creationtime'];
				$now = time();
				$days_ago = ceil(($now - $endtime)/(60 * 60 * 24));
			?>

			<li><a href="<?php echo absolute_uri("/apps/domain_details?orderid={$result[$i]['orders.orderid']}") ?>"><?php echo $result[$i]['entity.description'] ?></a> <span class="ui-li-count"><?php echo $days_ago  ?></span></li>
			<?php } ?>
		</ul>
	</div>

</div>