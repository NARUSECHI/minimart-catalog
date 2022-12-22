<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    const LOCAL_STORAGE_FOLDER = "public/user/";
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index($id)
    {
        $user = $this->user->findOrFail($id);
        return view('profile.index')->with('user',$user);
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        return view('profile.edit')->with('user',$user);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'string|min:1|max:50',
            'image'=>'mimes:jpg,png,jpeg,gif|max:1048',
            'how_long'=>'integer|max:100',
        ]);

        $user = $this->user->findOrFail($id);
        $user->name = $request->name;
        $user->how_long = $request->how_long;
        if($user->image)
        {
            $this->deleteImage($user->image);
        }
        $user->image = $this->saveImage($request);
        $user->save();
        return redirect()->route('profile.index',$user->id);
    }

    private function saveImage($request)
    {
        if($request->image)
        {
            $image_name=time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
            
            return $image_name;
        }      
    }

    private function deleteImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

        if(Storage::disk('local')->exists($image_path))
        {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $this->deleteImage($user->image);
        $this->user->destroy($id);
        Auth::logout();
        return redirect()->route('index');
    }

  

}
