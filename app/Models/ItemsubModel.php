<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsubModel extends Model
{
    protected $table = 'item_sub';
    protected $primaryKey = 'id';
    protected $allowedFields = ['is_item', 'is_gr', 'is_category_name', 'is_main', 'is_sub', 'is_sort'];

    public function getItemSubAllByMainBySub($main = false,$sub = false) {
        if($main === false && $sub === false ) {
            return $this->first();
        }
        return  $this->select('*,(id) as is_id')
                //->where(['is_main' => $main,'is_sub' => $sub])
				->first();
    }


    public function getItemAllByMainBySub($main = false,$sub = false) {

        return  $this->select('item_sub.*,item_up.*,(item_sub.id) as is_id,
                CONCAT(item_sub.is_item," ",item_sub.is_category_name) As name ,
                (select count(item_up.id) from item_up where item_up.iu_main=item_sub.is_main and item_up.iu_sub=item_sub.is_sub and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_main=item_sub.is_main', 'LEFT')
               // ->where(['item_sub.is_main' => $main,'item_sub.is_sub' => $sub])
                //->where(['item_up.iu_area' => session()->get('area_code'),'item_up.iu_school' => session()->get('sch_code')])
				//->orderBy('C_id', 'DESC')
				->groupby('item_sub.id')
				->findAll();
    }

    public function getItemAllByMainBySubLimit($main = false, $sub = false, $limit = false, $length = false) {

        return  $this->select('item_sub.*,item_up.*,(item_sub.id) as is_id,
                CONCAT(item_sub.is_item," ",item_sub.is_category_name) As name ,
                (select count(item_up.id) from item_up where item_up.iu_main=item_sub.is_main and item_up.iu_sub=item_sub.is_sub and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_main=item_sub.is_main', 'LEFT')
                //->where(['item_sub.is_main' => $main,'item_sub.is_sub' => $sub])
                ->limit($limit,$length)
                //->orderBy('C_id', 'DESC')
                ->groupby('item_sub.id')
				->findAll();
    }

    public function getItemAllByMainBySubSearch($main = false,$sub = false, $search = false) {
        if($search === false) {
            return $this->findAll();
        }
        return  $this->select('item_sub.*,item_up.*,(item_sub.id) as is_id,
                CONCAT(item_sub.is_item," ",item_sub.is_category_name) As name ,
                (select count(item_up.id) from item_up where item_up.iu_main=item_sub.is_main and item_up.iu_sub=item_sub.is_sub and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_main=item_sub.is_main', 'LEFT')
                //->where(['item_sub.is_main' => $main,'item_sub.is_sub' => $sub])
				->where("item_sub.is_category_name like '%$search%' ")
				//->orderBy('C_id', 'DESC')
				->groupby('item_sub.id')
				->findAll();
    }

    public function getItemAllByMainBySubSearchLimit($main = false, $sub = false, $limit = false, $length = false, $search = false) {
        if($search === false) {
            return $this->findAll();
        }
        return  $this->select('item_sub.*,item_up.*,(item_sub.id) as is_id,
                CONCAT(item_sub.is_item," ",item_sub.is_category_name) As name ,
                (select count(item_up.id) from item_up where item_up.iu_main=item_sub.is_main and item_up.iu_sub=item_sub.is_sub and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_main=item_sub.is_main', 'LEFT')
                //->where(['item_sub.is_main' => $main,'item_sub.is_sub' => $sub])
				->where("item_sub.is_category_name like '%$search%' ")
				->limit($limit,$length)
				//->orderBy('C_id', 'DESC')
				->groupby('item_sub.id')
				->findAll();
    }




}
