<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['storeWorker']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
            'phone_no' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        if ($data['profile_pic']) {
            $filename = uniqid();
            $extension = $data['profile_pic']->extension();
            $data['profile_pic']->storeAs('/public/profile_pic', $filename . "." . $extension);
            $url = Storage::url("profile_pic/".$filename . "." . $extension);
        
            
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'customer', 
            'phone_no' => $data['phone_no'],
            'profile_pic' => $url,
        ]);
    }

    public function storeWorker(Request $request)
    {
        if ($request->hasFile('profile_pic')) {
            $filename = uniqid();
            $extension = $request->file('profile_pic')->extension();
            $request->file('profile_pic')->storeAs('/public/profile_pic', $filename . "." . $extension);
            $url = Storage::url("profile_pic/".$filename . "." . $extension);
        
            
        }



        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'checkbox' => ['required', 'string', 'max:255'],
            'phone_no' => ['required' ,'min:10'],
        ]);
        
        
      
        // $data = new User;
        // $data->name = $request->input('name');
        // $data->email= $request->input('email');
        // $data->password= Hash::make($request->input('password'));
        // $data->type =  $request->input('checkbox');
        // $data->phone_no= $request->input('phone_no');
        // $data->save();

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('checkbox'),
            'phone_no' => $request->input('phone_no'),
            'profile_pic' => $url,
        ]);
        
        return redirect('/dashboard');
    }


    public function updateWorker(){
            
    }





    // public function register(Request $request)
    // {   
    //     if ($request->hasFile('profile_pic')) {
    //         if ($request->file('profile_pic')->isValid()) {
    //             $filename = uniqid();
    //             $extension = $request->profile_pic->extension();
    //             $request->profile_pic->storeAs('/public/profile_pic', $filename . "." . $extension);
    //             $url = Storage::url($filename . "." . $extension);
    //         }
    //     }
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all())));

    //     $this->guard()->login($user);

    //     if ($response = $this->registered($request, $user)) {
    //         return $response;
    //     }

    //     return $request->wantsJson()
    //                 ? new JsonResponse([], 201)
    //                 : redirect($this->redirectPath());
    // }
  
}
