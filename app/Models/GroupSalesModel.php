<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupSalesModel extends Model
{

    protected $table = 'groups_sales';
    protected $allowedFields = ['group_name', 'admin_group','admin_project', 'manager', 'general_manager','created_at'];

    public function groups($id_groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $id_groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function groupSearch($id_groups,$search)
    {

        $builder = $this->db->table($this->table)
            ->groupStart()
            ->Like('id', $search)
            ->orLike('email', $search)
            ->orLike('username', $search)
            ->orLike('fullname', $search)
            ->orLike('city', $search)
            ->orLike('address', $search)
            ->orLike('contact', $search)
            ->groupEnd();
        

        $builder->where('groups', $id_groups);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function group_report($id_groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $id_groups);
        $builder->where('level', 'sales');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function group($groups,$project)
    {
        $builder = $this->db->table($this->table);

        if(in_groups('users')) :
        endif;

        $builder->groupStart()
            ->Where('groups', $groups)
            ->orWhere('project', $project);
        $builder->groupEnd();
        $builder->where('level', 'sales');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function project($id_project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $id_project);
        $builder->where('level', 'sales');
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

    public function admin_group($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin_group' );
        $builder->where('groups', $groups);
        $result = $builder->get();
        return $result;
    }

    public function admin_project($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin_project');
        $builder->where('project', $project);
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


    public function projects($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin_project');
        $builder->where('groups', $groups);
        $builder->groupBy('project');
        $result = $builder->get();
        return $result;
    }




}




