<?php

namespace App\Controllers;

use \App\Models\ChartModel;
use \App\Models\LeadsModel;
use \App\Models\UsersModel;
use \App\Models\ProjectModel;
use \App\Models\MsdpModel;
use \App\Models\EventModel;
use \App\Models\GroupSalesModel;
use \App\Models\GroupsModel;
use \App\Models\AuthgroupModel;
use Myth\Auth\Models\UserModel;


use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;


class CMS extends BaseController
{
	protected $showleads;
	protected $chartleads;
	protected $showusers;
	protected $showprojects;
	protected $showmsdp;
	protected $showevent;
	protected $showgroupsales;
	protected $showgroups;
	protected $showauthgroups;
	protected $authgroups;

	public function __construct()
	{
		$this->showleads = new LeadsModel;
		$this->chartleads = new ChartModel;
		$this->showusers = new UsersModel;
		$this->showprojects = new ProjectModel;
		$this->showmsdp = new MsdpModel;
		$this->showevent = new EventModel;
		$this->showgroupsales = new GroupSalesModel;
		$this->showgroups = new GroupsModel;
		$this->showauthgroups = new AuthgroupModel;
		$this->authgroups = new UserModel;
	}


	public function groups()
	{
		$data = [
			'new' => $this->showleads->new(),
			'projects' => $this->showprojects->findAll(),
			'sales' => $this->showusers->sales(),
			'title' => 'Group'
		];

		return view('cms/add_groups', $data);
	}


