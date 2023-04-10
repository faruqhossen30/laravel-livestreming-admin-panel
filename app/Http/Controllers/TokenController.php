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

        $appID = "c6fedacc1ca94bd9a16410eba5c1da8b";
        $appCertificate = "188ee9a0d4d94169a077931e258ed20a";
        $channelName = "test";
        $uid = 2882341273;
        $uidStr = "2882341273";
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        echo 'Token with int uid: ' . $token . PHP_EOL;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
        echo 'Token with user account: ' . $token . PHP_EOL;

    }
}
