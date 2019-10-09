<?php
$t1 = array(
    'key1' => '123',
    'key2' => '456',
);

$t2 = array(
    'key1' => '789',
);

foreach ($t2 as $key => $v)
    $t1[$key] = $v;


print_r($t1);