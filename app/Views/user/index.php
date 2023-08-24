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


<?php foreach ($users->user(user()->id)->getresultArray() as $id_user) : ?>



    <div class="card mb-3">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between  pb-3 row ">
                <div class="col-lg-5 col-md-3 col-sm-3 col-12 d-lg-block d-md-block d-sm-block d-none">
                    <?php foreach ($users->groups($id_user['groups'])->getresultArray() as $groupheader); ?>

                    <a href="<?= base_url(); ?>create/groupsales" type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 " style="font-size:12px;">Add User</a>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-12 ">
                    <form action="<?= base_url() ?>search_user" method="post" class=" col-lg col-sm col-12 form-inline mr-auto p-0  ">
                        <div class="input-group input-group-sm d-flex justify-content-end ">
                            <input type="text" class="form-control rounded-left bg-light pl-3 " placeholder="Search User ..." aria-label="Search" aria-describedby="basic-addon2" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary rounded-right" type="submit">
                                    <i class="icon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="d-sm-table-cell d-none">
                                No
                            </th>
                            <th>
                                Name
                            </th>
                            <th class="text-lg-left text-right pl-0">
                                Level
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Address
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Email
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Contact
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="list-wrapper ">
                        <?php $no = 1; ?>
                        <?php foreach ($users->groups($id_user['groups'])->getresultArray() as $row) : ?>
                            <tr class="list-item ">
                                <?php foreach ($user->detail($row['id_user'])->getresultArray() as $userdetail) : ?>
                                    <td class="d-sm-table-cell d-none" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                        <?= $no++; ?>
                                    </td>
                                    <td <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>

                                        <?php if ($userdetail['user_image'] !== 'default.jpg') : ?>
                                            <img class="img-profile rounded-circle ml-0 mr-lg-3 mr-1 object-fit-cover " src="<?= base_url(); ?>document/image/profile/user/<?= $userdetail['user_image']; ?>" style="width : 30px; height : 30px;" />
                                        <?php endif; ?>
                                        <?php if ($userdetail['user_image'] == 'default.jpg') : ?>
                                            <img class="img-profile rounded-circle ml-0 mr-lg-3 mr-1 object-fit-cover " src="<?= base_url(); ?>document/image/profile/default.jpg" style="width : 30px; height : 30px;" />
                                        <?php endif; ?>

                                        <?php
                                        $str = $userdetail['fullname'];
                                        if (strlen($str) > 15) {
                                            $str = substr($str, 0, 15) . ' ...';
                                        }
                                        echo $str;
                                        ?>
                                    </td>
                                    <td class="text-lg-left text-right pl-0" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                        <label style="font-size: 9px;" class="badge badge-<?php if ($row['level'] == 'admin') {
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
                                                                                            } ?>"><?php if ($row['level'] == "admin_group" || $row['level'] == "admin_project") {
                                                                                                        echo 'admin';
                                                                                                    } elseif ($row['level'] == "general_manager") {
                                                                                                        echo 'GM';
                                                                                                    } else {
                                                                                                        echo $row['level'];
                                                                                                    } ?> </label>
                                    </td>

                                    <td class="d-sm-table-cell d-none" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                        <?= $userdetail['address']; ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                        <?= $userdetail['email']; ?>
                                    </td>

                                    <td class="d-sm-table-cell d-none" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                        <?= $userdetail['contact']; ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none">
                                        <form action="<?= base_url(); ?>delete_user_group/<?= $row['id']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn p-0"  type="submit"><i class="ti-trash menu-icon"></i></button>
                                        </form>
                                    </td>

                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <!-- delete Modal-->

    <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Are you sure want to delete this user from Group ?</div>
                <div class="modal-footer ">
                    <div class="row d-flex col-12 px-0 py-2">
                        <div class="col-6">
                            <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <form action="<?= base_url(); ?>delete_user_group/<?= $userdetail['id']; ?>" method="post">
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



<?php endforeach; ?>


<div id="pagination-container" class="my-4"></div>


<!-- Pagination -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

<script>
    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 10;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        }

    );
</script>





<?php $this->endSection(); ?>