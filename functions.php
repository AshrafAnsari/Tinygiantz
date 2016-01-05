<?php

function substring($str, $from = 0, $to = FALSE)
{
	if ($to !== FALSE) {
		if ($from == $to || ($from <= 0 && $to < 0)) {
			return '';
		}
		if ($from > $to) {
			$from_copy = $from;
			$from = $to;
			$to = $from_copy;
		}
	}
	if ($from < 0) {
		$from = 0;
	}
	$substring = $to === FALSE ? substr($str, $from) : substr($str, $from, $to - $from);
	return ($substring === FALSE) ? '' : $substring;
}

function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

?>