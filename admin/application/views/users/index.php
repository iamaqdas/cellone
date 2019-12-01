<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <style>
        .container {
            background-image: url('https://picsum.photos/id/227/1024/683');
            background-repeat: no-repeat;
            background-size: cover;
            max-width: 720px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding-top: 2rem;
            border-radius: 20px;
        }

        .display-5 {
            border-bottom: 2px dashed white;
            padding-bottom: 15px;
            color: white;
            font-weight: 500;
        }

        #checkemail {
            color: red;
            font-size: 15px;
        }

        #checkemail1 {
            color: lime;
            font-size: 15px;
        }

        .invi {
            display: none;
        }

        span {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 5px;
        }
        .frm{
            border-right:2px dashed white;
        }
        .text-black{
            color:black;
        }
    </style>
</head>

<body>

    <div class="container shadow-lg text-white pb-2">
    <h4 class="display-5 text-center"><span>Admin Register/Login</span></h4>
        <div class="row">
        
            <div class="col-md-6 frm">
                <?php echo form_open('register', 'id="registerform" method="POST"'); ?>
                <!-- <form action="<?php echo base_url(); ?>register" id="registerform" method="POST">  -->
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" id="email" required>
                        <p id="checkemail" class="invi">Email already registered</p>
                        <p id="checkemail1" class="invi">Email Available</p>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group text-center ">
                        <input id="register" type="submit" value="Register" class="btn btn-lg btn-success">
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-black mt-md-5">
            <?php echo form_open('login', 'id="loginform"  method="POST"'); ?>
                <!-- <form action="<?php echo base_url(); ?>login" class="my-auto" id="loginform" method="POST"> -->
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" id="email12" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group text-center ">
                        <input id="login" type="submit" value="Login" class="btn btn-lg btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
        $("#email").focusout(function() {
            // console.log('hello');
            var x = $("#registerform");
            const url = "<?php echo base_url(); ?>checkemail";
            $.ajax({
                type: "POST",
                url: url,
                data: x.serialize(),
                success: function(data) {
                    if (data == 1) {
                        $("#checkemail").removeClass('invi');
                        $("#checkemail1").addClass('invi');
                        $("#register").addClass('disabled');
                    } else if (data == 0) {
                        $("#checkemail").addClass('invi');
                        $("#checkemail1").removeClass('invi');
                        $("#register").removeClass('disabled');
                    }
                }
            });
        });
        $("#register").click(function(e) {
            e.preventDefault();
            var x = $("#registerform");
            const url = "<?php echo base_url(); ?>register";
            $.ajax({
                type: "POST",
                url: url,
                data: x.serialize(),
                success: function(data) {
                    if (data == 1) {
                        alert("Registration Successful");
                        window.location.replace('<?php echo base_url(); ?>login');
                    } else if (data == 0) {
                        alert("Registration Failed");
                        window.location.replace('<?php echo base_url(); ?>');
                    }
                }
            });
        });
        $("#login").click(function(e) {
            e.preventDefault();
            var x = $("#loginform");
            const url = "<?php echo base_url(); ?>login";
            $.ajax({
                type: "POST",
                url: url,
                data: x.serialize(),
                success: function(data) {
                    if (data == 1) {
                        alert("Login Successful");
                        window.location.replace('<?php echo base_url(); ?>dashboard');
                    } else if (data == 0) {
                        alert("Login Failed");
                        window.location.replace('<?php echo base_url(); ?>');
                    }
                }
            });
        });
    </script>
</body>

</html>