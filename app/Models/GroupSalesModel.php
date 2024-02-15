<?php

namespace App\Models;

use CodeIgniter\Model;


class GroupSalesModel extends Model
{

    protected $table = 'groups_sales';
    protected $allowedFields = ['id_user', 'level','groups','group_name', 'project','manager', 'general_manager','created_at'];


    public function all()
    {
$this->findAll();

    }

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

    public function group_report($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('level', 'sales');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function group_manager($groups,$manager)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('manager', $manager);
        $builder->where('level', 'sales');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    

    public function group($groups,$project)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('groups', $groups)
            ->orWhere('project', $project);
        $builder->groupEnd();
        $builder->where('level', 'sales');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function project($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('project', $project);
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
        $builder->where('id_user', $id);
        $result = $builder->get();
        return $result;
    }


    


    public function projects($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->groupBy('project');
        $result = $builder->get();
        return $result;
    }


    public function projectGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->groupBy('project');
        $result = $builder->get();
        return $result;
    }



    public function general_manager($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('level', 'general_manager');
        $result = $builder->get();
        return $result;
    }


    public function manager($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('level', 'manager');
        $result = $builder->get();
        return $result;
    }


    public function sales($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('level', 'sales');
        $result = $builder->get();
        return $result;
    }




}




