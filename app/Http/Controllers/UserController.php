<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Upload(Request $req)
    {
        if ($req->hasFile('pic')) {
            $file = $req->file('pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/profile_pictures', $fileName);
            return 'profile_pictures/' . $fileName;
        }

        return null;
    }

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
        // $user = new UserModel;
        // $user->full_name = $req->n;
        // $user->user_name = $req->u;
        // $user->birthdate = $req->birthdate;
        // $user->phone = $req->m;
        // $user->address = $req->add;
        // $user->email = $req->e;
        // $user->password = $req->p;

        // $user->save();

        // $profilePicturePath = $this->Upload($req);

        // return response()->json(['success' => true, 'message' => 'Registration Success']);
    }

    public function registration(Request $request) {
        $customAttributes = [
            'n' => trans('mycustom.fullname'),
            'u' => trans('mycustom.username'),
            'birthdate' => trans('mycustom.bithdate'),
            'm' => trans('mycustom.phone'),
            'p' => trans('mycustom.password'),
            'p_confirmation' => trans('mycustom.copassword'),
            'pic' => trans('mycustom.picture'),
            'add' => trans('mycustom.address'),
            'e' => trans('mycustom.email'),
        ];
    
        $customMessages = [
            'required' => trans('mycustom.error1'),
            'string' => trans('mycustom.error2'),
            'max' =>trans('mycustom.error3'),
            'unique' => trans('mycustom.error4'),
            'date' => trans('mycustom.error5'),
            'before_or_equal' => trans('mycustom.error6'),
            'after_or_equal' => trans('mycustom.error7'),
            'confirmed' => trans('mycustom.error8'),
            'image' => trans('mycustom.error9'),
            'mimes' => trans('mycustom.error10'),
            'min' => trans('mycustom.error11'),
        ];
    
        $validatedData = $request->validate([
            'n' => 'required|string|max:255',
            'u' => 'required|string|unique:users',
            'birthdate' => 'required|date|before_or_equal:2005-12-31|after_or_equal:1899-01-01',
            'm' => 'required|string|min:11',
            'p' => 'required|string|min:8|confirmed',
            'p_confirmation' => 'required|string|min:8',
            'pic' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'add' => 'required|string',
            'e' => 'required|string|email|unique:users',
        ], $customMessages, $customAttributes);
    
        $user = new User();
        $user->full_name = $validatedData['n'];
        $user->user_name = $validatedData['u'];
        $user->birthdate = $validatedData['birthdate'];
        $user->phone = $validatedData['m'];
        $user->password = Hash::make($validatedData['p']);
        $user->email = $validatedData['e'];
        //$user->picture = $validatedData['pic'];
        $user->address = $validatedData['add'];

        $user->save();
    
        //$user = User::create($data);
    
        if (!$user) {
            return response()->json(['message' => 'Registration failed, try again.'], 500);
        }
    
        return response()->json(['message' => 'Registration successful!'], 200);
    }
}
