<?php

namespace App\Models;

use CodeIgniter\Model;

class EventstypeModel extends Model
{
    protected $table = 'events_type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['evntp_area', 'evntp_school', 'evntp_name', 'evntp_status'];

}
