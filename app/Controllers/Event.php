<?php

namespace App\Controllers;

use \App\Models\EventModel;
use \App\Models\LeadsModel;
use \App\Models\GroupSalesModel;

class Event extends BaseController
{

    protected $showevent;
    protected $showleads;
    protected $showgroupsales;

    public function __construct()
    {
        $this->showevent = new EventModel();
        $this->showleads = new LeadsModel();
        $this->showgroupsales = new GroupSalesModel;
    }


    public function list($days)
    {

        if (in_groups('admin')) :
            $events = $this->showevent->events();
        endif;

        if (in_groups('users')) :
            $id = user()->id;

            if (empty($this->showgroupsales->user($id)->getResultArray())) {
                $events = $this->showevent->eventsIdFilter($id,$days);
            }


            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "admin_group") {
                    $events = $this->showevent->eventsAdminGroupFilter($group['groups'],$days);
                } elseif ($group['level'] == "admin_project") {
                    $events = $this->showevent->eventsAdminProjectFilter($group['groups'], $group['project'],$days);
                } else {
                    $events = $this->showevent->eventsAdminGroupFilter($group['groups'],$days);
                }
            }
        endif;

        $data = [
            'new' => $this->showleads->new(),
            'days'=> "Last $days Days",
            'event' => $events,
            'title' => 'List Event'
        ];
        return view('event/list_event', $data);
    }



    public function listRange()
    {

        $startDate =  $this->request->getVar('date_start');
        $endDate = $this->request->getVar('date_end');

        if (in_groups('admin')) :
            $events = $this->showevent->events();
        endif;

        if (in_groups('users')) :
            $id = user()->id;

            if (empty($this->showgroupsales->user($id)->getResultArray())) {
                $events = $this->showevent->eventsIdRange($id,$startDate, $endDate);
            }


            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "admin_group") {
                    $events = $this->showevent->eventsAdminGroupRange($group['groups'],$startDate, $endDate);
                } elseif ($group['level'] == "admin_project") {
                    $events = $this->showevent->eventsAdminProjectRange($group['groups'], $group['project'],$startDate, $endDate);
                } else {
                    $events = $this->showevent->eventsAdminGroupRange($group['groups'],$startDate, $endDate);
                }
            }
        endif;

        $data = [
            'new' => $this->showleads->new(),
            'days' => "$startDate - $endDate",
            'event' => $events,
            'title' => 'List Event'
        ];
        return view('event/list_event', $data);
    }



    public function detail($id)
    {

        $data = [
            'new' => $this->showleads->new(),
            'event' => $this->showevent->detail($id),
            'title' => 'List Event'
        ];
        return view('event/detail', $data);
    }
}
