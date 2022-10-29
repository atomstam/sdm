<?php namespace App\Models;

use CodeIgniter\Model;

class SchoolsModel extends Model
{
  protected $table = 'schools';
  protected $primaryKey = 'sch_id';
  protected $allowedFields = array('sch_code', 'sch_name', 'typeSch', 'region', 'academicYear', 'area_code', 'subdistrict', 'district', 'province', 'areaName', 'latitude', 'longitude', 'smis_code', 'status', 'created_at');

  public function getSchoolsByArea($area_code = false)
  {
    if ($area_code === false) {
      return $this->findAll();
    }

    return $this->asArray()
      ->where(array('area_code' => $area_code))
      ->findAll();
  }

  public function getSchools($sch_code = false)
  {
    if ($sch_code === false) {
      return $this->findAll();
    }

    return $this->asArray()
      ->where(array('sch_code' => $sch_code))
      ->first();
  }
}