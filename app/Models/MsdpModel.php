<?php

namespace App\Models;

use CodeIgniter\Model;


class MsdpModel extends Model
{

    protected $table = 'msdp';
    protected $allowedFields = ['name', 'email', 'phone', 'manager', 'jabatan', 'project', 'divisi', 'diajukan', 'isi', 'status', 'deadline', 'catatan', 'userid', 'updated_at','groups','admin_group'];

    public function list()
    {
        $builder = $this->db->table($this->table);

        $groups = user()->groups;
        $user = user()->id;

        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) :
            $builder->where('userid', $user);
            $result = $builder->get();
        endif;

        if (in_groups('admin_project')) :
            $builder->where('project', user()->project);
            $result = $builder->get();
        endif;

        if (in_groups('admin_group')) :
            $builder->where('admin_group', user()->id);
            $result = $builder->get();
        endif;

        $builder->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function detail($id)
    {
        
        $builder = $this->db->table($this->table);

        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project') || in_groups('admin_group')) :
            $user = user()->id;
            $builder->where('userid', $user);
        endif;

        $builder->where('id', $id);
        $result = $builder->get();
        return $result;
    }
}
