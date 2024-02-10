<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use App\Models\Message;

class CarController extends Controller
{
    private $colunms = ['title', 'content', 'luggage', 'doors', 'passengers', 'price', 'active', 'image', 'category_id'];
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::get();
        $car = Car::paginate(6);
        return view('admin.cars', compact('car', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $message = Message::get();
        $cat = Category::paginate(6);
        return view('admin.addcar', compact('cat', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'luggage'=>'required',
            'doors'=>'required',
            'passengers'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = $this->uploadFile($request->image, 'assets\images');
        $data['image'] = $fileName;
        $data['active'] = isset($request->active);
        Car::create($data);
        return redirect('cars');
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
        $cat = Category::paginate(6);
        $car = Car::findOrFail($id);
        return view('admin.updatecar', compact('car', 'cat', 'message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'luggage'=>'required',
            'doors'=>'required',
            'passengers'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets\images');
            $data['image'] = $fileName;
            unlink("assets/images/" . $request->oldImage);
        }
        $data['active'] = isset($request->active);
        Car::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }
}
