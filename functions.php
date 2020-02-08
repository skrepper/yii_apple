<?php

function debug($arr) {
	echo '<pre>' . print_r($arr, true) . '</pre>';
}


function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}


function getEatenColor($eatenPercent) 
{
	switch (true) :
		case $eatenPercent >90: return 'dark';
		case $eatenPercent >80: return 'danger';
		case $eatenPercent >70: return 'warning';
		case $eatenPercent >60: return 'info';
		case $eatenPercent >50: return 'secondary';
		case $eatenPercent >40: return 'primary';
		case $eatenPercent >30: return 'danger';
		case $eatenPercent >20: return 'link';
		case $eatenPercent >10: return 'light';
		case $eatenPercent >-1: return 'success';
        endswitch;
}