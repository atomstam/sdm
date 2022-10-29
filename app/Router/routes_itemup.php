<?php

//Item
$routes->get('/item', 'Itemup::listItem');
$routes->get("/getitem/(:num)", "Itemup::getItem/$1");
$routes->get("/regitem/(:num)", "Itemup::registerItem/$1");

