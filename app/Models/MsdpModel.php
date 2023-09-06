<?php

namespace App\Models;

use CodeIgniter\Model;


class MsdpModel extends Model
{

    protected $table = 'msdp';
    protected $allowedFields = ['name', 'email', 'phone', 'manager', 'jabatan', 'project', 'divisi', 'diajukan', 'isi', 'status', 'deadline', 'catatan', 'userid', 'updated_at','groups','admin_group','admin_project'];

    public function list($days)
    {
        $builder = $this->db->table($this->table);

        $id = user()->id;
        if (in_groups('users')) :
            $builder->groupStart()
                ->Where('userid', $id)
                ->orWhere('manager', $id)
                ->orWhere('general_manager', $id)
                ->orWhere('admin_group', $id)
                ->orWhere('admin_project', $id);
            $builder->groupEnd();
        endif;

        $builder->where("created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function detail($id)
    {
        
        $builder = $this->db->table($this->table);

        if (in_groups('users') ) :
            $user = user()->id;
            $builder->where('userid', $user);
        endif;

        $builder->where('id', $id);
        $result = $builder->get();
        return $result;
    }
}
