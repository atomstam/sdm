<?php

//Item
$routes->get('/item', 'Itemcat::listItem');
$routes->get("/getitem/(:num)", "Itemcat::getItem/$1");
$routes->get("/regitem/(:num)", "Itemcat::registerItem/$1");

