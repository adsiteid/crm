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
