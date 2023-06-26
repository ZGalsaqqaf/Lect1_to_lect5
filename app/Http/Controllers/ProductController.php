<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.create')
            ->with('categories', $categories)
            ->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product=Product::findOrFail($request->id);
        
        $path = "";
        if($request->id > 0)
        {
            $path = $product->image;
        }
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('prodects');
        }
        
        $product = Product::updateOrCreate(
            [
                'id'=>$request->id      // conditions array //if find id then will update ,else create
                //'name=>$request-name'  //then if we edit the name will add a new product not just updating
            ]    
            ,[
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price, 
            'image'=>$path,
            'brand_id'=> $request->brand_id,
            'status'=> isset($request->status)
        ]);
        
        $product->categories()->sync($request->categories);

        if($request->id > 0)
            toastr()->success('تمت الاضافة بنجاح');
        else
            toastr()->success('تم التعديل بنجاح');


        return redirect(route('products.index'));
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.create')
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        toastr()->success('done');

        return redirect(route('products.index'));
    }
}
