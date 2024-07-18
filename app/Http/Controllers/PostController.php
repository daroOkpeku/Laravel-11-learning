<?php

namespace App\Http\Controllers;

use App\Events\Userevent;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class PostController extends Controller
{

    public function createUser(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        Userevent::dispatch($request->firstname, $request->lastname, $request->status, $request->email, $request->password);
        return response()->json(['success'=>'you have successfully created the user'],200);
    }


    public function login(Request $request){

      $user =  User::where('email', $request->email)->first();

      if($user && Hash::check($request->password, $user->password)){
        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        $data =['token'=>$token, 'name'=>$user->name, 'email'=>$user->email, 'id'=>$user->id ];
        return response()->json(['success'=>200, 'message'=>'you logged in successfully', 'data'=>$data]);
      }
    }


    public function orderCreate(Request $request){
        Order::create([
            'product_name'=>$request->product_name,
            'user_id'=>$request->user_id,
            'order_number'=>$request->order_number,
            'price'=>$request->price,
        ]);

        return response()->json(['success'=>'your order has been created'],200);
    }


    public function singleUser(){
       $user = User::find(5);
        // this is to use relationship delete row
       if($user->orderSingle){
        $user->orderSingle->delete();
        return response()->json(['success'=>'it has been deleted'],200);
       }
    }


    public function orderSingle(){
       $order = Order::find(3);
       return response()->json(['success'=>$order->userSingle]);
    }
}
