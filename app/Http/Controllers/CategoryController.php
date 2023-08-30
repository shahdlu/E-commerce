<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = category::get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', category::class);
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', category::class);
        category::create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $category=category::find($id);
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        //
        $this->authorize('update', category::class);
        $category=category::find($id);
        $category->update($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        $this->authorize('update', category::class);
        $category=category::find($id);
        return view('category.update',compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->authorize('delete', category::class);
        category::where('id',$id)->delete();
        return redirect()->route('category.index');
    }

    public function search(Request $request)
    {
    $searchTerm = $request->input('search');

    $categories = category::where('name', 'LIKE', "%$searchTerm%")
        ->orderBy('name')
        ->get();

    return view('category.index', compact('categories'));
    }
}
