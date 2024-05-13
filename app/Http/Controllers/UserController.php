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

    function Registration(Request $request){
        $customAttributes = [
            'n' => 'Name',
            'u' => 'Username',
            'birthdate' => 'Birthdate',
            'm' => 'Mobile',
            'p' => 'Password',
            'cp' => 'Confirm Password',
            'pic' => 'Profile Picture',
            'add' => 'Address',
            'e' => 'Email',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'string' => 'The :attribute field must be a string.',
            'max' => 'The :attribute field must not exceed :max characters.',
            'unique' => 'The :attribute field must be unique.',
            'date' => 'The :attribute field must be a valid date.',
            'before_or_equal' => 'The :attribute field must be before or equal to :date.',
            'after_or_equal' => 'The :attribute field must be after or equal to :date.',
            'confirmed' => 'The :attribute confirmation does not match.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: :values.',
        ];
    
        $validatedData = $request->validate([
            'n' => 'required|string|max:255',
            'u' => 'required|string|unique:users',
            'birthdate' => 'required|date|before_or_equal:2005-12-31|after_or_equal:1899-01-01',
            'm' => 'required|string|max:11',
            'p' => 'required|string|min:8|confirmed',
            'cp' => 'required|string|min:8',
            'pic' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'add' => 'required|string',
            'e' => 'required|string|email|unique:users',
        ], $customMessages, $customAttributes);
    
        $data['name'] = $validatedData['n'];
        $data['u'] = $validatedData['u'];
        $data['birthdate'] = $validatedData['birthdate'];
        $data['m'] = $validatedData['m'];
        $data['p'] = Hash::make($validatedData['p']);
        $data['e'] = $validatedData['e'];
        $data['pic'] = $validatedData['pic'];
        $data['add'] = $validatedData['add'];
    
        $user = User::create($data);
    
        if(!$user){
            return redirect(route('home'))->with("error","Registration failed, try again. ");
        }
        return redirect(route('home'))->with("success","Registration success");
    }
    
}
