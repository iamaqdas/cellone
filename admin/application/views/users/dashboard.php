<style>
    .card-head {
        padding: 15px 0;
        border-bottom: 1px dashed black;
        text-align: center;
        font-size:33px;
    }

    .card {
        margin: 10px 0;
        height: 270px;
        text-align: justify;
        padding: 0 15px;
    }
</style>

<div class="col s12 row mx-0 blue-grey lighten-5 pb-3">
    <div class="col s12 m6 l3">
        <div class="card bg-dark text-white text-center" style="border-bottom:5px solid rgba(150,0,255,1)">
            <h3 class="card-head">Order</h3>
            <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam numquam ea minus! Dolorum enim facilis quia nam fugiat reiciendis cupiditate aut asperiores eos quod, beatae recusandae. Dolores modi sunt cum.
            </div>
        </div>
    </div>
    <div class="col s12 m6 l3">
        <div class="card bg-dark text-white text-center" style="border-bottom:5px solid blue">
            <h3 class="card-head">Customers</h3>
            <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam numquam ea minus! Dolorum enim facilis quia nam fugiat reiciendis cupiditate aut asperiores eos quod, beatae recusandae. Dolores modi sunt cum.
            </div>
        </div>
    </div>
    <div class="col s12 m6 l3">
        <div class="card bg-dark text-white text-center" style="border-bottom:5px solid rgba(0,255,0,1)">
            <h3 class="card-head">Products</h3>
            <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam numquam ea minus! Dolorum enim facilis quia nam fugiat reiciendis cupiditate aut asperiores eos quod, beatae recusandae. Dolores modi sunt cum.
            </div>
        </div>
    </div>
    <div class="col s12 m6 l3">
        <div class="card bg-dark text-white text-center" style="border-bottom:5px solid red">
            <h3 class="card-head">Revenue</h3>
            <div class="card-body">
                <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam numquam ea minus! Dolorum enim facilis quia nam fugiat reiciendis cupiditate aut asperiores eos quod, beatae recusandae. Dolores modi sunt cum. -->
                <?php var_dump($_SESSION['new_orders']); ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="chartholder mx-2">
        <canvas id="myChart" width="50vh" height="50vh"></canvas>
    </div>
</div>
<div class="col-md-12 pt-5">
    <h1>hello</h1>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
        <li><a class="btn-floating cyan tooltipped " data-position="left" data-tooltip="Manage Products" href="<?php echo base_url(); ?>products"><i class="material-icons">shopping_cart</i></a></li>
        <li><a class="btn-floating red tooltipped " data-position="left" data-tooltip="Manage Discounts" href="<?php echo base_url(); ?>discounts"><i class="material-icons">card_giftcard</i></a></li>
        <li><a class="btn-floating yellow darken-1 tooltipped " data-position="left" data-tooltip="Manage Category" href="<?php echo base_url(); ?>category"><i class="material-icons">list</i></a></li>
        <li><a class="btn-floating green tooltipped " data-position="left" data-tooltip="Manage Orders" href="<?php echo base_url(); ?>orders"><i class="material-icons">assignment</i></a></li>
        <li><a class="btn-floating blue tooltipped " data-position="left" data-tooltip="Manage Customers" href="<?php echo base_url(); ?>customers"><i class="material-icons">people</i></a></li>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: '# of revenue',
                data: [12, 19, 31, 25, 28, 53, 12, 19, 31, 25, 28, 53],

                backgroundColor: [
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)',
                    'rgba(255,0,0,0.2)'
                ],
                borderColor: [
                    'rgba(255,0,0,1)'
                ],
                borderWidth: 1
            }, {
                label: '# of customers',
                labelColor: 'red',
                data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)',
                    'rgba(0,0,255,0.2)'
                ],
                borderColor: [
                    'rgba(0,0,255,1)'
                ],
                borderWidth: 1
            }, {
                label: '# of products',
                data: [12, 2, 5, 1, 2, 3, 12, 19, 21, 25, 23, 29],
                backgroundColor: [
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)',
                    'rgba(0,255,0,0.2)'
                ],
                borderColor: [
                    'rgba(0,255,0,1)'
                ],
                borderWidth: 1
            }, {
                label: '# of orders',
                data: [2, 3, 2, 6, 18, 34, 2, 3, 2, 6, 18, 34],
                backgroundColor: [
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)',
                    'rgba(150,0,255,0.2)'
                ],
                borderColor: [
                    'rgba(150,0,255,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 2,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    myChart.canvas.parentNode.style.height = '80vh';
    myChart.canvas.parentNode.style.width = '98vw';
</script>