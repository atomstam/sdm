<?php

//Item
$routes->get('/item', 'Itemmain::listItem');
$routes->get("/getitem/(:num)", "Itemmain::getItem/$1");
$routes->get("/regitem/(:num)", "Itemmain::registerItem/$1");

