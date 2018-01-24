<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordGrantProxyControllerRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

/**
 * Class PasswordGrantProxyController.
 *
 * @package App\Http\Controllers
 */
class PasswordGrantProxyController extends Controller
{
    /**
     * @return mixed
     */
    public function issueToken(PasswordGrantProxyControllerRequest $request)
    {
        $http = new Client;

        $client = DB::table('oauth_clients')->where('id', 2)->first();

//        dump($request->username);
//        dump($request->password);
//        dump($client->redirect);

        $response = $http->post(url('http://tasks.test/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $request->username,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
