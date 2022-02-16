<?php
if (!isset($_SESSION['st-user_id'])) {
    header('location:student_login.php');
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
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!--favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">


    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->




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

        .portal_logo {
            border-radius: 10px;

            margin: 4px;
            width: 100px;
            height: 100px;
            padding: 2px;
        }



        .img_div img {
            height: 5rem;
            width: 4.5rem;
            border-radius: 50%;
        }

        .img_preview img {
            border: 2px solid maroon;
            height: 7rem;
            width: 6.5rem;


        }

        .img_div_2 img {
            height: 110px;
            width: 100px;
            border-radius: 4px;
            border: 3px solid maroon;
            margin-top: 20px;
        }

        .thd {
            font-size: 10px;

        }

        .thd th {

            text-align: center;
        }


        .td_center {
            text-align: center;
        }

        input {
            font-size: 14px !important;

        }

        .score {
            border: 1px solid gainsboro;
            border-radius: 4px;
        }

        .icon {
            color: cornsilk;
            font-size: 3rem;
            margin-top: 20px;

        }

        .icon_div {
            display: flex;
            height: 100px;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 10px;
        }

        .icon_div p {
            font-size: 23px;
        }

        .report_background {
            background-color: #ffffd3;
            background-repeat: repeat;
            background-size: contain;
        }

        .student-details p {
            font-size: 18px;
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

        .dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;

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
                font-size: 11px !important;

            }

            tbody tr td {
                font-size: 11px;
            }



            .student-info h2 {
                font-size: 20px;
                height: 60px;
            }

            .dashboard {
                flex-direction: column;
            }


        }



        @media print {
            body {
                background-color: #ffffd3;
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
            .page-head,

            hr,
            footer {
                visibility: hidden;
                margin: 0px;
                display: none;

            }

        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
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
                    <?php $admin_no = $_SESSION['st-user_id'];
                    $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="student_dashboard.php">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="student_profile.php">
                                    <span data-feather="user"></span>
                                    Student Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($row['class_name'] == "JSS Three" || $row['class_name'] == "SSS Three") :
                                ?>
                                    <a class="nav-link" href="select_mock_no.php">
                                        <span data-feather="file"></span>
                                        Mock Result
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if ($row['class_name'] == "JSS Three" || $row['class_name'] == "SSS Three") :
                                ?>
                                    <a class="nav-link d-none" href="#">
                                        <span data-feather="file"></span>
                                        Midterm Result
                                    </a>
                                <?php else :  ?>
                                    <a class="nav-link text-decoration-none" href="select_term.php"><span data-feather="file"></span> Midterm Result</a>
                                <?php endif; ?>
                            </li>

                            <li class="nav-item">

                                <?php if ($row['class_name'] == "JSS Three" || $row['class_name'] == "SSS Three") : ?>
                                    <a class="nav-link d-none" href="#">
                                        <span data-feather="file"></span>
                                    </a>
                                <?php else : ?>
                                    <a class="nav-link text-decoration-none" href="select_ex_term.php"><span data-feather="file"></span> Examination Result</a>
                                <?php endif; ?>
                            <?php endwhile ?>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="e_learning_students.php">
                                    <span data-feather="monitor"></span>
                                    E-Learning
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cbt.php">
                                    <span data-feather="edit"></span>
                                    CBT Practice
                                </a>
                            </li>

                        </ul>

                </div>
            </nav>