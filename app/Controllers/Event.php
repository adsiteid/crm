<?php

namespace App\Controllers;

use \App\Models\EventModel;
use \App\Models\LeadsModel;
use \App\Models\GroupSalesModel;
use \App\Models\ProjectModel;

class Event extends BaseController
{

    protected $showevent;
    protected $showleads;
    protected $showgroupsales;
    protected $showproject;

    public function __construct()
    {
        $this->showevent = new EventModel();
        $this->showleads = new LeadsModel();
        $this->showgroupsales = new GroupSalesModel;
        $this->showproject = new ProjectModel();
    }


    public function list($days)
    {

        if (in_groups('admin')) :
            $notifNew = $this->showleads->notifNew();
            $events = $this->showevent->eventsFilter($days);
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
            $id = user()->id;

            if (empty($this->showgroupsales->user($id)->getResultArray())) {
                $notifNew = $this->showleads->notifNew();
                $events = $this->showevent->eventsIdFilter($id,$days);
                $new = $this->showleads->new();
            }

            if (!empty($this->showgroupsales->user($id)->getResultArray())) {

            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "admin_group" ||  $group['level'] == "management") {
                    $notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
                    $events = $this->showevent->eventsAdminGroupFilter($group['groups'],$days);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                } else {
                    $notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
                    $events = $this->showevent->eventsAdminGroupFilter($group['groups'],$days);
                    $new = $this->showleads->new();
                }
            }
        }
        endif;

        $data = [
            'new' => $new,
            'notifNew'=> $notifNew,
            'days'=> "Last $days Days",
            'project' =>$this->showproject,
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
            $notifNew = $this->showleads->notifNew();
            $events = $this->showevent->eventsRange($startDate, $endDate);
            $new = $this->showleads->new();
        endif;

        if (in_groups('users')) :
            $id = user()->id;

            if (empty($this->showgroupsales->user($id)->getResultArray())) {
                $notifNew = $this->showleads->notifNew();
                $events = $this->showevent->eventsIdRange($id,$startDate, $endDate);
                $new = $this->showleads->new();
            }

            if (!empty($this->showgroupsales->user($id)->getResultArray())) {
            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "admin_group" || $group['level'] == "management") {
                    $notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
                    $events = $this->showevent->eventsAdminGroupRange($group['groups'],$startDate, $endDate);
                    $new = $this->showleads->newAdminGroup($group['groups']);
                } elseif ($group['level'] == "admin_project") {
                        $notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
                    $events = $this->showevent->eventsAdminProjectRange($group['groups'], $group['project'],$startDate, $endDate);
                    $new = $this->showleads->newAdminProject($group['project']);
                } else {
                        $notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
                    $events = $this->showevent->eventsAdminGroupRange($group['groups'],$startDate, $endDate);
                    $new = $this->showleads->new();
                }
            }
            }
        endif;

        $data = [
            'new' => $new,
            'notifNew'=> $notifNew,
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
            'project' => $this->showproject,
            'title' => 'List Event'
        ];
        return view('event/detail', $data);
    }
}
