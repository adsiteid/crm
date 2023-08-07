<?php

namespace App\Controllers;

use \App\Models\ChartModel;
use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\GroupsModel;

class User extends BaseController
{
	protected $showleads;
	protected $chartleads;
	protected $showusers;
	protected $showgroups;

	public function __construct()
	{
		$this->showleads = new LeadsModel;
		$this->chartleads = new ChartModel;
		$this->showusers = new UsersModel;
		$this->showgroups = new GroupsModel;
	}


	

	public function sales()
	{
		$data = [
			'new' => $this->showleads->new(),
			'sales' => $this->showusers->sales(),
			'user' => $this->showusers,
			'title' => 'User'
		];

		return view('user/index', $data);
	}

	public function search_user()
	{
		$search =  $this->request->getVar('search');
		$data = [
			'new' => $this->showleads->new(),
			'sales' => $this->showusers->search_user($search),
			'user' => $this->showusers,
			'title' => 'User'
		];

		return view('user/index', $data);
	}


	public function admin()
	{
		$data = [
			'new' => $this->showleads->new(),
			'user' => $this->showusers->admin(),
			'title' => 'User'
		];

		return view('user/admin', $data);
	}


	public function detail($id)
	{
		foreach ($this->showusers->detail($id)->getResultArray() as $user);
		
		if ($user['level'] == "sales" || $user['level'] == "manager" || $user['level'] == "general_manager" || $user['level'] == "admin_group") :

		$level = $user['level'];
		
		$leads = $this->showleads->salesAll($level, $id);
		$new = $this->showleads->new_report_sales($level, $id);
		$close = $this->showleads->close_report_sales($level, $id);
		$pending = $this->showleads->pending_report_sales($level, $id);
		$contacted = $this->showleads->contacted_report_sales($level, $id);
		$visit = $this->showleads->visit_report_sales($level, $id);
		$deal = $this->showleads->deal_report_sales($level, $id);
		$reserve = $this->showleads->reserve_report_sales($level, $id);
		$booking = $this->showleads->booking_report_sales($level, $id);
		$salesNew = $this->showleads->salesNew($level, $id);
		$salesClose = $this->showleads->salesClose($level, $id);
		$salesPending = $this->showleads->salesPending($level, $id);
		$salesContacted = $this->showleads->salesContacted($level, $id);
		$salesVisit = $this->showleads->salesVisit($level, $id);
		$salesDeal = $this->showleads->salesDeal($level, $id);
		$salesReserve = $this->showleads->salesReserve($level, $id);
		$salesBooking = $this->showleads->salesBooking($level, $id);

		endif;

		if ($user['level'] == "admin_project") :
			$project = $user['project'];
			$leads = $this->showleads->salesAll('project', $project);
			$new = $this->showleads->new_report_sales('project', $project);
			$close = $this->showleads->close_report_sales('project', $project);
			$pending = $this->showleads->pending_report_sales('project', $project);
			$contacted = $this->showleads->contacted_report_sales('project', $project);
			$visit = $this->showleads->visit_report_sales('project', $project);
			$deal = $this->showleads->deal_report_sales('project', $project);
			$reserve = $this->showleads->reserve_report_sales('project', $project);
			$booking = $this->showleads->booking_report_sales('project', $project);
			$salesNew = $this->showleads->salesNew('project', $project);
			$salesClose = $this->showleads->salesClose('project', $project);
			$salesPending = $this->showleads->salesPending('project', $project);
			$salesContacted = $this->showleads->salesContacted('project', $project);
			$salesVisit = $this->showleads->salesVisit('project', $project);
			$salesDeal = $this->showleads->salesDeal('project', $project);
			$salesReserve = $this->showleads->salesReserve('project', $project);
			$salesBooking = $this->showleads->salesBooking('project', $project);
		endif;
		
	
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
			'days' => 'Last 30 Days',
			'title' => 'User'

		];

