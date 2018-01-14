<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordGrantProxyControllerRequest;
use GuzzleHttp\Client;

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

        $response = $http->post(url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'uo1smtRcl6xLAmBNBLi6MeALEOb0dozwG3MsbDJp',
                'username' => $request->username,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
