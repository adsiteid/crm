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


    public function list()
    {

        if (in_groups('admin')) :
            $events = $this->showevent->events();
        endif;

        if (in_groups('users')) :
            $id = user()->id;
            foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
                if ($group['level'] == "admin_group") {
                    $events = $this->showevent->eventsAdminGroup($group['groups']);
                } elseif ($group['level'] == "admin_project") {
                    $events = $this->showevent->eventsAdminProject($group['groups'], $group['project']);
                } else {
                    $events = $this->showevent->eventsAdminGroup($group['groups']);
                }
            }
        endif;

        $data = [
            'new' => $this->showleads->new(),
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
