<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;
use App\Models\Message;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::get();
        $test = Testimonial::paginate(6);
        return view('admin.testimonial', compact('test', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $message = Message::get();
        return view('admin.addtestimonial', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'position'=>'required|string',
            'message'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = $this->uploadFile($request->image, 'assets\images');
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Testimonial::create($data);
        return redirect('testimonial');
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
        $test = Testimonial::findOrFail($id);
        return view('admin.updatetestimonial', compact('test','message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'position'=>'required|string',
            'message'=>'required|string',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets\images');
            $data['image'] = $fileName;
            unlink("assets/images/" . $request->oldImage);
        }
        $data['published'] = isset($request->published);
        Testimonial::where('id', $id)->update($data);
        return redirect('testimonial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect('testimonial');
    }
}
