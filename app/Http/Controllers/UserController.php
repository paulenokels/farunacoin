<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class UserController extends Controller
{
    //

    //admin method
    public function usersPage() {
        $totalCount = User::count();
        $users = User::orderBy('id', 'DESC')->paginate(20);
        
        return view ('dashboard.admin.users', ['users'=>$users, 'count' => $totalCount]);
    }

    //admin method
    public function searchUsers(Request $request) {
        $fullName = $request->full_name;
        $query = User::where('full_name', 'like', "%$fullName%")->limit(25);
        $users = $query->paginate(25);
        $totalCount = $query->count();

        Log::Info($fullName);
        
        return view ('dashboard.admin.users', ['users'=>$users, 'count' => $totalCount]);
    }

    //admin method
    public function updateUserStatus(Request $request) {
        $status = $request->status;
        $userId = $request->user_id;
        User::where('id',$userId)->update(['status' => $status]);
        return \json_encode(['success' => true]);

       
    }

    //admin method
    public function updateAmbassadorStatus(Request $request) {
        $status = $request->status;
        $userId = $request->user_id;
        $user = User::where('id', $userId)->select('id',  'amb_code')->first();

        //1 means we want to make this user an ambassador
        if ($status == '1') {
            //make sure user is not an ambassador before so that we dont override user ambassador code
            if (!$user->amb_code) {
                $ambCode = $user->id.Str::upper(Str::random(4));
                User::where('id', $userId)->update(['amb_code' => $ambCode]);
                return \json_encode(['success' => true, 'ambassadorCode' => $ambCode]);

            }
            //user is already an ambassador return user's ambassador code
            else {
                return \json_encode(['success' => true, 'ambassadorCode' => $user->amb_code]);
            }
        }
        

       
    }
}
