<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemcatModel extends Model
{
    protected $table = 'item_cate';
    protected $primaryKey = 'id';
    protected $allowedFields = [  'ic_item', 'ic_category_name', 'ic_detail', 'ic_main', 'ic_sub', 'ic_pageview', 'ic_oittype', 'ic_linkcon', 'ic_status', 'ic_sort'];



}
