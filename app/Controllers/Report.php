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

		if(in_groups('admin')) :

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

		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {

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
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {


			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				
				if ($group['level'] == "admin_group" || $group['level'] == "general_manager" ) {

					$leads = $this->showleads->allFilterAdminGroup($group['groups'],$days);

					$leadsNew = $this->chartleads->leadsNewAdminGroup($group['groups'], $days);
					$leadsClose = $this->chartleads->leadsCloseAdminGroup($group['groups'], $days);
					$leadsPending = $this->chartleads->leadsPendingAdminGroup($group['groups'], $days);
					$leadsContacted = $this->chartleads->leadsContactedAdminGroup($group['groups'], $days);
					$leadsVisit = $this->chartleads->leadsVisitAdminGroup($group['groups'], $days);
					$leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], $days);
					$leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], $days);
					$leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'],$days);

					$new = $this->showleads->newFilterAdminGroup($group['groups'], $days);
					$close = $this->showleads->closeFilterAdminGroup($group['groups'], $days);
					$pending = $this->showleads->pendingFilterAdminGroup($group['groups'], $days);
					$contacted = $this->showleads->contactedFilterAdminGroup($group['groups'], $days);
					$visit = $this->showleads->visitFilterAdminGroup($group['groups'], $days);
					$deal = $this->showleads->dealFilterAdminGroup($group['groups'], $days);
					$dealOnly = $this->showleads->dealOnlyAdminGroup($group['groups'],$days);
					$reserve = $this->showleads->reserveFilterAdminGroup($group['groups'], $days);
					$booking = $this->showleads->bookingFilterAdminGroup($group['groups'], $days);

				} 
				
				
				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {

					$leads = $this->showleads->allFilterAdminProject($group['project'], $days);

					$leadsNew = $this->chartleads->leadsNewAdminProject($group['project'], $days);
					$leadsClose = $this->chartleads->leadsCloseAdminProject($group['project'], $days);
					$leadsPending = $this->chartleads->leadsPendingAdminProject($group['project'], $days);
					$leadsContacted = $this->chartleads->leadsContactedAdminProject($group['project'], $days);
					$leadsVisit = $this->chartleads->leadsVisitAdminProject($group['project'], $days);
					$leadsDeal = $this->chartleads->leadsDealAdminProject($group['project'], $days);
					$leadsReserve = $this->chartleads->leadsReserveAdminProject($group['project'], $days);
					$leadsBooking = $this->chartleads->leadsBookingAdminProject($group['project'],$days);

					$new = $this->showleads->newFilterAdminProject($group['project'], $days);
					$close = $this->showleads->closeFilterAdminProject($group['project'], $days);
					$pending = $this->showleads->pendingFilterAdminProject($group['project'], $days);
					$contacted = $this->showleads->contactedFilterAdminProject($group['project'], $days);
					$visit = $this->showleads->visitFilterAdminProject($group['project'], $days);
					$deal = $this->showleads->dealFilterAdminProject($group['project'], $days);
					$dealOnly = $this->showleads->dealOnlyAdminProject($group['project'], $days);
					$reserve = $this->showleads->reserveFilterAdminProject($group['project'], $days);
					$booking = $this->showleads->bookingFilterAdminProject($group['project'], $days);
					
				} 
				
				// else {
				// 	$leads = $this->showleads->allFilter($days);

				// 	$leadsNew = $this->chartleads->leadsNew($days);
				// 	$leadsClose = $this->chartleads->leadsClose($days);
				// 	$leadsPending = $this->chartleads->leadsPending($days);
				// 	$leadsContacted = $this->chartleads->leadsContacted($days);
				// 	$leadsVisit = $this->chartleads->leadsVisit($days);
				// 	$leadsDeal = $this->chartleads->leadsDeal($days);
				// 	$leadsReserve = $this->chartleads->leadsReserve($days);
				// 	$leadsBooking = $this->chartleads->leadsBooking($days);

				// 	$new = $this->showleads->newFilter($days);
				// 	$close = $this->showleads->closeFilter($days);
				// 	$pending = $this->showleads->pendingFilter($days);
				// 	$contacted = $this->showleads->contactedFilter($days);
				// 	$visit = $this->showleads->visitFilter($days);
				// 	$deal = $this->showleads->dealFilter($days);
				// 	$dealOnly = $this->showleads->dealOnly($days);
				// 	$reserve = $this->showleads->reserveFilter($days);
				// 	$booking = $this->showleads->bookingFilter($days);

				// }
			}
		}
		endif;

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

		return view('report/leads', $data);
	}



	public function range()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		if (in_groups('admin')) :
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
		endif;

		if (in_groups('users')) :

			$id = user()->id;


			if (empty($this->showgroupsales->user($id)->getResultArray())) {
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

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

					$leads = $this->showleads->rangeListAdminGroup($group['groups'],$startDate, $endDate);
					$leadsNew = $this->chartleads-> leadsNewRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsClose = $this->chartleads-> leadsCloseRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsPending = $this->chartleads-> leadsPendingRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsContacted = $this->chartleads-> leadsContactedRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsVisit = $this->chartleads-> leadsVisitRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsDeal = $this->chartleads-> leadsDealRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsReserve = $this->chartleads-> leadsReserveRangeAdminGroup($group['groups'], $startDate, $endDate);
					$leadsBooking = $this->chartleads-> leadsBookingRangeAdminGroup($group['groups'], $startDate, $endDate);

					$new = $this->showleads-> newRangeAdminGroup($group['groups'], $startDate, $endDate);
					$close = $this->showleads-> closeRangeAdminGroup($group['groups'], $startDate, $endDate);
					$pending = $this->showleads-> pendingRangeAdminGroup($group['groups'], $startDate, $endDate);
					$contacted = $this->showleads-> contactedRangeAdminGroup($group['groups'], $startDate, $endDate);
					$visit = $this->showleads-> visitRangeAdminGroup($group['groups'], $startDate, $endDate);
					$deal = $this->showleads-> dealRangeAdminGroup($group['groups'], $startDate, $endDate);
					$dealOnly = $this->showleads-> dealOnlyRangeAdminGroup($group['groups'], $startDate, $endDate);
					$reserve = $this->showleads-> reserveRangeAdminGroup($group['groups'], $startDate, $endDate);
					$booking = $this->showleads-> bookingRangeAdminGroup($group['groups'], $startDate, $endDate);

				}


					if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {


					$leads = $this->showleads->rangeListAdminProject($group['project'], $startDate, $endDate);
					$leadsNew = $this->chartleads->leadsNewRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsClose = $this->chartleads->leadsCloseRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsPending = $this->chartleads->leadsPendingRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsContacted = $this->chartleads->leadsContactedRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsVisit = $this->chartleads->leadsVisitRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsDeal = $this->chartleads->leadsDealRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsReserve = $this->chartleads->leadsReserveRangeAdminProject($group['project'], $startDate, $endDate);
					$leadsBooking = $this->chartleads->leadsBookingRangeAdminProject($group['project'], $startDate, $endDate);

					$new = $this->showleads->newRangeAdminProject($group['project'], $startDate, $endDate);
					$close = $this->showleads->closeRangeAdminProject($group['project'], $startDate, $endDate);
					$pending = $this->showleads->pendingRangeAdminProject($group['project'], $startDate, $endDate);
					$contacted = $this->showleads->contactedRangeAdminProject($group['project'], $startDate, $endDate);
					$visit = $this->showleads->visitRangeAdminProject($group['project'], $startDate, $endDate);
					$deal = $this->showleads->dealRangeAdminProject($group['project'], $startDate, $endDate);
					$dealOnly = $this->showleads->dealOnlyRangeAdminProject($group['project'], $startDate, $endDate);
					$reserve = $this->showleads->reserveRangeAdminProject($group['project'], $startDate, $endDate);
					$booking = $this->showleads->bookingRangeAdminProject($group['project'], $startDate, $endDate);

				}
				// else{
				// 	$leads = $this->showleads->rangeList($startDate, $endDate);
				// 	$leadsNew = $this->chartleads->leadsNewRange($startDate, $endDate);
				// 	$leadsClose = $this->chartleads->leadsCloseRange($startDate, $endDate);
				// 	$leadsPending = $this->chartleads->leadsPendingRange($startDate, $endDate);
				// 	$leadsContacted = $this->chartleads->leadsContactedRange($startDate, $endDate);
				// 	$leadsVisit = $this->chartleads->leadsVisitRange($startDate, $endDate);
				// 	$leadsDeal = $this->chartleads->leadsDealRange($startDate, $endDate);
				// 	$leadsReserve = $this->chartleads->leadsReserveRange($startDate, $endDate);
				// 	$leadsBooking = $this->chartleads->leadsBookingRange($startDate, $endDate);

				// 	$new = $this->showleads->newRange($startDate, $endDate);
				// 	$close = $this->showleads->closeRange($startDate, $endDate);
				// 	$pending = $this->showleads->pendingRange($startDate, $endDate);
				// 	$contacted = $this->showleads->contactedRange($startDate, $endDate);
				// 	$visit = $this->showleads->visitRange($startDate, $endDate);
				// 	$deal = $this->showleads->dealRange($startDate, $endDate);
				// 	$dealOnly = $this->showleads->dealOnlyRange($startDate, $endDate);
				// 	$reserve = $this->showleads->reserveRange($startDate, $endDate);
				// 	$booking = $this->showleads->bookingRange($startDate, $endDate);
				// }
			}
		}
		endif;

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

		return view('report/leads', $data);
	}


	public function search_report()
	{

		$search =  $this->request->getVar('search_report');



		if (in_groups('admin')) :

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

		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
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
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {


			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

					$leads = $this->chartleads->search_report_admin_project($group['groups'], $search);

					$leadsNew = $this->chartleads->leadsNewAdminGroup($group['groups'], '30');
					$leadsClose = $this->chartleads->leadsCloseAdminGroup($group['groups'], '30');
					$leadsPending = $this->chartleads->leadsPendingAdminGroup($group['groups'], '30');
					$leadsContacted = $this->chartleads->leadsContactedAdminGroup($group['groups'], '30');
					$leadsVisit = $this->chartleads->leadsVisitAdminGroup($group['groups'], '30');
					$leadsDeal = $this->chartleads->leadsDealAdminGroup($group['groups'], '30');
					$leadsReserve = $this->chartleads->leadsReserveAdminGroup($group['groups'], '30');
					$leadsBooking = $this->chartleads->leadsBookingAdminGroup($group['groups'], '30');

					$new = $this->showleads->newFilterAdminGroup($group['groups'], '30');
					$close = $this->showleads->closeFilterAdminGroup($group['groups'], '30');
					$pending = $this->showleads->pendingFilterAdminGroup($group['groups'], '30');
					$contacted = $this->showleads->contactedFilterAdminGroup($group['groups'], '30');
					$visit = $this->showleads->visitFilterAdminGroup($group['groups'], '30');
					$deal = $this->showleads->dealFilterAdminGroup($group['groups'], '30');
					$dealOnly = $this->showleads->dealOnlyAdminGroup($group['groups'], '30');
					$reserve = $this->showleads->reserveFilterAdminGroup($group['groups'], '30');
					$booking = $this->showleads->bookingFilterAdminGroup($group['groups'], '30');
				}


					if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {

					$leads = $this->chartleads->search_report_admin_project($group['project'],$search);

					$leadsNew = $this->chartleads->leadsNewAdminProject($group['project'], '30');
					$leadsClose = $this->chartleads->leadsCloseAdminProject($group['project'], '30');
					$leadsPending = $this->chartleads->leadsPendingAdminProject($group['project'], '30');
					$leadsContacted = $this->chartleads->leadsContactedAdminProject($group['project'], '30');
					$leadsVisit = $this->chartleads->leadsVisitAdminProject($group['project'], '30');
					$leadsDeal = $this->chartleads->leadsDealAdminProject($group['project'], '30');
					$leadsReserve = $this->chartleads->leadsReserveAdminProject($group['project'], '30');
					$leadsBooking = $this->chartleads->leadsBookingAdminProject($group['project'], '30');

					$new = $this->showleads->newFilterAdminProject($group['project'], '30');
					$close = $this->showleads->closeFilterAdminProject($group['project'], '30');
					$pending = $this->showleads->pendingFilterAdminProject($group['project'], '30');
					$contacted = $this->showleads->contactedFilterAdminProject($group['project'], '30');
					$visit = $this->showleads->visitFilterAdminProject($group['project'], '30');
					$deal = $this->showleads->dealFilterAdminProject($group['project'], '30');
					$dealOnly = $this->showleads->dealOnlyAdminProject($group['project'], '30');
					$reserve = $this->showleads->reserveFilterAdminProject($group['project'], '30');
					$booking = $this->showleads->bookingFilterAdminProject($group['project'], '30');
				} 
				
				// else {
				// 	$leads = $this->chartleads->search_report($search);

				// 	$leadsNew = $this->chartleads->leadsNew('30');
				// 	$leadsClose = $this->chartleads->leadsClose('30');
				// 	$leadsPending = $this->chartleads->leadsPending('30');
				// 	$leadsContacted = $this->chartleads->leadsContacted('30');
				// 	$leadsVisit = $this->chartleads->leadsVisit('30');
				// 	$leadsDeal = $this->chartleads->leadsDeal('30');
				// 	$leadsReserve = $this->chartleads->leadsReserve('30');
				// 	$leadsBooking = $this->chartleads->leadsBooking('30');

				// 	$new = $this->showleads->newFilter('30');
				// 	$close = $this->showleads->closeFilter('30');
				// 	$pending = $this->showleads->pendingFilter('30');
				// 	$contacted = $this->showleads->contactedFilter('30');
				// 	$visit = $this->showleads->visitFilter('30');
				// 	$deal = $this->showleads->dealFilter('30');
				// 	$dealOnly = $this->showleads->dealOnly('30');
				// 	$reserve = $this->showleads->reserveFilter('30');
				// 	$booking = $this->showleads->bookingFilter('30');
				// }
			}
		}
		endif;



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

		return view('report/leads', $data);
	}


		/////////////////// REPORT PROJECT /////////////////////////

	

	public function projectFilter($days)
	{

		if (in_groups('admin')) :
			$leads = $this->showleads->projectFilter($days);
			$new =  $this->showleads->newFilter($days);
		endif;
		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$leads = $this->showleads->projectFilter($days);
				$new =  $this->showleads->newFilter($days);
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {


			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

					if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
					$leads = $this->showleads->projectFilterAdminGroup($group['groups'],$days);
					$new =  $this->showleads->newFilterAdminGroup($group['groups'], $days);
				}

					if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$leads = $this->showleads->projectFilterAdminProject($group['project'], $days);
					$new =  $this->showleads->newFilterAdminProject($group['project'], $days);
				} 
				
				// else {
				// 	$leads = $this->showleads->projectFilter($days);
				// 	$new =  $this->showleads->newFilter($days);
				// }
			}
		}
		endif;


		$data = [
			'leads' => $leads,
			// 'leads' => $this->showleads->all(),
			'new' => $new,
			'project' => $this->chartleads,
			'projectid' => $this->showproject,
			'filter' => $days,
			'title' => 'Report'
		];

		return view('report/project', $data);
	}


	public function projectRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');


		if (in_groups('admin')) :
			$leads = $this->showleads->projectRange($startDate, $endDate);
			$new =  $this->showleads->newRange($startDate, $endDate);
		endif;
		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$leads = $this->showleads->projectRange($startDate, $endDate);
				$new =  $this->showleads->newRange($startDate, $endDate);
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {


			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

				if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
					$leads = $this->showleads->projectRangeAdminGroup($group['groups'], $startDate, $endDate);
					$new =  $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
				}

					if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$leads = $this->showleads->projectRangeAdminProject($group['project'],$startDate, $endDate);
					$new =  $this->showleads->newRangeAdminProject($group['project'],$startDate, $endDate);
				}
				
				// else {
				// 	$leads = $this->showleads->projectRange($startDate, $endDate);
				// 	$new =  $this->showleads->newRange($startDate, $endDate);
				// }
			}
		}
		endif;


		$data = [
			'leads' => $leads,
			// 'leads' => $this->showleads->all(),
			'new' => $new,
			'project' => $this->chartleads,
			'projectid' => $this->showproject,
			'startDate' => $startDate,
			'endDate'=> $endDate,
			'title' => 'Report'
		];

		return view('report/project_range', $data);
	}



	public function projectStatus()
	{
		$data = [
			'leads' => $this->showleads->orderBy('id', 'desc')->findAll(),
			// 'leads' => $this->showleads->all(),
			'new' => $this->showleads->new(),
			'project' => $this->chartleads,
			'title' => 'Report'
		];

		return view('report/project', $data);
	}


	/////////////////// REPORT SOURCE /////////////////////////


	public function sourceFilter($count)
	{

		if (in_groups('admin')) :
			$new = $this->showleads->new();
		endif;


		if (in_groups('users')) :
				$id = user()->id;
			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
					$new = $this->showleads->newAdminGroup($group['groups']);
				}
				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$new = $this->showleads->newAdminProject($group['project']);
				}
				//  else {
				// 	$new = $this->showleads->new();
				// }
			}
		}

		endif;

		$data = [
			'new' => $new,
			'source' => $this->chartleads,
			'group' => $this->showgroupsales,
			'count' => "$count",
			'title' => 'Report'
		];

		return view('report/source', $data);
	}

	public function sourceRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');


		if (in_groups('admin')) :
			$new = $this->showleads->new();
		endif;


		if (in_groups('users')) :
			$id = user()->id;
			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {
					$new = $this->showleads->newAdminGroup($group['groups']);
				}
					if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$new = $this->showleads->newAdminProject($group['project']);
				} 
				// else {
				// 	$new = $this->showleads->new();
				// }
			}
		}

		endif;


		$data = [
			'new' => $new,
			'group' => $this->showgroupsales,
			'source' => $this->chartleads,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'count' => "$startDate - $endDate",
			'title' => 'Report'
		];

		return view('report/source_range', $data);
	}


	/////////////////// REPORT SALES /////////////////////////


	public function sales()
	{

		if(in_groups('admin')):
			$new = $this->showleads->new();
			$sales = $this->showgroupsales->all();
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
				$sales = $this->showgroupsales->all();
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

				if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

					$new = $this->showleads->newAdminGroup($group['groups']);
					$sales = $this->showgroupsales->group_report($group['groups']);
				}

				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$new = $this->showleads->newAdminProject($group['project']);
					$sales = $this->showgroupsales->project($group['project']);
				} 
				// else {
				// 	$new = $this->showleads->new();
				// 	$sales = $this->showgroupsales->group($group['groups'], $group['project']);
				// }
				$level = $group['level'];
			}
		}
		endif;

		$data = [
			'new' => $new,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'level' => $level,
			'days' => 'last 30 Days',
			'title' => 'Report'
		];

		return view('report/report_sales', $data);
	}


	public function salesFilter($days)
	{

		if (in_groups('admin')) :
			$all = $this->showleads->salesFilter($days);
			$new = $this->showleads->newFilter($days);
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

					$all = $this->showleads->allFilterAdminGroup($group['groups'], $days);
					$new = $this->showleads->newFilterAdminGroup($group['groups'],$days);
					$sales = $this->showgroupsales->group_report($group['groups']);
				}

				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$all = $this->showleads->allFilterAdminProject($group['project'], $days);
					$new = $this->showleads->newFilterAdminProject($group['project'], $days);
					$sales = $this->showgroupsales->project($group['project']);
				} 
				
				// else {
				// 	$all = $this->showleads->salesFilter($days);
				// 	$new = $this->showleads->newFilter($days);
				// 	$sales = $this->showgroupsales->group($group['groups'], $group['project']);
				// }
				$level = $group['level'];
			}
		endif;

		$data = [
			'all' => $all,
			'new' => $new,
			'days' => $days,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'level' => $level,
			'day' => "last $days Days",
			'title' => 'Report'
		];

		return view('report/report_sales', $data);
	}


	public function salesRange()
	{


		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		if (in_groups('admin')) :
			$new = $this->showleads->newRange($startDate, $endDate);
		endif;

		if (in_groups('users')) :
			$id = user()->id;
			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {

				if ($group['level'] == "admin_group" || $group['level'] == "general_manager") {

					$new = $this->showleads->newRangeAdminGroup($group['groups'],$startDate, $endDate);
					$sales = $this->showgroupsales->group_report($group['groups']);
				}

				if ($group['level'] == "admin_project" || $group['level'] == "manager" || $group['level'] == "sales") {
					$new = $this->showleads->newRangeAdminProject($group['project'],$startDate, $endDate);
					$sales = $this->showgroupsales->project($group['project']);
				} 
				// else {
				// 	$new = $this->showleads->newRange($startDate, $endDate);
				// 	$sales = $this->showgroupsales->group($group['groups'], $group['project']);
				// }
				$level = $group['level'];
			}
		endif;

		$data = [
			'new' => $new,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'sales' => $sales, //not admin
			'user' => $this->showusers,
			'group' => $this->showgroupsales,
			'count' => $this->showleads,
			'project' => $this->showproject,
			'level' => $level,
			'day' => "$startDate - $endDate",
			'title' => 'Report'
		];

		return view('report/report_sales_range', $data);
	}

}
