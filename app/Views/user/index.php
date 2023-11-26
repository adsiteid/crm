<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
    .simple-pagination ul {
        margin: 0 0 20px;
        padding: 0;
        list-style: none;
        text-align: left;
    }

    .simple-pagination li {
        display: inline-block;
        margin-right: 5px;

    }

    .simple-pagination li a,
    .simple-pagination li span {
        color: #666;
        padding: 8px 12px;
        text-decoration: none;
        background-color: #FFF;
        border-radius: 5px;
    }

    .simple-pagination .current {
        color: #1F3960;
        background-color: #fff;
        border: 1px;
        /* border-style: solid; */
    }

    .simple-pagination .prev.current,
    .simple-pagination .next.current {
        background: #fff;
    }
</style>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



<div class="d-flex align-items-center justify-content-between  pb-4 row ">
    <div class="col-lg-5 col-md-3 col-sm-3 col-12 ">

        <div class="dropdown flex-md-grow-1 flex-xl-grow-0 ">
            <button class="btn btn-primary dropdown-toggle mb-lg-0 mb-3 d-lg-block d-md-block d-sm-block d-none" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                Add Group / User
            </button>

            <div class="row d-lg-none d-md-none d-sm-none ">
                <div class="col-6 ">
                    <a type="button" href="<?= base_url(); ?>create/groups" class="btn btn-primary mb-lg-0 mb-4 w-100" type="button" style="font-size: 11px;">
                        Create Group
                    </a>
                </div>
                <div class="col-6">
                    <a type="button" href="<?= base_url(); ?>create/groupsales" class="btn btn-primary mb-lg-0 mb-4 w-100" type="button" style="font-size: 11px;">
                        Add User
                    </a>
                </div>
            </div>


            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>create/groups">Create Group</a>
                <a class="dropdown-item" href="<?= base_url(); ?>create/groupsales">Add User</a>
            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-5 col-12 text-right ">
        <div id="customSearch" style="margin-top: 20px;">
            <input type="text" id="searchInput" placeholder="Cari User..." class="form-control rounded bg-white ">
        </div>
    </div>
</div>



<?php

foreach ($users->user(user()->id)->getresultArray() as $id_user) :

