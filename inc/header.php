<?php 
session_start();

if (!isset( $_SESSION['id'])) {
    header('Location: index.php');
  }
  if (!isset($_COOKIE['login'])) {
    header('Location: index.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Project 1  - Asib Mollick</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="upload/profile/<?= $_SESSION['photo'] ?>" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?= $_SESSION['name'] ?></span>
                    <span class="profession"><?= $_SESSION['uname'] ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-links">
                        <a href="dashbroad.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-links">
                        <a href="allusers.php">
                            <i class='bx bx-bar-chart-alt-2 icon'  ></i>
                            <span class="text nav-text">All Users</span>
                        </a>
                    </li>

                    <li class="nav-links">
                        <a href="status.php">
                            <i class='bx  bx-user-pin icon'></i>
                            <span class="text nav-text">Users status</span>
                        </a>
                    </li>

                    <li class="nav-links">
                        <a href="activeuser.php">
                            <i class='bx bx-user-check icon'></i>
                            <span class="text nav-text">Active Users</span>
                        </a>
                    </li>

                    <li class="nav-links">
                        <a href="deactive.php">
                            <i class='bx bx-user-x icon'></i>
                            <span class="text nav-text">Deactive users</span>
                        </a>
                    </li>

                    <li class="nav-links">
                        <a href="user2.php?id=<?= $_SESSION['id'] ?>">
                            <i class='bx bxs-edit icon'></i>
                            <span class="text nav-text">Edit users</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Project 1</div>