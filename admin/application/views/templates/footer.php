<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  $(window).on('load', function() {
    var x = "<?php echo $pagename; ?>";
    var i = "<?php echo $this->session->userdata('home_visit'); ?>";
    if(x == "Dashboard" && i == 1){
      var toastHTML = '<span>Welcome Admin</span>';
    M.toast({
      html: toastHTML
    });
    }
    <?php echo $this->session->set_userdata('home_visit',2); ?>
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances2 = M.Sidenav.init(elems);
    var ttpd = document.querySelectorAll('.tooltipped');
    var instances1 = M.Tooltip.init(ttpd);
    var fab = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(fab, {
      direction: 'top',
      hoverEnabled: true
    });

  });


  // Or with jQuery

  //   $(document).ready(function(){
  //     $('.sidenav').sidenav();
  //   });
</script>
</body>

</html>