<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemupModel extends Model
{
    protected $table = 'item_up';
    protected $primaryKey = 'id';
    protected $allowedFields = ['iu_area', 'iu_school', 'iu_main', 'iu_sub', 'iu_itemID', 'iu_topic', 'iu_posted', 'iu_post_date', 'iu_pageview', 'iu_typeup', 'iu_typefile', 'iu_linkcon', 'iu_status'];

    public function getItemAllByMainBySubByCate($main = false,$sub = false,$cate = false) {
        if($main === false && $sub === false && $cate === false) {
            return $this->findAll();
        }
        return  $this->select('*,(id) as iu_id')
                ->where(['iu_main' => $main,'iu_sub' => $sub,'iu_itemID' => $cate])
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
				->findAll();
    }

    public function getItemAllByMainBySub($main = false,$sub = false,$cate = false) {
        if($main === false && $sub === false && $cate === false ) {
            return $this->findAll();
        }
        return  $this->select('*,(id) as iu_id')
                ->where(['iu_main' => $main,'iu_sub' => $sub,'iu_itemID' => $cate])
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
                ->findAll();
    }

    public function getItemAllByMainBySubLimit($main = false, $sub = false,$cate = false,$limit = false, $length = false) {
        if($main === false && $sub === false && $cate === false ) {
            return $this->findAll();
        }
        return  $this->select('*,(id) as iu_id')
                ->where(['iu_main' => $main,'iu_sub' => $sub,'iu_itemID' => $cate])
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
                ->limit($limit,$length)
                ->findAll();
    }

    public function getItemAllByMainBySubSearch($main = false,$sub = false,$cate = false, $search = false) {
        if($main === false && $sub === false && $cate === false ) {
            return $this->findAll();
        }
        return  $this->select('*,(id) as iu_id')
                ->where(['iu_main' => $main,'iu_sub' => $sub,'iu_itemID' => $cate])
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
                ->where("iu_topic like '%$search%' ")
                ->findAll();
    }

    public function getItemAllByMainBySubSearchLimit($main = false, $sub = false,$cate = false,$limit = false, $length = false, $search = false) {
        if($main === false && $sub === false && $cate === false ) {
            return $this->findAll();
        }
        return  $this->select('*,(id) as iu_id')
                ->where(['iu_main' => $main,'iu_sub' => $sub,'iu_itemID' => $cate])
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
                ->where("iu_topic like '%$search%' ")
                ->limit($limit,$length)
                ->findAll();
    }

    public function ajax_edit_up($area = false,$sch = false,$upid = false) {
        if($area === false && $sch === false && $upid === false) {
            return $this->findall();
        }
        return  $this->select('*,(id) as iu_id')
                ->where('id' , $upid)
                ->where(['iu_area' => session()->get('area_code'), 'iu_school' =>session()->get('sch_code')])
				->first();
    }

    public function RowTypeFile($linktype = false,$linkup = false)
    {
        if ($linktype === false && $linkup === false ) {
            return $this->orderBy('id', 'DESC')
                ->countAll();
        }
        if($linktype==1){
            return  $this->select('*')
            ->where('iu_typefile', 'pdf')
            ->where('iu_typeup', $linkup)
            ->countAllresults();
        } else if($linktype==2){
            return  $this->select('*')
            ->where("iu_typefile ='png' or iu_typefile ='jpg' or iu_typefile ='gif' 
            or iu_typefile ='jpeg' ")
            ->where('iu_typeup', $linkup)
            ->countAllresults();
        } else if($linktype==3){
            return  $this->select('*')
            ->where("iu_typefile ='doc' or iu_typefile ='docx' or iu_typefile ='ppt' 
            or iu_typefile ='pptx' or iu_typefile ='xls' or iu_typefile ='xlsx' ")
            ->where('iu_typeup', $linkup)
            ->countAllresults();
        } else if($linktype==4){
            return  $this->select('*')
            ->where('iu_typefile','')
            ->where('iu_typeup', $linkup)
            ->countAllresults();
        }
    }


}
