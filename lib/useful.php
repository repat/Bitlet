<?

function ReverseParseStr($args) 
{
	$str = ''; 
	foreach ($args as $key => $value) 
	{ 
		$str .= (strlen($str) < 1) ? '' : '&'; 
		$str .= $key . '=' . rawurlencode($value); 
	}
	return $str;
}

?>
