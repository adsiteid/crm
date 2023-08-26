<?php

namespace App\Controllers;

use \App\Models\ChartModel;
use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\GroupsModel;
use \App\Models\GroupSalesModel;
use \App\Models\ProjectModel;

class User extends BaseController
{
	protected $showleads;
	protected $chartleads;
	protected $showusers;
	protected $showgroups;
	protected $showgroupsales;
	protected $showproject;

	public function __construct()
	{
		$this->showleads = new LeadsModel;
		$this->chartleads = new ChartModel;
		$this->showusers = new UsersModel;
		$this->showgroups = new GroupsModel;
		$this->showgroupsales = new GroupSalesModel;
		$this->showproject = new ProjectModel();
	}


	

	public function users()
	{

		if (in_groups('admin')) :
			$new = $this->showleads->new();
		endif;


		if (in_groups('users')) :


			$id = user()->id;
			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
				$level = "";
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {
				foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					if ($group['level'] == "admin_group") {
						$new = $this->showleads->newAdminGroup($group['groups']);
					} elseif ($group['level'] == "admin_project") {
						$new = $this->showleads->newAdminProject($group['project']);
					} else {
						$new = $this->showleads->new();
					}

					$level = $group['level'];
				}
			}

			
		endif;


		$data = [
			'new' => $new,
			// 'sales' => $this->showusers->sales(),
			'users' => $this->showgroupsales,
			'user' => $this->showusers,
			'group'=>$this->showgroups,
			'level' => $level,
			'project' => $this->showproject,
			'title' => 'User'
		];

