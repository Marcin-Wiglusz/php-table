<?php

require 'libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$example = array(
  'item_A' => 123,
  'item_B' => 234,
  'item_C' => 345,
  'item_D' => 456,
  'item_E' => 567
);


//making array available in tpl file (name-used in tpl,arr)
$smarty->assign('letters', $example);
$smarty->assign('name', 'What title contains');


//render page
$smarty->display('index.tpl');
