<?php


namespace App\Http\Controllers\Categoryis;


use App\BStore\Services\CategoryisServices;
use App\Http\Controllers\Controller;


class CategoryisControllers extends Controller
{
    private $CateServices;

    public function __construct()
    {
        $this->CateServices = new CategoryisServices();
    }

    public function index()
    {
        $categoryis = $this->CateServices->get();

        return view('admin.Categoryis.index')
            ->with('categoryis',$categoryis);
    }

}