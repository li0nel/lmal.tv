<?php

class Pseudocrypt_model extends CI_Model {

 	function __construct()
    {
    	//parent::__construct();
    }

	public function udihash($num, $len = 5) {
	$golden_primes = array(
		1,41,2377,147299,9132313,566201239,35104476161,2176477521929
	);
	
	$chars = array(
		0=>48,1=>49,2=>50,3=>51,4=>52,5=>53,6=>54,7=>55,8=>56,9=>57,10=>65,
		11=>66,12=>67,13=>68,14=>69,15=>70,16=>71,17=>72,18=>73,19=>74,20=>75,
		21=>76,22=>77,23=>78,24=>79,25=>80,26=>81,27=>82,28=>83,29=>84,30=>85,
		31=>86,32=>87,33=>88,34=>89,35=>90,36=>97,37=>98,38=>99,39=>100,40=>101,
		41=>102,42=>103,43=>104,44=>105,45=>106,46=>107,47=>108,48=>109,49=>110,
		50=>111,51=>112,52=>113,53=>114,54=>115,55=>116,56=>117,57=>118,58=>119,
		59=>120,60=>121,61=>122
	);
	
		$ceil = pow(62, $len);
		$prime = $golden_primes[$len];
		$dec = ($num * $prime)-floor($num * $prime/$ceil)*$ceil;
		
		//base62
		$key = "";
		while($dec > 0) {
			$mod = $dec-(floor($dec/62)*62);
			$key .= chr($chars[$mod]);
			$dec = floor($dec/62);
		}
		
		$hash = strrev($key);
		return str_pad($hash, $len, "0", STR_PAD_LEFT);
	}
 
}
