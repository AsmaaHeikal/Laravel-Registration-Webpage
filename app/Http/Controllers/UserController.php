<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function submitdata(Request $req)
    {
        // Validation rules
        // $rules = [
        //     'n' => 'required|string|max:255',
        //     'u' => 'required|string|unique:users',
        //     'birthdate' => 'required|date|before_or_equal:2005-12-31|after_or_equal:1899-01-01',
        //     'm' => 'required|string|max:11',
        //     'p' => 'required|string|min:8|confirmed',
        //     'pic' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        //     'add' => 'required|string',
        //     'e' => 'required|string|email|unique:users',
        // ];

        // Custom error messages
        // $messages = [
        //     // Your custom error messages here
        // ];

        // // Perform validation
        // $validator = Validator::make($req->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        // }

        // Validation passed, proceed with insertion
        $user = new UserModel;
        $user->full_name = $req->n;
        $user->user_name = $req->u;
        $user->birthdate = $req->birthdate;
        $user->phone = $req->m;
        $user->address = $req->add;
        $user->email = $req->e;
        $user->password = $req->p;
        
        // Handle file upload
        // if ($req->hasFile('pic')) {
        //     $file = $req->file('pic');
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     $file->storeAs('public/profile_pictures', $fileName);
        //     $user->profile_picture = 'profile_pictures/' . $fileName;
        // }

        $user->save();

        return response()->json(['success' => true, 'message' => 'Registration Success']);
    }
}
