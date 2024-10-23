	  </section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://www.facebook.com/wevolic">Wevolic</a>.</strong> All rights reserved.
  </footer>
  

  <?php if ( isset( $msg_error ) ): ?>
  <div id="dom-target" style="display: none;">  
    <?php
      echo "<pre>";
      print_r ($msg_error);
      echo "</pre>";
    ?>
  </div>  
  <?php endif;?>
<!-- ./wrapper -->
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ADMIN_LTE_PATH?>update/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo ADMIN_LTE_PATH?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo ADMIN_LTE_PATH?>update/raphael-min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>update/moment.min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMIN_LTE_PATH?>dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ADMIN_LTE_PATH?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMIN_LTE_PATH?>dist/js/demo.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/sorter/jquery.sortElements.js"></script>
<script>
            var th = jQuery('th'),
                li = jQuery('li'),
                inverse = false;
            
            th.click(function(){
                
                var header = $(this),
                    index = header.index();
                    
                header
                    .closest('table')
                    .find('td')
                    .filter(function(){
                        return $(this).index() === index;
                    })
                    .sortElements(function(a, b){
                        
                        a = $(a).text();
                        b = $(b).text();
                        
                        return (
                            isNaN(a) || isNaN(b) ?
                                a > b : +a > +b
                            ) ?
                                inverse ? -1 : 1 :
                                inverse ? 1 : -1;
                            
                    }, function(){
                        return this.parentNode;
                    });
                
                inverse = !inverse;
                
            });
  
</script>
<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var unit = button.data('unit')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    //modal.find('.modal-title').text('Product Name: ' + name)
    modal.find('.modal-body #pro_id').val(id)
    modal.find('.modal-body #pro_name').val(name)
    modal.find('.modal-body #pro_unit').val(unit)
  });

  $('#exampleModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var unit = button.data('unit')
    var price = button.data('price')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    //modal.find('.modal-title').text('Product Name: ' + name)
    modal.find('.modal-body #pro_id').val(id)
    modal.find('.modal-body #pro_name').val(name)
    modal.find('.modal-body #pro_unit').val(unit)
    modal.find('.modal-body #pro_price').val(price)
  });

  $('.print').click(function() {
      $('.btn').hide();
      $('.main-footer').hide();
      window.print();
  });

  $('.datepicker').datepicker({
    "todayHighlight":true,
    "autoclose": true,
    "format": 'yyyy-mm-dd',
  });

    function select_product(pro_id){
  if(pro_id!="-1"){

    loadData(pro_id);
  }else{
    $("#pro_id").val('');
  }
}

function loadData(pro_id){
  $.ajax({
        url: "<?= base_url()?>dealer/sales/loadData",
        method: 'POST',
        data:
        {pro_id: pro_id},
        success:function(read)
        { 
          if (read) {
            console.log('yeah!');
            obj = JSON.parse(read);
            console.log(JSON.stringify(obj));
            $('#sai_price').val(obj[0].pro_price);
          } else {
            $('#sai_price').val("0");
          }
        }
  });
}
</script>

<script>
  var msg_success = "<?php echo $this->session->flashdata('msg_success') ?>";
  if ( msg_success != "" ) {
    toastr.success('Success!', msg_success );
  }

  var msg_error = "<?php echo $this->session->flashdata('msg_error') ?>";
  if ( msg_error != "" ) {
    toastr.error('Error!', msg_error );
  }

  var div = document.getElementById("dom-target");
  var msg_error = div.textContent;
  if ( msg_error != "" || msg_error == 'false') {
    toastr.error('Error!', msg_error );
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script>
    
    $( "#thisweekcreated" ).click(function() {
        $('#thiscreatedstartdate').val(moment().startOf('isoWeek').format('YYYY-MM-DD'));
        $('#thiscreatedenddate').val(moment().endOf('isoWeek').format('YYYY-MM-DD'));
    });

    $( "#thismonthcreated" ).click(function() {
        $('#thiscreatedstartdate').val(moment().startOf('month').format('YYYY-MM-DD'));
        $('#thiscreatedenddate').val(moment().endOf('month').format('YYYY-MM-DD'));
    });

    $( "#thisweekother" ).click(function() {
        $('#thisotherstartdate').val(moment().startOf('isoWeek').format('YYYY-MM-DD'));
        $('#thisotherenddate').val(moment().endOf('isoWeek').format('YYYY-MM-DD'));
    });

    $( "#thismonthother" ).click(function() {
        $('#thisotherstartdate').val(moment().startOf('month').format('YYYY-MM-DD'));
        $('#thisotherenddate').val(moment().endOf('month').format('YYYY-MM-DD'));
    });
</script>

</body>
</html>
