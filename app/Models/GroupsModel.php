<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupsModel extends Model
{

    protected $table = 'groups';
    protected $allowedFields = ['group_name', 'group_id','created_at'];

    public function list()
    {
        $builder = $this->db->table($this->table);


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


    public function detail_group($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('group_id', $id);
        $result = $builder->get();
        return $result;
    }
}
