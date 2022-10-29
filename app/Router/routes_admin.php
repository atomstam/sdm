<?php

$routes->get("/", "AdminController::index");
$routes->get("find_Item_Ajax_Index", "AdminController::Find_Item_Ajax_Index");

// Manage User
$routes->get("listUsers", "AdminController::listUsers");
$routes->get("createUser", "AdminController::createUser");
$routes->post("submit-form-storeUser", "AdminController::storeUser");
$routes->get("editUser/(:num)", "AdminController::singleUser/$1");
$routes->post("updateUser", "AdminController::updateUser");
$routes->get("deleteUser/(:num)", "AdminController::deleteUser/$1");
// Manage Profile
$routes->get("profile", "AdminController::profile");
$routes->post("updateProfile", "AdminController::updateProfile");

//Change password
$routes->get("changePassword", "AdminController::changePassword");
$routes->post("updatePassword", "AdminController::updatePassword");

//Item9
$routes->get("item9/(:num)/(:num)", "AdminController::Item9/$1/$2");
$routes->post("saveAllItem", "AdminController::saveAllItem");
$routes->get("find_Item_Ajax/(:num)/(:num)/(:num)", "AdminController::Find_Item_Ajax/$1/$2/$3");
$routes->get("item9_detail/(:num)/(:num)/(:num)", "AdminController::Item9_detail/$1/$2/$3");
$routes->get("find_ItemUp_Ajax/(:num)/(:num)/(:num)/(:num)", "AdminController::Find_ItemUp_Ajax/$1/$2/$3/$4");
$routes->get("delUp_Item/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)", "AdminController::DelUp_Item/$1/$2/$3/$4/$5/$6/$7");
$routes->get("ajax_edit_up/(:num)/(:num)/(:num)", "AdminController::Ajax_edit_up/$1/$2/$3");
$routes->post("saveEditAllItem", "AdminController::saveEditAllItem");

//item10
$routes->get("item10/(:num)/(:num)", "AdminController::Item10/$1/$2");
$routes->get("item10_detail/(:num)/(:num)/(:num)", "AdminController::Item10_detail/$1/$2/$3");

