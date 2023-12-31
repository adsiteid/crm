<?php

namespace App\Controllers;

use \App\Models\LeadsModel;
use \App\Models\EventModel;
use \App\Models\ProjectModel;
use \App\Models\GroupSalesModel;
use \App\Models\ChartModel;

class Home extends BaseController
{

	protected $showleads;
	protected $showevent;
	protected $showproject;
	protected $showgroupsales;
	protected $chartleads;


	public function __construct()
	{
		$this->showleads = new LeadsModel();
		$this->showevent = new EventModel();
		$this->showproject = new ProjectModel();
		$this->showgroupsales = new GroupSalesModel;
		$this->chartleads = new ChartModel;
	}


	public function login()
	{
		return view('auth/login');
	}


	public function index()
	{
		
		$id = user()->id;
		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$all = $this->showleads->allAdminGroup($group['groups']);
					$new = $this->showleads->newAdminGroup($group['groups']);
					$contacted = $this->showleads->contactedAdminGroup($group['groups']);
					$close = $this->showleads->closeAdminGroup($group['groups']);
					$pending = $this->showleads->pendingAdminGroup($group['groups']);
					$visit = $this->showleads->visitAdminGroup($group['groups']);
					$deal = $this->showleads->dealAdminGroup($group['groups']);
					$events = $this->showevent->eventsAdminGroup($group['groups']);
					$leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],30);
					$leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],30);
					$leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],30);
				}else{
					$notifNew = $this->showleads->notifNew();
					$all = $this->showleads->all();
					$new = $this->showleads->new();
					$contacted = $this->showleads->contacted();
					$close = $this->showleads->close();
					$pending = $this->showleads->pending();
					$visit = $this->showleads->visit();
					$deal = $this->showleads->deal();
					$events = $this->showevent->events();
					$leadsReserve = $this->chartleads->leadsReserve(30);
					$leadsBooking = $this->chartleads->leadsBooking(30);
					$leadsDeal = $this->chartleads->leadsDeal(30);
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$all = $this->showleads->all();
			$new = $this->showleads->new();
			$contacted = $this->showleads->contacted();
			$close = $this->showleads->close();
			$pending = $this->showleads->pending();
			$visit = $this->showleads->visit();
			$deal = $this->showleads->deal();
			$events = $this->showevent->events();
			$leadsReserve = $this->chartleads->leadsReserve(30);
			$leadsBooking = $this->chartleads->leadsBooking(30);
			$leadsDeal = $this->chartleads->leadsDeal(30);
		}

		
			

		$data = [
			'all' => $all,
			'notifNew'=> $notifNew,
			'new' => $new,
			'close' => $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'leadsDeal' => $leadsDeal,
			'projects' => $this->showproject,
			'event' => $events,
			'days'=> 'Last 30 Days',
			'title' => 'Dashboard'
		];
		return view('index', $data);
	}


	public function indexFilter($days)
	{


		// if (in_groups('admin')) :
			$leadsReserve = $this->chartleads->leadsReserve($days);
			$leadsBooking = $this->chartleads->leadsBooking($days);
			$leadsDeal = $this->chartleads->leadsDeal($days);
			$all = $this->showleads->allFilter($days);
			$new = $this->showleads->newFilter($days);
			$contacted = $this->showleads->contactedFilter($days);
			$close = $this->showleads->closeFilter($days);
			$pending = $this->showleads->pendingFilter($days);
			$visit = $this->showleads->visitFilter($days);
			$deal = $this->showleads->dealFilter($days);
			$events = $this->showevent->events();
		// endif;

		// if (in_groups('users')) :
		// 	$id = user()->id;


		// 	if (empty($this->showgroupsales->user($id)->getResultArray())) {
		// 		$new = $this->showleads->newFilter($days);
		// 		$contacted = $this->showleads->contactedFilter($days);
		// 		$close = $this->showleads->closeFilter($days);
		// 		$pending = $this->showleads->pendingFilter($days);
		// 		$visit = $this->showleads->visitFilter($days);
		// 		$deal = $this->showleads->dealFilter($days);
		// 		$events = $this->showevent->eventsIdFilter($id, $days);
		// 	}

		// 	if (!empty($this->showgroupsales->user($id)->getResultArray())) {

		// 	foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
		// 		if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

		// 			$new = $this->showleads->newFilterAdminGroup($group['groups'],$days);
		// 			$contacted = $this->showleads-> contactedFilterAdminGroup($group['groups'], $days);
		// 			$close = $this->showleads-> closeFilterAdminGroup($group['groups'], $days);
		// 			$pending = $this->showleads-> pendingFilterAdminGroup($group['groups'], $days);
		// 			$visit = $this->showleads-> visitFilterAdminGroup($group['groups'], $days);
		// 			$deal = $this->showleads-> dealFilterAdminGroup($group['groups'], $days);
		// 			$events = $this->showevent->eventsAdminGroup($group['groups'], $days);
		// 		}

		// 		if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
		// 			$new = $this->showleads-> newFilterAdminProject($group['project'], $days);
		// 			$contacted = $this->showleads-> contactedFilterAdminProject($group['project'], $days);
		// 			$close = $this->showleads-> closeFilterAdminProject($group['project'], $days);
		// 			$pending = $this->showleads-> pendingFilterAdminProject($group['project'], $days);
		// 			$visit = $this->showleads-> visitFilterAdminProject($group['project'], $days);
		// 			$deal = $this->showleads-> dealFilterAdminProject($group['project'], $days);
		// 			$events = $this->showevent->eventsAdminProject($group['groups'], $group['project'],$days);
		// 		} 
				
		// 		// else {
		// 		// 	$new = $this->showleads->newFilter($days);
		// 		// 	$contacted = $this->showleads->contactedFilter($days);
		// 		// 	$close = $this->showleads->closeFilter($days);
		// 		// 	$pending = $this->showleads->pendingFilter($days);
		// 		// 	$visit = $this->showleads->visitFilter($days);
		// 		// 	$deal = $this->showleads->dealFilter($days);
		// 		// 	$events = $this->showevent->eventsAdminGroup($group['groups'], $days);
		// 		// }
		// 	}
		// }
		// endif;
		

		$data = [
			'all' => $all,
			'new' => $new,
			'contacted' => $contacted,
			'close' => $close,
			'pending' => $pending,
			'visit' => $visit,
			'deal' => $deal,
			'event' => $events,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'leadsDeal' => $leadsDeal,
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


		// if (in_groups('admin')) :
		$all = $this->showleads->rangeList($startDate, $endDate);
			$new = $this->showleads->newRange($startDate, $endDate);
			$contacted = $this->showleads->contactedRange($startDate, $endDate);
			$close = $this->showleads->closeRange($startDate, $endDate);
			$pending = $this->showleads->pendingRange($startDate, $endDate);
			$visit = $this->showleads->visitRange($startDate, $endDate);
			$deal = $this->showleads->dealRange($startDate, $endDate);
			$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
			$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);
			$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
			$events = $this->showevent->events();
		// endif;


		// if (in_groups('users')) :
		// 	$id = user()->id;


		// 	if (empty($this->showgroupsales->user($id)->getResultArray())) {
		// 		$new = $this->showleads->newRange($startDate, $endDate);
		// 		$contacted = $this->showleads->contactedRange($startDate, $endDate);
		// 		$close = $this->showleads->closeRange($startDate, $endDate);
		// 		$pending = $this->showleads->pendingRange($startDate, $endDate);
		// 		$visit = $this->showleads->visitRange($startDate, $endDate);
		// 		$deal = $this->showleads->dealRange($startDate, $endDate);
		// 		$events = $this->showevent->eventsIdRange($id,$startDate, $endDate);
		// 	}

		// 	if (!empty($this->showgroupsales->user($id)->getResultArray())) {
		// 	foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
		// 		if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

		// 			$new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$contacted = $this->showleads->contactedRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$close = $this->showleads->closeRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$pending = $this->showleads->pendingRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$visit = $this->showleads->visitRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$deal = $this->showleads->dealRangeAdminGroup($group['groups'],$startDate, $endDate);
		// 			$events = $this->showevent->eventsAdminGroup($group['groups']);
		// 		}

		// 		if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
		// 			$new = $this->showleads->newRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$contacted = $this->showleads->contactedRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$close = $this->showleads->closeRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$pending = $this->showleads->pendingRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$visit = $this->showleads->visitRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$deal = $this->showleads->dealRangeAdminProject($group['project'],$startDate, $endDate);
		// 			$events = $this->showevent->eventsAdminProject($group['groups'], $group['project']);
		// 		} 
				
		// 		// else {
		// 		// 	$new = $this->showleads->newRange($startDate, $endDate);
		// 		// 	$contacted = $this->showleads->contactedRange($startDate, $endDate);
		// 		// 	$close = $this->showleads->closeRange($startDate, $endDate);
		// 		// 	$pending = $this->showleads->pendingRange($startDate, $endDate);
		// 		// 	$visit = $this->showleads->visitRange($startDate, $endDate);
		// 		// 	$deal = $this->showleads->dealRange($startDate, $endDate);
		// 		// 	$events = $this->showevent->events($group['groups']);
		// 		// }
		// 	}
		// }
		// endif;


		$data = [
			'all' => $all,
			'new' => $new,
			'close' => $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'leadsDeal' => $leadsDeal,
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
		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$new = $this->showleads->new();
				}else{
					$notifNew = $this->showleads->notifNew();
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
		}
			
		


		$data = [
			
				'notifNew' => $notifNew,
				'group' => $this->showgroupsales,
				'project' => $this->showproject,
				'projects' => $this->showproject,
				'title' => 'Project'
			];
		
			

		return view('/project/project', $data);
	}

	//--------------------------------------------------------------------

}
