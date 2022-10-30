<?php

namespace App\Models;

use CodeIgniter\Model;

class EventscateModel extends Model
{
    protected $table = 'events_cate';
    protected $primaryKey = 'id';
    protected $allowedFields = ['evntc_area', 'evntc_school', 'evntc_name', 'evntc_status'];

}
