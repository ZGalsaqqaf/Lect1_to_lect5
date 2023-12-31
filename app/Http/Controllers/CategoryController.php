<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // return dd($request->all());
        Category::create(
        [
            'name' => $request->name,
            'description' => $request->description,
            'type'=> $request->type,
            'status'=> isset($request->status)
        ]);

        // toastr()->success('تم الاضافة بنجاح')

        return redirect(route('categories.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'type'=> $request->type,
            'status'=> isset($request->status)
        ]);
         
        // toastr()->success('تم التعديل بنجاح')

        return redirect(route('categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // if ($category->id < 4) {
        //     $category->delete();
        //     toastr()->success('تم الحذف بنجاح');
        // }
        // else
        // toastr()->error('لا يمكن حذف هذا السطر');
        
        $category->delete();
        // toastr()->success('تم الحذف بنجاح');


        return redirect()->back();
    }
}
