<?php

/* webserver.lib.php
 *
 * function email($str){return preg_replace('/^(.*)\/(.*)/', '$2@$1', $str);}
 * Authors: Sandeep Shetty email('gmail.com/sandeep.shetty')
 *
 * Copyright (C) 2005 - date('Y') Collaboration Science,
 * http://collaborationscience.com/
 *
 * This file is part of Bombay.
 *
 * Bombay is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * Bombay is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details.
 *
 * To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *
 *
 *-------10--------20--------30--------40--------50--------60---------72
 */


	define('WEBSERVER', webserver(server_var('SERVER_SOFTWARE')));

	require_webserver_adapter('default');
	require_webserver_adapter(WEBSERVER);


		function webserver($server_software)
		{
			$server_softwares = array('Apache'        => 'apache',
									  'Microsoft-IIS' => 'iis',
									  'Microsoft-PWS' => 'pws',
									  'Xitami'        => 'xitami',
									  'Zeus'          => 'zeus',
									  'OmniHTTPd'     => 'omnihttpd');

			foreach ($server_softwares as $key=>$value)
			{
				if (str_contains($key, $server_software))
				{
					return $value;
				}
			}

			return 'unknown';
		}

		function require_webserver_adapter($webserver_adapter)
		{
			$webserver_adapter_file = webserver_adapter_file($webserver_adapter);
			if (file_exists($webserver_adapter_file)) require_once $webserver_adapter_file;
		}

			function webserver_adapter_file($webserver)
			{
				return dirname(__FILE__).DIRECTORY_SEPARATOR.'adapters'.DIRECTORY_SEPARATOR.$webserver.'.adapter.php';
			}


	function webserver_specific()
	{
		$params = func_get_args();
		$func = array_shift($params);
		$webserver_specific_func = webserver_specific_func(WEBSERVER, $func);
		return call_user_func_array($webserver_specific_func, $params);
	}

		function webserver_specific_func($webserver, $func)
		{
			if ($webserver_specific_func = function_exists_("{$webserver}_specific_{$func}"))
			{
				return $webserver_specific_func;
			}
			else
			{
				return "default_{$func}";
			}
		}

?>