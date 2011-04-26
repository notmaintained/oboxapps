<div data-role="page" data-theme="b">

	<div data-role="header">
		<a href="<?php echo absolute_uri('/') ?>" data-icon="arrow-l" data-rel="back">Back</a>
		<h1><?php echo $result['description'] ?> - Domain Details</h1>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Customer</li>
			<li>
				<!--a href="<?php echo absolute_uri("/apps/customer_details?customerid={$result['customerid']}") ?>"-->
				<h2><?php echo $result['customer_details']['name'] ?> (#<?php echo $result['customerid'] ?>)</h2>
				<p><strong><?php echo $result['customer_details']['company'] ?></strong></p>
				<p><?php echo $result['customer_details']['address1'] ?> <?php echo $result['customer_details']['address2'] ?></p>
				<p><?php echo $result['customer_details']['city'] ?> <?php echo $result['customer_details']['zip'] ?></p>
				<p><?php echo $result['customer_details']['state'] ?>, <?php echo $result['customer_details']['country'] ?></p>
				<!--/a-->
			<li>
				<a href="mailto://<?php echo $result['customer_details']['useremail'] ?>">
					<?php echo $result['customer_details']['useremail'] ?>
				</a>
			</li>

			<li>
				<a href="tel://+<?php echo $result['customer_details']['telnocc'].$result['customer_details']['telno'] ?>">
					+<?php echo "{$result['customer_details']['telnocc']} {$result['customer_details']['telno']}" ?>
				</a>
			</li>
		</ul>


		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Registrant</li>
			<li>
				<h2><?php echo $result['customer_details']['name'] ?> (#<?php echo $result['registrantcontact']['contactid'] ?>)</h2>
				<p><strong><?php echo $result['customer_details']['company'] ?></strong></p>
				<p><?php echo $result['registrantcontact']['address1'] ?> <?php echo $result['registrantcontact']['address2'] ?></p>
				<p><?php echo $result['registrantcontact']['city'] ?> <?php echo $result['registrantcontact']['zip'] ?></p>
				<p><?php echo $result['registrantcontact']['state'] ?>, <?php echo $result['registrantcontact']['country'] ?></p>
			<li>
				<a href="mailto://<?php echo $result['registrantcontact']['emailaddr'] ?>">
					<?php echo $result['registrantcontact']['emailaddr'] ?>
				</a>
			</li>

			<li>
				<a href="tel://+<?php echo $result['registrantcontact']['telnocc'].$result['registrantcontact']['telno'] ?>">
					+<?php echo "{$result['registrantcontact']['telnocc']} {$result['registrantcontact']['telno']}" ?>
				</a>
			</li>
		</ul>
		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Nameservers</li>
			<?php if (isset($result['ns1'])) { ?> <li><?php echo $result['ns1'] ?></li> <?php } ?>
			<?php if (isset($result['ns2'])) { ?> <li><?php echo $result['ns2'] ?></li> <?php } ?>
			<?php if (isset($result['ns3'])) { ?> <li><?php echo $result['ns3'] ?></li> <?php } ?>
			<?php if (isset($result['ns4'])) { ?> <li><?php echo $result['ns4'] ?></li> <?php } ?>
		</ul>
	</div>

</div>