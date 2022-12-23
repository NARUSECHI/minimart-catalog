<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $active_users = $this->user->latest()->get();
        $deactive_users = $this->user->onlyTrashed()->latest()->get();
        return view('admin.index')->with('active_users',$active_users)
                                    ->with('deactive_users',$deactive_users);
    }

    
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $this->deleteImage($user->image);
        $user->forcedelete();
        return redirect()->route('admin.index');
    }

    public function deactivate($id)
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function activate($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.index');
    }
}
