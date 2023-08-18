<?php

namespace App\Controllers;

use \App\Models\LeadsModel;
use \App\Models\EventModel;
use \App\Models\ProjectModel;
use \App\Models\GroupSalesModel;

class Home extends BaseController
{

	protected $showleads;
	protected $showevent;
	protected $showproject;
	protected $showgroupsales;


	public function __construct()
	{
		$this->showleads = new LeadsModel();
		$this->showevent = new EventModel();
		$this->showproject = new ProjectModel();
		$this->showgroupsales = new GroupSalesModel;
	}


	public function login()
	{
		return view('auth/login');
	}


	public function index()
	{


		if(in_groups('admin')) :
			$new = $this->showleads->new();
			$contacted = $this->showleads->contacted();
			$close = $this->showleads->close();
			$pending = $this->showleads->pending();
			$visit = $this->showleads->visit();
			$deal = $this->showleads->deal();
			$events = $this->showevent->events();
		endif;

		if (in_groups('users')) :
			$id = user()->id;
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group") {
					$new = $this->showleads->newAdminGroup($group['groups']);
					$contacted = $this->showleads->contactedAdminGroup($group['groups']);
					$close = $this->showleads->closeAdminGroup($group['groups']);
					$pending = $this->showleads->pendingAdminGroup($group['groups']);
					$visit = $this->showleads->visitAdminGroup($group['groups']);
					$deal = $this->showleads->dealAdminGroup($group['groups']);
					$events = $this->showevent->eventsAdminGroup($group['groups']);
				} elseif ($group['level'] == "admin_project") {
					$new = $this->showleads->newAdminProject($group['project']);
					$contacted = $this->showleads->contactedAdminProject($group['project']);
					$close = $this->showleads->closeAdminProject($group['project']);
					$pending = $this->showleads->pendingAdminProject($group['project']);
					$visit = $this->showleads->visitAdminProject($group['project']);
					$deal = $this->showleads->dealAdminProject($group['project']);
					$events = $this->showevent->eventsAdminProject($group['groups'],$group['project']);
				} else {
					$new = $this->showleads->new();
					$contacted = $this->showleads->contacted();
					$close = $this->showleads->close();
					$pending = $this->showleads->pending();
					$visit = $this->showleads->visit();
					$deal = $this->showleads->deal();
					$events = $this->showevent->eventsAdminGroup($group['groups']);
				}
			}
		endif;

		$data = [
			'new' => $new,
			'contacted' => $contacted,
			'close' => $close,
			'pending' => $pending,
			'visit' => $visit,
			'deal' => $deal,
			'event' => $events,
			'days'=> 'Last 30 Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}


	public function indexFilter($days)
	{

		if (in_groups('admin')) :
			$new = $this->showleads->newFilter($days);
			$contacted = $this->showleads->contactedFilter($days);
			$close = $this->showleads->closeFilter($days);
			$pending = $this->showleads->pendingFilter($days);
			$visit = $this->showleads->visitFilter($days);
			$deal = $this->showleads->dealFilter($days);
			$events = $this->showevent->events();
		endif;

		if (in_groups('users')) :
			$id = user()->id;
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group") {
					$new = $this->showleads->newFilterAdminGroup($group['groups'],$days);
					$contacted = $this->showleads-> contactedFilterAdminGroup($group['groups'], $days);
					$close = $this->showleads-> closeFilterAdminGroup($group['groups'], $days);
					$pending = $this->showleads-> pendingFilterAdminGroup($group['groups'], $days);
					$visit = $this->showleads-> visitFilterAdminGroup($group['groups'], $days);
					$deal = $this->showleads-> dealFilterAdminGroup($group['groups'], $days);
					$events = $this->showevent->eventsAdminGroup($group['groups'], $days);
				} elseif ($group['level'] == "admin_project") {
					$new = $this->showleads-> newFilterAdminProject($group['project'], $days);
					$contacted = $this->showleads-> contactedFilterAdminProject($group['project'], $days);
					$close = $this->showleads-> closeFilterAdminProject($group['project'], $days);
					$pending = $this->showleads-> pendingFilterAdminProject($group['project'], $days);
					$visit = $this->showleads-> visitFilterAdminProject($group['project'], $days);
					$deal = $this->showleads-> dealFilterAdminProject($group['project'], $days);
					$events = $this->showevent->eventsAdminProject($group['groups'], $group['project'],$days);
				} else {
					$new = $this->showleads->newFilter($days);
					$contacted = $this->showleads->contactedFilter($days);
					$close = $this->showleads->closeFilter($days);
					$pending = $this->showleads->pendingFilter($days);
					$visit = $this->showleads->visitFilter($days);
					$deal = $this->showleads->dealFilter($days);
					$events = $this->showevent->eventsAdminGroup($group['groups'], $days);
				}
			}
		endif;
		

		$data = [
			'new' => $new,
			'contacted' => $contacted,
			'close' => $close,
			'pending' => $pending,
			'visit' => $visit,
			'deal' => $deal,
			'event' => $events,
			'days'=> 'Last '.$days.' Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}


	public function index30()
	{

		$data = [
			'new' => $this->showleads->new('30'),
			'contacted' => $this->showleads->contacted('30'),
			'close' => $this->showleads->close('30'),
			'pending' => $this->showleads->pending('30'),
			'visit' => $this->showleads->visit('30'),
			'deal' => $this->showleads->deal('30'),
			'event' => $this->showevent->acara(),
			'days'=> 'Last 30 Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}


	public function index90()
	{

		$data = [
			'new' => $this->showleads->new('90'),
			'contacted' => $this->showleads->contacted('90'),
			'close' => $this->showleads->close('90'),
			'pending' => $this->showleads->pending('90'),
			'visit' => $this->showleads->visit('90'),
			'deal' => $this->showleads->deal('90'),
			'event' => $this->showevent->acara(),
			'days'=> 'Last 90 Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}



	public function range()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$data = [
			'new' => $this->showleads->newRange($startDate,$endDate),
			'close' => $this->showleads->closeRange($startDate,$endDate),
			'pending' => $this->showleads->pendingRange($startDate,$endDate),
			'contacted' => $this->showleads->contactedRange($startDate,$endDate),
			'visit' => $this->showleads->visitRange($startDate,$endDate),
			'deal' => $this->showleads->dealRange($startDate,$endDate),
			'event' => $this->showevent->acara(),
			'tipe' => 'range',
			'days'=> "$startDate - $endDate",
			'title' => 'Dashboard'
		];

		return view('index', $data);
	}



	public function notfound()
	{
		return view('404_2');
	}


	public function project()
	{
		
			$data = [
				'new' => $this->showleads->new(),
				'project' => $this->showproject->project()->getResultArray(),
				'title' => 'Project'
			];

		return view('/project/project', $data);
	}

	//--------------------------------------------------------------------

}
