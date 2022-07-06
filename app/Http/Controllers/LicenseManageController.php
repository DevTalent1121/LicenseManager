<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\License;
use Illuminate\Support\Facades\Auth;

class LicenseManageController extends Controller
{
    //
    public function index()
    {
        // Auth::
        if(Auth::check()){
            $user = Auth::user();

            $data["user_id"] = $user->id;
            $data["user_email"] = $user->email;
            $data["credit"] = $user->credit;
            $data['licenses'] = License::where("user_id",$user->id)->orderBy('id','desc')->paginate(5);
            return view('licenses.index', $data);
        }
    }

    public function create(){
        $user = Auth::user();

        if($user->credit>0){
            $license  = new License;
            $invite_code  = "demo";
            $hash = hash("sha256",uniqid(null,true));
            $license->license = base64_encode($hash);
    
            // $license->license = $hash;
            $license->user_id = $user->id;
            $license->save();
            $user->credit--;
            $user->save();
        }

        return redirect()->route("licenses.index")->with("success","License has been create successfully!");
    }

    public function store(Request $request){
        $request->validate(['license'=>'required']);

        $license = new License;
        $license->license = $request->license;
        return redirect()->route('licenses.index')->with("success","License has been created successfully!");

    }

    public function show(License $license){
        return view("licenses.show",compact("licenses"));
    }



    public function destroy(License $license){
        $license->delete();
        return redirect()->route("licenses.index")->with("success","License has been deleted successfully");
    }

}
