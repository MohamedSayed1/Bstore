<?php


namespace App\BStore\Repository\categoryis;


use App\BStore\Model\Categoryis\Categoryis;

class categoryisRepo
{
    private $cateModel  ;

    public function __construct()
    {
        $this->cateModel = new Categoryis();
    }

    public function add($data)
    {
        $this->cateModel->name = $data['name'];
        $this->cateModel->photos = isset($data['photo'])?$data['photo']:null;
       return $this->cateModel->save();
    }

    public function updated($data)
    {
        $cate         = $this->cateModel->find($data['id']);
        $cate->name   = $data['name'];
        $cate->photos = isset($data['photo'])?$data['photo']:$cate->photos;
     return   $cate->save();
    }

    public function cate($id)
    {
        return $this->cateModel->find($id);
    }

    public function getCate()
    {
        return $this->cateModel->get();
    }
}