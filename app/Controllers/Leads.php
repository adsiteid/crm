<?php

namespace App\Controllers;

use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\GroupsModel;
use \App\Models\GroupSalesModel;
use \App\Models\ProjectModel;
use \App\Models\ChartModel;


class Leads extends BaseController
{

    protected $showleads;
    protected $showusers;
    protected $showgroups;
    protected $showgroupsales;
    protected $showproject;
    protected $chartleads;
    

    public function __construct()
    {
        $this->showleads = new LeadsModel();
        $this->showusers = new UsersModel();
        $this->showgroups = new GroupsModel;
        $this->showgroupsales = new GroupSalesModel;
        $this->showproject = new ProjectModel();
        $this->chartleads = new ChartModel();
    }


    public function detail($id)
    {
        $leads = $this->showleads->getLeads($id);
        $new = $this->showleads->new();
        $user = $this->showusers;

        $id = user()->id;

        if (in_groups('admin')) :
            $level = user()->level;
        endif;

        if (in_groups('users')) :

            if (empty($this->showgroupsales->user($id)->getResultArray())) {
                $level = "";
            }
            if (!empty($this->showgroupsales->user($id)->getResultArray())) {
                foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                $level = $group['level'];
        }
    }
        endif;




        $data = [
            'id' => $id,
            'project' => $this->showproject,
            'leads' => $leads,
            'level' => $level,
            'users' => $user,
            'new' => $new,
            'sales' => $this->showusers->salesUser(),
            'group' => $this->showgroups,
            'title' => 'Leads'
        ];

