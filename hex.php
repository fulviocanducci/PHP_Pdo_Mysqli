<?php


$milliseconds = (time()*1000);

echo $milliseconds;

echo '<br>';

$hex = bin2hex($milliseconds);
$bin = hex2bin($hex);

echo $hex .'<br /> '.$bin;

echo '<br>';

function bcdechex($dec) {
    $hex = '';
    do {    
        $last = bcmod($dec, 16);
        $hex = dechex($last).$hex;
        $dec = bcdiv(bcsub($dec, $last), 16);
    } while($dec>0);
    return $hex;
}

echo base_convert("$milliseconds", 10, 16);