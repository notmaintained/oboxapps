<?php

	require 'libs/bombay/glue/glue.lib.php';


	handle_get('/', afunc_returning(array('template'=>'home')));

	handle_get('/apps/account_balance', afunc_returning(array('template'=>'account_balance_form')));
	handle_post(array('/apps/account_balance', 'action'=>'get_account_balance'), 'account_balance');

	function account_balance($req)
	{
		$rid = $req['form']['rid'];
		$password = $req['form']['password'];
		$auth_params = "auth-userid=$rid&auth-password=$password";
		$request = "https://test.httpapi.com/api/billing/reseller-balance.json?$auth_params&reseller-id=$rid";
		$result = file_get_contents($request);

		if (is_equal(false, $result))
		{
			return array('template'=>'error', 'error_msg'=>'Could not fetch account balance. Go back and try again.');
		}

		return array('result'=>json_decode($result, true));
	}




	handle_get('/apps/renew_domain', afunc_returning(array('template'=>'renew_domain_form')));
	handle_post(array('/apps/renew_domain', 'action'=>'renew_domain'), 'renew_domain');

	function renew_domain($req)
	{
		$rid = $req['form']['rid'];
		$password = $req['form']['password'];
		$auth_params = "auth-userid=$rid&auth-password=$password";

		$domain = $req['form']['domain'];
		$get_orderid_url = "https://test.httpapi.com/api/domains/orderid.json?$auth_params&domain-name=$domain";
		$result = file_get_contents($get_orderid_url);
		if (is_equal(false, $result))
		{
			return array('template'=>'error', 'error_msg'=>'Could not fetch Order ID. Go back and try again.');
		}
		$orderid = $result;

		$domain_details_url = "https://test.httpapi.com/api/domains/details.json?$auth_params&order-id=$orderid&options=OrderDetails";
		$result = file_get_contents($domain_details_url);
		if (is_equal(false, $result))
		{
			return array('template'=>'error', 'error_msg'=>'Could not fetch domain details. Go back and try again.');
		}
		$result = json_decode($result, true);
		$exp_date = $result['endtime'];

		$invoice_option = $req['form']['invoice_option'];
		$years = $req['form']['years'];

		$request = "https://test.httpapi.com/api/domains/renew.json?$auth_params&order-id=$orderid&years=$years&exp-date=$exp_date&invoice-option=$invoice_option";

		$result = file_get_contents($request);
		if (is_equal(false, $result))
		{
			return array('template'=>'error', 'error_msg'=>'Could not perform action. Go back and try again.');
		}

		return array('result'=>'Action performed successfully.');
	}




	handle_get('/apps/gappsconf', afunc_returning(array('template'=>'gappsconf_form')));
	handle_post(array('/apps/gappsconf', 'action'=>'configure_dns'), 'gappsconf');

	function gappsconf($req)
	{
		/* The following DNS recrods are added:
			MX      10 ASPMX.L.GOOGLE.COM
			MX      20 ALT1.ASPMX.L.GOOGLE.COM
			MX      20 ALT2.ASPMX.L.GOOGLE.COM
			MX      30 ASPMX2.GOOGLEMAIL.COM
			MX      30 ASPMX3.GOOGLEMAIL.COM
			MX      30 ASPMX4.GOOGLEMAIL.COM
			MX      30 ASPMX5.GOOGLEMAIL.COM
			calendar        CNAME   ghs.google.com
			docs    CNAME   ghs.google.com
			mail    CNAME   ghs.google.com
			sites   CNAME   ghs.google.com
		*/

		$domain = $req['form']['domain'];
		$rid = $req['form']['rid'];
		$password = $req['form']['password'];
		$auth_params = "auth-userid=$rid&auth-password=$password";

		$get_orderid_url = "https://test.httpapi.com/api/domains/orderid.json?$auth_params&domain-name=$domain";
		$result = file_get_contents($get_orderid_url);
		if (is_equal(false, $result))
		{
			return array('template'=>'error', 'error_msg'=>'Could not fetch Order ID. Go back and try again.');
		}
		$orderid = $result;
		$activate_url = "https://test.httpapi.com/api/dns/activate.json?$auth_params";
		$add_cname_url = "https://test.httpapi.com/api/dns/manage/add-cname-record.json?$auth_params&domain-name=$domain";
		$add_mx_url = "https://test.httpapi.com/api/dns/manage/add-mx-record.json?$auth_params&domain-name=$domain";


		$requests[] = array("$activate_url&order-id=$orderid", 'Activating DNS');
		$requests[] =  array("$add_cname_url&value=ghs.google.com&host=mail", "Adding CNAME for mail.$domain");
		$requests[] = array("$add_cname_url&value=ghs.google.com&host=calendar", "Adding CNAME for calendar.$domain");
		$requests[] = array("$add_cname_url&value=ghs.google.com&host=docs", "Adding CNAME for docs.$domain");
		$requests[] = array("$add_cname_url&value=ghs.google.com&host=sites", "Adding CNAME for sites.$domain");
		$requests[] = array("$add_mx_url&value=ASPMX.L.GOOGLE.COM&priority=10", "Adding MX: ASPMX.L.GOOGLE.COM");
		$requests[] = array("$add_mx_url&value=ALT1.ASPMX.L.GOOGLE.COM&priority=20", "Adding MX: ALT1.ASPMX.L.GOOGLE.COM");
		$requests[] = array("$add_mx_url&value=ALT2.ASPMX.L.GOOGLE.COM&priority=20", "Adding MX: ALT2.ASPMX.L.GOOGLE.COM");
		$requests[] = array("$add_mx_url&value=ASPMX2.GOOGLEMAIL.COM&priority=30", "Adding MX: ASPMX2.GOOGLEMAIL.COM");
		$requests[] = array("$add_mx_url&value=ASPMX3.GOOGLEMAIL.COM&priority=30", "Adding MX: ASPMX3.GOOGLEMAIL.COM");
		$requests[] = array("$add_mx_url&value=ASPMX4.GOOGLEMAIL.COM&priority=30", "Adding MX: ASPMX4.GOOGLEMAIL.COM");
		$requests[] = array("$add_mx_url&value=ASPMX5.GOOGLEMAIL.COM&priority=30", "Adding MX: ASPMX5.GOOGLEMAIL.COM");

		$results = array();
		foreach ($requests as $request)
		{
			$result = file_get_contents($request[0]);

			if (is_equal(false, $result))
			{
				return array('template'=>'error', 'error_msg'=>"Error while adding {$request[1]}. Go back and try again.");
			}

			$results[] = array($request[1], json_decode($result, true));
		}

		return array('results'=>$results);
	}




	yield_to_glue();

?>