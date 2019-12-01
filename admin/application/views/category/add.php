<div class="col s12 " >
    <h1 class="page-header">
        Add Category
    </h1>
    <div class="dashed"></div>
    <?php echo form_open_multipart('create-category', 'id="category" class="container my-auto"'); ?>
    <div class="input-field col s6 m12 " style="margin-top:100px;">
        <input id="category_name" name="category_name" type="text" class="validate">
        <label for="category_name">Category Name</label>
    </div>
    <div class="col s12 text-center">
        <input type="submit" class="btn waves-effect waves-light" id="create" value="Add Category">
    </div>
    <?php echo form_close(); ?>
</div>

<!-- <script>
    $("#create").click(function(e) {
        e.preventDefault();
        var x = $("#category");
        const url = "<?php echo base_url(); ?>create_category";
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
</script> -->