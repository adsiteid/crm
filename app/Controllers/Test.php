<?php

namespace App\Controllers;
 
use app\Models\testModel;

class Test extends BaseController
{

    protected $test;

    public function __construct(){

        $this->test = new testModel;
    }
    
	public function index()
	{ 
        return view('auth/email/forgot');
    }
}