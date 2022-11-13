<?php 
$admin = new Admin();
$showadmin = $admin->getalladmin();
$showuser = $admin->getalluser();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables Acount Admin</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Start date</th> 
                                        <th>Coin</th> 
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Start date</th>
                                        <th>Coin</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <?php foreach ($showuser as $row) : ?>
                                <tbody>
                                    <tr style="color:green;">
                                        <td><?php echo $row['user_name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td>0</td>
                                        <td>
                                            <button class="btn btn-dark">Edit</button>
                                            <button class="btn btn-dark">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables Account User</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Date Create</th>
                                        <th>Rule</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Date Create</th>
                                        <th>Coin</th>
                                    </tr>
                                </tfoot>
                                <?php foreach ($showadmin as $row2) : ?>
                                <tbody>
                                    <tr style="color: red;">
                                        <td><?php echo $row2['admin_name']?></td>
                                        <td><?php echo $row2['email']?></td>
                                        <td>null</td>
                                        <td>null</td>
                                        <td>null</td>
                                        <td><?php echo $row2['rule']?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>