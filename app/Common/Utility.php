<?php
namespace App\Common;

// use Twilio\Rest\Client;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;
// use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Firebase\Messaging\Notification;
// use App\Http\Entities\AppConfig;
// use Razorpay\Api\Api;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;

use function PHPSTORM_META\type;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class Utility
{
    /*-----------------------nmatch page  Api---------------------------*/
    public function getResponse($url,$from)
    {
            $headers= array('x-api-key' => 'CODEX@123');
            $client = new GuzzleClient();
            if(isset($from) && $from !="" && $from !=NULL)
            {
                $response = $client->request('POST', $url,
                [
                    'auth' => array('admin', '1234'),
                    'headers' => $headers,
                    'form_params'    => $from
                ]);
            }else{
                $response = $client->request('POST', $url,
                [
                    'auth' => array('admin', '1234'),
                    'headers' => $headers
                ]);
            }

            $responseData = json_decode($response->getBody(), TRUE);
            //echo ($responseData);
            // dd($responseData);
            return $responseData;
    }

    public function matchesStanding($id)
    {
        $url='http://smartcms.goaly.mobi/api/standing';
        $headers= array('x-api-key' => 'CODEX@123');
        $client = new GuzzleClient();
        $response = $client->request('POST', $url,
					[
                        'auth' => array('admin', '1234'),
                        'headers' => $headers,
                        'form_params'    => array('comp_id'=>$id)
				]);
        $responseData = json_decode($response->getBody(), TRUE);
        //dd($responseData['standing']);
        return $responseData['standing'];
    }

    /*-----------------------news page  Api---------------------------*/

    public function news($url)
    {

        $headers= array('x-api-key' => 'CODEX@123');
        $client = new GuzzleClient();
        $response = $client->request('POST', $url,
					[
                        'auth' => array('admin', '1234'),
                        'headers' => $headers,
				]);
        $responseData = json_decode($response->getBody(), TRUE);
        //dd($responseData);
        return $responseData;
    }




    /*-----------------------home page Top Maches Api---------------------------*/


    public function getLiveMatchesData()
    {
        $LivematchUrl='http://smartcms.goaly.mobi/api/topMatchLive';
        $headers= array('x-api-key' => 'CODEX@123');
        $client = new GuzzleClient();

        $response = $client->request('POST', $LivematchUrl,
                    [
                        'auth' => array('admin', '1234'),
                        'headers' => $headers,
                ]);
        $responseData = json_decode($response->getBody(), TRUE);
        return $responseData;

    }
    public function getFinishMatchesData()
    {
        $LivematchUrl='http://smartcms.goaly.mobi/api/topMatchPast';
        $headers= array('x-api-key' => 'CODEX@123');
        $client = new GuzzleClient();

        $response = $client->request('POST', $LivematchUrl,
                    [
                        'auth' => array('admin', '1234'),
                        'headers' => $headers,
                ]);
        $responseData = json_decode($response->getBody(), TRUE);
        return $responseData;

    }
     public function getComingMatchesData()
    {
        $LivematchUrl='http://smartcms.goaly.mobi/api/topMatchComing';
        $headers= array('x-api-key' => 'CODEX@123');
        $client = new GuzzleClient();

        $response = $client->request('POST', $LivematchUrl,
                    [
                        'auth' => array('admin', '1234'),
                        'headers' => $headers,
                ]);
        $responseData = json_decode($response->getBody(), TRUE);
        return $responseData;

    }

     public static function   getUtcToLocal($utc_time,$timezone,$format)
    {

       // $timezone = $request->session()->get('local_timezone',"Asia/ Jakarta");


       $timezone= isset($timezone)? $timezone :'Asia/Calcutta';
       $timezone= "Asia/Jakarta";
// dd($timezone);
        $dt = new DateTime($utc_time);
        $tz = new DateTimeZone($timezone); // or whatever zone you're after

        $dt->setTimezone($tz);
        $match_time = $dt->format($format);

        return $match_time;

    }

public function curlGet($query_url)
{
    $ch = curl_init($query_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);   
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json' // Change to the appropriate content type if needed
    ));
    $response = curl_exec($ch);    
    if (curl_errno($ch)) {
        $err = curl_error($ch);
        curl_close($ch);
        return ['error' => $err];     }
    
    curl_close($ch);
    return $response;
}


}
