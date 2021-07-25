<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title> <?php echo $title; ?></title>

    <!--jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">






    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
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



        .img_div img {
            height: 4rem;
            width: 3.5rem;
            border-radius: 4px;
        }

        .img_preview img {
            border: 2px solid maroon;
            height: 7rem;
            width: 6.5rem;


        }

        .thd {
            font-size: 11px;

        }

        .thd th {

            text-align: center;
        }

        input {
            font-size: 14px !important;

        }

        .score {
            border: 1px solid gainsboro;
            border-radius: 4px;
        }

        .red-icon {
            font-size: 3rem;
            color: red;
            margin-right: 1.5rem;

        }

        .red-icon-message {
            font-size: 1.1rem;
        }



        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
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
                            <a class="nav-link" href="class.php">
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
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Staff Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student.php">
                                <span data-feather="users"></span>
                                Student Management
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="student_display.php">
                                <span data-feather="users"></span>
                                Student Display
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="score_upload.php">
                                <span data-feather="bar-chart-2"></span>
                                Result Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="dollar-sign"></span>
                                Fees Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <span data-feather="user-plus"></span>
                                Account Management
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h6">Student Management / List</h1>
                    <div class=" mb-2 mb-md-0">
                        <div class="mr-2">

                            <p>Welcome <?php echo $_SESSION['username']; ?></p>
                        </div>

                    </div>
                </div>