<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupSalesModel extends Model
{

    protected $table = 'groups_sales';
    protected $allowedFields = ['group_name', 'admin_group', 'sales', 'manager', 'general_manager','created_at'];

    public function list($id_groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $id_groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function user($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user', $id);
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
