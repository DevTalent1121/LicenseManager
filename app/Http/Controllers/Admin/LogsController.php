<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $data['logs'] = Logs::orderBy('id','desc')->paginate(5);
            $data['user'] = Auth::user();
            return view('admin.logs.index', $data);
        }

    }

    public function destroy(Logs $log){

        $log->delete();
        return redirect()->route("logs.index")->with("message","Log has been deleted successfully");
    }

}
