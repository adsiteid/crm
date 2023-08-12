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
        $redirectURL = session('redirect_url') ?? site_url('/');
        if (!isset($_GET['code'])) return redirect()->to($redirectURL)->withCookies();
        $data = $this->config->getGoogle($_GET['code']); 
        if (!isset($data)) return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
        if (!$this->auth->attemptgoogle(['email' => $data['email']], false))
            return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
        
        $redirectURL = site_url('/');
        unset($_SESSION['redirect_url']);

        return redirect()->to($redirectURL)->withCookies()->with('message', lang('Auth.loginSuccess'));
    }
       
      
    
}
