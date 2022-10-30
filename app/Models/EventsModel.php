<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['evnt_area', 'evnt_school', 'evnt_cate', 'evnt_type', 'evnt_check', 'evnt_userid', 'evnt_message', 'evnt_posted_date', 'evnt_start_date','evnt_end_date', 'evnt_view', 'evnt_status'];



}
