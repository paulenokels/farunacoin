<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //

    //admin method
    public function usersPage() {
        $totalCount = User::count();
        $users = User::orderBy('id', 'DESC')->paginate(20);
        Log::Info($users);
        
        return view ('dashboard.admin.users', ['users'=>$users, 'count' => $totalCount]);
    }

    //admin method
    public function updateUserStatus(Request $request) {
        $status = $request->status;
        $userId = $request->user_id;
        User::where('id',$userId)->update(['status' => $status]);
        return \json_encode(['success' => true]);

       
    }
}
