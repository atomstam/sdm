<?php

//Item
$routes->get('/evntcate', 'Eventscate::listEvnt');
$routes->get("/getevntcate/(:num)", "Eventscate::getEvntcate/$1");
$routes->get("/regevntcate/(:num)", "Eventscate::regEvntcate/$1");

