<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{

    protected $table = 'events';
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


    public function events()
    {
        $builder = $this->db->table($this->table);
        $builder->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function eventsAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function eventsAdminProject($groups,$project)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('groups', $groups)
            ->orWhere('project', $project);
        $builder->groupEnd();
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
