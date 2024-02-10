<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Message;
use App\Models\Car;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::get();
        $cat = Category::paginate(6);
        return view('admin.category', compact('cat', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $message = Message::get();
        return view('admin.addcategory', compact('message'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string',
        ]);
        Category::create($data);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Message::get();
        $cat = Category::findOrFail($id);
        return view('admin.updatecategory', compact('cat', 'message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=> 'required|string',
        ]);
        Category::where('id', $id)->update($data);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect('category');
    }
}
