<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GetController extends Controller
{

    public function usersView(){
        $user = User::all();
        return response()->json(['success'=>$user],200);
    }
}
