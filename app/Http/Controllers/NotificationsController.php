<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Mail;
use Laravel\User;
use Carbon\Carbon;
class NotificationsController extends Controller
{


    public static function send($sender,$receiver,$message,$img,$type='public'){
        Notification::create([
            'sender_id'=>$sender,
            'type'=>$type,
            'receiver_id'=> $receiver,
            'messege'=>$message,
            'img_link'=>$img,
           // 'status'=>0,                   // 0==Not read 1==read
        ]);
    }

    public static function sendMail($receiver,$subject,$other,$type='default'){

        $user = User::find($receiver);

        $data = [
            'name'=> $user->name,
            'email' => $user->email,
            'subject'=>$subject,
        ];

        $view = null;
        switch($type){
            case 'welcome':
            $view = 'email.welcome';
            break;
            case 'deleteuser':
            $view = 'email.deleteuser';
            break;
            case 'contest-create':
            $view = 'email.contestcreate';
            break;
            case 'contest-delete':
            $view = 'email.contestdelete';
            break;
            case 'contest-winner':
            $view = 'email.contestwinner';
            break;
            case 'pass-resetted':
            $view = 'email.passresetted';
            break;
        }

        Mail::send($view,['name'=>$user->name,'other'=>$other],function($msg) use ($data){
            $msg->to($data['email'],$data['name']);
            $msg->from('lensview.info@gmail.com','LensView@info');
            $msg->subject($data['subject']);
        });
    }

    //load  notifications panel
    public static function show(){
        

        //Automatically delete notification older than 30 days
        $del_date = Carbon::today()->subDays(30);
        DB::table('notifications')->where('created_at', '<', $del_date)->delete();

        //update public notifications status after 5 days
        $status_update_date = Carbon::today()->subDays(5);
        DB::table('notifications')
        ->where('created_at', '<', $status_update_date)
        ->where('type', 'public')
        ->update(['status' => 1]);

        static $notifications = null;
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where notifications.created_at > '".Auth::user()->created_at."' AND status = 0 AND (type='voter' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 2){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where notifications.created_at > '".Auth::user()->created_at."' AND status = 0 AND (type='photographer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 3){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id WHERE notifications.created_at > '".Auth::user()->created_at."' AND status = 0 AND (type='organizer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
        }
        return $notifications;
    }

    //load all notifications to notification center 
    public function showAll(){
        static $notifications = null;
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where notifications.created_at > '".Auth::user()->created_at."' AND (type='voter' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 2){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where notifications.created_at > '".Auth::user()->created_at."' AND (type='photographer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 3){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id WHERE notifications.created_at > '".Auth::user()->created_at."' AND (type='organizer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
        }
        //dd($notifications);
        return view('dashboards.notificationcenter')->with('notifications',$notifications);
    }

    public static function readAll(){
                $notifications = DB::update("UPDATE notifications SET notifications.status='1' where notifications.receiver_id='".Auth::user()->id."'");
            }

    public static function read($id){
       $notification =  Notification::find($id);
       $notification->status = 1;
       $notification->save();
    }
}
