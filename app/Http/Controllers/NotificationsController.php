<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class NotificationsController extends Controller
{

    static $notifications = null;
    public static function send($sender,$receiver,$message,$img,$type='public'){
        $photo = Notification::create([
            'sender_id'=>$sender,
            'type'=>$type,
            'receiver_id'=> $receiver,
            'messege'=>$message,
            'img_link'=>$img,
           // 'status'=>0,                   // 0==Not read 1==read
        ]);
    }

    public static function show(){
        
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where status = 0 AND (type='voter' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 2){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id where status = 0 AND (type='photographer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
            else if(Auth::user()->role_id == 3){
                $notifications = DB::select("SELECT *,notifications.created_at as sent_date,notifications.id as not_id FROM notifications LEFT JOIN users ON notifications.sender_id = users.id WHERE status = 0 AND (type='organizer' OR type='public' OR receiver_id='".Auth::user()->id."') ORDER BY notifications.created_at desc");
            }
        }
        
        return $notifications;
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
