<?php namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model {
    protected $table = 'areas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['area_code', 'area_name', 'areaEducation', 'areaObec', 'areaLocation', 'areaGroup', 'areaFoundingdate', 'houseId', 'houseNumber', 'street', 'subdistrictName', 'districtName', 'provinceName', 'postcodeCode', 'phone1', 'phone2','website','directorName','latitude','longitude','approve_name','approve_pos','status', 'created_at'];

    public function getAreas($area_code = false) {
        if($area_code === false) {
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['area_code' => $area_code])
                    ->first();
    }

}