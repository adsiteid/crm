<?php

namespace App\Controllers;

use \App\Models\ProjectModel;
use \App\Models\LeadsModel;
use \App\Models\ChartModel;
use \App\Models\UsersModel;
use \App\Models\GroupSalesModel;
use CodeIgniter\I18n\Time;

class Report extends BaseController
{

	protected $showproject;
	protected $showleads;
	protected $chartleads;
	protected $showusers;
	protected $showgroupsales;

	public function __construct()
	{
		$this->showproject = new ProjectModel();
		$this->showleads = new LeadsModel();
		$this->chartleads = new ChartModel;
		$this->showusers = new UsersModel;
		$this->showgroupsales = new GroupSalesModel;
	}

	/////////////////// REPORT LEADS /////////////////////////



	public function leadsFilter($days)
	{

		$id = user()->id;


		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {

					$leads = $this->showleads->allFilterAdminGroup($group['groups'],$days);

					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);

					$leadsNew = $this->chartleads->leadsNewAdminGroup($group['groups'],$days);
					$leadsClose = $this->chartleads->leadsCloseAdminGroup($group['groups'],$days);
					$leadsPending = $this->chartleads->leadsPendingAdminGroup($group['groups'],$days);
					$leadsContacted = $this->chartleads->leadsContactedAdminGroup($group['groups'],$days);
					$leadsVisit = $this->chartleads->leadsVisitAdminGroup($group['groups'],$days);
					$leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'],$days);
					$leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'],$days);
					$leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],$days);

					$new = $this->showleads->newFilterAdminGroup($group['groups'],$days);
					$close = $this->showleads->closeFilterAdminGroup($group['groups'],$days);
					$pending = $this->showleads->pendingFilterAdminGroup($group['groups'],$days);
					$contacted = $this->showleads->contactedFilterAdminGroup($group['groups'],$days);
					$visit = $this->showleads->visitFilterAdminGroup($group['groups'],$days);
					$deal = $this->showleads->dealFilterAdminGroup($group['groups'],$days);
					$dealOnly = $this->showleads->dealOnlyAdminGroup($group['groups'],$days);
					$reserve = $this->showleads->reserveFilterAdminGroup($group['groups'],$days);
					$booking = $this->showleads->bookingFilterAdminGroup($group['groups'],$days);

				}else{
					$leads = $this->showleads->allFilter($days);
					$notifNew = $this->showleads->notifNew();

					$leadsNew = $this->chartleads->leadsNew($days);
					$leadsClose = $this->chartleads->leadsClose($days);
					$leadsPending = $this->chartleads->leadsPending($days);
					$leadsContacted = $this->chartleads->leadsContacted($days);
					$leadsVisit = $this->chartleads->leadsVisit($days);
					$leadsDeal = $this->chartleads->leadsDeal($days);
					$leadsReserve = $this->chartleads->leadsReserve($days);
					$leadsBooking = $this->chartleads->leadsBooking($days);

					$new = $this->showleads->newFilter($days);
					$close = $this->showleads->closeFilter($days);
					$pending = $this->showleads->pendingFilter($days);
					$contacted = $this->showleads->contactedFilter($days);
					$visit = $this->showleads->visitFilter($days);
					$deal = $this->showleads->dealFilter($days);
					$dealOnly = $this->showleads->dealOnly($days);
					$reserve = $this->showleads->reserveFilter($days);
					$booking = $this->showleads->bookingFilter($days);
				}
			}
		}else{
			$leads = $this->showleads->allFilter($days);
			$notifNew = $this->showleads->notifNew();
			$leadsNew = $this->chartleads->leadsNew($days);
			$leadsClose = $this->chartleads->leadsClose($days);
			$leadsPending = $this->chartleads->leadsPending($days);
			$leadsContacted = $this->chartleads->leadsContacted($days);
			$leadsVisit = $this->chartleads->leadsVisit($days);
			$leadsDeal = $this->chartleads->leadsDeal($days);
			$leadsReserve = $this->chartleads->leadsReserve($days);
			$leadsBooking = $this->chartleads->leadsBooking($days);

			$new = $this->showleads->newFilter($days);
			$close = $this->showleads->closeFilter($days);
			$pending = $this->showleads->pendingFilter($days);
			$contacted = $this->showleads->contactedFilter($days);
			$visit = $this->showleads->visitFilter($days);
			$deal = $this->showleads->dealFilter($days);
			$dealOnly = $this->showleads->dealOnly($days);
			$reserve = $this->showleads->reserveFilter($days);
			$booking = $this->showleads->bookingFilter($days);
		}


		$data = [

			'leads' => $leads,
			'notifNew'=> $notifNew,
			// chart
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			// end chart

			// 'leads' => $this->showleads->all(),
			'new' => $new,
			'close' =>  $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'user_group' => $this->showusers,
			'project' => $this->showproject,
			'days' => "Last $days Days",
			'title' => 'Leads Report'
		];

		return view('report/leads', $data);
	}


	public function exportLeadsFilter($days)
	{

		// if(in_groups('admin')) :

		$leads = $this->showleads->allFilter($days);

		$leadsNew = $this->chartleads->leadsNew($days);
		$leadsClose = $this->chartleads->leadsClose($days);
		$leadsPending = $this->chartleads->leadsPending($days);
		$leadsContacted = $this->chartleads->leadsContacted($days);
		$leadsVisit = $this->chartleads->leadsVisit($days);
		$leadsDeal = $this->chartleads->leadsDeal($days);
		$leadsReserve = $this->chartleads->leadsReserve($days);
		$leadsBooking = $this->chartleads->leadsBooking($days);

		$new = $this->showleads->newFilter($days);
		$close = $this->showleads->closeFilter($days);
		$pending = $this->showleads->pendingFilter($days);
		$contacted = $this->showleads->contactedFilter($days);
		$visit = $this->showleads->visitFilter($days);
		$deal = $this->showleads->dealFilter($days);
		$dealOnly = $this->showleads->dealOnly($days);
		$reserve = $this->showleads->reserveFilter($days);
		$booking = $this->showleads->bookingFilter($days);

		
		$data = [

			'leads' => $leads,

			// chart
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			// end chart

			// 'leads' => $this->showleads->all(),
			'new' => $new,
			'close' =>  $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'user_group' => $this->showusers,
			'project' => $this->showproject,
			'days' => "Last $days Days",
			'title' => 'Report'
		];

		return view('report/export_leads', $data);
	}



	public function range()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$id = user()->id;

		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$leads = $this->showleads->rangeListAdminGroup($group['groups'],$startDate, $endDate);
					$leadsNew = $this->chartleads->leadsNewRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsClose = $this->chartleads->leadsCloseRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsPending = $this->chartleads->leadsPendingRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsContacted = $this->chartleads->leadsContactedRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsVisit = $this->chartleads->leadsVisitRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsDeal = $this->chartleads->leadsDealRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsReserve = $this->chartleads->leadsReserveRangeAdminGroup($group['groups'],$startDate, $endDate);
					$leadsBooking = $this->chartleads->leadsBookingRangeAdminGroup($group['groups'],$startDate, $endDate);

					$new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
					$close = $this->showleads->closeRangeAdminGroup($group['groups'],$startDate, $endDate);
					$pending = $this->showleads->pendingRangeAdminGroup($group['groups'],$startDate, $endDate);
					$contacted = $this->showleads->contactedRangeAdminGroup($group['groups'],$startDate, $endDate);
					$visit = $this->showleads->visitRangeAdminGroup($group['groups'],$startDate, $endDate);
					$deal = $this->showleads->dealRangeAdminGroup($group['groups'],$startDate, $endDate);
					$dealOnly = $this->showleads->dealOnlyRangeAdminGroup($group['groups'],$startDate, $endDate);
					$reserve = $this->showleads->reserveRangeAdminGroup($group['groups'],$startDate, $endDate);
					$booking = $this->showleads->bookingRangeAdminGroup($group['groups'],$startDate, $endDate);

				}else{
					$notifNew = $this->showleads->notifNew();
					$leads = $this->showleads->rangeList($startDate, $endDate);
					$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
					$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
					$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
					$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
					$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
					$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
					$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
					$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

					$new = $this->showleads->newRange($startDate, $endDate);
					$close = $this->showleads->closeRange($startDate, $endDate);
					$pending = $this->showleads->pendingRange($startDate, $endDate);
					$contacted = $this->showleads->contactedRange($startDate, $endDate);
					$visit = $this->showleads->visitRange($startDate, $endDate);
					$deal = $this->showleads->dealRange($startDate, $endDate);
					$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
					$reserve = $this->showleads->reserveRange($startDate, $endDate);
					$booking = $this->showleads->bookingRange($startDate, $endDate);
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$leads = $this->showleads->rangeList($startDate, $endDate);
			$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
			$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
			$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
			$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
			$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
			$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
			$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
			$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

			$new = $this->showleads->newRange($startDate, $endDate);
			$close = $this->showleads->closeRange($startDate, $endDate);
			$pending = $this->showleads->pendingRange($startDate, $endDate);
			$contacted = $this->showleads->contactedRange($startDate, $endDate);
			$visit = $this->showleads->visitRange($startDate, $endDate);
			$deal = $this->showleads->dealRange($startDate, $endDate);
			$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
			$reserve = $this->showleads->reserveRange($startDate, $endDate);
			$booking = $this->showleads->bookingRange($startDate, $endDate);
		}


		$data = [

				'leads' => $leads,
				'notifNew' => $notifNew,
				'leadsNew' => $leadsNew,
				'leadsClose' => $leadsClose,
				'leadsPending' => $leadsPending,
				'leadsContacted' => $leadsContacted,
				'leadsVisit' => $leadsVisit,
				'leadsDeal' => $leadsDeal,
				'leadsReserve' => $leadsReserve,
				'leadsBooking' => $leadsBooking,

				'new' => $new,
				'close' => $close,
				'pending' => $pending,
				'contacted' => $contacted,
				'visit' => $visit,
				'deal' => $deal,
				'dealOnly' => $dealOnly,
				'reserve' => $reserve,
				'booking' => $booking,
				'project' => $this->showproject,
				'user_group' => $this->showusers,
				'days' => "$startDate - $endDate",
				'title' => 'Report'
			];

		return view('report/leads', $data);
	}


	public function exportRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		// if (in_groups('admin')) :
		$leads = $this->showleads->rangeList($startDate, $endDate);
		$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
		$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
		$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
		$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
		$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
		$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
		$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
		$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

		$new = $this->showleads->newRange($startDate, $endDate);
		$close = $this->showleads->closeRange($startDate, $endDate);
		$pending = $this->showleads->pendingRange($startDate, $endDate);
		$contacted = $this->showleads->contactedRange($startDate, $endDate);
		$visit = $this->showleads->visitRange($startDate, $endDate);
		$deal = $this->showleads->dealRange($startDate, $endDate);
		$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
		$reserve = $this->showleads->reserveRange($startDate, $endDate);
		$booking = $this->showleads->bookingRange($startDate, $endDate);
		// endif;

		// if (in_groups('users')) :

		// 	$id = user()->id;


		// 	if (empty($this->showgroupsales->user($id)->getResultArray())) {
		// 		$leads = $this->showleads->rangeList($startDate, $endDate);
		// 		$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
		// 		$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
		// 		$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
		// 		$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
		// 		$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
		// 		$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
		// 		$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
		// 		$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

		// 		$new = $this->showleads->newRange($startDate, $endDate);
		// 		$close = $this->showleads->closeRange($startDate, $endDate);
		// 		$pending = $this->showleads->pendingRange($startDate, $endDate);
		// 		$contacted = $this->showleads->contactedRange($startDate, $endDate);
		// 		$visit = $this->showleads->visitRange($startDate, $endDate);
		// 		$deal = $this->showleads->dealRange($startDate, $endDate);
		// 		$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
		// 		$reserve = $this->showleads->reserveRange($startDate, $endDate);
		// 		$booking = $this->showleads->bookingRange($startDate, $endDate);
		// 	}

		// 	if (!empty($this->showgroupsales->user($id)->getResultArray())) {

		// 	foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
		// 			if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

		// 			$leads = $this->showleads->rangeListAdminGroup($group['groups'],$startDate, $endDate);
		// 			$leadsNew = $this->chartleads-> leadsNewRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsClose = $this->chartleads-> leadsCloseRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsPending = $this->chartleads-> leadsPendingRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsContacted = $this->chartleads-> leadsContactedRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsVisit = $this->chartleads-> leadsVisitRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsDeal = $this->chartleads-> leadsDealRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsReserve = $this->chartleads-> leadsReserveRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$leadsBooking = $this->chartleads-> leadsBookingRangeAdminGroup($group['groups'], $startDate, $endDate);

		// 			$new = $this->showleads-> newRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$close = $this->showleads-> closeRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$pending = $this->showleads-> pendingRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$contacted = $this->showleads-> contactedRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$visit = $this->showleads-> visitRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$deal = $this->showleads-> dealRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$dealOnly = $this->showleads-> dealOnlyRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$reserve = $this->showleads-> reserveRangeAdminGroup($group['groups'], $startDate, $endDate);
		// 			$booking = $this->showleads-> bookingRangeAdminGroup($group['groups'], $startDate, $endDate);

		// 		}


		// 			if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {


		// 			$leads = $this->showleads->rangeListAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsNew = $this->chartleads->leadsNewRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsClose = $this->chartleads->leadsCloseRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsPending = $this->chartleads->leadsPendingRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsContacted = $this->chartleads->leadsContactedRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsVisit = $this->chartleads->leadsVisitRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsDeal = $this->chartleads->leadsDealRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsReserve = $this->chartleads->leadsReserveRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$leadsBooking = $this->chartleads->leadsBookingRangeAdminProject($group['project'], $startDate, $endDate);

		// 			$new = $this->showleads->newRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$close = $this->showleads->closeRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$pending = $this->showleads->pendingRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$contacted = $this->showleads->contactedRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$visit = $this->showleads->visitRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$deal = $this->showleads->dealRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$dealOnly = $this->showleads->dealOnlyRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$reserve = $this->showleads->reserveRangeAdminProject($group['project'], $startDate, $endDate);
		// 			$booking = $this->showleads->bookingRangeAdminProject($group['project'], $startDate, $endDate);

		// 		}
		// 		// else{
		// 		// 	$leads = $this->showleads->rangeList($startDate, $endDate);
		// 		// 	$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
		// 		// 	$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
		// 		// 	$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
		// 		// 	$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
		// 		// 	$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
		// 		// 	$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
		// 		// 	$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
		// 		// 	$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

		// 		// 	$new = $this->showleads->newRange($startDate, $endDate);
		// 		// 	$close = $this->showleads->closeRange($startDate, $endDate);
		// 		// 	$pending = $this->showleads->pendingRange($startDate, $endDate);
		// 		// 	$contacted = $this->showleads->contactedRange($startDate, $endDate);
		// 		// 	$visit = $this->showleads->visitRange($startDate, $endDate);
		// 		// 	$deal = $this->showleads->dealRange($startDate, $endDate);
		// 		// 	$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
		// 		// 	$reserve = $this->showleads->reserveRange($startDate, $endDate);
		// 		// 	$booking = $this->showleads->bookingRange($startDate, $endDate);
		// 		// }
		// 	}
		// }
		// endif;

		$data = [

			'leads' => $leads,
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,

			'new' => $new,
			'close' => $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'project' => $this->showproject,
			'user_group' => $this->showusers,
			'days' => "$startDate - $endDate",
			'title' => 'Report'
		];

		return view('report/export_leads', $data);
	}


	public function search_report()
	{

		$search =  $this->request->getVar('search_report');

			$leads = $this->chartleads->search_report($search);

			$leadsNew = $this->chartleads->leadsNew('30');
			$leadsClose = $this->chartleads->leadsClose('30');
			$leadsPending = $this->chartleads->leadsPending('30');
			$leadsContacted = $this->chartleads->leadsContacted('30');
			$leadsVisit = $this->chartleads->leadsVisit('30');
			$leadsDeal = $this->chartleads->leadsDeal('30');
			$leadsReserve = $this->chartleads->leadsReserve('30');
			$leadsBooking = $this->chartleads->leadsBooking('30');

			$new = $this->showleads->newFilter('30');
			$close = $this->showleads->closeFilter('30');
			$pending = $this->showleads->pendingFilter('30');
			$contacted = $this->showleads->contactedFilter('30');
			$visit = $this->showleads->visitFilter('30');
			$deal = $this->showleads->dealFilter('30');
			$dealOnly = $this->showleads->dealOnly('30');
			$reserve = $this->showleads->reserveFilter('30');
			$booking = $this->showleads->bookingFilter('30');

		


		$data = [
			'leads' => $leads,
	
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,

			'new' => $new,
			'close' => $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'project' => $this->showproject,
			'user_group' => $this->showusers,
			'days' => "Search Result",
			'title' => 'Report'
		];

		return view('report/export_leads', $data);
	}


		/////////////////// REPORT PROJECT /////////////////////////

	

	public function projectFilter($days)
	{

		$id = user()->id;


		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$leads = $this->showleads->projectFilterAdminGroup($group['groups'],$days);
					$new =  $this->showleads->newFilterAdminGroup($group['groups'],$days);
				}else{
					$notifNew = $this->showleads->notifNew();
					$leads = $this->showleads->projectFilter($days);
					$new =  $this->showleads->newFilter($days);
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$leads = $this->showleads->projectFilter($days);
			$new =  $this->showleads->newFilter($days);
		}
		

		$data = [
			'leads' => $leads,
			'notifNew' => $notifNew,
			'new' => $new,
			'project' => $this->chartleads,
			'projectid' => $this->showproject,
			'filter' => $days,
			'days' => "last $days Days",
			'title' => 'Project Report'
		];

		return view('report/project', $data);
	}


	public function projectRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$id = user()->id;


		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$leads = $this->showleads->projectRangeAdminGroup($group['groups'],$startDate, $endDate);
					$new =  $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
				}else{
					$notifNew = $this->showleads->notifNew();
					$leads = $this->showleads->projectRange($startDate, $endDate);
					$new =  $this->showleads->newRange($startDate, $endDate);
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$leads = $this->showleads->projectRange($startDate, $endDate);
			$new =  $this->showleads->newRange($startDate, $endDate);
		}


		$data = [
			'leads' => $leads,
			'notifNew' => $notifNew,
			// 'leads' => $this->showleads->all(),
			'new' => $new,
			'project' => $this->chartleads,
			'projectid' => $this->showproject,
			'startDate' => $startDate,
			'endDate'=> $endDate,
			'days' => "$startDate - $endDate",
			'title' => 'Project Report'
		];

		return view('report/project_range', $data);
	}




	/////////////////// REPORT SOURCE /////////////////////////


	public function sourceFilter($count)
	{


		$id = user()->id;


		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$new = $this->showleads->newAdminGroup($group['groups']);
				}else{
					$notifNew = $this->showleads->notifNew();
					$new = $this->showleads->new();
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$new = $this->showleads->new();
		}
	
			
		

		$data = [
			'new' => $new,
			'notifNew' => $notifNew,
			'source' => $this->chartleads,
			'group' => $this->showgroupsales,
			'count' => "$count",
			'days' => "Last $count Days",
			'title' => 'Source Report'
		];

		return view('report/source', $data);
	}

	public function sourceRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$id = user()->id;


		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "management" || $group['level'] == "admin_group") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$new = $this->showleads->newAdminGroup($group['groups']);
				}else{
					$notifNew = $this->showleads->notifNew();
					$new = $this->showleads->new();
				}
			}
		}else{
			$notifNew = $this->showleads->notifNew();
			$new = $this->showleads->new();
		}
		
		

		$data = [
			'new' => $new,
			'notifNew' => $notifNew,
			'group' => $this->showgroupsales,
			'source' => $this->chartleads,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'count' => "$startDate - $endDate",
			'days' => "$startDate - $endDate",
			'title' => 'Source Report'
		];

		return view('report/source_range', $data);
	}


	/////////////////// REPORT SALES /////////////////////////


	//

	public function sales()
	{

		if(in_groups('admin')):
			$new = $this->showleads->new();
			$sales = $this->showgroupsales->all();
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			// if (empty($this->showgroupsales->user($id)->getResultArray())) {
			// 	$new = $this->showleads->new();
			// 	$sales = $this->showgroupsales->all();
			// }

		
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

				if ($group['level'] == "admin_group" || $group['level'] == "general_manager" || $group['level'] == "management") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$new = $this->showleads->newAdminGroup($group['groups']);
					$sales = $this->showgroupsales->group_report($group['groups']);
					
				}

				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$notifNew = $this->showleads->notifNew();
					$new = $this->showleads->newAdminProject($group['project']);
					$sales = $this->showgroupsales->project($group['project']);
				} 

				$level = $group['level'];
			}
		
		endif;

		$data = [
			'new' => $new,
			'notifNew'=>$notifNew,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'level' => $level,
			'days' => 'last 30 Days',
			'title' => 'Sales Report'
		];

		return view('report/report_sales', $data);
	}


	public function salesFilter($days)
	{

		if (in_groups('admin')) :
			$notifNew = $this->showleads->notifNew();
			$all = $this->showleads->salesFilter($days);
			$new = $this->showleads->newFilter($days);
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group" || $group['level'] == "general_manager"|| $group['level'] == "management") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$all = $this->showleads->allFilterAdminGroup($group['groups'], $days);
					$new = $this->showleads->newFilterAdminGroup($group['groups'],$days);
					$sales = $this->showgroupsales->group_report($group['groups']);
					$leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], $days);
					$leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], $days);

				}else{
					$notifNew = $this->showleads->notifNew();
					$all = $this->showleads->allFilter($days);
					$new = $this->showleads->newFilter($days);
					$sales = $this->showgroupsales->project($group['project']);
					$leadsReserve = $this->chartleads->leadsReserve($days);
					$leadsBooking = $this->chartleads->leadsBooking($days);
				}
				
				$level = $group['level'];
			}
		endif;

		$data = [
			'all' => $all,
			'notifNew' => $notifNew,
			'new' => $new,
			'days' => $days,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'level' => $level,
			'day' => "last $days Days",
			'title' => 'Sales Report'
		];

		return view('report/report_sales', $data);
	}


	public function salesRange()
	{


		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		if (in_groups('admin')) :
			$notifNew = $this->showleads->notifNew();
			$new = $this->showleads->newRange($startDate, $endDate);
		endif;

		if (in_groups('users')) :
			$id = user()->id;
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

				if ($group['level'] == "admin_group" || $group['level'] == "general_manager"|| $group['level'] == "management") {
					$notifNew = $this->showleads->notifNewAdminGroup($group['groups']);
					$new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
					$sales = $this->showgroupsales->group_report($group['groups']);
					$leadsReserve = $this->chartleads->leadsReserveRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsBooking = $this->chartleads->leadsBookingRangeAdminGroup($group['groups'], $startDate, $endDate);
				}

				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {


					$notifNew = $this->showleads->notifNew();
					$new = $this->showleads->newRange($startDate, $endDate);
					$sales = $this->showgroupsales->project($group['project']);
					$leadsReserve = $this->chartleads->leadsReserve($startDate, $endDate);
					$leadsBooking = $this->chartleads->leadsBooking($startDate, $endDate);

				} 
				$level = $group['level'];
			}
		endif;

		$data = [
			'new' => $new,
			'notifNew'=> $notifNew,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'level' => $level,
			'day' => "$startDate - $endDate",
			'title' => 'Sales Report'
		];

		return view('report/report_sales_range', $data);
	}

}
