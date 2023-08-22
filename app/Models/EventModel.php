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


    public function eventsId($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user',$id);
        $builder->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function eventsIdFilter($id,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user', $id);

        $builder->groupStart()
        ->Where("created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function eventsIdRange($id, $startDate , $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user', $id);

        $builder->groupStart()
        ->Where("created_at BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();

        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

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
        $builder->where("created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function eventsAdminGroupFilter($groups,$days)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->where("created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function eventsAdminGroupRange($groups,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups', $groups);
        $builder->groupStart()
        ->Where("created_at BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();
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
        $builder->where("created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function eventsAdminProjectFilter($groups, $project, $days)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('groups', $groups)
            ->orWhere('project', $project);
        $builder->groupEnd();
        $builder->where("created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }


    public function eventsAdminProjectRange($groups, $project,$startDate, $endDate)
    {
        $builder = $this->db->table($this->table);

        $builder->groupStart()
            ->Where('groups', $groups)
            ->orWhere('project', $project);
        $builder->groupEnd();
        $builder->groupStart()
        ->Where("created_at BETWEEN '$startDate' AND '$endDate'")
        ->groupEnd();
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
