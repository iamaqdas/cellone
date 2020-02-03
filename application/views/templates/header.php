<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $pagename; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .brand-logo {
            padding: 0 15px !important;
        }

        .hpcar {
            height: 70vh !important;
        }
        <?php 
            if($nonav == 1){
                echo "nav, .sidenav{display:none;}";
            }
        ?>
    </style>
</head>

<body>
    <!-- <nav class="indigo darken-3"></nav> -->

    <nav class="indigo darken-3">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="<?php if ($pagename == 'Home') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="<?php if ($pagename == 'Products') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>products">Products</a></li>
                <li class="<?php if ($pagename == 'Sell') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>sell">Sell</a></li>
                <li class="<?php if ($pagename == 'Repair') {
                                echo 'active';
                            } ?>"><a href="<?php echo base_url(); ?>repair">Repair</a></li>
                <li class="<?php if ($pagename == 'Login') {
                                echo 'active';
                            } ?>"><a class="waves-effect waves-light btn cyan accent-2 black-text " href="<?php echo base_url(); ?>login">Login</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li class="<?php if ($pagename == 'Home') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="<?php if ($pagename == 'Products') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>products">Products</a></li>
        <li class="<?php if ($pagename == 'Sell') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>sell">Sell</a></li>
        <li class="<?php if ($pagename == 'Repair') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>repair">Repair</a></li>
        <li class="<?php if ($pagename == 'Login') {
                        echo 'active';
                    } ?>"><a href="<?php echo base_url(); ?>login">Login</a></li>
    </ul>