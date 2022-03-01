<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class IndexController extends Controller
{
     
    public function index()
    {
        return view('admin.index');
    }
    public function showProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile',compact('user'));
    }
    public function updateProfile(Request $request)
    {
        // dd($request);
            $this->validate($request,
            [
                'name' => 'required',
                'userid' => 'required|unique:users',
                'about' => 'sometimes|max:255',
                'image' => 'sometimes|image|mimes:jpg,png,bmp,jpeg|max:2000'
            ]);
            $user = User::findOrFail(Auth::user()->id);
        
       if($request->image != null) 
       {
        $image = $request->image;
        $imageName = Str::slug($request->name,'-') . uniqid() . '.' . $image->getClientOriginalExtension();
        //#1 check if category image directory is exists
        if(!Storage::disk('public')->exists('user'))
        {
            Storage::disk('public')->makeDirectory('user');
        }
        //DELETE old image
        if($user->image !== 'default.jpg' && Storage::disk('public')->exists('user/' . $user->image))
        {
            Storage::disk('public')->delete('user/' . $user->image);
        }
        $userImg = Image::make($image)->fit(200,200)->stream();
        Storage::disk('public')->put('user/' . $imageName, $userImg);//this put method may be used to store raw file contents on a disk
       }else
       {
           $imageName = $user->image;
       }
       $user->name = $request->name;
       $user->userid = $request->userid;
       $user->image = $imageName;
       $user->about = $request->abput;
       $user->save();
       Toastr:: success('Details Successfully Saved','Success');
       return redirect()->back();
       
    }
    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed'
        ]);
        //cross check the old password
        $oldPass = Auth::user()->password;//hashed
        if(Hash::check($request->old_password,$oldPass))//request password match with oldpass
        {
            //old pass shuld not be same new pass
               if(!Hash::check($request->password,$oldPass))
               {
                $user = User::find(Auth::id()); 
                $user->password = Hash::make($request->password);
                $user->save();
                //Logout
                Auth::logout();
                return redirect()->back();
               }else
               {
                   Toastr::error('New password shouldnot be same as the old password:(');
                   return redirect()->back();
               }
                    
                
        }else
        {
            Toastr::error('Enter the correct old password :(');
            return redirect()->back();
        }
    }
}
