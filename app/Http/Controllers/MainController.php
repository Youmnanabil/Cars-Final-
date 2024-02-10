<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Car;
use App\Models\Testimonial;


class MainController extends Controller
{
    public function index(){
        $car = Car::paginate(6);
        $test = Testimonial::paginate(6);
        return view('main.index', compact('car', 'test'));
    }

    public function listing(){
        $car = Car::paginate(6);
        $test = Testimonial::paginate(6);
        return view('main.listing', compact('car', 'test'));
    }

    public function testimonial(){
        $test = Testimonial::paginate(6);
        return view('main.testimonial', compact('test'));
    }

    public function blog(){
        return view('main.blog');
    }
    public function about(){
        return view('main.about');
    }

    public function __invoke()
    {
        return view('main.404');
    }

    public function create()
    {
        $message = Message::paginate(6);
        return view('main.contact', compact('message'));
    }
    public function sendcontactinfo(request $request){

        $data = $request->validate([
            'firstName'=>'required|string',
            'lastName'=>'required|string',
            'email'=>'required|string',
            'message'=>'required|string',
        ]);
        Message::create($data);
        Mail::to('info@gmail.com')->send(
            new ContactMail($data)
        );
        return 'Email Sent!';
    }

    public function show(string $id){
        $car = Car::findOrFail($id);
        $cat = Category::get();
        return view('main.singleCar', compact('car', 'cat'));
    }
}
