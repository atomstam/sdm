<?php

//Item
$routes->get('/evnt', 'Events::listEvnt');
$routes->get("/getevnt/(:num)", "Events::getEvnt/$1");
$routes->get("/regevnt/(:num)", "Events::regEvnt/$1");

