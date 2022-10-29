<?php

//Item
$routes->get('/item', 'Itemsub::listItem');
$routes->get("/getitem/(:num)", "Itemsub::getItem/$1");
$routes->get("/regitem/(:num)", "Itemsub::registerItem/$1");

