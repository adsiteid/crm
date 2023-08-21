<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{

    protected $table = 'project';
    protected $allowedFields = [
        'project',
        'city',
        'alamat',
        'luas_tanah',
        'luas_bangunan',
        'floor',
        'bathroom',
        'living_room',
        'dinning_room',
        'kitchen',
        'bed_room',
        'mezanine',
        'rooftop',
        'carport',
        'harga_mulai',
        'cicilan_mulai',
        'rental_garansi',
        'nup',
        'promo_berlaku',
        'promo_berakhir',
        'promo_1',
        'promo_2',
        'promo_3',
        'promo_4',
        'email',
        'no_hp',
        'no_telp',
        'facebook',
        'instagram',
        'tiktok',
        'youtube',
        'website',
        'fasilitas',
        'groups',
        'materport',
        'folder',
        'logo'

    ];

    public function project()
    {
 
        $builder = $this->db->table($this->table);
         
        $result = $builder->get();
        return $result;
    }


    public function projectAdminGroup($groups)
    {
        $builder = $this->db->table($this->table);
        $builder->where('groups',$groups);
        $result = $builder->get();
        return $result;
    }


    public function projectAdminProject($project)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $project);
        $result = $builder->get();
        return $result;
    }


    public function projectAll()
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
}
