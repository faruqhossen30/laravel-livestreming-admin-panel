<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\RtcTokenBuilder;
use DateTime;
use DateTimeZone;

class TokenController extends Controller
{
    //

    public function index()
    {

        // include("../src/RtcTokenBuilder.php");
        // include("../../Lib/RtcTokenBuilder.php");

        $appID = "0b8c1e8e74de4766827c83420a8ac6a2";
        $appCertificate = "b5593652f8094b0984e5475a193be1a6";
        $channelName = "test";
        $uid = 0;
        $uidStr = "2882341273";
        $role = RtcTokenBuilder::RolePublisher;
        $expireTimeInSeconds = 86400;
        $currentTimestamp = (new DateTime("now", new DateTimeZone('Asia/Dhaka')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        // echo 'Token with int uid: ' . $token . PHP_EOL;
        echo $token;

        // $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
        // echo 'Token with user account: ' . $token . PHP_EOL;

    }
}
