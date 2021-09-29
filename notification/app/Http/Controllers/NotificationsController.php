<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\Notification\Constants\EmailTypes;
use Illuminate\Http\Request;
use App\Services\Notification\Notification;
use App\Services\Notification\Exceptions\UserDoesNotHaveNumber;
use App\Jobs\SendEmail;
use App\Jobs\SendSms;

class NotificationsController extends Controller
{


    /**
     * show send email form 
     */
    public function email()
    {
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notifications.send-email', compact('users', 'emailTypes'));
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'user' => 'integer | exists:users,id',
            'email_type' => 'integer'
        ]);


        try {
            $mailable = EmailTypes::toMail($request->email_type);
            SendEmail::dispatch(User::find($request->user), new $mailable);

            return redirect()->back()->with('success', __('notification.email_sent_successfully'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', __('notification.email_has_problem'));
        }
    }



    public function sms()
    {
        $users = User::all();
        return view('notifications.send-sms', compact('users'));
    }


    public function sendSms(Request $request)
    {
        $request->validate([
            'user' => 'integer | exists:users,id',
            'text' => 'string | max:256'
        ]);

        try {
            SendSms::dispatch(User::find($request->user), $request->text);
            return $this->redirectBack('success', __('notification.sms_sent_successfully'));
        } catch (\Exception $e) {
            return $this->redirectBack('failed', __('notification.sms_has_problem'));
        }
    }



    private function redirectBack(String $type, String $text)
    {
        return redirect()->back()->with($type, $text);
    }
}
