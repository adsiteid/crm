<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupsModel extends Model
{

    protected $table = 'groups';
    protected $allowedFields = ['group_name', 'admin_group','created_at'];

    public function list()
    {
        $builder = $this->db->table($this->table);

        $groups = user()->groups;

        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) :
            $builder->where('id' , $groups);
        endif;

        if (in_groups('admin_group')) :
            $builder->where('admin_group', user()->id);
        endif;

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function add_group()
    {
        $builder = $this->db->table($this->table);

        $groups = user()->groups;

        $builder->where('admin_group', user()->id);

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
