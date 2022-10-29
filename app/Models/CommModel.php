<?php

namespace App\Models;

use CodeIgniter\Model;

class CommModel extends Model
{
    protected $table = 'comm';
    protected $primaryKey = 'id';
    protected $allowedFields = ['com_area', 'com_school', 'com_name', 'com_cardid', 'com_address', 'com_phone', 'com_email', 'com_subject', 'com_message', 'com_post_date', 'com_view', 'com_status'];



}
