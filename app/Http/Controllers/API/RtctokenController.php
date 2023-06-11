<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Lib\RtcTokenBuilder;
use App\Models\Agora;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Cache;

class RtctokenController extends Controller
{
    public function generate(Request $request)
    {

        // include("../src/RtcTokenBuilder.php");
        // include("../../Lib/RtcTokenBuilder.php");

        $agora = Cache::rememberForever('agora', function () {
            return Agora::first();
        });
        $appID = $agora->app_id;
        $appCertificate = $agora->app_certificate;

        // $appID = "0b8c1e8e74de4766827c83420a8ac6a2";
        // $appCertificate = "b5593652f8094b0984e5475a193be1a6";


        $channelName = $request->channel;
        $uid = $request->uid;
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
