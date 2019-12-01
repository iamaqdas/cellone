<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo @$title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* nav {
            line-height: inherit !important;
        }




        .btn i {
            font-size: 24px;
            line-height: 1;
        } */
        .text-center {
            text-align: center;
        }

        .dashed {
            border-bottom: 1px dashed black;
        }

        .page-header {
            font-size: 25px;
            padding: 0 15px;
        }

        .pl-2 {
            padding-left: 15px;
        }

        .mx-0 {
            margin: auto 0;
        }

        .pb-3 {
            padding-bottom: 30px;
        }
        .px-3{
            padding:0 30px;
        }
        .my-auto{
            margin-top:auto;
            margin-bottom:auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <div class="nav-wrapper blue-grey darken-3 pl-2">
            <a href="#!" class="brand-logo">Cellone Admin</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="<?php if ($pagename == 'Dashboard') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                <li class="<?php if ($pagename == 'Category') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>category">Category</a></li>
                <li class="<?php if ($pagename == 'Products') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>products">Products</a></li>
                <li class="<?php if ($pagename == 'Orders') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>orders"><?php if($this->session->userdata['new_orders']==0){}else{echo '<span class="new badge green">'.$this->session->userdata['new_orders'].'</span>';} ?> Orders</a></li>
                <li class="<?php if ($pagename == 'Customers') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>customers"><?php if($this->session->userdata['new_customers']==0){}else{echo '<span class="new badge blue">'.$this->session->userdata['new_customers'].'</span>';} ?> Customers</a></li>
                <li class="<?php if ($pagename == 'Discounts') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>discounts">Discounts</a></li>
                <!-- <li class="<?php if ($pagename == 'Logs') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>logs">Logs</a></li> -->
                <li><a class="waves-effect waves-light btn red " href="<?php echo base_url(); ?>logout">Logout</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li class="<?php if ($pagename == 'Dashboard') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
        <li class="<?php if ($pagename == 'Category') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>category">Category</a></li>
        <li class="<?php if ($pagename == 'Products') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>products">Products</a></li>
        <li class="<?php if ($pagename == 'Orders') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>orders"><?php if($this->session->userdata['new_orders']==0){}else{echo '<span class="new badge green">'.$this->session->userdata['new_orders'].'</span>';} ?> Orders</a></li>
        <li class="<?php if ($pagename == 'Customers') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>customers"><?php if($this->session->userdata['new_customers']==0){}else{echo '<span class="new badge blue">'.$this->session->userdata['new_customers'].'</span>';} ?> Customers</a></li>
        <li class="<?php if ($pagename == 'Discounts') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>discounts">Discounts</a></li>
        <!-- <li class="<?php if ($pagename == 'Logs') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>logs">Logs</a></li> -->
        <li><a class="waves-effect waves-light btn red " href="<?php echo base_url(); ?>logout">Logout</a></li>
    </ul>

