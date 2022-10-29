<?php

//Item
$routes->get('/item', 'Item::listItem');
$routes->get("/getitem/(:num)", "Item::getItem/$1");
$routes->get("/regitem/(:num)", "Item::registerItem/$1");

