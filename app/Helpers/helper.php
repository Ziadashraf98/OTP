<?php

use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;


function twilioSMS($userCode)
{
    $message = 'Login OTP is '.$userCode;
    $account_sid = getenv('TWILIO_SID');
    $auth_token = getenv('TWILIO_TOKEN');
    $twilio_number = getenv('TWILIO_FROM');
    
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(Auth::user()->phone_number, [
    'from' => $twilio_number, 
    'body' => $message]);
}