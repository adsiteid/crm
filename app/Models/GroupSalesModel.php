<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupSalesModel extends Model
{

    protected $table = 'groups_sales';
    protected $allowedFields = ['group_name', 'admin_group', 'sales', 'manager', 'general_manager','created_at'];

    public function list()
    {
        $builder = $this->db->table($this->table);
        $groups = user()->groups;

        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) :
            $builder->where('groups', $groups);
        endif;

        if (in_groups('admin_group')) :
            $builder->where('admin_group', user()->id);
        endif;

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function detail($id)
    {
        
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $result = $builder->get();
        return $result;
    }
}
