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

	public function index($days)
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
			'title' => 'Report'
		];

		return view('report/index', $data);
		
	}

}
