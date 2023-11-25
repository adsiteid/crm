<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadsUpdateUserModel extends Model
{

    protected $table            = 'leads';
    protected $primaryKey       = 'sales';
    protected $allowedFields = ['groups', 'nama_leads', 'alamat', 'nomor_kontak', 'email', 'project', 'sumber_leads', 'general_manager', 'manager', 'sales', 'update_status', 'kategori_status', 'catatan', 'time_stamp_new', 'time_stamp_invalid', 'time_stamp_contacted', 'time_stamp_pending', 'time_stamp_visit', 'time_stamp_deal', 'time_stamp_close', 'catatan_admin', 'timestamp_admin', 'reserve', 'booking', 'time_stamp_reserve', 'time_stamp_booking'];


    

}