        return view('leads/detail', $data);
    }



    public function all()
    {
        // $id = user()->id;

        // if (in_groups('admin')) :
        $leads = $this->showleads->all();
        $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->new();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {


        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

        //             $leads = $this->showleads->newAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->newAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);

        //         }

        //         // else{
        //         //     $leads = $this->showleads->new();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);


        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'groups' => $this->showgroupsales,
            'days' => 'Last 30 Days',
            'title' => 'Dashboard'
        ];

        return view('leads/list', $data);
    }


    public function new()
    {
        // $id = user()->id;

        // if (in_groups('admin')) :
            $leads = $this->showleads->new();
            $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->new();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {


        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

        //             $leads = $this->showleads->newAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->newAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);

        //         }

        //         // else{
        //         //     $leads = $this->showleads->new();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'groups' => $this->showgroupsales,
            'days'=> 'Last 30 Days',
            'title' => 'New'
        ];

        return view('leads/list', $data);
    }

    public function contacted()
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->contacted();
            $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :
        //     $id = user()->id;

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->contacted();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->contactedAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }
        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->contactedAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->contacted();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;


        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);


        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Contacted'
        ];
        return view('leads/list', $data);
    }

    public function visit()
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->visit();
            $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :
        //     $id = user()->id;

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->visit();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->visitAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->visitAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->visit();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Visit'
        ];
        return view('leads/list', $data);
    }

    public function deal()
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->deal();
            $new = $this->showleads->new();
        // endif;

        //     if(in_groups('users')) :
        //     $id = user()->id;

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->deal();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->dealAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }
        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->dealAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->deal();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Deal'
        ];
        return view('leads/list', $data);
    }

    public function close()
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->close();
            $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :
        //     $id = user()->id;

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->close();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->closeAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->closeAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->close();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Close'
        ];
        return view('leads/list', $data);
    }

    public function pending()
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->pending();
            $new = $this->showleads->new();
        // endif;

        //     if (in_groups('users')) :
        //     $id = user()->id;

        //         if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //             $leads = $this->showleads->pending();
        //             $new = $this->showleads->new();
        //         }

        //         if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->pendingAdminGroup($group['groups']);
        //             $new = $this->showleads->newAdminGroup($group['groups']);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->pendingAdminProject($group['project']);
        //             $new = $this->showleads->newAdminProject($group['project']);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->pending();
        //         //     $new = $this->showleads->new();
        //         // }
        //     }
        // }
        //     endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days'=> 'Last 30 Days',
            'title' => 'Pending'
        ];
        return view('leads/list', $data);
    }



    public function indexFilter($days)
    {

        // if (in_groups('admin')) :
            $leads = $this->showleads->IndexFilter($days);
            $new = $this->showleads->newFilter($days);
        // endif;

        // if (in_groups('users')) :
        //     $id = user()->id;

        //     if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //         $leads = $this->showleads->IndexFilter($days);
        //         $new = $this->showleads->newFilter($days);
        //     }

        //     if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->IndexFilterAdminGroup($group['groups'],$days);
        //             $new = $this->showleads->newFilterAdminGroup($group['groups'], $days);
        //         }

        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->IndexFilterAdminProject($group['project'], $days);
        //             $new = $this->showleads->newFilterAdminProject($group['project'], $days);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->IndexFilter($days);
        //         //     $new = $this->showleads->newFilter($days);
        //         // }
        //     }
        // }
        // endif;

        $leadsReserve = $this->chartleads->leadsReserve($days);
        $leadsBooking = $this->chartleads->leadsBooking($days);
        $leadsDeal = $this->chartleads->leadsDeal($days);

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'days' => "Last $days Days",
            'title' => "Last $days Days"
        ];
        return view('leads/list', $data);
    }



    public function rangeList()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');


        // if (in_groups('admin')) :
            $leads = $this->showleads->rangeList($startDate, $endDate);
            $new = $this->showleads->newRange($startDate, $endDate);
        // endif;


        // if (in_groups('users')) :
        //     $id = user()->id;

        //     if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //         $leads = $this->showleads->rangeList($startDate, $endDate);
        //         $new = $this->showleads->newRange($startDate, $endDate);
        //     }

        //     if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->rangeListAdminGroup($group['groups'], $startDate, $endDate);
        //             $new = $this->showleads->newRangeAdminGroup($group['groups'], $startDate, $endDate);
        //         }
        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->rangeListAdminProject($group['project'], $startDate, $endDate);
        //             $new = $this->showleads->newRangeAdminProject($group['project'], $startDate, $endDate);
        //         } 

        //         // else {
        //         //     $leads = $this->showleads->rangeList($startDate, $endDate);
        //         //     $new = $this->showleads->newRange($startDate, $endDate);
        //         // }
        //     }
        // }
        // endif;

        $leadsReserve = $this->chartleads->leadsReserve($startDate, $endDate);
        $leadsBooking = $this->chartleads->leadsBooking($startDate, $endDate);
        $leadsDeal = $this->chartleads->leadsDeal($startDate, $endDate);
		$data = [
			'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
			'days'=> "$startDate - $endDate",
			'title' => "$startDate - $endDate"
		];

        return view('leads/list', $data);
	}


    public function search_leads()
	{

		$search =  $this->request->getVar('search_leads');


        // if (in_groups('admin')) :
            $leads = $this->showleads->search_leads($search);
            $new =  $this->showleads->new();
            $level = user()->level;
        // endif;

        // if (in_groups('users')) :
        //      $id = user()->id;

        //     if (empty($this->showgroupsales->user($id)->getResultArray())) {
        //         $leads = $this->showleads->search_leads($search);
        //         $new =  $this->showleads->new();
        //         $level = user()->level;
        //     }

        //     if (!empty($this->showgroupsales->user($id)->getResultArray())) {

        //     foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
        //         if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
        //             $leads = $this->showleads->search_leads_admin_group($group['groups'],$search);
        //             $new =  $this->showleads->newAdminGroup($group['groups']);
        //         }
        //         if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
        //             $leads = $this->showleads->search_leads_admin_project($group['project'], $search);
        //             $new =  $this->showleads->newAdminProject($group['project']);
        //         } 
        //         // else {
        //         //     $leads = $this->showleads->search_leads($search);
        //         //     $new =  $this->showleads->new();
        //         // }
        //         $level = $group['level'];
        //     }
        // }
        // endif;

        $leadsReserve = $this->chartleads->leadsReserve(30);
        $leadsBooking = $this->chartleads->leadsBooking(30);
        $leadsDeal = $this->chartleads->leadsDeal(30);

		$data = [
			'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'level' => $level,
            'new' => $new,
			'days'=> "Search Result",
			'title' => 'Search Result'
		];

        return view('leads/list', $data);
	}


}
