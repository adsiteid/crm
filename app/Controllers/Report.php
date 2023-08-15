<?php

namespace App\Controllers;

use \App\Models\ProjectModel;
use \App\Models\LeadsModel;
use \App\Models\ChartModel;
use \App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Report extends BaseController
{

	protected $showproject;
	protected $showleads;
	protected $chartleads;
	protected $showusers;

	public function __construct()
	{
		$this->showproject = new ProjectModel();
		$this->showleads = new LeadsModel();
		$this->chartleads = new ChartModel;
		$this->showusers = new UsersModel;
	}

	/////////////////// REPORT LEADS /////////////////////////



	public function leadsFilter($days)
	{
		$data = [

			// chart
			'leadsNew' => $this->chartleads->leadsNew($days),
			'leadsClose' => $this->chartleads->leadsClose($days),
			'leadsPending' => $this->chartleads->leadsPending($days),
			'leadsContacted' => $this->chartleads->leadsContacted($days),
			'leadsVisit' => $this->chartleads->leadsVisit($days),
			'leadsDeal' => $this->chartleads->leadsDeal($days),
			'leadsReserve' => $this->chartleads->leadsReserve($days),
			'leadsBooking' => $this->chartleads->leadsBooking($days),
			// end chart

			'leads' => $this->showleads->allFilter($days),
			// 'leads' => $this->showleads->all(),
			'new' => $this->showleads->newFilter($days),
			'close' =>  $this->showleads->closeFilter($days),
			'pending' => $this->showleads->pendingFilter($days),
			'contacted' => $this->showleads->contactedFilter($days),
			'visit' => $this->showleads->visitFilter($days),
			'deal' => $this->showleads->dealFilter($days),
			'dealOnly' => $this->showleads->dealOnly($days),
			'reserve' => $this->showleads->reserveFilter($days),
			'booking' => $this->showleads->bookingFilter($days),
			'user_group' => $this->showusers,
			'days' => "Last $days Days",
			'title' => 'Report Leads'
		];

		return view('report/leads', $data);
	}



	public function range()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$data = [

				'leads' => $this->showleads->rangeList($startDate, $endDate),
				'leadsNew' => $this->chartleads->leadsNewRange($startDate, $endDate),
				'leadsClose' => $this->chartleads->leadsCloseRange($startDate, $endDate),
				'leadsPending' => $this->chartleads->leadsPendingRange($startDate, $endDate),
				'leadsContacted' => $this->chartleads->leadsContactedRange($startDate, $endDate),
				'leadsVisit' => $this->chartleads->leadsVisitRange($startDate, $endDate),
				'leadsDeal' => $this->chartleads->leadsDealRange($startDate, $endDate),
				'leadsReserve' => $this->chartleads->leadsReserveRange($startDate, $endDate),
				'leadsBooking' => $this->chartleads->leadsBookingRange($startDate, $endDate),

				'new' => $this->showleads->newRange($startDate, $endDate),
				'close' => $this->showleads->closeRange($startDate, $endDate),
				'pending' => $this->showleads->pendingRange($startDate, $endDate),
				'contacted' => $this->showleads->contactedRange($startDate, $endDate),
				'visit' => $this->showleads->visitRange($startDate, $endDate),
				'deal' => $this->showleads->dealRange($startDate, $endDate),
				'dealOnly' => $this->showleads->dealOnlyRange($startDate, $endDate),
				'reserve' => $this->showleads->reserveRange($startDate, $endDate),
				'booking' => $this->showleads->bookingRange($startDate, $endDate),
				'user_group' => $this->showusers,
				'days' => "$startDate - $endDate",
				'title' => 'Report Leads'
			];

		return view('report/leads', $data);
	}


	public function search_report()
	{

		$search =  $this->request->getVar('search_report');

		$data = [
			'leads' => $this->chartleads->search_report($search),
			'leadsNew' => $this->chartleads->leadsNew('30'),
			'leadsClose' => $this->chartleads->leadsClose('30'),
			'leadsPending' => $this->chartleads->leadsClose('30'),
			'leadsContacted' => $this->chartleads->leadsContacted('30'),
			'leadsVisit' => $this->chartleads->leadsVisit('30'),
			'leadsDeal' => $this->chartleads->leadsDeal('30'),
			'leadsReserve' => $this->chartleads->leadsReserve('30'),
			'leadsBooking' => $this->chartleads->leadsBooking('30'),

			'new' => $this->showleads->newFilter('30'),
			'close' =>  $this->showleads->closeFilter('30'),
			'pending' => $this->showleads->pendingFilter('30'),
			'contacted' => $this->showleads->contactedFilter('30'),
			'visit' => $this->showleads->visitFilter('30'),
			'deal' => $this->showleads->dealFilter('30'),
			'dealOnly' => $this->showleads->dealOnly('30'),
			'reserve' => $this->showleads->reserveFilter('30'),
			'booking' => $this->showleads->bookingFilter('30'),
			'user_group' => $this->showusers,
			'days' => "Search Result",
			'title' => 'Report Leads'
		];

		return view('report/leads', $data);
	}


		/////////////////// REPORT PROJECT /////////////////////////


	public function project()
	{

		$data = [
			'leads' => $this->showleads->project(),
			'new' => $this->showleads->new(),
			'project' => $this->chartleads,
			'filter' => 30,
			'title' => 'Report'
		];

		return view('report/project', $data);
	}


		

	public function projectFilter($range)
	{
		$data = [
			'leads' => $this->showleads->project(),
			// 'leads' => $this->showleads->all(),
			'new' => $this->showleads->new(),
			'project' => $this->chartleads,
			'filter' => $range,
			'title' => 'Report'
		];

		return view('report/project', $data);
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

		$data = [
			'new' => $this->showleads->new(),
			'source' => $this->chartleads,
			'count' => "$count",
			'title' => 'Report'
		];

		return view('report/source', $data);
	}

	public function sourceRange()
	{

		$startDate =  $this->request->getVar('date_start');
		$endDate = $this->request->getVar('date_end');

		$data = [
			'new' => $this->showleads->new(),
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
		$data = [
			'new' => $this->showleads->new(),
			'sales' => $this->showusers->salesUser(), //not admin
			'user' => $this->showusers,
			'count' => $this->showleads,
			'title' => 'Report'
		];

		return view('report/report_sales', $data);
	}
}
