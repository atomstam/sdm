<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'ID';
  protected $allowedFields = array('prefix', 'firstName', 'lastName', 'email', 'phone', 'idCard', 'status', 'password', 'role', 'imageProfile', 'sch_code', 'area_code', 'facebook', 'line_id', 'created_at', 'reset_link_token', 'exp_date');

  public function getUsers($id = false)
  {
    if ($id === false) {
      return $this->findAll();
    }

    return $this->asArray()
      ->where(array('ID' => $id))
      ->first();
  }

  public function RowUsers($id = false)
  {
    if ($id === false) {
      return $this->orderBy('id', 'DESC')
        ->countAll();
    }
    return  $this->select('*')
      ->where('role', $id)
      //->groupby('id')
      //->orderBy('id', 'DESC')
      //->from("course")
      ->countAllresults();
  }

  public function changePassword($password, $id)
  {
    $return = false;
    $q = $this->find($id);
    if ($q) {
      if (password_verify($password, $q['password'])) {

        $return = true;
      }
    }
    return $return;
  }

  public function RowUsersTopCreate($id = false)
  {
    if ($id === false) {
      return $this->select('*,count(course.id) as C_id  ')
      ->join('course', 'course.user_id = users.id', 'LEFT')
      ->groupby('course.user_id')
      ->orderBy('C_id', 'DESC')
      ->findAll(); 
    }
    return  $this->select('*,count(course.id) as C_id  ')
      //->where('role', $id)
      ->join('course', 'course.user_id = users.id', 'LEFT')
      ->groupby('course.user_id')
	  //->having('C_id', 'ASC')
      ->orderBy('C_id', 'DESC')
      ->limit($id)
      ->find();
  }

//////////////////////////////// Config Area

  public function getUsersByArea($id = false)
  {
    if ($id === false) {
	
      return $this->findAll()->orderBy('ID', 'ASC');
    }

    return $this->asArray()
      ->where(array('area_code' => $id))
	  ->orderBy('ID', 'ASC')
      ->findAll();
  }


}
