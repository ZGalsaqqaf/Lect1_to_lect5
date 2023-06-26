<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(5);

        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $path = $request->file('image')->store('brands');
        Brand::create([
            'name'=> $request->name,
            'image'=>$path,
        ]);
        // toaster()->success('done');
        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $path = $brand->image;

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('brands');

            Storage::delete($brand->image);
        }

        $brand->update([
            'name'=> $request->name,
            'image'=>$path,
        ]);

        //toaster()->success('done');
        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if($brand->products->count()==0)
        {
            Storage::delete($brand->image); //حذف الصورة كمان
            $brand->delete();

        // toaster()->error('fail');
        }
        else
        {
            // toaster()->success('done');
        }
        return redirect(route('brands.index'));
        
    }
}