	public function groups_save()
	{


		if (!$this->validate([

			'group_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Group Name Harus diisi'
				]
			],

			'admin_group' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Admin Harus diisi'
				]
			]

		])) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$this->showgroups->save(
			[
				'group_name' => $this->request->getVar('group_name'),
				'admin_group' => $this->request->getVar('admin_group'),
			]
		);

		session()->setFlashdata(
			'pesan',
			'Group Added successfully'
		);

		return redirect()->to(base_url() . 'user/agent');
	}


	public function groupsales()
	{

		$id = user()->id;

		$data = [
			'new' => $this->showleads->new(),
			'project' => $this->showprojects,
			'group_project' => $this->showgroups,
			'group'=> $this->showgroups->add_group(),
			'user_group'=> $this->showgroupsales->user($id),
			'users' => $this->showusers,
			'sales' => $this->showusers->sales(),
			'title' => 'Group'
		];

		return view('cms/add_groupsales', $data);
	}


	public function delete_id_group($id)
	{
		$this->showgroupsales->delete($id);
		session()->setFlashdata('pesan', 'Data ' . $id . ' deleted successfully');
		return redirect()->to(base_url() . 'user/agent');
	}


	public function group_sales_save()
	{


		if (!$this->validate([


			'id_user' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'ID User Harus diisi'
				]
			],

			'level' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Level Harus diisi'
				]
			],

			'groups' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Group Name Harus diisi'
				]
			],

			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Harus diisi'
				]
			]
			

		])) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$this->showgroupsales->save(
			[	
				'id_user' => $this->request->getVar('id_user'),
				'level' => $this->request->getVar('level'),
				'groups' => $this->request->getVar('groups'),
				'project' => $this->request->getVar('project'),
				'manager' => $this->request->getVar('manager'),
				'general_manager' => $this->request->getVar('general_manager')	
			]
		);

		session()->setFlashdata(
			'pesan',
			'Group Added successfully'
		);

		return redirect()->to(base_url() . 'user/agent');
	}


	public function add_submission()
	{

		$id = user()->id;
		$data = [
			'new' => $this->showleads->new(),
			'user' => $this->showusers->sales(),
			'users' => $this->showusers,
			'user_group' => $this->showgroupsales->user($id),
			'group' => $this->showgroupsales,
			'group_project' => $this->showgroups,
			'project' => $this->showprojects,
			'title' => 'Submission'
		];

		return view('cms/add_submission', $data);
	}


	public function msdpSave()
	{


		if (!$this->validate([

			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Name Harus diisi'
				]
			],

			'groups' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Groups Harus diisi'
				]
			],

			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Email Harus diisi'
				]
			],

			'phone' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Phone Harus diisi'
				]
				],

			// 'manager' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Manager Harus diisi'
			// 	]
			// 	],

			'jabatan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jabatan Harus diisi'
				]
			],

			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Harus diisi'
				]
			],

			// 'divisi' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Divisi Harus diisi'
			// 	]
			// ],

			// 'deadline' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Deadline Harus diisi'
			// 	]
			// ],

			'diajukan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Diajukan kepada Harus diisi'
				]
			],


			'isi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Isi pengajuan Harus diisi'
				]
			]

		])) {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}


		$this->showmsdp->save(

			[
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'phone' => $this->request->getVar('phone'),
				'manager' => $this->request->getVar('manager'),
				'jabatan' => $this->request->getVar('jabatan'),
				'project' => $this->request->getVar('project'),
				'divisi' => $this->request->getVar('divisi'),
				'diajukan' => $this->request->getVar('diajukan'),
				'isi' => $this->request->getVar('isi'),
				'status' => $this->request->getVar('status'),
				'deadline' => $this->request->getVar('deadline'),
				'groups' => $this->request->getVar('groups'),
				'userid' => $this->request->getVar('userid')
			]
		);

		session()->setFlashdata(
			'pesan',
			'Data Added successfully'
		);

		return redirect()->to(base_url() . 'submission');
	}


	public function print_msdp($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'detail' => $this->showmsdp->detail($id),
			'title' => 'MSDP'
		];

		return view('cms/printmsdp', $data);
	}


	public function edit_msdp($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'user' => $this->showusers->sales(),
			'detail' => $this->showmsdp->detail($id),
			'projects' => $this->showprojects->findAll(),
			'title' => 'MSDP'
		];

		return view('cms/edit_msdp', $data);
	}



	public function msdpupdate($id)
	{

		$this->showmsdp->save(
			[
				'id' => $id,
				'updated_at' => $this->request->getVar('updated_at'),
				'status' => $this->request->getVar('status')
			]
		);

		session()->setFlashdata(
			'pesan',
			'Data ' . $id . ' updated successfully'
		);

		return redirect()->to(base_url() . 'submission');
	}


	public function msdpupdateEdit($id)
	{



		if (!$this->validate([

			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Name Harus diisi'
				]
			],
			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Email Harus diisi'
				]
			],

			'phone' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Phone Harus diisi'
				]
			],

			'manager' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Manager Harus diisi'
				]
			],

			'jabatan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jabatan Harus diisi'
				]
			],

			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Harus diisi'
				]
			],

			'divisi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Divisi Harus diisi'
				]
			],


			'Deadline' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Deadline Harus diisi'
				]
			],

			'diajukan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Diajukan kepada Harus diisi'
				]
			],

			'dibebankan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Dibebankan kepada Harus diisi'
				]
			],

			'deadline' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Deadline Harus diisi'
				]
			],

			'isi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Isi pengajuan Harus diisi'
				]
			]

		])) {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}




		$this->showmsdp->save(
			[
				'id' => $id,
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'phone' => $this->request->getVar('phone'),
				'manager' => $this->request->getVar('manager'),
				'jabatan' => $this->request->getVar('jabatan'),
				'project' => $this->request->getVar('project'),
				'divisi' => $this->request->getVar('divisi'),
				'diajukan' => $this->request->getVar('diajukan'),
				'dibebankan' => $this->request->getVar('dibebankan'),
				'isi' => $this->request->getVar('isi'),
				'deadline' => $this->request->getVar('deadline'),
				'catatan' => $this->request->getVar('catatan'),
				'userid' => $this->request->getVar('userid'),
				'updated_at' => $this->request->getVar('updated_at'),
				'status' => $this->request->getVar('status')
			]
		);

		session()->setFlashdata(
			'pesan',
			'Data ' . $id . ' updated successfully'
		);

		return redirect()->to(base_url() . 'submission');
	}


	public function delete_msdp($id)
	{
		$this->showmsdp->delete($id);
		session()->setFlashdata('pesan', 'Data ' . $id . ' deleted successfully');
		return redirect()->to(base_url() . 'submission');
	}


	public function submission()
	{

		if (in_groups('admin')) :
			$new = $this->showleads->new();
		endif;


		if (in_groups('users')) :
			$id = user()->id;
			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$new = $this->showleads->new();
			}

			foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
				if ($group['level'] == "admin_group") {
					$new = $this->showleads->newAdminGroup($group['groups']);
				} elseif ($group['level'] == "admin_project") {
					$new = $this->showleads->newAdminProject($group['project']);
				} else {
					$new = $this->showleads->new();
				}
			}

		endif;

		$data = [
			'new' => $new,
			'list' => $this->showmsdp->list(),
			'users' => $this->showusers,
			'user_group' => $this->showgroupsales->user($id),
			'group' => $this->showgroupsales,
			'project' => $this->showprojects,
			'group_project' => $this->showgroups,
			'title' => 'Submission'
		];

		return view('cms/submission', $data);
	}



	public function add_leads()
	{

		$id = user()->id;
		

		$data = [
			'new' => $this->showleads->new(),
			'projects' => $this->showprojects,
			'validation' => \Config\Services::validation(),
			'user' => $this->showusers->detail($id),
			'users' => $this->showusers,
			'sales' => $this->showusers->sales(),
			'user_group' => $this->showgroupsales->user($id),
			'group' => $this->showgroupsales,
			'group_project' => $this->showgroups,
			

			'title' => 'Add Leads'
		];

		return view('cms/add_leads', $data);
	}




	public function save_leads()
	{

		if (!$this->validate([

			'nama_leads' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Name Harus diisi'
				]
			],

			'nomor_kontak' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Phone Harus diisi'
					// 'is_unique' => '{field} already registered'
				]
			],


			// 'alamat' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Address Harus diisi'
			// 	]
			// ],

			// 'email' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Email Harus diisi'
			// 		// 'is_unique' => '{field} already registered'
			// 	]
			// ],

			// 'groups' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Group Harus diisi'
			// 	]
			// ],

			// 'project' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Project Harus diisi'
			// 	]
			// ],

			'sumber_leads' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Lead Source Harus diisi'
				]
			],


			// 'general_manager' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'General Manager Harus diisi'
			// 	]
			// ],


			// 'manager' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Sales Manager Harus diisi'
			// 	]
			// ],


			'sales' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Sales Harus diisi'
				]
			]

		


		])) {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}


		$this->showleads->save(

			[
				'nama_leads' => $this->request->getVar('nama_leads'),
				'email' => $this->request->getVar('email'),
				'nomor_kontak' => $this->request->getVar('nomor_kontak'),
				'alamat' => $this->request->getVar('alamat'),
				'project' => $this->request->getVar('project'),
				'general_manager' => $this->request->getVar('general_manager'),
				'manager' => $this->request->getVar('manager'),
				'sales' => $this->request->getVar('sales'),
				'sumber_leads' => $this->request->getVar('sumber_leads'),
				'update_status' => $this->request->getVar('update_status'),
				'kategori_status' => $this->request->getVar('kategori_status'),
				'reserve' => $this->request->getVar('reserve'),
				'groups' => $this->request->getVar('groups'),
				'booking' => $this->request->getVar('booking')
			]

		);


