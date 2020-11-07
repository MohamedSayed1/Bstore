<?php


namespace App\BStore\Services;


use App\BStore\Repository\categoryis\categoryisRepo;
use App\BStore\Services;
use Validator;

class CategoryisServices extends Services
{
    private $cateRepo ;

    public function __construct()
    {
        $this->cateRepo = new categoryisRepo();
    }

    public function getByid($id)
    {
        $data = $this->cateRepo->cate($id);
        if(!empty($data))
            return $data;


        $this->errors(['لا يوجد هذا العنصر .. ! ']);
        return false;

    }

    public function get()
    {
        return $this->cateRepo->getCate();
    }

    public function add($data)
    {
        // rules to valid
        $rules = [
            'name' =>'required|max:249|unique:categoryis,name',
            'photo' => 'nullable|image',

        ];

        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }


        if($this->cateRepo->add($data))
            return true;


        $this->setError(['حدث خطأ غير متوقع برجاء المحاوله مره اخري !']);
        return false;

    }

    public function updated($data)
    {
        $rules = [
            'id'    => 'required',
            'name'  => 'required|max:249|unique:categoryis,name,'. $data['id'] .',cats_id',
            'photo' => 'nullable|image',

        ];

        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }


        if($this->cateRepo->updated($data))
            return true;


        $this->setError(['حدث خطأ غير متوقع برجاء المحاوله مره اخري !']);
        return false;
    }
}