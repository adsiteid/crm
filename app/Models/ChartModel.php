<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartModel extends Model
{

    protected $table = 'leads';

    // NEW



    

    public function leadsNew($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsNewAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups',$groups);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsNewAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }

    public function leadsNewRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsNewRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $result = $builder->get();
        return $result;
    }

    public function leadsNewRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsClose($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;
        
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }

    public function leadsCloseAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsCloseAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsCloseRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsCloseRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsCloseRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsPending($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsPendingAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsPendingAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsPendingRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsPendingRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsPendingRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $result = $builder->get();
        return $result;
    }
    

    public function leadsContacted($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }

    public function leadsContactedAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }

    public function leadsContactedAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsContactedRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsContactedRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $result = $builder->get();
        return $result;
    }

    public function leadsContactedRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsVisit($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsVisitAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsVisitAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsVisitRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsVisitRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsVisitRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsDeal($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsDealAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }

    public function leadsDealAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsDealRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsDealRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsDealRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsReserve($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsReserveAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsReserveAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }



    public function leadsReserveRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsReserveRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsReserveRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsBooking($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsBookingAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsBookingAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $result = $builder->get();
        return $result;
    }


    public function leadsBookingRange($startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $result = $builder->get();
        return $result;
    }

    public function leadsBookingRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function leadsBookingRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $result = $builder->get();
        return $result;
    }


    public function dateNew()
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->groupBy('time_stamp_new');
        $result = $builder->get();
        return $result;
    }


    public function sumNew()
    {
        $builder = $this->db->table($this->table);
        $builder->select("DATE(time_stamp_new) AS date, COUNT(*) AS count");
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('DATE(time_stamp_new)');
        $result = $builder->get();
        return $result;
    }

    public function dateContacted()
    {
        $builder = $this->db->table($this->table);
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('time_stamp_contacted');
        $result = $builder->get();
        return $result;
    }


    public function sumContacted()
    {
        $builder = $this->db->table($this->table);
        $builder->select("DATE(time_stamp_new) AS date, COUNT(*) AS count");
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('DATE(time_stamp_contacted)');
        $result = $builder->get();
        return $result;
    }



    public function dateVisit()
    {
        $builder = $this->db->table($this->table);
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('time_stamp_visit');
        $result = $builder->get();
        return $result;
    }

    public function sumVisit()
    {
        $builder = $this->db->table($this->table);
        $builder->select("DATE(time_stamp_new) AS date, COUNT(*) AS count");
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('DATE(time_stamp_visit)');
        $result = $builder->get();
        return $result;
    }


    public function dateDeal()
    {
        $builder = $this->db->table($this->table);
        $builder->where('time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('time_stamp_deal');
        $result = $builder->get();
        return $result;
    }


    public function sumDeal()
    {
        $builder = $this->db->table($this->table);
        $builder->select("DATE(time_stamp_new) AS date, COUNT(*) AS count");
        $builder->where('time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupBy('time_stamp_deal');
        $result = $builder->get();
        return $result;
    }


    // PROJECT

    public function project($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);

        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        $builder->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
        ->Where("time_stamp_new BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_close BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_pending BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_visit BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_deal BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_booking BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function projectNew($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'New');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }




    public function projectNewRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'New');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
        ->Where("time_stamp_new BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectClose($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'Close');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectCloseRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'Close');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_close BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectContacted($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'Contacted');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;
        
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectContactedRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'Contacted');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectPending($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'Pending');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectPendingRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'Pending');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_pending BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function projectVisit($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'Visit');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function projectVisitRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'Visit');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_visit BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectDeal($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('update_status', 'Deal');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        $builder->whereIn('kategori_status', ['Warm', 'Hot']);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectDealRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Cold','Warm','Hot']);
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_deal BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectReserve($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kategori_status', 'Reserve');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectReserveRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('kategori_status', 'Reserve');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectBooking($project,$filter)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kategori_status', 'Booking');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function projectBookingRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('kategori_status', 'Booking');
        $builder->where('project', $project);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
            ->Where("time_stamp_booking BETWEEN '$startDate' AND '$endDate'")
            ->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    // SOURCE

    public function source($source,$count)
    {
        $builder = $this->db->table($this->table);
        $builder->where('sumber_leads', $source);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

         $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
            ->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $count DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $count DAY)");
            $builder->groupEnd();
        endif;

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function source_range($source, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('sumber_leads', $source);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;

        $builder->groupStart()
        ->Where("time_stamp_new BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_close BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_pending BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_visit BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_deal BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'")
        ->orWhere("time_stamp_booking BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();
  
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function search_report($search)
    {
        $builder = $this->db->table($this->table)
        // $builder->select('*');
            ->groupStart()
            ->Like('nama_leads', $search)
            ->orLike('alamat', $search)
            ->orLike('nomor_kontak', $search)
            ->orLike('email', $search)
            ->orLike('project', $search)
            ->orLike('sumber_leads', $search)
            ->orLike('general_manager', $search)
            ->orLike('manager', $search)
            ->orLike('sales', $search)
            ->orLike('kategori_status', $search)
            ->orLike('update_status', $search)
            ->orLike('time_stamp_new', $search)
            ->orLike('time_stamp_invalid', $search)
            ->orLike('time_stamp_close', $search)
            ->orLike('time_stamp_contacted', $search)
            ->orLike('time_stamp_visit', $search)
            ->orLike('time_stamp_deal', $search)
            ->orLike('time_stamp_reserve', $search)
            ->orLike('time_stamp_booking', $search)
            ->orLike('reserve', $search)
            ->orLike('booking', $search)
            ->orLike('catatan', $search)
            ->groupEnd();

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id);
            $builder->groupEnd();
        endif;
        
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function search_report_admin_group($groups,$search)
    {
        $builder = $this->db->table($this->table)
            // $builder->select('*');
            ->groupStart()
            ->Like('nama_leads', $search)
            ->orLike('alamat', $search)
            ->orLike('nomor_kontak', $search)
            ->orLike('email', $search)
            ->orLike('project', $search)
            ->orLike('sumber_leads', $search)
            ->orLike('general_manager', $search)
            ->orLike('manager', $search)
            ->orLike('sales', $search)
            ->orLike('kategori_status', $search)
            ->orLike('update_status', $search)
            ->orLike('time_stamp_new', $search)
            ->orLike('time_stamp_invalid', $search)
            ->orLike('time_stamp_close', $search)
            ->orLike('time_stamp_contacted', $search)
            ->orLike('time_stamp_visit', $search)
            ->orLike('time_stamp_deal', $search)
            ->orLike('time_stamp_reserve', $search)
            ->orLike('time_stamp_booking', $search)
            ->orLike('reserve', $search)
            ->orLike('booking', $search)
            ->orLike('catatan', $search)
            ->groupEnd();

        $builder->where('groups',$groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function search_report_admin_project($project, $search)
    {
        $builder = $this->db->table($this->table)
            // $builder->select('*');
            ->groupStart()
            ->Like('nama_leads', $search)
            ->orLike('alamat', $search)
            ->orLike('nomor_kontak', $search)
            ->orLike('email', $search)
            ->orLike('project', $search)
            ->orLike('sumber_leads', $search)
            ->orLike('general_manager', $search)
            ->orLike('manager', $search)
            ->orLike('sales', $search)
            ->orLike('kategori_status', $search)
            ->orLike('update_status', $search)
            ->orLike('time_stamp_new', $search)
            ->orLike('time_stamp_invalid', $search)
            ->orLike('time_stamp_close', $search)
            ->orLike('time_stamp_contacted', $search)
            ->orLike('time_stamp_visit', $search)
            ->orLike('time_stamp_deal', $search)
            ->orLike('time_stamp_reserve', $search)
            ->orLike('time_stamp_booking', $search)
            ->orLike('reserve', $search)
            ->orLike('booking', $search)
            ->orLike('catatan', $search)
            ->groupEnd();

        $builder->where('project', $project);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }





}
