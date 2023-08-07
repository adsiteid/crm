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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;
        
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
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

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);


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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");

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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;
        
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        $builder->whereIn('kategori_status', ['Warm', 'Hot']);
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $filter DAY)");
        // $builder->where('time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    // SOURCE

    public function source($source)
    {
        $builder = $this->db->table($this->table);
        $builder->where('sumber_leads', $source);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;

        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();
        endif;
        
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }




}
