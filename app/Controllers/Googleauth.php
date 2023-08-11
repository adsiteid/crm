<?php

namespace App\Controllers; 
use App\Controllers\BaseController;  
use Myth\Auth\Config\Auth as AuthConfig; 

class Googleauth extends BaseController
{
    protected $auth;

    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var Session
     */
    protected $session;

    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth   = service('authentication');
    }
    public function index()
    { 
        if (isset($_GET['code'])) {
            $data = $this->config->getGoogle($_GET['code']);
            echo $data['email'];
        }  
        if (!$this->auth->attempt_google(['email' => $data['email']], false)) {
             return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
        }
      
    }
}
