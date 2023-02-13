<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use App\Services\CategoriesService;

class CategoriesController extends Controller
{

    public $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService =$categoriesService;
    }
    public function index()
    {
        $categories = $this->categoriesService->getCategories();

        return view('admin.categories.index',['categories'=> $categories]);
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(CategoriesRequest $request)
    {
        $create = $this->categoriesService->store($request);
        if($create)
        {
            Session()->flash('message', 'data saved successfully');
        } else {
            Session()->flash('message', 'Something is wrong');
        }
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category =Categories::find($id);
        if(!$category){
            Session()->flash('message', 'this page not found');
            return redirect()->route('admin.categories.all');
        }
        return view('admin.categories.edit', ['category' => $category]);

    }

    public function update(CategoriesRequest $request, $id)

    {
        $update = $this->categoriesService->update($id, $request);
        if($update)
        {
            Session()->flash('message', 'data updated successfully');
            return redirect()->route('admin.categories.index');
        }
    }

    public function destroy($id)
    {
        $delete = $this->categoriesService->destroy($id);
        if($delete)
        Session()->flash('delete', 'category deleted successfully');
        return Redirect()->route('admin.categories.index');

    }

}
