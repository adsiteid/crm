<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{

    protected $table = 'acara';
    protected $allowedFields = [
        'event_name',
        'project',
        'city',
        'full_address',
        'contact',
        'email',
        'date_start',
        'date_end',
        'description',
        'groups',
        'admin_group',
        'image'
    ];


    public function acara()
    {
        $builder = $this->db->table($this->table);

        $groups = user()->groups;

        if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) :
            $builder->where('groups', $groups);
            $result = $builder->get();
            return $result;
        endif;

        if (in_groups('admin_group')) :
            $builder->where('admin_group', user()->id);
        endif;

        if (in_groups('admin')) :
            $result = $builder->get();
            return $result;
        endif;

        $builder->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
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
