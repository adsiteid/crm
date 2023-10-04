<?php

namespace App\Controllers;

use \App\Models\ProjectModel;
use \App\Models\LeadsModel;
use \App\Models\ChartModel;
use \App\Models\UsersModel;
use \App\Models\GroupSalesModel;
use CodeIgniter\I18n\Time;

class Reports extends BaseController
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
		$this->chartleads = new ChartModel();
		$this->showusers = new UsersModel();
		$this->showgroupsales = new GroupSalesModel();
	}

	public function index()
	{

		$days = 30;

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
			'new' => $new,
			'close' =>  $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'days' => "Last $days Days",
			'title' => 'Dashboard'
		];

		return view('report/index', $data);
		
	}


	public function indexFilter($days)
	{

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
			'new' => $new,
			'close' =>  $close,
			'pending' => $pending,
			'contacted' => $contacted,
			'visit' => $visit,
			'deal' => $deal,
			'dealOnly' => $dealOnly,
			'reserve' => $reserve,
			'booking' => $booking,
			'leadsNew' => $leadsNew,
			'leadsClose' => $leadsClose,
			'leadsPending' => $leadsPending,
			'leadsContacted' => $leadsContacted,
			'leadsVisit' => $leadsVisit,
			'leadsDeal' => $leadsDeal,
			'leadsReserve' => $leadsReserve,
			'leadsBooking' => $leadsBooking,
			'days' => "Last $days Days",
			'title' => 'Dashboard'
		];

		return view('report/index', $data);
	}



	public function indexRange()
	{
		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

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

		

		$data = [
				'leads' => $leads,
				'new' => $new,
				'close' =>  $close,
				'pending' => $pending,
				'contacted' => $contacted,
				'visit' => $visit,
				'deal' => $deal,
				'dealOnly' => $dealOnly,
				'reserve' => $reserve,
				'booking' => $booking,
				'leadsNew' => $leadsNew,
				'leadsClose' => $leadsClose,
				'leadsPending' => $leadsPending,
				'leadsContacted' => $leadsContacted,
				'leadsVisit' => $leadsVisit,
				'leadsDeal' => $leadsDeal,
				'leadsReserve' => $leadsReserve,
				'leadsBooking' => $leadsBooking,
				'days' => "$startDate - $endDate",
				'title' => 'Dashboard'
			];

		return view('report/index', $data);
	}

}
