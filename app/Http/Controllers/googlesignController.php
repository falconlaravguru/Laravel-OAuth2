<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Google;

class googlesignController extends Controller
{
    //
    public function Index() {
        return view('GoogleSignIn.GoogleSignIn');
    }

    public function verifyToken() {
        $token = $_REQUEST['id_token'];
        $Client_Id = config("services.google.client_id");
        $gClient = new \Google_Client(['client_id' => $Client_Id]);

        $payload = $gClient->verifyIdToken($token);
        if ($payload) {
            $userid = $payload['sub'];
            var_dump($userid);exit;
        } else {
            
        }
    }
}
