<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * watch https://laracasts.com/series/laravel-6-from-scratch/episodes/21 for an overview of what each function does
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            NOTE: We could do the query like this.....

            $allUsers = DB::table('users')->orderBy('name', 'asc')->get();

        */

        // But using eloquent we can also do:
        $allUsers = User::orderBy('name', 'asc')->get();


        // pass the allUsers variable from above to the users view and return the users view

        return view('admin_user.index', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // MUST BE UPDATED TO GET THE CURRENT USER WHEN WE IMPLEMENT USERS!!!!!!!!
        // $user = DB::table('users')->where('name', 'admin')->first();
//die($user->id);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect(route('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function view(user $user)
    {
        return view('admin_user.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin_user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->weight = $request->input('weight');
        $user->save();

        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {

        $user->delete();

        return redirect(route('users'));
    }
    public function edits(){

        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.edit')->withUser($user);
            } else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function updates(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = null;
            if(Auth::user()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email'=> 'required|email'

                ]);
            }else{

                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email'=> 'required|email|unique:users'
                ]);
            }

            if ($validate) {

                $user->name = $request['name'];
                $user->email = $request['email'];

                $user->save();
                $request->session()->flash('success', 'Your details have now been updated');
                return redirect()->back();

            }
        }else{
            return redirect()->back();
        }
    }


    public function profile(){

        return view('user.profile', array('user'=>Auth::user()));
    }
    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('user.profile', array('user' => Auth::user()) );

    }

    public function passwordEdit(){
        if (Auth::user()){
            return view('user.password');
        } else{
            return redirect()->back();
        }

    }

    public function passwordUpdate(Request $request){
        $validate = $request->validate([
            'oldPassword' => 'required|min:7',
            'password'=> 'required|min:7|required_with:password_confirmation'


        ]);
        $user = User::find(Auth::user()->id);

        if($user){
            if(Hash::check($request['oldPassword'], $user->password) && $validate){
                $user->password = Hash::make($request['password']);

                $user->save();
                {$request->session()->flash('success', 'Your password have been updated!');
                    return redirect()->back();
                }

            }else{$request->session()->flash('error', 'The entered password did not match your current password!');
                return redirect()->route('password.edit');

            }
        }


    }
}
