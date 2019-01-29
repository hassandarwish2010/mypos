<?php

namespace App\Http\Controllers\DashBoard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Image;
use Storage;
use Illuminate\Contracts\Validation\Rule;
class UserController extends Controller
{



   public function __construct(){
     
     $this->middleware(['permission:read-users'])->only('index');
      $this->middleware(['permission:create-users'])->only('create');
       $this->middleware(['permission:update-users'])->only('update');
        $this->middleware(['permission:delete-users'])->only('destroy');

   }

    public function index(Request $request)
    {  
       $users=User::whereRoleIs('admin')->when($request->search,function($q) use ($request){

         return $q->where('first_name', 'like','%'.$request->search.'%')
               ->OrWhere('last_name','like','%'.$request->search.'%');
       })->paginate('1');

//dd($users);
        return view ('dashboard.users.index',compact('users'));
    }


    public function create()
    {
        return view ('dashboard.users.create');
    }

    public function store(Request $request)

    { //dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image'=>'image|required',
            'permissions'=>'required|min:1'
        ]);
        $request_data=$request->except(['password','password_confirmation','permissions','image']);
        if($request->image){
           Image::make($request->image)->resize(300,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/'.$request->image->hashName()));
        }

        $request_data['image']=$request->image->hashName();
        $request_data['password']=bcrypt($request->password);

        $user=User::create($request_data);
       $user->attachRole('admin');

       $user->syncPermissions($request->permissions);
 //dd($request->permissions);
        Session::flash('success','data inserted sucessfly');
   
        return redirect()->route('dashbord.users.index');
    }



    public function edit(User $user)
    {
         return view ('dashboard.users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
          $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
              'email' => 'required|email',
            //'email' => ['required',Rule::unique('users')->ignore($user->id),],
             //'image'=>'image|required',
            'permissions'=>'required|min:1'
            
        ]);
        $request_data=$request->except(['permissions','image']);

         if($request->image){
          if($user->image !='default.png'){

        Storage::disk('public_uploads')->delete('/users_images/'.$user->image);
            
          }//end if insted

               Image::make($request->image)->resize(300,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/'.$request->image->hashName()));
        }//end if outer

        $request_data['image']=$request->image->hashName();
        $user->update($request_data);

       $user->syncPermissions($request->permissions);
 //dd($request->permissions);
        Session::flash('success','data updated sucessfly');
   
        return redirect()->route('dashbord.users.index');
    }


    public function destroy(User $user)
    {   if($user->image !='default.png  '){
        Storage::disk('public_uploads')->delete('/users_images/'.$user->image);
    } 

        $user->delete();
                Session::flash('success','data deleteed sucessfly');
                 return back();
    }
}
