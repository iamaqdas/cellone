<?php
    $this->session->set_userdata('new_customers',0);
    $x = count($orders);
    $this->session->set_userdata('viewed_customers',$x);
?>

<div class="container-fluid ">
        <h1 class="page-header">Customers</h1>
    <hr class="dashed">
</div>