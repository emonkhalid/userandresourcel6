<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(){
      $users = User::paginate(2);
    	return view('backend.users.index', compact('users'));
    }

    

    public function create(){
      $user = new User;
    	return view('backend.users.create', compact('user'));
    }

    

    public function store(Request $request)
    {

        $this->validate($request,[
          'name' => 'required',
          'email' => 'email|required|unique:users',
          'password' => 'required|min:2|confirmed',
          'is_active' => 'required',
          'profile_photo' => 'mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();

        if($request->file('profile_photo') ){
            
            $file = $request->file('profile_photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $file->move('backend/img/profile/', $fileName);
            //$photo = new Photo;
            //$photo->photo_path = $fileName;
            //$photo->save();
            $photo = Photo::create(['photo_path'=>$fileName]);
            $input['photo_id'] = $photo->id;
            
            //return "Has Photo";
        }
        
        $input['password'] = bcrypt($request->password);
        //return $input;
        User::create($input);

        return redirect(route('user.index'))->with('message-success','New User has been created successfully.');
     
    }


    public function show($id){
      $user = User::findOrFail($id);
      $photo = Photo::findOrFail($user->photo_id);
      
      return view('backend.users.show', compact('user','photo') );
    }
    

    public function edit($id){
    	
        $user = User::findOrFail($id);
        $photo = Photo::findOrFail($user->photo_id);
        return view('backend.users.edit', compact('user','photo') );
    }

    

    public function update(Request $request, $id){

        $this->validate($request,[

          'name' => 'required',
          'email' => 'email|required',
          'password' => 'confirmed',
          'is_active' => 'required',
        ]);

        if(trim($request->password) == ''){
          $input = $request->except('password');
        }
        else{
          $input = $request->all();
          $input['password'] = bcrypt($request->password);
        }
        
        
        $user = User::findOrFail($id);
        $photo = Photo::findOrFail($user->photo_id);
        

        if($request->file('profile_photo') ){
            
            $file = $request->file('profile_photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $file->move('backend/img/profile/', $fileName);

            
            if( $user->photo->photo_path == 'user_profile.png'){
             
             $photo_create = Photo::create(['photo_path'=>$fileName]);
             $input['photo_id'] = $photo_create->id;            
            }
            
            if( $user->photo->photo_path !== 'user_profile.png'){
            
             unlink('backend/img/profile/'. $user->photo->photo_path);
             $photo->photo_path = $fileName;
             $photo->save();
             $input['photo_id'] = $photo->id; 
              
            }
          
        }

          
          $user->update($input);

          return redirect(route('user.index'))->with('message-success','User has been Updated successfully.');           
    }

    

    public function destroy($id){
    	//return "User Deleted";
      $user = User::findOrFail($id);
      $photo = Photo::findOrFail($user->photo_id);

      if($user->role_id === 1){

        return redirect(route('user.index'))->with('message-danger','Admin cannot be deleted');
      }
      
      else{
        if($user->photo->photo_path !== 'user_profile.png'){
          unlink('backend/img/profile/'. $user->photo->photo_path);
          $photo->delete();         
        }
        $user->delete();
      }

      return redirect(route('user.index'))->with('message-success','User has been Deleted successfully.');   
       

    }
}
