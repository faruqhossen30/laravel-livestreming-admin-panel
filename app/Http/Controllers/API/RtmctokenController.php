<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Lib\RtmTokenBuilder;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class RtmctokenController extends Controller
{
    public function generate(Request $request)
    {

        $appID = "0b8c1e8e74de4766827c83420a8ac6a2";
        $appCertificate = "b5593652f8094b0984e5475a193be1a6";
        $user = $request->user;
        $role = RtmTokenBuilder::RoleRtmUser;
        $expireTimeInSeconds = 86400;
        $currentTimestamp = (new DateTime("now", new DateTimeZone('Asia/Dhaka')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtmTokenBuilder::buildToken($appID, $appCertificate, $user, $role, $privilegeExpiredTs);
        // echo 'Rtm Token: ' . $token . PHP_EOL;
        echo $token;
    }
}
