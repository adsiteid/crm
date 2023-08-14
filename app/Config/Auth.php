<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use Myth\Auth\Config\Auth as AuthConfig;
use Google_Client;
use Google_Service_Oauth2; 

class Auth extends AuthConfig
{
     
   /**
     * --------------------------------------------------------------------
     * Require Confirmation Registration via Email
     * --------------------------------------------------------------------
     *
     * When enabled, every registered user will receive an email message
     * with an activation link to confirm the account.
     *
     * @var string|null Name of the ActivatorInterface class
     */
    public $requireActivation = null;

    public $allowRemembering = true;

    public $views = [
        'login'           => 'App\Views\auth\login',
        'register'        => 'App\Views\auth\register', 
        'forgot'          => 'App\Views\auth\forgot',
        'emailForgot'     => 'App\Views\auth\email\forgot',
        'reset'           => 'App\Views\auth\reset',
    ];
    private function clientgoogle(){
        $clientID = '808577488978-s0raqqteh5ot3nhca0drdcrh15lr15uu.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url().'google-auth'; //Harus sama dengan yang kita daftarkan
                
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        return $client;
        
    } 
    public function getUrlgoogle(){
        return $this->clientgoogle()->createAuthUrl();
    }
    public function getGoogle($code){
        $client = $this->clientgoogle();
        $token = $client->fetchAccessTokenWithAuthCode($code);
        if(isset($token['access_token'])){
            $client->setAccessToken($token['access_token']);							
            $Oauth = new Google_Service_Oauth2($client);
            $userInfo = $Oauth->userinfo->get();  
            return $userInfo; 
        }
    }
    public $authenticationLibs = [
        'local' => 'App\Authentication\LocalAuthenticator',
    ];

    public $reservedRoutes = [
        'login'                   => 'login',
        'logout'                  => 'logout',
        'register'                => 'register',
        'activate-account'        => 'activate-account',
        'resend-activate-account' => 'resend-activate-account',
        'forgot'                  => 'forgot',
        'reset-password'          => 'reset-password',
        'google-auth'             => 'google-auth',
    ];
}