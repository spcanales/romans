<?php

// helpers
function deromanize(String $number)
{
	$number = str_replace(" ", "", strtoupper($number));
	$numerals = array( "M"=>1000, "CM"=>900, "D"=>500, "CD"=>400, "C"=>100, "XC"=>90, "L"=>50, "XL"=>40, "X"=>10, "IX"=>9, "V"=>5, "IV"=>4, "I"=>1 );	
	$result = 0;
	foreach ($numerals as $key=>$value) {
		while (strpos($number, $key) === 0) {
			$result += $value;
			$number = substr($number, strlen($key));
		}
	}
	return $result;
}
function romanize($number)
{
	$numerals = array( "M"=>1000, "CM"=>900, "D"=>500, "CD"=>400, "C"=>100, "XC"=>90, "L"=>50, "XL"=>40, "X"=>10, "IX"=>9, "V"=>5, "IV"=>4, "I"=>1 );	
	$result = "";
	foreach ($numerals as $key=>$value) {
		$result .= str_repeat($key, $number / $value);
		$number %= $value;
	}
	return $result;
}


$namesOrder = array();
$romanRoder = array();
$namesRoman = array("Lulio D", "Pepe CD", "Juanito XL"); // replace with the array later

// return in numeral order
foreach ($namesRoman as &$value) {
    $name = explode(" ", $value);
    $namesOrder[]= $name[0].' '.deromanize($name[1]);
    
}
krsort($namesOrder);
print_r($namesOrder);

// return in roman order
foreach($namesOrder as $x => $x_value) {
    $namer = explode(" ", $x_value);
    $romanRoder[]= $namer[0].' '.romanize($namer[1]);
}

print_r($romanRoder);

?>