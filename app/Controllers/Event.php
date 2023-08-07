<?php

namespace App\Controllers;

use \App\Models\EventModel;
use \App\Models\LeadsModel;

class Event extends BaseController
{

    protected $showevent;
    protected $showleads;

    public function __construct()
    {
        $this->showevent = new EventModel();
        $this->showleads = new LeadsModel();
    }


    public function list()
    {

        $data = [
            'new' => $this->showleads->new(),
            'event' => $this->showevent->acara(),
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
