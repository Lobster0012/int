<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\BuyRequest;
use App\Models\Events;
use App\Models\CheckEvent;
<<<<<<< HEAD
=======
use App\Models\History;
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc


class UserController extends Controller
{
    public function index(){
    $query = User::query()->get();
    return view('user.index', compact('query'));
}
    public function show(){        
        $query = User::query()->first();
        $myEvents = Member::query()->where('user_id',$query->id)->get();
        $myBuyRequest = BuyRequest::query()->where('user_id',$query->id)->get();
        $myOrganizatedEvents = Events::query()->where('user_id',$query->id)->get();
<<<<<<< HEAD
        // $checkEvents = CheckEvent::query()->where('user_id',$query->id)->where('status','true')->get();
        return view('user.show', compact('query','myEvents','myOrganizatedEvents','myBuyRequest'));
=======
        $myHistory = History::query()->where('user_id',$query->id)->get();
        // $checkEvents = CheckEvent::query()->where('user_id',$query->id)->where('status','true')->get();
        return view('user.show', compact('query','myEvents','myHistory','myOrganizatedEvents','myBuyRequest'));
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
    }
    public function updateCoins($id,Request $request){
         $request->validate( [
      'coins'=>'required|integer|max:255',
         ]);
        $user = User::query()->where('id',$id)->first();
        $user->balance = intval($user->balance) + $request['coins'];
        $user->save();
        return redirect()->back();
    }
<<<<<<< HEAD
=======
        public function all($id){        
        $query = User::findOrFail($id);
        $myEvents = Member::query()->where('user_id',$query->id)->get();
        $myBuyRequest = BuyRequest::query()->where('user_id',$query->id)->get();
        $myOrganizatedEvents = Events::query()->where('user_id',$query->id)->get();
        $myHistory = History::query()->where('user_id',$query->id)->get();
        // $checkEvents = CheckEvent::query()->where('user_id',$query->id)->where('status','true')->get();
        return view('user.all', compact('query','myEvents','myHistory','myOrganizatedEvents','myBuyRequest'));
    }
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
}