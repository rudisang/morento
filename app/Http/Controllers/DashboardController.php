<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use App\Models\Landlord;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function assignRole(Request $request){

        $user = User::find(auth()->user()->id);
        $user->role_id = intval($request->input('role'));
        $user->save();

        return redirect('/dashboard')->with('success', 'Almost there, Just a few more steps and your account will be ready');

    }

    public function SelectAccount(){
        $roles = Role::all();
        $users = User::all();

        if(Auth::user()->role_id){
            return view('dashboard.index');
    
        }else{
            return view('dashboard.select-account')->with('roles', $roles)->with('users', $users);
        }
    }

    
    public function editUser($id){
        $user = User::find($id);

        // Check for correct user
        if(auth()->user()->role_id !== 3){
            return redirect('/dashboard')->with('error', 'Access Denied');
        }

        return view('/dashboard.edit-users')->with('user', $user);
    }

    public function editAccount(){
        return view('dashboard.edit-account');
    }

    public function updatePassword(Request $request, $id){
        $user = User::find($id);

        $oldpass = $request->old_pass;
        $newpass = $request->new_pass;
        $confpass = $request->conf_pass;

        if (Hash::check($oldpass, $user->password)) {
            if($newpass == $confpass){
                $request->validate([
                    'new_pass' => 'required|string|min:6',
                    'conf_pass' => 'required|string|min:6',
                    'old_pass' => 'required|string|min:6',
                ]);

                $user->password = Hash::make($request->new_pass);
                $user->save();
                return back()->with("success", "Awesome! Password Updated");

            }else{
                return back()->with("error", "New Password & Confirm Password Don't Match");
            }
        }else{
            return back()->with("error", "The password you entered does not match your current password");

        }


    }

    public function updateDetails(Request $request, $id){
        
       $limit = date("2003-12-30");
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|date|before:'.$limit,
            'mobile' => 'required',
            'role_id' => 'required',
        ]);

		$user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->mobile = $request->mobile;
        $user->role_id = intval($request->role_id);
            
        $user->save();
        return back()->with("success", "Details Updated Successfully");

    }

    public function landlordForm(){
        if(Auth::user()->role_id == 2){
            if(Auth::user()->landlordaccount){
                return redirect('/dashboard')->with("warning", "Your account has already been created");
            }else{
                return view('/dashboard/create-landlord');

            }
        }else{
            return view('/dashboard')->with("error", "Access Denied");
        }
    }

    public function editLandlord($id){
        $landlord = Landlord::find($id);

        // Check for correct user
        if(auth()->user()->role_id !== 3){
            return redirect('/dashboard')->with('error', 'Access Denied');
        }

        return view('/dashboard.admin-edit-landlord')->with('landlord', $landlord);
    }

    public function landlordAction(Request $request, $id){
        if($request->has('message')){
            $message = $request->message; 
        }

        $landlord = Landlord::find($id);
        $landlord->status_id = intval($request->action);
        if($request->has('message')){
            $landlord->message = $message;
        }
        
        $landlord->save();
        return back()->with('success', 'Account Updated');
    }


    public function createLandlord(Request $request){


        $request->validate([
            'avatar' => 'image|nullable|max:1999',
            'omang'=> 'required',
            'utility_doc' => 'required',
            'occupation'=> 'required|string|max:255',
            'employer'=> 'required|string|max:255',
            'employer_email' => 'required|string|email|max:255',
            'address'=> 'required|string|max:255',
            'bio'=> 'required',
        ]);
       
       

        if($request->hasFile('avatar')){
            $avatar = $request->avatar->getClientOriginalName().time().'.'.$request->avatar->extension();  
          // $request->avatar->public_path('avatars', $avatar);
          $request->avatar->move(public_path('avatars'), $avatar);


        } else {
            $avatar = 'noimage.jpg';
        }

        if($request->hasFile('omang')){
            $omang = $request->omang->getClientOriginalName().time().'.'.$request->omang->extension();  
       //$request->omang->public_path('documents', $omang);
       $request->omang->move(public_path('documents'), $omang);
       
        }
        
        if($request->hasFile('utility_doc')){
            $utility_doc = $request->utility_doc->getClientOriginalName().time().'.'.$request->utility_doc->extension();  
          // $request->utility_doc->public_path('documents', $utility_doc);
          $request->utility_doc->move(public_path('documents'), $utility_doc);
        }
        

        $account = new Landlord;

        $account->avatar = $avatar;
        $account->omang = $omang;
        $account->utility_doc = $utility_doc;
        $account->occupation = $request->occupation;
        $account->employer = $request->employer;
        $account->employer_email = $request->employer_email;
        $account->address = $request->address;
        $account->bio = $request->bio;
        $account->status_id = 1;
        $account->user_id = Auth::user()->id;
        
       
        $account->save();
        
        return redirect('/dashboard')->with("success", "Your Account has been created");
    }

    public function studentForm(){
 
        if(Auth::user()->role_id == 1){
            if(Auth::user()->studentaccount){
                return back()->with('info', 'You Have Already Created an Account');
            }else{
                return view('/dashboard.create-student');
            }
        }else{
            return back()->with('error', 'You Can Not View This Page');
        }
        

    }

    public function createStudent(Request $request){

        $request->validate([
            'avatar' => 'image|nullable|max:1999',
            'university' => 'required|string|max:255',
            'program_of_study' => 'required|string|max:255',
            'sponsored' => 'required',
            'bio' => 'required',
            'monthly_stipend' => 'required',
            'next_of_kin_name' => 'required|string|max:255',
            'next_of_kin_mobile' => 'required',
        ]);

        if($request->hasFile('avatar')){
            $avatar = $request->avatar->getClientOriginalName().time().'.'.$request->avatar->extension();  
          // $request->avatar->public_path('avatars', $avatar);
          $request->avatar->move(public_path('avatars'), $avatar);


        } else {
            $avatar = 'noimage.jpg';
        }

        $account = new Student;
        $account->avatar = $avatar;
        $account->user_id = Auth::user()->id;
        $account->university = $request->university;
        $account->bio = $request->bio;
        $account->program_of_study = $request->program_of_study;
        $account->sponsored = $request->sponsored;
        $account->monthly_stipend = $request->monthly_stipend;
        $account->next_of_kin_name = $request->next_of_kin_name;
        $account->next_of_kin_mobile = $request->next_of_kin_mobile;
 
        $account->save();
        
        return redirect('/dashboard')->with("success", "Your Account has been created");

    }


    public function deleteUser($id){
       
		$user = User::find($id);
      
        $user->delete();
        $user->landlordaccount->delete();
 
        return redirect('/dashboard')->with("success", "User ".$user->name." ".$user->surname." was successfully Deleted");

    }

    public function landlordResubmission(Request $request, $id){
        

        $request->validate([
            'avatar' => 'image|nullable|max:1999',
            'omang'=> 'required',
            'utility_doc' => 'required',
            'occupation'=> 'required|string|max:255',
            'employer'=> 'required|string|max:255',
            'employer_email' => 'required|string|email|max:255',
            'address'=> 'required|string|max:255',
            'bio'=> 'required',
        ]);
       
       

        if($request->hasFile('avatar')){
            $avatar = $request->avatar->getClientOriginalName().time().'.'.$request->avatar->extension();  
          // $request->avatar->public_path('avatars', $avatar);
          $request->avatar->move(public_path('avatars'), $avatar);


        } else {
            $avatar = 'noimage.jpg';
        }

        if($request->hasFile('omang')){
            $omang = $request->omang->getClientOriginalName().time().'.'.$request->omang->extension();  
       //$request->omang->public_path('documents', $omang);
       $request->omang->move(public_path('documents'), $omang);
       
        }
        
        if($request->hasFile('utility_doc')){
            $utility_doc = $request->utility_doc->getClientOriginalName().time().'.'.$request->utility_doc->extension();  
          // $request->utility_doc->public_path('documents', $utility_doc);
          $request->utility_doc->move(public_path('documents'), $utility_doc);
        }
        

        $account = Landlord::find($id);

        $account->avatar = $avatar;
        $account->omang = $omang;
        $account->utility_doc = $utility_doc;
        $account->occupation = $request->occupation;
        $account->employer = $request->employer;
        $account->employer_email = $request->employer_email;
        $account->address = $request->address;
        $account->bio = $request->bio;
        $account->status_id = 1;
        $account->message = null;
        $account->user_id = Auth::user()->id;
        
       
        $account->save();
        
        return redirect('/dashboard')->with("success", "Resubmission Successful");
    }

    public function index()
    {
        $roles = Role::all();
        if(Auth::user()->role_id){
            return view('dashboard.index');
    
        }else{
            return view('dashboard.select-account')->with('roles', $roles);
    
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
