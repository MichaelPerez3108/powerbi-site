<?php

namespace App\Http\Controllers;

use League\OAuth2\Client\Provider\GenericProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OAuthController extends Controller
{
    public function getAccessToken(Request $request)
    {
        // Retrieve the config JSON from the request
        $config = $request->input('config');

        // Check for the authentication mode
        // Service Principal Authentication
        $provider = new GenericProvider([
            'clientId'                => $config['clientId'],
            'clientSecret'            => $config['clientSecret'],
            'urlAuthorize'            => '',
            'urlAccessToken'          => $config['authorityUrl'] . $config['tenantId'],
            'urlResourceOwnerDetails' => ''
        ]);

        $accessToken = $provider->getAccessToken('client_credentials', [
            'scope' => $config['scopeBase']
        ]);

        return response()->json(['accessToken' => $accessToken->getToken()]);
    }
}
