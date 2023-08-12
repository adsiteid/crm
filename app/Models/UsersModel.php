<?php

namespace App\Models;

use CodeIgniter\Model;


class UsersModel extends Model
{

    protected $table = 'users';
    protected $allowedFields = ['user_image','fullname','username','email','contact','city','address'];

    public function userAll()
    {
        return $this->findall();
    }

    public function detail($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);

        $result = $builder->get();
        return $result;
    }


    public function adminProject()
    {
        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin_group');
        $result = $builder->get();
        return $result;
    }


    public function adminAssistant()
    {

        $id = user()->id;

        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin_project');
        $builder->where('id', $id);
        $result = $builder->get();
        return $result;
    }

    public function admin()
    {
        $builder = $this->db->table($this->table);
        $builder->where('level', 'admin');
        $result = $builder->get();
        return $result;
    }

    public function gmsales()
    {
        $groups = user()->groups;

        $builder = $this->db->table($this->table);
        $builder->where('level', 'general_manager');
        $builder->where('groups', $groups);
        $result = $builder->get();
        return $result;
    }

    public function salesmanager()
    {

        $groups = user()->groups;

        $builder = $this->db->table($this->table);
        $builder->where('level', 'manager');
        $builder->where('groups', $groups);
        if (in_groups('sales') || in_groups('manager') || in_groups('admin_project')) :
            $builder->where('project', user()->project);
        endif;
        $result = $builder->get();
        return $result;
    }



   
    public function sales()
    {
        $builder = $this->db->table($this->table);
        $result = $builder->get();
        return $result;
    }


    public function sales_adduser()
    {

        $builder = $this->db->table($this->table);
        // $builder->whereIn('level', ['sales','manager','general_manager']);
        $groups = user()->groups;
        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) :
            $builder->whereIn('level', ['sales', 'manager', 'general_manager']);
            $builder->where('groups', $groups);
        endif;

        if (in_groups('admin_group')) :
            $builder->where('admin_group', user()->id);
        endif;

        $result = $builder->get();
        return $result;
    }

    public function salesUser()
    {
        $builder = $this->db->table($this->table);
        $result = $builder->get();
        return $result;
    }


    public function search_user($search)
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
        
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

}
