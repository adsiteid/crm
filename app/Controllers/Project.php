<?php

namespace App\Controllers;

use \App\Models\ProjectModel;
use \App\Models\LeadsModel;
use \App\Models\GroupSalesModel;



class Project extends BaseController
{

	protected $showproject;
	protected $showleads;
	protected $showgroupsales;

	public function __construct()
	{
		$this->showproject = new ProjectModel();
		$this->showleads = new LeadsModel();
		$this->showgroupsales = new GroupSalesModel;
	}

	public function detail($id)
	{


		$new = $this->showleads->new();

		$project_id = $this->showproject->detail($id);
		foreach ($project_id->getResultArray() as $p);
		$folder = $p['folder'];

		//interior
		$folder_interior = 'document/image/project/interior/' . $folder . '/';
		$interior = array_diff(scandir($folder_interior), array('.', '..'));

		//file marketing tools
		$folder_file_project = 'document/file/project/' . $folder . '/';
		$file_project = array_diff(scandir($folder_file_project), array('.', '..'));

		//file marketing tools
		$folder_promotion = 'document/image/project/promotion/' . $folder . '/';
		$file_promotion = array_diff(scandir($folder_promotion), array('.', '..'));

		if (in_groups('admin')) :
			$level = user()->level;
		endif;

		if (in_groups('users')) :
		$id = user()->id;

		if (empty($this->showgroupsales->user($id)->getResultArray())) {
			$level = "";
		}

		if (!empty($this->showgroupsales->user($id)->getResultArray())) {

		foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
			$level = $group['level'];
		}
		}
		endif;

		$data = [
			'project' => $project_id,
			'new' => $new,
			'level' => $level,
			'id' => $id,
			'interior' => $interior,
			'file_project' => $file_project,
			'promotion' => $file_promotion,
			'title' => 'Project'
		];

		return view('project/detail', $data);
	}


	public function iklandigital($id)
	{
		$new = $this->showleads->new();

		$project_id = $this->showproject->detail($id);
		foreach ($project_id->getResultArray() as $p);
		$folder = $p['folder'];

		//file marketing tools
		$folder_promotion = 'document/image/project/promotion/' . $folder . '/';
		$file_promotion = array_diff(scandir($folder_promotion), array('.', '..'));

		if (in_groups('admin')) :
			$level = user()->level;
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$level = "";
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

				foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					$level = $group['level'];
				}
			}
		endif;

		$data = [
			'new' => $new,
			'folder' => $folder,
			'level' => $level,
			'id' => $id,
			'promotion' => $file_promotion,
			'title' => 'Iklan Digital'
		];

		return view('project/iklan_digital', $data);
	}

	public function video($id)
	{
		$new = $this->showleads->new();

		$project_id = $this->showproject->detail($id);
		foreach ($project_id->getResultArray() as $p);
		$folder = $p['folder'];

		//file marketing tools
		$folder_promotion = 'document/video/project/' . $folder . '/';
		$file_promotion = array_diff(scandir($folder_promotion), array('.', '..'));


		if (in_groups('admin')) :
			$level = user()->level;
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$level = "";
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

				foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					$level = $group['level'];
				}
			}
		endif;

		$data = [
			'new' => $new,
			'folder' => $folder,
			'level' => $level,
			'id' => $id,
			'video' => $file_promotion,
			'title' => 'Video'
		];

		return view('project/video', $data);
	}


	public function interior($id)
	{
		$new = $this->showleads->new();

		$project_id = $this->showproject->detail($id);
		foreach ($project_id->getResultArray() as $p);
		$folder = $p['folder'];


		//file marketing tools
		$folder_promotion = 'document/image/project/interior/' . $folder . '/';
		$file_promotion = array_diff(scandir($folder_promotion), array('.', '..'));

		if (in_groups('admin')) :
			$level = user()->level;
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$level = "";
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

				foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					$level = $group['level'];
				}
			}
		endif;

		$data = [
			'new' => $new,
			'id' => $id,
			'level' => $level,
			'folder' => $folder,
			'interior' => $file_promotion,
			'title' => 'Interior'
		];

		return view('project/interior', $data);
	}

	public function file($id)
	{
		$new = $this->showleads->new();

		$project_id = $this->showproject->detail($id);
		foreach ($project_id->getResultArray() as $p);
		$folder = $p['folder'];


		//file marketing tools
		$folder_promotion = 'document/file/project/' . $folder . '/';
		$file_promotion = array_diff(scandir($folder_promotion), array('.', '..'));

		if (in_groups('admin')) :
			$level = user()->level;
		endif;

		if (in_groups('users')) :
			$id = user()->id;

			if (empty($this->showgroupsales->user($id)->getResultArray())) {
				$level = "";
			}

			if (!empty($this->showgroupsales->user($id)->getResultArray())) {

				foreach ($this->showgroupsales->user($id)->getResultArray() as $group) {
					$level = $group['level'];
				}
			}
		endif;

		$data = [
			'new' => $new,
			'level' => $level,
			'id' => $id,
			'folder' => $folder,
			'file' => $file_promotion,
			'title' => 'Interior'
		];

		return view('project/file/', $data);
	}

}
