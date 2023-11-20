<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadLogsModel extends Model
{

    protected $table = 'lead_logs';
    protected $allowedFields = ['id_leads', 'desc_log','groups', 'nama_leads', 'alamat', 'nomor_kontak', 'email', 'project', 'sumber_leads', 'general_manager', 'manager', 'sales', 'update_status', 'kategori_status','catatan','time_stamp','catatan_admin', 'reserve', 'booking' ];


    public function logs($id)
    {

        $builder = $this->db->table($this->table);
        $builder->where('id_leads', $id);
        $builder->orderBy('id DESC');
        $result = $builder->get();
        return $result;
    }

    public function prev($id_leads,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_leads', $id_leads);
        $builder->where('id <', $id);
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        // $builder->offset(1);
        $result = $builder->get();
        return $result;

    }

            
    


}
