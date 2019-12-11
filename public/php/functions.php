<?php
	
	function afficheDateHeureFr($date)
	{
		$dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
		$date = $dt->format('d F Y');
		$english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
		$time = $dt->format('H:i:s');
        return str_replace($english_months, $french_months, $date). " à ".$time;
	}

	function vide($var)
	{
		return (!isset($var) OR is_null($var) OR $var == "") ? true : false;
	}

	function is_empty($tab)
	{
		$result = false;
		foreach($tab as $t)
		{
			$result = (empty($t)) ? true : false;
		}
		return $result;
	}

	function is_connected()
	{
		return (!is_empty($_SESSION) && isset($_SESSION['id']) && isset($_SESSION['pseudo'])) ? true : false;
	}

	function debug($tab = array(), $die = false)
	{
		echo "<pre>";
		foreach($tab as $t)
		{
			print_r($t);
		}
		echo "</pre>";
		if($die) die();
	}

	function getExtension($fic)
	{
		$parts = explode(".", $fic);
		return $parts[count($parts)-1];
	}

	function slug($string) {
		return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|copy|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
	}
	
?>