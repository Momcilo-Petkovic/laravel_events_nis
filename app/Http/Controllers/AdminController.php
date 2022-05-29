<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Place;
use App\Models\Genre;
use App\Models\Type;
use App\Models\Performance;
use Hash;
use Session;

class AdminController extends Controller
{
    public function adminLogin(){
        return view("admin.login_a");
    }

    public function adminRegistration(){
        return view("admin.registration_a");
    }

    public function registerAdmin(Request $request){
        $request->validate([
            'username'=>'required|min:4|max:20|unique:admins',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|unique:admins|regex: /^\+[0-9]{9,15}$/',
            'password' => 'required|min:6|confirmed',
            //|regex: /^{\+}[0-9]{1,4}[0-9]{9}$/
        ]);
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);

        $res = $admin->save();

        if($res){
            return back()->with('success','You have registered an admin account successfuly');
        }else {
            return back()->with('fail', 'Something went wrong when registering admin account');
        }
    }


    public function loginAdmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $admin = Admin::where('email', '=', $request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                $request->session()->put('loginId', $admin->id);
                return redirect('admin-dashboard');
            }else {
                return back()->with('fail', 'Password does not match');
            }
        }else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function adminDashboard(){
        return view('admin.dashboard_a');
    }

    public function adminLogout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('adminlogin');
        }
    }


    // DASHBOARD FUNCTIONS

    public function insertPlace(Request $request){
        $request->validate([
            'name'=>'required|unique:places',
            'adress' => 'required|unique:places',
            'work_time' => ['required','regex:/^(\d|1\d|2[0-3])(\.\d{1,2})?h-(\d|1\d|2[0-3])(\.\d{1,2})?h$/'],
            'max_number_people' => 'required|numeric',
            'allowed_age' => 'required|regex:/[0-9]{1,2}\+$/',
            'phone_number'=> 'required|unique:places|regex: /^\+[0-9]{9,15}$/',
            'image_url' => 'required',
            'about' => 'required',
            'prices' => 'required',
            'type_id' => 'required'
        ]);

        $place = new Place();
        $place->name = $request->name;
        $place->adress = $request->adress;
        $place->work_time = $request->work_time;
        $place->max_number_people = $request->max_number_people;
        $place->allowed_age = $request->allowed_age;
        $place->phone_number = $request->phone_number;
        $place->image_url = $request->image_url;
        $place->about = $request->about;
        $place->prices = $request->prices;
        $place->type_id = $request->type_id;


        $res = $place->save();

        if($res){
            return back()->with('success','You have created a place successfuly');
        }else {
            return back()->with('fail', 'Something went wrong when creating a place');
        }
    }

    public function returnData(){
        $data = Genre::all();   
        $datap = Place::all();  
        $datat = Type::all();
        // return view('admin.dashboard_a', ['data'=>$data], ['datap'=>$datap], ['datat'=>$datat]);
        return view('admin.dashboard_a', compact('data', 'datap', 'datat'));
    }
    




    public function insertPerformance(Request $request){



        $request->validate([
            'name'=>'required|unique:performances',
            'date' => 'required|unique:performances',
            'starts_at' => ['required','regex:/^(\d|1\d|2[0-3])(\.\d{1,2})?h$/'],
            'ends_at' => ['required','regex:/^(\d|1\d|2[0-3])(\.\d{1,2})?h$/'],
        ]);

        $performance = new Performance();
        $performance->name = $request->name;
        $performance->date = $request->date;
        $performance->starts_at = $request->starts_at;
        $performance->ends_at = $request->ends_at;
        $performance->place_id = $request->place_id;
        $performance->genre_id = $request->genre_id;

        $res = $performance->save();

        if($res){
            return back()->with('success','You have created a performance successfuly');
        }else {
            return back()->with('fail', 'Something went wrong when creating a performance');
        }
    }




    public function insertGenre(Request $request){
        $genre = new Genre();
        
        $genre->name = $request->name;
        ucwords($genre->name);
        $res = $genre->save();
        if($res){
            return back()->with('success','You have created a genre successfuly');
        }else {
            return back()->with('fail', 'Something went wrong when creating a genre');
        }
    }

    public function insertType(Request $request){
        $type = new Type();
        
        $type->type_name = $request->type_name;
        ucwords($type->type_name);
        $res = $type->save();
        if($res){
            return back()->with('success','You have created a type successfuly');
        }else {
            return back()->with('fail', 'Something went wrong when creating a type');
        }
    }
}
