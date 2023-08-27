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

		$id = user()->id;

		if(in_groups('admin')) :
			$new = $this->showleads->new();
			$contacted = $this->showleads->contacted();
			$close = $this->showleads->close();
			$pending = $this->showleads->pending();
			$visit = $this->showleads->visit();
			$deal = $this->showleads->deal();
			$events = $this->showevent->events();
		endif;

		

		if(in_groups('users')) :


			
			

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
				$contacted = $this->showleads->contacted();
				$close = $this->showleads->close();
				$pending = $this->showleads->pending();
				$visit = $this->showleads->visit();
				$deal = $this->showleads->deal();
				$events = $this->showevent->eventsId($id);
			}


			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

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
						$events = $this->showevent->eventsAdminProject($group['groups'], $group['project']);
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

			}

			
		endif;

		$data = [
			'new' => $new,
			'contacted' => $contacted,
			'close' => $close,
			'pending' => $pending,
			'visit' => $visit,
			'deal' => $deal,
			'projects' => $this->showproject,
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


			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->newFilter($days);
				$contacted = $this->showleads->contactedFilter($days);
				$close = $this->showleads->closeFilter($days);
				$pending = $this->showleads->pendingFilter($days);
				$visit = $this->showleads->visitFilter($days);
				$deal = $this->showleads->dealFilter($days);
				$events = $this->showevent->eventsIdFilter($id, $days);
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

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
			'projects' => $this->showproject,
			'days'=> 'Last '.$days.' Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}


	public function range()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		if (in_groups('admin')) :
			$new = $this->showleads->newRange($startDate, $endDate);
			$contacted = $this->showleads->contactedRange($startDate, $endDate);
			$close = $this->showleads->closeRange($startDate, $endDate);
			$pending = $this->showleads->pendingRange($startDate, $endDate);
			$visit = $this->showleads->visitRange($startDate, $endDate);
			$deal = $this->showleads->dealRange($startDate, $endDate);
			$events = $this->showevent->events();
		endif;


		if (in_groups('users')) :
			$id = user()->id;


			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->newRange($startDate, $endDate);
				$contacted = $this->showleads->contactedRange($startDate, $endDate);
				$close = $this->showleads->closeRange($startDate, $endDate);
				$pending = $this->showleads->pendingRange($startDate, $endDate);
				$visit = $this->showleads->visitRange($startDate, $endDate);
				$deal = $this->showleads->dealRange($startDate, $endDate);
				$events = $this->showevent->eventsIdRange($id,$startDate, $endDate);
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group") {
					$new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
					$contacted = $this->showleads->contactedRangeAdminGroup($group['groups'],$startDate, $endDate);
					$close = $this->showleads->closeRangeAdminGroup($group['groups'],$startDate, $endDate);
					$pending = $this->showleads->pendingRangeAdminGroup($group['groups'],$startDate, $endDate);
					$visit = $this->showleads->visitRangeAdminGroup($group['groups'],$startDate, $endDate);
					$deal = $this->showleads->dealRangeAdminGroup($group['groups'],$startDate, $endDate);
					$events = $this->showevent->eventsAdminGroup($group['groups']);
				} elseif ($group['level'] == "admin_project") {
					$new = $this->showleads->newRangeAdminProject($group['project'],$startDate, $endDate);
					$contacted = $this->showleads->contactedRangeAdminProject($group['project'],$startDate, $endDate);
					$close = $this->showleads->closeRangeAdminProject($group['project'],$startDate, $endDate);
					$pending = $this->showleads->pendingRangeAdminProject($group['project'],$startDate, $endDate);
					$visit = $this->showleads->visitRangeAdminProject($group['project'],$startDate, $endDate);
					$deal = $this->showleads->dealRangeAdminProject($group['project'],$startDate, $endDate);
					$events = $this->showevent->eventsAdminProject($group['groups'], $group['project']);
				} else {
					$new = $this->showleads->newRange($startDate, $endDate);
					$contacted = $this->showleads->contactedRange($startDate, $endDate);
					$close = $this->showleads->closeRange($startDate, $endDate);
					$pending = $this->showleads->pendingRange($startDate, $endDate);
					$visit = $this->showleads->visitRange($startDate, $endDate);
					$deal = $this->showleads->dealRange($startDate, $endDate);
					$events = $this->showevent->events($group['groups']);
				}
			}
		}
		endif;


		$data = [
			'new' => $new,
			'close' => $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'event' => $events,
			'projects' => $this->showproject,
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

		$id = user()->id;

		if (in_groups('admin')) :
			$project = $this->showproject->findAll();
			$level = user()->level;
			$new = $this->showleads->new();
		endif;

		if (in_groups('users')) :


			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$project = $this->showproject->projectId($id);
				$level = user()->level;
				$new = $this->showleads->new();
			}


			if (!empty($this->showgroupsales->user($id)->getResultArray())) {
			
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
			if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
				$project = $this->showproject->projectAdminGroup($group['groups'])->getResultArray();
				$new = $this->showleads->newAdminGroup($group['groups']);
			} 
			
			if ($group['level'] == "admin_project"  || $group['level'] == "manager") {
				$project = $this->showproject->projectAdminProject($group['project'])->getResultArray();
				$new = $this->showleads->newAdminProject($group['project']);
			}

				if ( $group['level'] == "sales") {
					$project = $this->showproject->projectAdminProject($group['project'])->getResultArray();
					$new = $this->showleads->new();
				}

				$level = $group['level'];
		}
	}
			
		endif;
		
			$data = [
				'new' => $new,
				'group' => $this->showgroupsales,
				'level' => $level,
				'project' => $project,
				'projects' => $this->showproject,
				'title' => 'Project'
			];

		return view('/project/project', $data);
	}

	//--------------------------------------------------------------------

}
