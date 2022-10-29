<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemmainModel extends Model
{
    protected $table = 'item_main';
    protected $primaryKey = 'id';
    protected $allowedFields = ['im_item', 'im_name', 'im_sort'];



}
