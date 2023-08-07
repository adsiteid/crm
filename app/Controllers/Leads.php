<?php

namespace App\Controllers;

use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\GroupsModel;

class Leads extends BaseController
{

    protected $showleads;
    protected $showusers;
    protected $showgroups;

    public function __construct()
    {
        $this->showleads = new LeadsModel();
        $this->showusers = new UsersModel();
        $this->showgroups = new GroupsModel;
    }


    public function detail($id)
    {
        $leads = $this->showleads->getLeads($id);
        $new = $this->showleads->new();
        $user = $this->showusers;
        $data = [
            'leads' => $leads,
            'users' => $user,
            'new' => $new,
            'sales' => $this->showusers->salesUser(),
            'group' => $this->showgroups,
            'title' => 'Leads'
        ];

        return view('leads/detail', $data);
    }

    public function new()
    {
        $leads = $this->showleads->new();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'New Leads'
        ];

        return view('leads/list', $data);
    }

    public function contacted()
    {
        $leads = $this->showleads->contacted();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Contacted'
        ];
        return view('leads/list', $data);
    }

    public function visit()
    {
        $leads = $this->showleads->visit();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Visit'
        ];
        return view('leads/list', $data);
    }

    public function deal()
    {
        $leads = $this->showleads->deal();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Deal'
        ];
        return view('leads/list', $data);
    }

    public function close()
    {
        $leads = $this->showleads->close();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Close'
        ];
        return view('leads/list', $data);
    }

    public function pending()
    {
        $leads = $this->showleads->pending();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Pending'
        ];
        return view('leads/list', $data);
    }


    // 30 

    public function seven()
    {
        $leads = $this->showleads->seven();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 7 Days',
            'title' => 'Leads'
        ];
        return view('leads/list', $data);
    }


    public function month()
    {
        $leads = $this->showleads->month();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Leads'
        ];
        return view('leads/list', $data);
    }


    public function ninth()
    {
        $leads = $this->showleads->ninth();
        $new = $this->showleads->new();
        $data = [
            'leads' => $leads,
            'new' => $new,
            'days'=> 'Last 90 Days',
            'title' => 'Leads'
        ];
        return view('leads/list', $data);
    }


    public function rangeList()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

        
		$data = [
			'leads' => $this->showleads->rangeList($startDate,$endDate),
            'new' => $this->showleads->new(),
			'days'=> "$startDate - $endDate",
			'title' => 'Leads'
		];

        return view('leads/list', $data);
	}


    public function search_leads()
	{

		$search =  $this->request->getVar('search_leads');

		$data = [
			'leads' => $this->showleads->search_leads($search),
            'new' => $this->showleads->new(),
			'days'=> "Search Result",
			'title' => 'Search'
		];

        return view('leads/list', $data);
	}


}
