<?php

namespace App\Controllers;

use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\GroupsModel;
use \App\Models\GroupSalesModel;


class Leads extends BaseController
{

    protected $showleads;
    protected $showusers;
    protected $showgroups;
    protected $showgroupsales;
    

    public function __construct()
    {
        $this->showleads = new LeadsModel();
        $this->showusers = new UsersModel();
        $this->showgroups = new GroupsModel;
        $this->showgroupsales = new GroupSalesModel;
    }


    public function detail($id)
    {
        $leads = $this->showleads->getLeads($id);
        $new = $this->showleads->new();
        $user = $this->showusers;
        $data = [
            'id' => $id,
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
        $id = user()->id;

        if (in_groups('admin')) :
            $leads = $this->showleads->new();
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :

        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->newAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            }elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->newAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);

            }else{
                $leads = $this->showleads->new();
                $new = $this->showleads->new();
            }
        }
        endif;

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

        if (in_groups('admin')) :
            $leads = $this->showleads->contacted();
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
        $id = user()->id;
        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->contactedAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            } elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->contactedAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);
            } else {
                $leads = $this->showleads->contacted();
                $new = $this->showleads->new();
            }
        }
        endif;


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

        if (in_groups('admin')) :
            $leads = $this->showleads->visit();
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
        $id = user()->id;
        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->visitAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            } elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->visitAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);
            } else {
                $leads = $this->showleads->visit();
                $new = $this->showleads->new();
            }
        }
        endif;

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

        if (in_groups('admin')) :
            $leads = $this->showleads->deal();
            $new = $this->showleads->new();
        endif;

        if(in_groups('users')) :
        $id = user()->id;
        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->dealAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            } elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->dealAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);
            } else {
                $leads = $this->showleads->deal();
                $new = $this->showleads->new();
            }
        }
        endif;


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

        if (in_groups('admin')) :
            $leads = $this->showleads->close();
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
        $id = user()->id;
        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->closeAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            } elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->closeAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);
            } else {
                $leads = $this->showleads->close();
                $new = $this->showleads->new();
            }
        }
        endif;

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

        if (in_groups('admin')) :
            $leads = $this->showleads->pending();
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
        $id = user()->id;
        foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

            if ($group['level'] == "admin_group") {
                $leads = $this->showleads->pendingAdminGroup($group['groups']);
                $new = $this->showleads->newAdminGroup($group['groups']);
            } elseif ($group['level'] == "admin_project") {
                $leads = $this->showleads->pendingAdminProject($group['project']);
                $new = $this->showleads->newAdminProject($group['project']);
            } else {
                $leads = $this->showleads->pending();
                $new = $this->showleads->new();
            }
        }
        endif;


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
