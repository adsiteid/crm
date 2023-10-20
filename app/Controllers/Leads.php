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
        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {
                    $leads = $this->showleads->allAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],30);
                }else{
                    $leads = $this->showleads->all();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        }else{
            $leads = $this->showleads->all();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

    

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'groups' => $this->showgroupsales,
            'days' => 'Last 30 Days',
            'title' => 'Leads'
        ];

        return view('leads/list', $data);
    }


    public function new()
    {

        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->newAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],30);

                }else{
                    $leads = $this->showleads->new();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        }else{
            $leads = $this->showleads->new();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

       
        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'groups' => $this->showgroupsales,
            'days'=> 'Last 30 Days',
            'title' => 'New'
        ];

        return view('leads/list', $data);
    }

    public function contacted()
    {


        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {
                    $leads = $this->showleads->contactedAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], 30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], 30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], 30);
                }else{
                    $leads = $this->showleads->contacted();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        }else{
            $leads = $this->showleads->contacted();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

           


        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days'=> 'Last 30 Days',
            'title' => 'Contacted'
        ];
        return view('leads/list', $data);
    }

    public function visit()
    {

        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->visitAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], 30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], 30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], 30);

                }else{
                    $leads = $this->showleads->visit();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        }else{
            $leads = $this->showleads->visit();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }
        
           

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days'=> 'Last 30 Days',
            'title' => 'Visit'
        ];
        return view('leads/list', $data);
    }

    public function deal()
    {

        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->dealAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], 30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], 30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], 30);
                } else {
                    $leads = $this->showleads->deal();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        } else {
            $leads = $this->showleads->deal();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days'=> 'Last 30 Days',
            'title' => 'Deal'
        ];
        return view('leads/list', $data);
    }

    public function close()
    {

        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->closeAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], 30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], 30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], 30);
                } else {
                    $leads = $this->showleads->close();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        } else {
            $leads = $this->showleads->close();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days'=> 'Last 30 Days',
            'title' => 'Close'
        ];
        return view('leads/list', $data);
    }

    public function pending()
    {

        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->pendingAdminGroup($group['groups']);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], 30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], 30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], 30);
                } else {
                    $leads = $this->showleads->pending();
                    $new = $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        } else {
            $leads = $this->showleads->pending();
            $new = $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days'=> 'Last 30 Days',
            'title' => 'Pending'
        ];
        return view('leads/list', $data);
    }



    public function indexFilter($days)
    {


        $id = user()->id;
        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->IndexFilterAdminGroup($group['groups'], $days);
                    $new = $this->showleads->newFilterAdminGroup($group['groups'], $days);
                    $contacted = $this->showleads->contactedFilterAdminGroup($group['groups'], $days);
                    $close = $this->showleads->closeFilterAdminGroup($group['groups'], $days);
                    $pending = $this->showleads->pendingFilterAdminGroup($group['groups'], $days);
                    $visit = $this->showleads->visitFilterAdminGroup($group['groups'], $days);
                    $deal = $this->showleads->dealFilterAdminGroup($group['groups'], $days);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], $days);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], $days);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], $days);

                }else{
                    $leads = $this->showleads->IndexFilter($days);
                    $new = $this->showleads->newFilter($days);
                    $contacted = $this->showleads->contactedFilter($days);
                    $close = $this->showleads->closeFilter($days);
                    $pending = $this->showleads->pendingFilter($days);
                    $visit = $this->showleads->visitFilter($days);
                    $deal = $this->showleads->dealFilter($days);
                    $leadsReserve = $this->chartleads->leadsReserve($days);
                    $leadsBooking = $this->chartleads->leadsBooking($days);
                    $leadsDeal = $this->chartleads->leadsDeal($days);
                }
            }
        }else{
            $leads = $this->showleads->IndexFilter($days);
            $new = $this->showleads->newFilter($days);
            $contacted = $this->showleads->contactedFilter($days);
            $close = $this->showleads->closeFilter($days);
            $pending = $this->showleads->pendingFilter($days);
            $visit = $this->showleads->visitFilter($days);
            $deal = $this->showleads->dealFilter($days);
            $leadsReserve = $this->chartleads->leadsReserve($days);
            $leadsBooking = $this->chartleads->leadsBooking($days);
            $leadsDeal = $this->chartleads->leadsDeal($days);
        }

        
           

        $data = [
            'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
            'days' => "Last $days Days",
            'title' => 'Leads'
        ];
        return view('leads/list', $data);
    }



    public function rangeList()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

        $id = user()->id;
        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                    $leads = $this->showleads->rangeListAdminGroup($group['groups'],$startDate, $endDate);
                    $new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $contacted = $this->showleads->contactedRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $close = $this->showleads->closeRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $pending = $this->showleads->pendingRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $visit = $this->showleads->visitRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $deal = $this->showleads->dealRangeAdminGroup($group['groups'],$startDate, $endDate);
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],$startDate, $endDate);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],$startDate, $endDate);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],$startDate, $endDate);

                }else{
                    $leads = $this->showleads->rangeList($startDate, $endDate);
                    $new = $this->showleads->newRange($startDate, $endDate);
                    $contacted = $this->showleads->contactedRange($startDate, $endDate);
                    $close = $this->showleads->closeRange($startDate, $endDate);
                    $pending = $this->showleads->pendingRange($startDate, $endDate);
                    $visit = $this->showleads->visitRange($startDate, $endDate);
                    $deal = $this->showleads->dealRange($startDate, $endDate);
                    $leadsReserve = $this->chartleads->leadsReserve($startDate, $endDate);
                    $leadsBooking = $this->chartleads->leadsBooking($startDate, $endDate);
                    $leadsDeal = $this->chartleads->leadsDeal($startDate, $endDate);
                }
            }
        }else{
            $leads = $this->showleads->rangeList($startDate, $endDate);
            $new = $this->showleads->newRange($startDate, $endDate);
            $contacted = $this->showleads->contactedRange($startDate, $endDate);
            $close = $this->showleads->closeRange($startDate, $endDate);
            $pending = $this->showleads->pendingRange($startDate, $endDate);
            $visit = $this->showleads->visitRange($startDate, $endDate);
            $deal = $this->showleads->dealRange($startDate, $endDate);
            $leadsReserve = $this->chartleads->leadsReserve($startDate, $endDate);
            $leadsBooking = $this->chartleads->leadsBooking($startDate, $endDate);
            $leadsDeal = $this->chartleads->leadsDeal($startDate, $endDate);
        }
        
            

		$data = [
			'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
			'days'=> "$startDate - $endDate",
			'title' => 'Leads'
		];

        return view('leads/list', $data);
	}


    public function search_leads()
	{


        $id = user()->id;

        if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            $search =  $this->request->getVar('search_leads');

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "management" || $group['level'] == "admin_group") {

                   
                    $leads = $this->showleads->search_leads_admin_group($group['groups'],$search);
                    $new =  $this->showleads->newAdminGroup($group['groups']);
                    $contacted = $this->showleads->contactedAdminGroup($group['groups']);
                    $close = $this->showleads->closeAdminGroup($group['groups']);
                    $pending = $this->showleads->pendingAdminGroup($group['groups']);
                    $visit = $this->showleads->visitAdminGroup($group['groups']);
                    $deal = $this->showleads->dealAdminGroup($group['groups']);
                    $level = user()->level;
                    $leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],30);
                    $leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],30);
                    $leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],30);

                }else{
                    $search =  $this->request->getVar('search_leads');
                    $leads = $this->showleads->search_leads($search);
                    $new =  $this->showleads->new();
                    $contacted = $this->showleads->contacted();
                    $close = $this->showleads->close();
                    $pending = $this->showleads->pending();
                    $visit = $this->showleads->visit();
                    $deal = $this->showleads->deal();
                    $level = user()->level;
                    $leadsReserve = $this->chartleads->leadsReserve(30);
                    $leadsBooking = $this->chartleads->leadsBooking(30);
                    $leadsDeal = $this->chartleads->leadsDeal(30);
                }
            }
        }else{
            $search =  $this->request->getVar('search_leads');
            $leads = $this->showleads->search_leads($search);
            $new =  $this->showleads->new();
            $contacted = $this->showleads->contacted();
            $close = $this->showleads->close();
            $pending = $this->showleads->pending();
            $visit = $this->showleads->visit();
            $deal = $this->showleads->deal();
            $level = user()->level;
            $leadsReserve = $this->chartleads->leadsReserve(30);
            $leadsBooking = $this->chartleads->leadsBooking(30);
            $leadsDeal = $this->chartleads->leadsDeal(30);
        }

		   

		$data = [
			'leads' => $leads,
            'leadsReserve' => $leadsReserve,
            'leadsBooking' => $leadsBooking,
            'leadsDeal' => $leadsDeal,
            'project' => $this->showproject,
            'level' => $level,
            'new' => $new,
            'close' => $close,
            'pending' => $pending,
            'contacted' => $contacted,
            'visit' => $visit,
            'deal' => $deal,
			'days'=> "Search Result",
			'title' => 'Search Result'
		];

        return view('leads/list', $data);
	}


}
