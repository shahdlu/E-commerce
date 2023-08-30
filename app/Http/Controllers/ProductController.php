<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      $products=product::get();
      return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', product::class);
        $categories = category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', product::class);
        $validated=$request->validate([
            'product_name'=>'required',
            'product_price'=>'required',
            'product_availability'=>'required',
            'categry_id'=>'required'
        ]);
        // product::create($request->all());
        // $product = new product();
        // $product->create([
        //     "product_name"=>$request->product_name,
        //     'product_price'=>$request->product_price,
        //     "product_availability"=>$request->product_availability,
        //     "categry_id"=>$request->categry_id,
        // ]);
        // $image = $request->file('product_image');
        // $imageName = time(). '.' . $image->getClientOriginalExtension();
        // $request->product_image->move('images', $imageName);
        // DB::table('products')->where("id", $product->id)->update(["product_image" => $imageName]);
        dd($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product=product::find($id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        //
        $this->authorize('update', product::class);
        $product=product::find($id);
        $product->update($request->all());
        if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $product->product_image = $imageName;
            $product->save();
        }
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        $this->authorize('update', product::class);
        $product=product::find($id);
        $categories = category::all();
        return view('product.update', compact('product'), compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->authorize('delete', product::class);
        product::where('id',$id)->delete();
        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
    $searchTerm = $request->input('search');

    $products = product::where('product_name', 'LIKE', "%$searchTerm%")
        ->orderBy('product_name')
        ->get();

    return view('product.index', compact('products'));
    }
}
