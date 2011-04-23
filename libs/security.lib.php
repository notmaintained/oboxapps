<?php

//Non OO version of the Encryption class from http://stackoverflow.com/questions/5089841/php-2-way-encryption-i-need-to-store-passwords-that-can-be-retrieved/5093422#5093422

	function generate_key($user_salt, $global_salt, $session_pin='')
	{
		$key = hash_hmac('sha512', $user_salt, $global_salt);
		//$key = hash_hmac('sha512', $key, $session_pin);
		return $key;
	}

	function mcrypt_cipher()
	{
		return MCRYPT_BlOWFISH;
	}


	function mcrypt_mode()
	{
		return MCRYPT_MODE_CBC;
	}

    function generate_iv()
	{
        $size = mcrypt_get_iv_size(mcrypt_cipher(), mcrypt_mode());
        return mcrypt_create_iv($size, MCRYPT_RAND);
    }

    function store_iv($data, $iv, $key)
	{
        for ($i = 0; $i < strlen($iv); $i++)
		{
            $offset = hexdec($key[$i]);
            $data = substr_replace($data, $iv[$i], $offset, 0);
        }
        return $data;
    }

    function stretch_key($key)
	{
        $hash = sha1($key);
        $runs = 0;
        do
		{
			$hash = hash_hmac('sha1', $hash, $key);
        }
		while ($runs++ < 5000);
        return $hash;
    }


	function symmetric_encrypt($data, $key)
	{
        $key = stretch_key($key);
        $data = hash_hmac('sha1', $data, $key) . ':' . $data;
        $iv = generate_iv();
        $enc = mcrypt_encrypt(mcrypt_cipher(), $key, $data, mcrypt_mode(), $iv);
        return store_iv($enc, $iv, $key);
	}



    function symmetric_decrypt($data, $key)
	{
        $key = stretch_key($key);
        $iv = get_iv($data, $key);
        if ($iv === false) return false;
        $de = mcrypt_decrypt(mcrypt_cipher(), $key, $data, mcrypt_mode(), $iv);
        if (!$de || strpos($de, ':') === false) return false;
        list ($hmac, $data) = explode(':', $de, 2);
        $data = rtrim($data, "\0");
        if ($hmac != hash_hmac('sha1', $data, $key)) return false;
        return $data;
    }


    function get_iv(&$data, $key)
	{
        $size = mcrypt_get_iv_size(mcrypt_cipher(), mcrypt_mode());
        $iv = '';

        for ($i = $size - 1; $i >= 0; $i--)
		{
            $pos = hexdec($key[$i]);
            $iv = substr($data, $pos, 1) . $iv;
            $data = substr_replace($data, '', $pos, 1);
        }

        if (strlen($iv) != $size) return false;

        return $iv;
    }


?>