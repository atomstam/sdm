<?php

//Item
$routes->get('/evnttype', 'Eventstype::listEvnt');
$routes->get("/getevnttype/(:num)", "Eventstype::getEvnttype/$1");
$routes->get("/regevnttype/(:num)", "Eventstype::regEvnttype/$1");

