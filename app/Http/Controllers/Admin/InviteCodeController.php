<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InviteCode;
use Illuminate\Support\Facades\Auth;

class InviteCodeController extends Controller
{
    //

    public function index(){
        if(Auth::check()){
            $data['invite_codes'] = InviteCode::orderBy('id','desc')->paginate(5);
            $data['user'] = Auth::user();
            return view('admin.invite_code.index', $data);
        }
    }

    public function create(){
        $invite_code = new InviteCode;

        $hash = hash("sha256",rand().date('y-m-d h:i:s'));
        $invite_code->code = substr(base64_encode($hash),0,4);

        $invite_code->save();

        return redirect()->route("invite_code.index")->with("message","Invite Code has been create successfully!");
    }

    public function destroy(InviteCode $invite_code){

        $invite_code->delete();
        return redirect()->route("invite_code.index")->with("message","Invite Code has been deleted successfully");
    }
}
