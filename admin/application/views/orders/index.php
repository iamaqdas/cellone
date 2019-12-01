<?php
    $this->session->set_userdata('new_orders',0);
    $x = count($orders);
    $this->session->set_userdata('viewed_orders',$x);
?>

<div class="jumbotron">
    <h1 class="page-header">Orders</h1>
    <p><?php var_dump($_SESSION);?></p>
</div>