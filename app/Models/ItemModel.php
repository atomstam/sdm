<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id';
    protected $allowedFields = ['it_main', 'it_sub', 'it_cate', 'it_eng', 'it_topic', 'it_posted', 'it_post_date', 'it_status'];

    public function getItemAllByMainBySub($main = false,$sub = false) {
        if($main === false && $sub === false ) {
            return $this->select('*,(item.id) as it_id')
            ->findAll();
        }
        return  $this->select('item.*,item_up.*,(item.id) as it_id,
                CONCAT(item.it_eng," ",item.it_topic) As name ,
                (select count(item_up.id) from item_up where item_up.iu_itemID=item.id and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_itemID=item.id', 'LEFT')
                ->where(['item.it_main' => $main,'item.it_sub' => $sub])
                //->where(['item_up.iu_area' => session()->get('area_code'),'item_up.iu_school' => session()->get('sch_code')])
				//->orderBy('C_id', 'DESC')
				->groupby('item.id')
				->findAll();
    }

    public function getItemAllByMainBySubLimit($main = false, $sub = false, $limit = false, $length = false) {
        if($main === false && $sub === false ) {
            return $this->findAll();
        }
        return  $this->select('item.*,item_up.*,(item.id) as it_id,
                CONCAT(item.it_eng," ",item.it_topic) As name ,
                (select count(item_up.id) from item_up where item_up.iu_itemID=item.id and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_itemID=item.id', 'LEFT')
                ->where(['item.it_main' => $main,'item.it_sub' => $sub])
                ->limit($limit,$length)
                //->orderBy('C_id', 'DESC')
                ->groupby('item.id')
				->findAll();
    }

    public function getItemAllByMainBySubSearch($main = false,$sub = false, $search = false) {
        if($main === false && $sub === false && $search === false) {
            return $this->findAll();
        }
        return  $this->select('item.*,item_up.*,(item.id) as it_id,
                CONCAT(item.it_eng," ",item.it_topic) As name ,
                (select count(item_up.id) from item_up where item_up.iu_itemID=item.id and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_itemID=item.id', 'LEFT')
                ->where(['item.it_main' => $main,'item.it_sub' => $sub])
				->where("item.it_topic like '%$search%' ")
				//->orderBy('C_id', 'DESC')
				->groupby('item.id')
				->findAll();
    }

    public function getItemAllByMainBySubSearchLimit($main = false, $sub = false, $limit = false, $length = false, $search = false) {
        if($main === false && $sub === false && $search === false) {
            return $this->findAll();
        }
        return  $this->select('item.*,item_up.*,(item.id) as it_id,
                CONCAT(item.it_eng," ",item.it_topic) As name ,
                (select count(item_up.id) from item_up where item_up.iu_itemID=item.id and item_up.iu_area='.session()->get('area_code').' and item_up.iu_school='.session()->get('sch_code').') As Coup ')
                ->join('item_up', 'item_up.iu_itemID=item.id', 'LEFT')
                ->where(['item.it_main' => $main,'item.it_sub' => $sub])
				->where("item.it_topic like '%$search%' ")
				->limit($limit,$length)
				//->orderBy('C_id', 'DESC')
				->groupby('item.id')
				->findAll();
    }

    public function getItemByMainBySubByCate($main = false, $sub = false, $cate = false) {
        if($main === false && $sub === false && $cate === false) {
            return $this->first();
        }
        return  $this->select('*,(id) as it_id')
                ->where(['item.it_main' => $main,'item.it_sub' => $sub,'item.it_cate' => $cate])
				->first();
    }



}