foreach($this->showusers->detail($this->request->getVar('sales'))->getResultArray() as $us) :
	$no_sales = $us['contact'];
endforeach;

		$url = 'https://app.whacenter.com/api/send';

		$ch = curl_init($url);
		$nama = $this->request->getVar('nama_leads');
		$project = $this->request->getVar('project');
		$no_cust = $this->request->getVar('nomor_kontak');
		$nohp = $no_sales;
		$pesan = "New Leads

Project : $project

Nama : $nama
Nomor : $no_cust

Mohon segera di Follow Up 
Terima Kasih 🙏
";
		// $file = 'https://i.ibb.co/S5GYRNL/bird-thumbnail.jpg';

		$data = array(
			'device_id' => 'ad741cadc5f1600e983a0cfce284c1f7',
			'number' => $nohp,
			'message' => $pesan,
			// 'file' => $file,

		);
		$payload = $data;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result;


		// $status = strtolower($this->request->getVar('update_status'));

		session()->setFlashdata('pesan', 'Data added successfully');

		return redirect()->to('/leads/new');
	}


	public function delete_leads($id)
	{
		$this->showleads->delete($id);
		session()->setFlashdata('pesan', 'Data ' . $id . ' deleted successfully');
		return redirect()->to('/leads/new');
	}



	public function edit_leads($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'leads' => $this->showleads->getLeads($id),
			'validation' => \Config\Services::validation(),
			'projects' => $this->showprojects->project(),
			'sales' => $this->showusers->salesUser(),
			'user_group' => $this->showusers,
			'group' => $this->showgroups->list(),
			'group_name' => $this->showgroups,
			'title' => 'Edit Leads'
		];

		return view('cms/edit_leads', $data);
	}


	public function update_leads()
	{


		if (!$this->validate([

			// 'nama_leads' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Name Harus diisi'
			// 	]
			// ],

			// 'nomor_kontak' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Phone Harus diisi'
			// 		// 'is_unique' => '{field} already registered'
			// 	]
			// ],


			// 'alamat' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Address Harus diisi'
			// 	]
			// ],

			// 'email' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Email Harus diisi'
					// 'is_unique' => '{field} already registered'
			// 	]
			// ],



			// 'project' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Project Harus diisi'
			// 	]
			// ],

			// 'sumber_leads' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Lead Source Harus diisi'
			// 	]
			// ],


			// 'general_manager' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'General Manager Harus diisi'
			// 	]
			// ],


			// 'manager' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Sales Manager Harus diisi'
			// 	]
			// ],


			// 'sales' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Sales Harus diisi'
			// 	]
			// ],

			'update_status' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Status Harus dirubah'
				]
			],


			// 'catatan' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Feedback Harus dirubah'
			// 	]
			// 	],


			'kategori_status' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Category Harus dirubah'
				]
			]



		])) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}


		$status = ($this->request->getVar('kategori_status') == "Reserve") ? 'reserve' : (($this->request->getVar('kategori_status') == "Booking") ? 'booking' : strtolower($this->request->getVar('update_status')));

		$this->showleads->save(
			[
				'id' => $this->request->getVar('id'),
				'groups' => $this->request->getVar('groups'),
				'nama_leads' => $this->request->getVar('nama_leads'),
				'alamat' => $this->request->getVar('alamat'),
				'nomor_kontak' => $this->request->getVar('nomor_kontak'),
				'email' => $this->request->getVar('email'),
				'project' => $this->request->getVar('project'),
				'sumber_leads' => $this->request->getVar('sumber_leads'),
				'general_manager' => $this->request->getVar('general_manager'),
				'manager' => $this->request->getVar('manager'),
				'sales' => $this->request->getVar('sales'),
				'update_status' => $this->request->getVar('update_status'),
				'kategori_status' => $this->request->getVar('kategori_status'),
				'catatan' => $this->request->getVar('catatan'),
				'catatan_admin' => $this->request->getVar('catatan_admin'),
				'reserve' => $this->request->getVar('reserve'),
				'booking' => $this->request->getVar('booking'),
				'time_stamp_' . $status => $this->request->getVar('time_stamp_' . $status)
			]
		);


		session()->setFlashdata(
			'pesan',
			'Data ' . $this->request->getVar('nama_leads') . ' updated successfully'
		);

		return redirect()->to(($this->request->getVar('update_status') == 'Invalid') ? '/leads/close' : '/leads/' . strtolower($this->request->getVar('update_status')));
	}





	public function add_project()
	{

		$id = user()->id;
		$data = [
			'new' => $this->showleads->new(),
			'group' => $this->showgroups->list(),
			'group_project' => $this->showgroups,
			'user_group' => $this->showgroupsales->user($id),
			'title' => 'Add Project'
		];

		return view('cms/add_project', $data);
	}


	public function project_save()
	{

		$validation = \Config\Services::validation();

		if (!$this->validate([
			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Name Harus diisi'
				]
			],
			'city' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'City Harus diisi'
				]
			],

			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Full Address Harus diisi'
				]
			],

			'groups' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Groups Harus diisi'
				]
			],

			'logo' => [
				'rules' => 'uploaded[logo]|max_size[logo,1024]|ext_in[logo,png,jpg,jpeg,gif]',
				'errors' => [
					'uploaded' => 'Logo harus diisi',
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			]




		])) {

			return redirect()->to('/add_project')->withInput()->with('error', $this->validator->getErrors());
		}



		$file = $this->request->getFile('logo');
		// $fileName = $file->getName();
		$fileName = $file->getRandomName();
		$folderName = rand();

		$data = $this->request->getVar('materport');

		$this->showprojects->save(
			[
				'project' => $this->request->getVar('project'),
				'city' => $this->request->getVar('city'),
				'alamat' => $this->request->getVar('alamat'),
				'harga_mulai' => $this->request->getVar('harga_mulai'),
				'cicilan_mulai' => $this->request->getVar('cicilan_mulai'),
				'promo_berlaku' => $this->request->getVar('promo_berlaku'),
				'promo_berakhir' => $this->request->getVar('promo_berakhir'),
				'nup' => $this->request->getVar('nup'),
				'rental_garansi' => $this->request->getVar('rental_garansi'),
				'luas_tanah' => $this->request->getVar('luas_tanah'),
				'luas_bangunan' => $this->request->getVar('luas_bangunan'),
				'floor' => $this->request->getVar('floor'),
				'bathroom' => $this->request->getVar('bathroom'),
				'living_room' => $this->request->getVar('living_room'),
				'dinning_room' => $this->request->getVar('dinning_room'),
				'kitchen' => $this->request->getVar('kitchen'),
				'bed_room' => $this->request->getVar('bed_room'),
				'rooftop' => $this->request->getVar('rooftop'),
				'carport' => $this->request->getVar('carport'),
				'mezanine' => $this->request->getVar('mezanine'),
				'no_hp' => $this->request->getVar('no_hp'),
				'no_telp' => $this->request->getVar('no_telp'),
				'email' => $this->request->getVar('email'),
				'website' => $this->request->getVar('website'),
				'facebook' => $this->request->getVar('facebook'),
				'instagram' => $this->request->getVar('instagram'),
				'tiktok' => $this->request->getVar('tiktok'),
				'youtube' => $this->request->getVar('youtube'),
				'fasilitas' => $this->request->getVar('fasilitas'),
				'groups' => $this->request->getVar('groups'),
				'materport' => serialize($data),
				'folder' => $folderName,
				'logo' => $fileName
			]
		);


		if ($file->isValid() && !$file->hasMoved()) {
			$file->move('document/image/project/logo/', $fileName);
			mkdir('document/image/project/interior/' . $folderName);
			mkdir('document/video/project/' . $folderName);
			mkdir('document/image/project/promotion/' . $folderName);
			mkdir('document/file/project/' . $folderName);
		}


		session()->setFlashdata(
			'pesan',
			'Data Added successfully'
		);
		return redirect()->to(base_url() . 'list_project');
	}



	public function edit_project($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'project' => $this->showprojects->detail($id),
			'title' => 'Edit Project'
		];

		return view('cms/edit_project', $data);
	}


	public function update_project()
	{

		$validation = \Config\Services::validation();

		if (!$this->validate([
			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Name Harus diisi'
				]
			],
			'city' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'City Harus diisi'
				]
			],

			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Full Address Harus diisi'
				]
			],



			'logo' => [
				'rules' => 'max_size[logo,1024]|ext_in[logo,png,jpg,jpeg,gif]',
				'errors' => [
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			]




		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}



		$file = $this->request->getFile('logo');
		// $fileName = $file->getName();
		$fileName = $file->getRandomName();
		$folderName = rand();

		$data = $this->request->getVar('materport');

		$row = $this->showprojects->detail($this->request->getVar('id'));

		foreach ($row->getResultArray() as $lg);

		$logo = ($file == "") ? $lg['logo'] : $fileName;

		$this->showprojects->save(
			[
				'id' => $this->request->getVar('id'),
				'project' => $this->request->getVar('project'),
				'city' => $this->request->getVar('city'),
				'alamat' => $this->request->getVar('alamat'),
				'harga_mulai' => $this->request->getVar('harga_mulai'),
				'cicilan_mulai' => $this->request->getVar('cicilan_mulai'),
				'promo_berlaku' => $this->request->getVar('promo_berlaku'),
				'promo_berakhir' => $this->request->getVar('promo_berakhir'),
				'nup' => $this->request->getVar('nup'),
				'rental_garansi' => $this->request->getVar('rental_garansi'),
				'luas_tanah' => $this->request->getVar('luas_tanah'),
				'luas_bangunan' => $this->request->getVar('luas_bangunan'),
				'floor' => $this->request->getVar('floor'),
				'bathroom' => $this->request->getVar('bathroom'),
				'living_room' => $this->request->getVar('living_room'),
				'dinning_room' => $this->request->getVar('dinning_room'),
				'kitchen' => $this->request->getVar('kitchen'),
				'bed_room' => $this->request->getVar('bed_room'),
				'rooftop' => $this->request->getVar('rooftop'),
				'carport' => $this->request->getVar('carport'),
				'mezanine' => $this->request->getVar('mezanine'),
				'no_hp' => $this->request->getVar('no_hp'),
				'no_telp' => $this->request->getVar('no_telp'),
				'email' => $this->request->getVar('email'),
				'website' => $this->request->getVar('website'),
				'facebook' => $this->request->getVar('facebook'),
				'instagram' => $this->request->getVar('instagram'),
				'tiktok' => $this->request->getVar('tiktok'),
				'youtube' => $this->request->getVar('youtube'),
				'fasilitas' => $this->request->getVar('fasilitas'),
				'materport' => serialize($data),
				'logo' => $logo
			]
		);


		if ($file->isValid() && !$file->hasMoved()) {
			$file->move('document/image/project/logo/', $fileName);
		}


		session()->setFlashdata(
			'pesan',
			'Data Updated successfully'
		);
		return redirect()->to(base_url() . 'list_project');
	}



	public function delete_project($id)
	{


		$pjid = $this->showprojects->detail($id);

		foreach ($pjid->getResultArray() as $pj);
		$img = $pj['logo'];
		$folder = $pj['folder'];

		$fileToDelete = 'document/image/project/logo/' . $img;

		if (is_file($fileToDelete)) {
			unlink($fileToDelete);
		}

		$folderinterior = 'document/image/project/interior/' . $folder;
		$foldervideo = 'document/video/project/' . $folder;
		$folderpromo = 'document/image/project/promotion/' . $folder;
		$folderfiles = 'document/file/project/' . $folder;


		$filesInt = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($folderinterior, RecursiveDirectoryIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($filesInt as $fileInfoInt) {
			if ($fileInfoInt->isDir()) {
				// Skip directories
				continue;
			}

			// Delete the file
			unlink($fileInfoInt->getRealPath());
		}


		$filesvid = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($foldervideo, RecursiveDirectoryIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($filesvid as $fileInfovid) {
			if ($fileInfovid->isDir()) {
				// Skip directories
				continue;
			}

			// Delete the file
			unlink($fileInfovid->getRealPath());
		}


		$filespromo = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($folderpromo, RecursiveDirectoryIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($filespromo as $fileInfopromo) {
			if ($fileInfopromo->isDir()) {
				// Skip directories
				continue;
			}

			// Delete the file
			unlink($fileInfopromo->getRealPath());
		}

		$filesfiles = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($folderfiles, RecursiveDirectoryIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($filesfiles as $fileInfofiles) {
			if ($fileInfofiles->isDir()) {
				// Skip directories
				continue;
			}

			// Delete the file
			unlink($fileInfofiles->getRealPath());
		}

		rmdir($folderinterior);
		rmdir($foldervideo);
		rmdir($folderpromo);
		rmdir($folderfiles);

		$this->showprojects->delete($id);

		session()->setFlashdata('pesan', 'Data ' . $id . ' deleted successfully');
		return redirect()->to(base_url() . 'list_project');
	}


	public function add_images_promo($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'id'=> $id,
			'title' => 'Add Promotion'
		];

		return view('cms/add_promo', $data);
	}


	public function save_promo($id)
	{

		$validation = \Config\Services::validation();

		

		if (!$this->validate([

			'images' => [
				'rules' => 'uploaded[images]|max_size[images,1024]|ext_in[images,png,jpg,jpeg,gif]',
				'errors' => [
					'uploaded' => 'Images harus diisi',
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			]


		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}

		$files = $this->request->getFiles();

		$pjid = $this->showprojects->detail($id);

		foreach ($pjid->getResultArray() as $pj);
		$folder = $pj['folder'];


		$uploadDir = 'document/image/project/promotion/'. $folder.'/';

		foreach ($files['images'] as $file) {
            // Check if the file is valid
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique file name
                $newName = $file->getRandomName();

                // Move the uploaded file to the desired location
                $file->move($uploadDir,$newName);
            }
        }

		session()->setFlashdata(
			'pesan',
			'Images Uploaded successfully'
		);
		return redirect()->to(base_url() . 'project/iklan_digital/'.$id);
	}


	public function add_images_interior($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'id'=> $id,
			'title' => 'Add Interior'
		];

		return view('cms/add_interior', $data);
	}


	public function save_interior($id)
	{

		$validation = \Config\Services::validation();

		

		if (!$this->validate([

			'images' => [
				'rules' => 'uploaded[images]|max_size[images,1024]|ext_in[images,png,jpg,jpeg,gif]',
				'errors' => [
					'uploaded' => 'Images harus diisi',
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			]


		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}

		$files = $this->request->getFiles();

		$pjid = $this->showprojects->detail($id);

		foreach ($pjid->getResultArray() as $pj):
		$folder = $pj['folder'];
		


		$uploadDir = 'document/image/project/interior/'. $folder.'/';

		foreach ($files['images'] as $file) {
            // Check if the file is valid
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique file name
                $newName = $file->getRandomName();

                // Move the uploaded file to the desired location
                $file->move($uploadDir,$newName);
            }
        }
		endforeach;
		session()->setFlashdata(
			'pesan',
			'Images Uploaded successfully'
		);
		return redirect()->to(base_url() . 'project/interior/'.$id);
	}


	public function add_video($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'id'=> $id,
			'title' => 'Add Video'
		];

		return view('cms/add_video', $data);
	}


	public function save_video($id)
	{

		$validation = \Config\Services::validation();

		

		if (!$this->validate([

			'videos' => [
				'rules' => 'uploaded[videos]|max_size[videos,10024]|ext_in[videos,mp4,MP4]',
				'errors' => [
					'uploaded' => 'Video harus diisi',
					'max_size' => 'Ukuran file lebih dari 10 mb',
					'ext_in' => 'Extensi file harus mp4'
				]
			]


		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}

		$files = $this->request->getFiles();

		$pjid = $this->showprojects->detail($id);

		foreach ($pjid->getResultArray() as $pj);
		$folder = $pj['folder'];


		$uploadDir = 'document/video/project/'. $folder.'/';

		foreach ($files['videos'] as $file) {
            // Check if the file is valid
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique file name
                $newName = $file->getRandomName();

                // Move the uploaded file to the desired location
                $file->move($uploadDir,$newName);
            }
        }

		session()->setFlashdata(
			'pesan',
			'Video Uploaded successfully'
		);
		return redirect()->to(base_url() . 'project/video/'.$id);
	}



	public function add_file($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'id'=> $id,
			'title' => 'Add File'
		];

		return view('cms/add_file', $data);
	}


	public function save_file($id)
	{

		$validation = \Config\Services::validation();

		

		if (!$this->validate([

			'files' => [
				'rules' => 'uploaded[files]|max_size[files,10024]|ext_in[files,pdf]',
				'errors' => [
					'uploaded' => 'File harus diisi',
					'max_size' => 'Ukuran file lebih dari 10 mb',
					'ext_in' => 'Extensi file harus mp4'
				]
			]


		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}

		$files = $this->request->getFiles();

		$pjid = $this->showprojects->detail($id);

		foreach ($pjid->getResultArray() as $pj);
		$folder = $pj['folder'];


		$uploadDir = 'document/file/project/'. $folder.'/';

		foreach ($files['files'] as $file) {
            // Check if the file is valid
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique file name
                $newName = $file->getRandomName();

                // Move the uploaded file to the desired location
                $file->move($uploadDir);
            }
        }

		session()->setFlashdata(
			'pesan',
			'File Uploaded successfully'
		);
		return redirect()->to(base_url() . 'project/'.$id);
	}



	public function add_user()
	{

		$data = [
				'new' => $this->showleads->new(),
				'projects' => $this->showprojects->findAll(),
				'adminProject' => $this->showusers->adminProject(),
				'adminAssistant' => $this->showusers->adminAssistant(),
				'sales' => $this->showusers->sales_adduser(),
				'title' => 'Add User'
			];
		
		return view('cms/add_user', $data);
	}

	public function edit_user_id()
	{

		$id= user()->id;

		$data = [
			'new' => $this->showleads->new(),
			//'projects' => $this->showprojects->findAll(),
			//'sales' => $this->showusers->sales(),
			'user' => $this->showusers->detail($id),
			//'group' => $this->showgroups->list(),
			//'group_name' => $this->showgroups,
			//'user_group' => $this->showusers,
			//'auth_group' => $this->showauthgroups->group($id),
			'title' => 'Edit User'
		];

		return view('cms/edit_user', $data);
	}

	// public function edit_user($id)
	// {

	// 	// $data = [
	// 	// 	'new' => $this->showleads->new(),
	// 	// 	'projects' => $this->showprojects->findAll(),
	// 	// 	'sales' => $this->showusers->sales_adduser(),
	// 	// 	'user' => $this->showusers->detail($id),
	// 	// 	'group' => $this->showgroups->list(),
	// 	// 	'group_name' => $this->showgroups,
	// 	// 	'user_group' => $this->showusers,
	// 	// 	'auth_group' => $this->showauthgroups->group($id),
	// 	// 	'title' => 'Edit User'
	// 	// ];

	// 	return view('cms/edit_user', $data);
	// }


	public function user_update()
	{

		$validation = \Config\Services::validation();

		if (!$this->validate([


			'user_image' => [
				'rules' => 'max_size[user_image,1024]|ext_in[user_image,png,jpg,jpeg,gif]',
				'errors' => [
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			],

			'fullname' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Name Harus diisi'
				]
			],

			// 'username' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Username Harus diisi'
			// 	]
			// ],

			// 'email' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Email Harus diisi'
			// 	]
			// ],

			'contact' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Contact Harus diisi'
				]
			],

			
		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}


		$id = $this->request->getVar('id');
		$file = $this->request->getFile('user_image');
		$name = $file->getName();

		foreach ($this->showusers->detail($id)->getResultArray() as $u);
		$image = $u['user_image'];

		if(empty($name)){
			$fileName = $image;
		}else{

			$fileToDelete = 'document/image/profile/user/' . $image;
			if (is_file($fileToDelete)) {
				unlink($fileToDelete);
			}

			$fileName = $file->getRandomName();
		}


		$this->showusers->save(
			[
				'id'=>$id,
				'name' => $this->request->getVar('name'),
				'fullname' => $this->request->getVar('fullname'),
				'username' => $this->request->getVar('username'),
				'email' => $this->request->getVar('email'),
				'contact' => $this->request->getVar('contact'),
				'city' => $this->request->getVar('city'),
				'address' => $this->request->getVar('address'),
				'user_image' => $fileName
			]
		);

		if ($this->request->getVar('level') == "admin") {
			$group_id = "1";
		} elseif ($this->request->getVar('level') == "users") {
			$group_id = "2";
		}

		$userId = $this->request->getVar('user_id');
		// $user = $this->authgroups->find($userId);

		// Update the group ID for the user
		$db = \Config\Database::connect();
		$db->table('auth_groups_users')
		->where('user_id', $userId)
		->update(['group_id' => $group_id]);

		// $this->authgroups->save(
		// 	[
		// 		'user_id' => $this->request->getVar('user_id'),
		// 		'group_id' => $group_id
		// 	]
		// );


		if ($file->isValid() && !$file->hasMoved()) {
			// $newName = $file->getRandomName();
			$file->move('document/image/profile/user/', $fileName);
		}


		session()->setFlashdata(
			'pesan',
			'Data updated successfully'
		);

		if($id == user()->id){
			return redirect()->to(base_url() . 'edit_user_id');
		}else{
			return redirect()->to(base_url() .'user/' . $id);
		}

		
	}




	public function add_event()
	{
		$id = user()->id;
		$data = [
			'new' => $this->showleads->new(),
			'error' => \Config\Services::validation(),
			'projects' => $this->showprojects->findAll(),
			'project' => $this->showprojects,
			'users' => $this->showusers,
			'sales' => $this->showusers->sales(),
			'user_group' => $this->showgroupsales->user($id),
			'group' => $this->showgroupsales,
			'group_project' => $this->showgroups,
			'title' => 'Add Event'
		];

		return view('cms/add_event', $data);
	}


	public function EventSave()
	{

		$validation = \Config\Services::validation();

		if (!$this->validate([
			'event_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Event Name Harus diisi'
				]
			],
			'city' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'City Harus diisi'
				]
			],

			'full_address' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Full Address Harus diisi'
				]
			],


			// 'project' => [
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'Project Harus diisi'
			// 	]
			// ],

			'contact' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Contact Harus diisi'
				]
			],

			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Email Harus diisi'
				]
			],

			'date_start' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Date Start Harus diisi'
				]
			],

			'date_end' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Date End Harus diisi'
				]
			],

			'image' => [
				'rules' => 'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,jpeg,gif]',
				'errors' => [
					'is_unique' => 'File sudah ada',
					'uploaded' => 'File Upload harus diisi',
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			],


			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Description Harus diisi'
				]
			],

		])) {


			// session()->setFlashdata('error', $this->validator->listErrors());
			// return redirect()->back()->withInput();
			return redirect()->to('/add_event')->withInput()->with('error', $this->validator->getErrors());
		}



		$file = $this->request->getFile('image');
		// $fileName = $file->getName();
		$fileName = $file->getRandomName();


		$this->showevent->save(
			[
				'event_name' => $this->request->getVar('event_name'),
				'project' => $this->request->getVar('project'),
				'city' => $this->request->getVar('city'),
				'full_address' => $this->request->getVar('full_address'),
				'contact' => $this->request->getVar('contact'),
				'email' => $this->request->getVar('email'),
				'date_start' => $this->request->getVar('date_start'),
				'date_end' => $this->request->getVar('date_end'),
				'description' => $this->request->getVar('description'),
				'groups' => $this->request->getVar('groups'),
				'image' => $fileName
			]
		);


		if ($file->isValid() && !$file->hasMoved()) {
			// $newName = $file->getRandomName();
			$file->move('document/image/event/', $fileName);
		}


		session()->setFlashdata(
			'pesan',
			'Data Added successfully'
		);
		return redirect()->to(base_url() .'list_event/30');
	}




	public function edit_event($id)
	{
		$data = [
			'new' => $this->showleads->new(),
			'event' => $this->showevent->detail($id),
			'projects' => $this->showprojects->findAll(),
			'group' => $this->showgroups->list(),
			'adminProject' => $this->showusers->adminProject(),
			'adminAssistant' => $this->showusers->adminAssistant(),
			'title' => 'Add Event'
		];

		return view('cms/edit_event', $data);
	}


	public function update_event($id)
	{



		if (!$this->validate([
			'event_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Event Name Harus diisi'
				]
			],
			'city' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'City Harus diisi'
				]
			],

			'full_address' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Full Address Harus diisi'
				]
			],

			'project' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Project Harus diisi'
				]
			],

			'contact' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Contact Harus diisi'
				]
			],

			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Email Harus diisi'
				]
			],

			'date_start' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Date Start Harus diisi'
				]
			],

			'date_end' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Date End Harus diisi'
				]
			],

			'image' => [
				'rules' => 'max_size[image,1024]|ext_in[image,png,jpg,jpeg,gif]',
				'errors' => [
					'max_size' => 'Ukuran file lebih dari 1 mb',
					'ext_in' => 'Extensi file harus png,jpg,jpeg,gif'
				]
			],


			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Description Harus diisi'
				]
			],

		])) {

			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}



		$file = $this->request->getFile('image');

		$name = $file->getName();

		foreach ($this->showevent->detail($id)->getResultArray() as $e);
		$image = $e['image'];

		if (empty($name)) {
			$fileName = $image;
		} else {

			$fileToDelete = 'document/image/event/' . $image;
			if (is_file($fileToDelete)) {
				unlink($fileToDelete);
			}

			$fileName = $file->getRandomName();
		}

		$this->showevent->save(
			[
				'id' => $id,
				'event_name' => $this->request->getVar('event_name'),
				'project' => $this->request->getVar('project'),
				'city' => $this->request->getVar('city'),
				'full_address' => $this->request->getVar('full_address'),
				'contact' => $this->request->getVar('contact'),
				'email' => $this->request->getVar('email'),
				'date_start' => $this->request->getVar('date_start'),
				'date_end' => $this->request->getVar('date_end'),
				'description' => $this->request->getVar('description'),
				'groups' => $this->request->getVar('groups'),
				'admin_group' => $this->request->getVar('admin_group'),
				'image' => $fileName
			]
		);


		if ($file->isValid() && !$file->hasMoved()) {
			$file->move('document/image/event/', $fileName);
		}

		session()->setFlashdata(
			'pesan',
			'Data updated successfully'
		);

		return redirect()->to(base_url() . 'list_event/30');
	}


	public function delete_event($id)
	{


		$event = $this->showevent->detail($id);

		foreach ($event->getResultArray() as $ev);
		$img = $ev['image'];

		$fileToDelete = 'document/image/event/' . $img;

		if (is_file($fileToDelete)) {
			unlink($fileToDelete);
		}

		$this->showevent->delete($id);

		session()->setFlashdata('pesan', 'Data ' . $id . ' deleted successfully');
		return redirect()->to(base_url() . 'list_event/30');
	}
}
