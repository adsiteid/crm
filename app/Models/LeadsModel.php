<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadsModel extends Model
{

    protected $table = 'leads';
    protected $allowedFields = ['groups', 'nama_leads', 'alamat', 'nomor_kontak', 'email', 'project', 'sumber_leads', 'general_manager', 'manager', 'sales', 'update_status', 'kategori_status','catatan','time_stamp_new','time_stamp_invalid','time_stamp_contacted','time_stamp_pending','time_stamp_visit','time_stamp_deal','time_stamp_close','catatan_admin','timestamp_admin', 'reserve', 'booking', 'time_stamp_reserve','time_stamp_booking' ];

    // public function all()
    // {
    //     $builder = $this->db->table($this->table);
        
    //     $id = user()->id;
    //     if (in_groups('users')) :
    //         $builder->groupStart()
    //         ->Where('sales',$id)
    //         ->orWhere('manager', $id)
    //         ->orWhere('general_manager', $id);
    //         $builder->groupEnd();
    //     endif;

    //     $builder->groupStart()
    //     ->Where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)')
    //     ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
    //     ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
    //     $builder->groupEnd();

    //     $builder->orderBy('id DESC');
    //     $result = $builder->get();
    //     return $result;
    // }


//Report

    public function allFilter()
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

        $builder->groupStart()
        ->Where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)')
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesFilter($days)
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

        $builder->groupStart()
            ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function allFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('groups',$groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function allFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('project', $project);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function rangeList($startDate,$endDate)


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


    public function rangeListAdminGroup($groups,$startDate, $endDate)


    {
        $builder = $this->db->table($this->table);

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

        $builder->where('groups', $groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function rangeListAdminProject($project, $startDate, $endDate)


    {
        $builder = $this->db->table($this->table);

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

        $builder->where('project', $project);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function new()
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

        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newAdminGroup($groups)
    {

        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newAdminProject($project)
    {

        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

// DETAIL AKUN USER

    public function new_report_sales($id)
    {

        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();


        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }




    public function newFilter($days)
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

        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newFilterAdminGroup($groups,$days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newFilterAdminProject($project, $days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newRange($startDate,$endDate)
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

        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function newRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'New');
        $builder->whereIn('kategori_status', ['New', 'Warm', 'Hot']);
        $builder->where('time_stamp_new >=', $startDate);
        $builder->where('time_stamp_new <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function contacted()
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

        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function contactedAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function contactedAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function contacted_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function contacted_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function contactedFilter($days)
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

        $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function contactedFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function contactedFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function contactedRange($startDate,$endDate)
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

        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function contactedRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function contactedRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >=', $startDate);
        $builder->where('time_stamp_contacted <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function close()
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

        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function close_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function close_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeFilter($days)
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

        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeRange($startDate,$endDate)
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

        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function closeRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >=', $startDate);
        $builder->where('time_stamp_close <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pending()
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

        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function pending_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function pending_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);


        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingFilter($days)
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

        $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingRange($startDate,$endDate)
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

        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function pendingRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function pendingRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >=', $startDate);
        $builder->where('time_stamp_pending <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visit()
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

        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function visitAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visit_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visit_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitFilter($days)
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

        $builder->where('update_status', 'Visit');
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Visit');
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Visit');
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function visitRange($startDate,$endDate)
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

        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function visitRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Visit');
        $builder->where('time_stamp_visit >=', $startDate);
        $builder->where('time_stamp_visit <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function deal()
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

        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealAdminGroup($groups)
    {

        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealAdminProject($project)
    {

        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function deal_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function deal_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnly($days)
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

        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot','Cold']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnlyAdminGroup($groups,$days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnlyAdminProject($project, $days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnlyRange($startDate, $endDate)
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

        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnlyRangeAdminGroup($groups,$startDate, $endDate)
    {

        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealOnlyRangeAdminProject($project, $startDate, $endDate)
    {

        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Deal');
        $builder->whereIn('kategori_status', ['Warm', 'Hot', 'Cold']);
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealFilter($days)
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

        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealFilterAdminGroup($groups,$days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function dealFilterAdminProject($project, $days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Deal');
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealRange($startDate,$endDate)
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

        $builder->where('update_status', 'Deal');
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function dealRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('update_status', 'Deal');
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function dealRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('update_status', 'Deal');
        $builder->where('time_stamp_deal >=', $startDate);
        $builder->where('time_stamp_deal <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserve()
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

        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    // BELOM

    public function reserve_report_sales($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

// BELOM

    public function reserve_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserveFilter($days)
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

        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserveFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function reserveFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserveRange($startDate,$endDate)
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

        $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserveRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function reserveRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >=', $startDate);
        $builder->where('time_stamp_reserve <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function booking()
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

        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    // BELOM
    public function booking_report_sales( $id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

// BELOM
    public function booking_report_sales_AdminProject($project, $groups, $groups_id)
    {
        $builder = $this->db->table($this->table);

        $builder->where($groups, $groups_id);

        $builder->where('project', $project);

        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function bookingFilter($days)
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

        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function bookingFilterAdminGroup($groups,$days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function bookingFilterAdminProject($project, $days)
    {

        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function bookingRange($startDate,$endDate)
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

        $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function bookingRangeAdminGroup($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function bookingRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >=', $startDate);
        $builder->where('time_stamp_booking <=', $endDate);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    //detail leads

    public function getLeads($id)
    {
        
        $builder = $this->db->table($this->table);

        $builder->where('id', $id);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    // public function getList($user)
    // {

    //     return $this->query("SELECT * FROM leads WHERE username =  '$user' ORDER BY id DESC ");
    // }



    // COUNT REPORT

// BELOM

    public function salesAll($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
        ->Where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)')
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->groupEnd();



            $builder->groupStart()
                ->Where('sales', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id)
                ->orWhere('admin_project', $id)
                ->orWhere('admin_group', $id);
            $builder->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesNew($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesAllFilter($id, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesNewFilter($id,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesAllRange($id, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();


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


    public function salesNewRange($id, $startDate , $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        
        $builder->where("time_stamp_new BETWEEN '$startDate' AND '$endDate'");

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    

    public function salesNewAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesNewAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesAllAdminGroupFilter($groups, $days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesAllAdminGroupRange($groups, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);

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

    public function salesNewAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where("time_stamp_new BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }




    public function salesNewAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where('time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesAllAdminProjectFilter($project, $days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->groupStart()
        ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
        ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesNewAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesAllAdminProjectRange($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);

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



    public function salesNewAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        $builder->where("time_stamp_new BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function salesClose($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesCloseFilter($id,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesCloseRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesCloseAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesCloseAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesCloseAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesCloseAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where('time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesCloseAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesCloseAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Close', 'Invalid']);
        $builder->where("time_stamp_close BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPending($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesPendingFilter($id,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPendingRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPendingAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesPendingAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPendingAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesPendingAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where('time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPendingAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesPendingAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->whereIn('update_status', ['Pending']);
        $builder->where("time_stamp_pending BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesContacted($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedFilter($id,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesContactedAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesContactedAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Contacted');
        $builder->where('time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesContactedAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Contacted');
        $builder->where("time_stamp_contacted BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisit($id)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitFilter($id,$days)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesVisitRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        $builder->where("time_stamp_visit BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesVisitAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('groups', $groups);
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('groups', $groups);
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('groups', $groups);
        $builder->where("time_stamp_visit BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('project', $project);
        $builder->where('time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('project', $project);
        $builder->where("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesVisitAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        // $builder->where('update_status', 'Visit');
        $builder->where('project', $project);
        $builder->where("time_stamp_visit BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function salesDeal($id)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where('time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealFilter($id,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where('time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where('time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesDealAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->whereIn('kategori_status', ['Cold', 'Warm', 'Hot']);
        $builder->where("time_stamp_deal BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserve($id)
    {
        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveFilter($id,$days)
    {
        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where('time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesReserveAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Reserve');
        $builder->where("time_stamp_reserve BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBooking($id)
    {
        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingFilter($id,$days)
    {
        $builder = $this->db->table($this->table);


        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingRange($id,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();

        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where('time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminProjectFilter($project,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function salesBookingAdminProjectRange($project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        // $builder->where('update_status', 'Deal');
        // $builder->where('kategori_status', 'Booking');
        $builder->where("time_stamp_booking BETWEEN '$startDate' AND '$endDate'");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function IndexFilter($days)
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

        $builder->groupStart()
            ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();


        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function IndexFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('groups', $groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function IndexFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_booking >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('project', $project);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function search_leads($search)
    {

        $builder = $this->db->table($this->table)
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


    public function search_leads_admin_group($groups, $search)
    {

        $builder = $this->db->table($this->table)
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

        $builder->where('groups', $groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function search_leads_admin_project($project, $search)
    {

        $builder = $this->db->table($this->table)
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

// BELOM

    public function search_leads_user($search, $id)
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

        $builder->groupStart()
            ->Where('sales', $id)
            ->orWhere('manager', $id)
            ->orWhere('general_manager', $id);
        $builder->groupEnd();
        
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }



    public function project()
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
        
        $builder->groupBy('project','desc');
        $result = $builder->get();
        return $result;
    }

    public function projectFilter($days)
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

        $builder->groupStart()
            ->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


    public function projectRange($startDate,$endDate)
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

        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


    public function projectAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);

        $builder->where('groups', $groups);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }

    public function projectFilterAdminGroup($groups,$days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('groups', $groups);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


    public function projectRangeAdminGroup($groups, $startDate,$endDate)
    {
        $builder = $this->db->table($this->table);

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

        $builder->where('groups', $groups);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }

    public function projectAdminProject($project)
    {
        $builder = $this->db->table($this->table);

        $builder->where('project', $project);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


    public function projectFilterAdminProject($project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->where("time_stamp_new >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_close >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_pending >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_contacted >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_visit >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_reserve >= DATE_SUB(CURDATE(), INTERVAL $days DAY)")
            ->orWhere("time_stamp_deal >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->where('project', $project);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


    public function projectRangeAdminProject($project, $startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

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
        
        $builder->where('project', $project);
        $builder->groupBy('project', 'desc');
        $result = $builder->get();
        return $result;
    }


}