		return view('user/index', $data);
	}

	public function search_user()
	{


		$search =  $this->request->getVar('search');
		$data = [
			'new' => $this->showleads->new(),
			// 'sales' => $this->showusers->search_user($search),
			'search' => $search,
			'user' => $this->showusers,
			'users' => $this->showgroupsales,
			'project' => $this->showproject,
			'group' => $this->showgroups,
			'title' => 'User'
		];

		return view('user/index_search', $data);
	}


	public function admin()
	{
		$data = [
			'new' => $this->showleads->new(),
			'user' => $this->showusers->admin(),
			'project' => $this->showproject,
			'title' => 'User'
		];

		return view('user/admin', $data);
	}


	public function detail($id)
	{




		$leads = $this->showleads->salesAll($id);
		$new = $this->showleads->new_report_sales($id);
		$close = $this->showleads->close_report_sales($id);
		$pending = $this->showleads->pending_report_sales($id);
		$contacted = $this->showleads->contacted_report_sales($id);
		$visit = $this->showleads->visit_report_sales($id);
		$deal = $this->showleads->deal_report_sales($id);
		$reserve = $this->showleads->reserve_report_sales($id);
		$booking = $this->showleads->booking_report_sales($id);
		$salesNew = $this->showleads->salesNew($id);
		$salesClose = $this->showleads->salesClose($id);
		$salesPending = $this->showleads->salesPending($id);
		$salesContacted = $this->showleads->salesContacted($id);
		$salesVisit = $this->showleads->salesVisit($id);
		$salesDeal = $this->showleads->salesDeal($id);
		$salesReserve = $this->showleads->salesReserve($id);
		$salesBooking = $this->showleads->salesBooking($id);



		
	
		$data = [
			'new' => $this->showleads->new(),
			'user' => $this->showusers->detail($id),
			'user_group' => $this->showusers,
			'leads' => $leads,
			'new_report_sales' => $new,
			'close_report_sales' => $close,
			'pending_report_sales' => $pending,
			'contacted_report_sales' => $contacted,
			'visit_report_sales' => $visit,
			'deal_report_sales' => $deal,
			'reserve_report_sales' => $reserve,
			'booking_report_sales' => $booking,
			'salesNew' => $salesNew,
			'salesClose' => $salesClose,
			'salesPending' => $salesPending,
			'salesContacted' => $salesContacted,
			'salesVisit' => $salesVisit,
			'salesDeal' => $salesDeal,
			'salesReserve' => $salesReserve,
			'salesBooking' => $salesBooking,
			'group_name' => $this->showgroups,
			'project' => $this->showproject,
			'days' => 'Last 30 Days',
			'title' => 'User'

		];

		return view('user/detail', $data);
	}



	public function user_loggedin()
	{
		
		$id = user()->id;

			$leads = $this->showleads->salesAll($id);
			$new = $this->showleads->new_report_sales($id);
			$close = $this->showleads->close_report_sales($id);
			$pending = $this->showleads->pending_report_sales($id);
			$contacted = $this->showleads->contacted_report_sales($id);
			$visit = $this->showleads->visit_report_sales($id);
			$deal = $this->showleads->deal_report_sales($id);
			$reserve = $this->showleads->reserve_report_sales($id);
			$booking = $this->showleads->booking_report_sales($id);
			$salesNew = $this->showleads->salesNew($id);
			$salesClose = $this->showleads->salesClose($id);
			$salesPending = $this->showleads->salesPending($id);
			$salesContacted = $this->showleads->salesContacted($id);
			$salesVisit = $this->showleads->salesVisit($id);
			$salesDeal = $this->showleads->salesDeal($id);
			$salesReserve = $this->showleads->salesReserve($id);
			$salesBooking = $this->showleads->salesBooking($id);

		$data = [
				'new' => $this->showleads->new(),
				'user' => $this->showusers->detail($id),
				'user_group' => $this->showusers,
				'leads' => $leads,
				'new_report_sales' => $new,
				'close_report_sales' => $close,
				'pending_report_sales' => $pending,
				'contacted_report_sales' => $contacted,
				'visit_report_sales' => $visit,
				'deal_report_sales' => $deal,
				'reserve_report_sales' => $reserve,
				'booking_report_sales' => $booking,
				'salesNew' => $salesNew,
				'salesClose' => $salesClose,
				'salesPending' => $salesPending,
				'salesContacted' => $salesContacted,
				'salesVisit' => $salesVisit,
				'salesDeal' => $salesDeal,
				'salesReserve' => $salesReserve,
				'salesBooking' => $salesBooking,
				'group_name' => $this->showgroups,
				'project' => $this->showproject,
				'days' => 'Last 30 Days',
				'title' => 'User'

			];

		return view('user/detail', $data);
	}


	public function search_leads($id)
	{
		$search =  $this->request->getVar('search_leads');
		
			$leads = $this->showleads->search_leads_user($search,$id);
			$new = $this->showleads->new_report_sales($id);
			$close = $this->showleads->close_report_sales($id);
			$pending = $this->showleads->pending_report_sales($id);
			$contacted = $this->showleads->contacted_report_sales($id);
			$visit = $this->showleads->visit_report_sales($id);
			$deal = $this->showleads->deal_report_sales($id);
			$reserve = $this->showleads->reserve_report_sales($id);
			$booking = $this->showleads->booking_report_sales($id);
			$salesNew = $this->showleads->salesNew($id);
			$salesClose = $this->showleads->salesClose($id);
			$salesPending = $this->showleads->salesPending($id);
			$salesContacted = $this->showleads->salesContacted($id);
			$salesVisit = $this->showleads->salesVisit($id);
			$salesDeal = $this->showleads->salesDeal($id);
			$salesReserve = $this->showleads->salesReserve($id);
			$salesBooking = $this->showleads->salesBooking($id);

		$data = [
			'leads' => $leads,
			'new' => $this->showleads->new(),
			'user' => $this->showusers->detail($id),
			'user_group' => $this->showusers,
			'new_report_sales' => $new,
			'close_report_sales' => $close,
			'pending_report_sales' => $pending,
			'contacted_report_sales' => $contacted,
			'visit_report_sales' => $visit,
			'deal_report_sales' => $deal,
			'reserve_report_sales' => $reserve,
			'booking_report_sales' => $booking,
			'salesNew' => $salesNew,
			'salesClose' => $salesClose,
			'salesPending' => $salesPending,
			'salesContacted' => $salesContacted,
			'salesVisit' => $salesVisit,
			'salesDeal' => $salesDeal,
			'salesReserve' => $salesReserve,
			'salesBooking' => $salesBooking,
			'group_name' => $this->showgroups,
			'project' => $this->showproject,
			'days' => 'Last 30 Days',
			'title' => 'User'
		];

		return view('user/detail', $data);
	}



	public function search_leads_loggedin($id)
	{

		
		$search =  $this->request->getVar('search_leads');

		$leads = $this->showleads->search_leads_user($search ,$id);
		$new = $this->showleads->new_report_sales($id);
		$close = $this->showleads->close_report_sales($id);
		$pending = $this->showleads->pending_report_sales($id);
		$contacted = $this->showleads->contacted_report_sales($id);
		$visit = $this->showleads->visit_report_sales($id);
		$deal = $this->showleads->deal_report_sales($id);
		$reserve = $this->showleads->reserve_report_sales($id);
		$booking = $this->showleads->booking_report_sales($id);
		$salesNew = $this->showleads->salesNew($id);
		$salesClose = $this->showleads->salesClose($id);
		$salesPending = $this->showleads->salesPending($id);
		$salesContacted = $this->showleads->salesContacted( $id);
		$salesVisit = $this->showleads->salesVisit($id);
		$salesDeal = $this->showleads->salesDeal($id);
		$salesReserve = $this->showleads->salesReserve($id);
		$salesBooking = $this->showleads->salesBooking($id);

		$data = [
				'leads' => $leads,
				'new' => $this->showleads->new(),
				'user' => $this->showusers->detail($id),
				'user_group' => $this->showusers,
				'new_report_sales' => $new,
				'close_report_sales' => $close,
				'pending_report_sales' => $pending,
				'contacted_report_sales' => $contacted,
				'visit_report_sales' => $visit,
				'deal_report_sales' => $deal,
				'reserve_report_sales' => $reserve,
				'booking_report_sales' => $booking,
				'salesNew' => $salesNew,
				'salesClose' => $salesClose,
				'salesPending' => $salesPending,
				'salesContacted' => $salesContacted,
				'salesVisit' => $salesVisit,
				'salesDeal' => $salesDeal,
				'salesReserve' => $salesReserve,
				'salesBooking' => $salesBooking,
				'group_name' => $this->showgroups,
				'project' => $this->showproject,
				'days' => 'Last 30 Days',
				'title' => 'User'
			];

		return view('user/detail', $data);
	}



}
