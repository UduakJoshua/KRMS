<?php
if (!isset($_SESSION['ad-user_id'])) {
    header('location:portal_login.php?invalid-session');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title> <?php echo $title; ?></title>


    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"-->



    <!--jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <!--jquery datable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!--favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS  and jquerry-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!-- bootbox cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
        section {
            min-height: 60vh;
        }

        #sidebarMenu,
        #navbar {
            background-color: maroon !important;

        }

        #sidebarMenu a {
            color: whitesmoke;
        }

        #sidebarMenu a:hover {
            color: goldenrod;
        }


        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .school-header {
            display: flex;
            justify-content: space-between !important;
            align-items: center;

        }

        .school-header2 {
            flex-direction: column;


        }

        .school-header h1 {
            text-transform: uppercase;
        }

        .head-text {
            font-size: 18px;
            font-weight: bold;


        }

        .portal_logo {
            border-radius: 10px;

            margin: 4px;
            width: 140px;
            height: 130px;
            padding: 2px;
        }



        .img_div img {
            height: 5rem;
            width: 4.5rem;
            border-radius: 50%;
        }

        .img_preview img {
            border: 2px solid maroon;
            height: 8rem;
            width: 7.5rem;


        }

        .img_div_2 img {
            height: 140px;
            width: 130px;
            border-radius: 4px;
            border: 3px solid maroon;
            margin-top: 20px;
        }

        #error {

            border-radius: 6px;
            height: auto;
            margin-top: 2px;
            font-size: 1rem;
            padding: 0.4rem;
            margin-bottom: 4px;
        }

        .table,
        .thd {
            font-size: 14px;
            padding: 1.5px !important;


        }

        .table .thead-dark th {
            text-align: center !important;
            border: 1.2px solid white;
            padding: 6px;
            font-size: 16px;
        }

        .table_fees tr td {
            height: 8px;
            line-height: 3px;
            padding: 10px;
            margin-top: 2px;
            vertical-align: middle;

        }




        .thd th {
            text-align: center;
        }

        .td_center {
            text-align: center;
        }

        input {
            font-size: 16px !important;

        }

        .score {
            border: 1px solid gainsboro;
            border-radius: 4px;
        }

        .icon {
            color: cornsilk;
            font-size: 2rem;
            margin-top: 20px;


        }

        .icon_div {
            display: flex;
            height: 100px;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 20px;

        }

        .icon_div p {
            font-size: 16px;
        }

        .report_background {
            background-color: #fffef2;
            background-repeat: repeat;
            background-size: contain;
        }

        .student-details p {
            font-size: 16px;
            line-height: 1rem;
        }

        .tab {
            padding: 0.3px !important;
        }

        .th h6 {
            text-align: center;
        }

        .td_align {
            width: 40px;
            text-align: center;
        }

        .input-group-text {
            font-size: 0.7rem;
        }





        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* media queries*/
        @media screen and (max-width: 480px) {
            .table th {
                background-color: #DC3545 !important;
                color: white !important;
            }

            .table td {
                background-color: inherit !important;

            }

            .school-header {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }

            .report_background {
                margin: 4px;
            }

            .title-head {
                font-size: 18px;
                text-align: center;
                padding: 3px;
            }

            .head-text {
                font-size: 13px;
                text-align: center;

            }

            .school-header .head2 {
                text-align: center;
                font-size: 12px;
            }

            .head3 {
                font-size: 15px;
            }

            .display thead tr th {
                font-size: 12px !important;

            }

            tbody tr td {
                font-size: 12px;
            }

            .icon_div {
                margin: 8px;

            }

            .icon_div p {
                font-size: 20px;
            }
        }



        @media print {
            body {
                background-color: #fffef2 !important;
            }


            .print-container,
            .print-container * {
                visibility: visible;
                -webkit-print-color-adjust: exact
            }


            .table th {
                background-color: #DC3545 !important;
                color: white !important;
            }

            .table td {
                background-color: inherit !important;
            }


            .print-container {
                position: absolute;
                left: 0px;
                top: 2px;
                width: 100% !important;
                padding: 2px !important;
                margin: 0 !important;


            }

            #sidebarMenu,
            nav,
            .print_button,
            hr,
            footer {
                visibility: hidden;
                margin: 0px;
                display: none;



            }


        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" id="navbar">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Blessed Children Academy</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.php?logout=1">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="class_management.php">
                                <span data-feather="layers"></span>
                                Class Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="subject.php">
                                <span data-feather="book"></span>
                                Subject Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="staff_registeration.php">
                                <span data-feather="users"></span>
                                Staff Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_management.php">
                                <span data-feather="users"></span>
                                Student Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="result_management.php">
                                <span data-feather="bar-chart-2"></span>
                                Result Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="e_learning_admin.php">
                                <span data-feather="monitor"></span>
                                E-Learning
                            </a>
                        </li>
                        <?php if ($_SESSION['username'] != "supervisor") : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="accounts.php">
                                    <span data-feather="user-plus"></span>
                                    Account Management
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="fees_management.php">
                                    <span data-feather="dollar-sign"></span>
                                    Finance Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fees_report.php">
                                    <span data-feather="bar-chart-2"></span>
                                    Termly Reports
                                </a>
                            </li>

                        <?php endif; ?>

                    </ul>

                </div>
            </nav>