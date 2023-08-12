<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css">


    <title>CRM Diamondland</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body class="halaman-login   ">

    <?php

    $error = "";

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            $error = "Email atau password salah";
        } elseif ($_GET['pesan'] == "email_kosong") {
            $error = "Email belum diisi";
        } elseif ($_GET['pesan'] == "password_kosong") {
            $error = "password belum diisi";
        } elseif ($_GET['pesan'] == "email_atau_password_kosong") {
            $error = "Email atau Password belum diisi";
        }
    }
    ?>

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center align-middle  ">

            <div class="col-xl-6 col-lg-6 col-md-9  box-login"> <!-- col-xl-10-->

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0  ">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12"><!-- col-lg-6-->
                                <div class="p-lg-5 p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img src="../document/app_image/logo/logo-diamondland-1.png" alt="" style="width : 200px;"></h1>
                                    </div>
                                    <form class="user " action="../ps/check.php" method="post">
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" placeholder="Email" name="email_user" value="">
                                        </div>
                                        <div class="form-group">

                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                    -->
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block mb-3" type="submit" name="submit">
                                            Login
                                        </button>
                                        <span class="d-flex justify-content-center" style="color : red;"> <?php echo $error; ?></span>

                                    </form>
                                    <!--
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.php">Create an Account!</a>
                            </div>
                            -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>