?>


    <div class="card mb-3">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between  pb-3 row ">
                <div class="col-lg-5 col-md-3 col-sm-3 col-6">
                    <?php foreach ($users->groups($id_user['groups'])->getresultArray() as $groupheader); ?>
                    <a type="button" class=" btn btn-sm btn-light  mr-1 " style="font-size:12px;"><?= $id_user['group_name'];  ?></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-6 text-right ">

                    <a type="button" class=" btn btn-sm btn-light mr-1 " style="font-size:12px;" data-toggle="modal" data-target="#delete-data-<?= $id_user['groups'] ?>">Delete Group</a>

                    <div class="modal fade" id="delete-data-<?= $id_user['groups']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">Are you sure want to delete <b><?= $id_user['group_name'] ?></b> ?</div>
                                <div class="modal-footer ">
                                    <div class="row d-flex col-12 px-0 py-2">
                                        <div class="col-6">
                                            <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-6">
                                            <form action="<?= base_url(); ?>delete_group/<?= $id_user['groups'] ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-primary w-100"> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>


            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="d-sm-table-cell d-none">
                                No
                            </th>
                            <th>
                                Name
                            </th>
                            <th class="text-lg-left text-center ">
                                Level
                            </th>

                            <th class="d-sm-table-cell d-none">
                                Group
                            </th>

                            <th class="d-sm-table-cell d-none">
                                GM
                            </th>
                            <th class="d-sm-table-cell d-none">
                                manager
                            </th>
                            <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project") : ?>
                                <th class="d-sm-table-cell d-none">
                                    Action
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="list-wrapper-<?= $id_user['groups']; ?> ">
                        <?php $no = 1; ?>
                        <?php foreach ($users->groups($id_user['groups'])->getresultArray() as $row) : ?>
                            <tr class="list-item-<?= $id_user['groups']; ?> ">
                                <?php foreach ($user->detail($row['id_user'])->getresultArray() as $userdetail) : ?>
                                    <td class="d-sm-table-cell d-none" <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>
                                        <?= $no++; ?>
                                    </td>
                                    <td <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>

                                        <?php if ($userdetail['user_image'] !== 'default.jpg') : ?>
                                            <img class="img-profile rounded-circle ml-0 mr-lg-3 mr-1 object-fit-cover " src="<?= base_url(); ?>document/image/profile/user/<?= $userdetail['user_image']; ?>" style="width : 30px; height : 30px;" />
                                        <?php endif; ?>
                                        <?php if ($userdetail['user_image'] == 'default.jpg') : ?>
                                            <img class="img-profile rounded-circle ml-0 mr-lg-3 mr-1 object-fit-cover " src="<?= base_url(); ?>document/image/profile/default.jpg" style="width : 30px; height : 30px;" />
                                        <?php endif; ?>

                                        <?php
                                        $str = $userdetail['fullname'];
                                        if (strlen($str) > 15) {
                                            $str = substr($str, 0, 10) . ' ...';
                                        }
                                        echo $str;
                                        ?>
                                    </td>
                                    <td class="text-lg-left text-right pl-0" <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>
                                        <label style="font-size: 9px;" class="badge  badge-<?php if ($row['level'] == 'admin') {
                                                                                                echo 'primary';
                                                                                            } elseif ($row['level'] == 'sales') {
                                                                                                echo 'info';
                                                                                            } elseif ($row['level'] == 'manager') {
                                                                                                echo 'reserve';
                                                                                            } elseif ($row['level'] == 'general_manager') {
                                                                                                echo 'booking';
                                                                                            } elseif ($row['level'] == 'admin_group') {
                                                                                                echo 'success';
                                                                                            } elseif ($row['level'] == 'admin_project') {
                                                                                                echo 'primary';
                                                                                            } elseif ($row['level'] == 'management') {
                                                                                                echo 'warning';
                                                                                            } ?>"><?php if ($row['level'] == "admin_group" || $row['level'] == "admin_project") {
                                                                                                        echo 'admin';
                                                                                                    } elseif ($row['level'] == "general_manager") {
                                                                                                        echo 'GM';
                                                                                                    } else {
                                                                                                        echo $row['level'];
                                                                                                    } ?> </label>
                                    </td>
                                    <td class="d-sm-table-cell d-none" <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>
                                        <?= $row['group_name']; ?>
                                    </td>

                                    <!-- <td class="d-sm-table-cell d-none" >
                                        <?= $userdetail['address']; ?>
                                    </td> -->
                                    <td class="d-sm-table-cell d-none" <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>
                                        <?php
                                        $gm = $row['general_manager'];
                                        foreach ($user->detail($gm)->getResultArray() as $gm) :
                                            echo $gm['fullname'];
                                        endforeach;
                                        ?>

                                    </td>

                                    <td class="d-sm-table-cell d-none" <?= $level !== "sales" ? 'onclick="location.href=\'' . base_url() . 'user/' . $row['id_user'] . '\'"' : '' ?>>
                                        <?php
                                        $manager = $row['manager'];
                                        foreach ($user->detail($manager)->getResultArray() as $mng) :
                                            echo $mng['fullname'];
                                        endforeach;
                                        ?>
                                    </td>
                                    <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project") : ?>
                                        <td class="d-sm-table-cell d-none">

                                            <a type="button" class="btn p-0 mr-1" data-toggle="modal" data-target="#delete-data-<?= $row['id']; ?>"><i class="ti-trash menu-icon"></i></a>
                                            <a type="button" class="btn p-0" data-toggle="modal" data-target="#edit-data-<?= $row['id']; ?>"><i class="ti-pencil-alt menu-icon"></i></a>

                                            <!-- delete Modal-->

                                            <div class="modal fade" id="delete-data-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete User Group</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">Are you sure want to delete <b> <?php
                                                                                                                            $str = $userdetail['fullname'];
                                                                                                                            if (strlen($str) > 15) {
                                                                                                                                $str = substr($str, 0, 15) . ' ...';
                                                                                                                            }
                                                                                                                            echo $str;
                                                                                                                            ?> </b>from Group ?</div>
                                                        <div class="modal-footer ">
                                                            <div class="row d-flex col-12 px-0 py-2">
                                                                <div class="col-6">
                                                                    <button class="btn btn-secondary py-3 w-100" type="button" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <form action="<?= base_url(); ?>delete_user_group/<?= $row['id']; ?>" method="post">
                                                                        <?= csrf_field(); ?>
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-primary py-3 w-100"> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="edit-data-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="<?= base_url(); ?>update_user_group" method="post">
                                                    <?= csrf_field(); ?>

                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit : <?php
                                                                                                                        $str = $userdetail['fullname'];

                                                                                                                        echo $str . " (" . $userdetail['id'] . ")";
                                                                                                                        ?> </h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <label>Level</label>
                                                                        <select class="form-control form-select <?php if (session('error.level')) : ?>is-invalid<?php endif ?>" name="level">
                                                                            <option value="<?= $row['level']; ?>" selected> <?= $row['level']; ?></option>
                                                                            <option value="admin_group">Admin group</option>
                                                                            <option value="management">Management</option>
                                                                            <option value="general_manager">General Manager</option>
                                                                            <option value="manager">Manager</option>
                                                                            <option value="sales">Sales</option>

                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            <?= (session('error.level')); ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label>Project</label>
                                                                        <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?>" name="project">
                                                                            <option value="<?= $row['project']; ?>" selected> <?php foreach ($project->detail($row['project'])->getResultArray() as $pj) {
                                                                                                                                    echo $pj['project'];
                                                                                                                                } ?></option>
                                                                            <?php foreach ($users->projects($row['groups'])->getResultArray() as $grp) : ?>
                                                                                <option value="<?= $grp['project']; ?>"><?php foreach ($project->detail($grp['project'])->getResultArray() as $pj) {
                                                                                                                            echo $pj['project'];
                                                                                                                        } ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>

                                                                        <div class="invalid-feedback">
                                                                            <?= (session('error.project')); ?>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row ">

                                                                    <div class="col-6">
                                                                        <label>General Manager</label>
                                                                        <select class="form-control form-select <?php if (session('error.general_manager')) : ?>is-invalid<?php endif ?>" name="general_manager">
                                                                            <option value="<?= $row['general_manager']; ?>" selected> <?php
                                                                                                                                        $gm = $row['general_manager'];
                                                                                                                                        foreach ($user->detail($gm)->getResultArray() as $gm) :
                                                                                                                                            echo $gm['fullname'];
                                                                                                                                        endforeach;
                                                                                                                                        ?></option>
                                                                            <?php foreach ($users->general_manager($row['groups'])->getResultArray() as $gmanager) : ?>
                                                                                <option value="<?= $gmanager['id_user']; ?>"><?php foreach ($user->detail($gmanager['id_user'])->getResultArray() as $gmanager_fetch) : ?><?= $gmanager_fetch['fullname']; ?><?php endforeach; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            <?= (session('error.general_manager')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label>Manager</label>
                                                                        <select class="form-control form-select <?php if (session('error.manager')) : ?>is-invalid<?php endif ?>" name="manager">
                                                                            <option value="<?= $row['manager']; ?>" selected> <?php
                                                                                                                                $mg = $row['manager'];
                                                                                                                                foreach ($user->detail($mg)->getResultArray() as $mng) :
                                                                                                                                    echo $mng['fullname'];
                                                                                                                                endforeach;
                                                                                                                                ?></option>
                                                                            <?php foreach ($users->manager($row['groups'])->getResultArray() as $gmanager) : ?>
                                                                                <option value="<?= $gmanager['id_user']; ?>"><?php foreach ($user->detail($gmanager['id_user'])->getResultArray() as $gmanager_fetch) : ?><?= $gmanager_fetch['fullname']; ?><?php endforeach; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            <?= (session('error.manager')); ?>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                                <input type="hidden" name="sales" value="<?= $userdetail['id']; ?>">

                                                            </div>
                                                            <div class="modal-footer ">
                                                                <div class="row d-flex col-12 px-0 py-2">
                                                                    <div class="col-6">
                                                                        <button class="btn btn-secondary py-3 w-100" type="button" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <button type="submit" class="btn btn-primary py-3 w-100"> Simpan</button>
                                                </form>
                                            </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    </td>
<?php endif; ?>

<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php if (empty($id_user['groups'])) : ?>
    <div class="col-12 d-flex justify-content-center">
        <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-none d-block py-5" alt="" style="width:60%;">
        <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-block d-none py-5" alt="" style="width:20%;">
    </div>
<?php endif; ?>


</div>
</div>
</div>



<?php endforeach; ?>




<script>
    $(document).ready(function() {
        // Initialize DataTable with buttons
        var table = $("#table").DataTable({
            dom: 'rtp',
            paging: true,
            autoWidth: true,
            buttons: [
                "colvis",
                "copyHtml5",
                "csvHtml5",
                "excelHtml5",
                "pdfHtml5",
                "print"
            ]
        });

        // Add custom search functionality
        $("#searchInput").on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>





<?php $this->endSection(); ?>