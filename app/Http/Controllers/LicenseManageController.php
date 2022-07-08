<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;

class LicenseManageController extends Controller
{
    //
    public function index()
    {
        // Auth::
        if(Auth::check()){
            $user = Auth::user();

            $data["user"] = $user;
            // $data["user_email"] = $user->email;
            $data["credit"] = $user->credit;
            $data['licenses'] = License::where("user_id",$user->id)->orderBy('id','desc')->paginate(5);
            return view('licenses.index', $data);
        }
    }

    public function create(){
        $user = Auth::user();

        if($user->credit>0){
            $license  = new License;
            $log = new Logs;
            $invite_code  = "demo";
    
            // $license->license = $hash;
            $license->user_id = $user->id;
            $license->ip_address = $this->getIpAddress();
            $license->license = $invite_code;
            $license->save();
            $license->license = hash("sha256",$license->ip_address.$license->created_at);
            $license->save();

            $user->credit--;
            $user->save();

            $log->license = $license->license;
            $log->user_name = $user->email;
            $log->ip_address = $license->ip_address;
            $log->save();
            

            return redirect()->route("licenses.index")->with("success","License has been create successfully!");
        }
        
        return redirect()->route("licenses.index")->with("no-credit","You don't have enough credit to create License Key");

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

        $user = Auth::user();
        $log = new Logs;
        $log->license = $license->license;
        $log->ip_address = $license->ip_address;
        $log->user_name = $user->email;
        $log->action = "delete";
        $log->save();
        
        $license->delete();
        return redirect()->route("licenses.index")->with("success","License has been deleted successfully");
    }

    public function getIpAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            // to get shared ISP IP address
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if (! empty($ip)) {
                    // if you prefer, you can check for valid IP address here
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }
    
}
