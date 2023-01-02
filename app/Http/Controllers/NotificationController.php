<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\IncomingReport;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.dashboard');
    }

    public function SendNewNotification(){
        $userSchema = User::first();
        $newReport = [
            'name' => 'BOGO',
            'body' => 'You received an offer',
            'thanks' => 'Thank you',
            'offerText' => 'Check it out',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];

        Notification::send($userSchema, new SendNewNotification($newReport));
        dd('Masuk gak?');
    }
}