		return view('user/detail', $data);
	}



	public function user_loggedin()
	{
		
		$id = user()->id;
		$level = user()->level;
		$groups_id = user()->groups;


		if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) :
			$leads = $this->showleads->salesAll($level, $id);
			$new = $this->showleads->new_report_sales($level, $id);
			$close = $this->showleads->close_report_sales($level, $id);
			$pending = $this->showleads->pending_report_sales($level, $id);
			$contacted = $this->showleads->contacted_report_sales($level, $id);
			$visit = $this->showleads->visit_report_sales($level, $id);
			$deal = $this->showleads->deal_report_sales($level, $id);
			$reserve = $this->showleads->reserve_report_sales($level, $id);
			$booking = $this->showleads->booking_report_sales($level, $id);
			$salesNew = $this->showleads->salesNew($level, $id);
			$salesClose = $this->showleads->salesClose($level, $id);
			$salesPending = $this->showleads->salesPending($level, $id);
			$salesContacted = $this->showleads->salesContacted($level, $id);
			$salesVisit = $this->showleads->salesVisit($level, $id);
			$salesDeal = $this->showleads->salesDeal($level, $id);
			$salesReserve = $this->showleads->salesReserve($level, $id);
			$salesBooking = $this->showleads->salesBooking($level, $id);
		endif;

		if (in_groups('admin_group') || in_groups('admin_project')) :
			$leads = $this->showleads-> salesAll('groups', $groups_id);
			$new = $this->showleads->new_report_sales('groups', $groups_id);
			$close = $this->showleads->close_report_sales('groups', $groups_id);
			$pending = $this->showleads->pending_report_sales('groups', $groups_id);
			$contacted = $this->showleads->contacted_report_sales('groups', $groups_id);
			$visit = $this->showleads->visit_report_sales('groups', $groups_id);
			$deal = $this->showleads->deal_report_sales('groups', $groups_id);
			$reserve = $this->showleads->reserve_report_sales('groups', $groups_id);
			$booking = $this->showleads->booking_report_sales('groups', $groups_id);
			$salesNew = $this->showleads->salesNew('groups', $groups_id);
			$salesClose = $this->showleads->salesClose('groups', $groups_id);
			$salesPending = $this->showleads->salesPending('groups', $groups_id);
			$salesContacted = $this->showleads->salesContacted('groups', $groups_id);
			$salesVisit = $this->showleads->salesVisit('groups', $groups_id);
			$salesDeal = $this->showleads->salesDeal('groups', $groups_id);
			$salesReserve = $this->showleads->salesReserve('groups', $groups_id);
			$salesBooking = $this->showleads->salesBooking('groups', $groups_id);
		endif;


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
				'days' => 'Last 30 Days',
				'title' => 'User'

			];

		return view('user/detail', $data);
	}


	public function search_leads($id)
	{
		$search =  $this->request->getVar('search_leads');
		foreach ($this->showusers->detail($id)->getResultArray() as $user);

		if ($user['level'] == "sales" || $user['level'] == "manager" || $user['level'] == "general_manager" || $user['level'] == "admin_group") :

		$level = $user['level'];

			$leads = $this->showleads->search_leads_user($search, $level, $id);
			$new = $this->showleads->new_report_sales($level, $id);
			$close = $this->showleads->close_report_sales($level, $id);
			$pending = $this->showleads->pending_report_sales($level, $id);
			$contacted = $this->showleads->contacted_report_sales($level, $id);
			$visit = $this->showleads->visit_report_sales($level, $id);
			$deal = $this->showleads->deal_report_sales($level, $id);
			$reserve = $this->showleads->reserve_report_sales($level, $id);
			$booking = $this->showleads->booking_report_sales($level, $id);
			$salesNew = $this->showleads->salesNew($level, $id);
			$salesClose = $this->showleads->salesClose($level, $id);
			$salesPending = $this->showleads->salesPending($level, $id);
			$salesContacted = $this->showleads->salesContacted($level, $id);
			$salesVisit = $this->showleads->salesVisit($level, $id);
			$salesDeal = $this->showleads->salesDeal($level, $id);
			$salesReserve = $this->showleads->salesReserve($level, $id);
			$salesBooking = $this->showleads->salesBooking($level, $id);

		endif;

		if ($user['level'] == "admin_project") :
			$groups_id = $user['groups'];
			$project = $user['project'];
			$leads = $this->showleads->search_leads_user_admin_project($search , $project , 'groups', $groups_id);
			$new = $this->showleads->new_report_sales_AdminProject($project, 'groups', $groups_id);
			$close = $this->showleads->close_report_sales_AdminProject($project, 'groups', $groups_id);
			$pending = $this->showleads->pending_report_sales_AdminProject($project, 'groups', $groups_id);
			$contacted = $this->showleads->contacted_report_sales_AdminProject($project, 'groups', $groups_id);
			$visit = $this->showleads->visit_report_sales_AdminProject($project, 'groups', $groups_id);
			$deal = $this->showleads->deal_report_sales_AdminProject($project, 'groups', $groups_id);
			$reserve = $this->showleads->reserve_report_sales_AdminProject($project, 'groups', $groups_id);
			$booking = $this->showleads->booking_report_sales_AdminProject($project, 'groups', $groups_id);
			$salesNew = $this->showleads->salesNewAdminProject($project, 'groups', $groups_id);
			$salesClose = $this->showleads->salesCloseAdminProject($project, 'groups', $groups_id);
			$salesPending = $this->showleads->salesPendingAdminProject($project, 'groups', $groups_id);
			$salesContacted = $this->showleads->salesContactedAdminProject($project, 'groups', $groups_id);
			$salesVisit = $this->showleads->salesVisitAdminProject($project, 'groups', $groups_id);
			$salesDeal = $this->showleads->salesDealAdminProject($project, 'groups', $groups_id);
			$salesReserve = $this->showleads->salesReserveAdminProject($project, 'groups', $groups_id);
			$salesBooking = $this->showleads->salesBookingAdminProject($project, 'groups', $groups_id);
		endif;

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
			'days' => 'Last 30 Days',
			'title' => 'User'
		];

		return view('user/detail', $data);
	}



	public function search_leads_loggedin($id)
	{

		foreach ($this->showusers->detail($id)->getResultArray() as $user);
		$level = $user['level'];
		$search =  $this->request->getVar('search_leads');
		$groups_id = user()->groups;


		if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) :
		$leads = $this->showleads->search_leads_user($search, $level, $id);
		$new = $this->showleads->new_report_sales($level, $id);
		$close = $this->showleads->close_report_sales($level, $id);
		$pending = $this->showleads->pending_report_sales($level, $id);
		$contacted = $this->showleads->contacted_report_sales($level, $id);
		$visit = $this->showleads->visit_report_sales($level, $id);
		$deal = $this->showleads->deal_report_sales($level, $id);
		$reserve = $this->showleads->reserve_report_sales($level, $id);
		$booking = $this->showleads->booking_report_sales($level, $id);
		$salesNew = $this->showleads->salesNew($level, $id);
		$salesClose = $this->showleads->salesClose($level, $id);
		$salesPending = $this->showleads->salesPending($level, $id);
		$salesContacted = $this->showleads->salesContacted($level, $id);
		$salesVisit = $this->showleads->salesVisit($level, $id);
		$salesDeal = $this->showleads->salesDeal($level, $id);
		$salesReserve = $this->showleads->salesReserve($level, $id);
		$salesBooking = $this->showleads->salesBooking($level, $id);
		endif;

		if (in_groups('admin_group') || in_groups('admin_project')) :
			$leads = $this->showleads->search_leads_user($search,'groups', $groups_id);
			$new = $this->showleads->new_report_sales('groups', $groups_id);
			$close = $this->showleads->close_report_sales('groups', $groups_id);
			$pending = $this->showleads->pending_report_sales('groups', $groups_id);
			$contacted = $this->showleads->contacted_report_sales('groups', $groups_id);
			$visit = $this->showleads->visit_report_sales('groups', $groups_id);
			$deal = $this->showleads->deal_report_sales('groups', $groups_id);
			$reserve = $this->showleads->reserve_report_sales('groups', $groups_id);
			$booking = $this->showleads->booking_report_sales('groups', $groups_id);
			$salesNew = $this->showleads->salesNew('groups', $groups_id);
			$salesClose = $this->showleads->salesClose('groups', $groups_id);
			$salesPending = $this->showleads->salesPending('groups', $groups_id);
			$salesContacted = $this->showleads->salesContacted('groups', $groups_id);
			$salesVisit = $this->showleads->salesVisit('groups', $groups_id);
			$salesDeal = $this->showleads->salesDeal('groups', $groups_id);
			$salesReserve = $this->showleads->salesReserve('groups', $groups_id);
			$salesBooking = $this->showleads->salesBooking('groups', $groups_id);
		endif;



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
				'days' => 'Last 30 Days',
				'title' => 'User'
			];

		return view('user/detail', $data);
	}



}
