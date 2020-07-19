<!--footer-->
<div class="footer">
  <p>&copy; ZANU PF Member Management System. All Rights Reserved | Design by
    <a href="#" target="_blank">Jackson Dambuka</a>
  </p>
</div>
<!--//footer-->
</div>

<!-- new added graphs chart js-->
<script src="js/utils.js"></script>

<!-- new added graphs chart js-->

<!-- Classie -->
<!-- for toggle left push menu script -->
<script src="js/classie.js"></script>
<script>

</script>

<!-- //Classie -->
<!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->

<!-- side nav js -->
<script src='js/SidebarNav.min.js' type='text/javascript'></script>


<script>
  $('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- for index page weekly sales java script -->
<script src="js/SimpleChart.js"></script>
<!-- //for index page weekly sales java script -->


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"> </script>
<!-- //Bootstrap Core JavaScript -->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {
    $('#all_users').DataTable({
      "columnDefs": [{
        "searchable": false,
        "targets": 8
      }]
    });
    $('#all_users_by_p').DataTable({
      "columnDefs": [{
        "searchable": false,
        "targets": 8
      }]
    });
    $('#all_emps').DataTable({
      "columnDefs": [{
        "searchable": false,
        "targets": 7
      }]
    });
    $('#all_data').DataTable({
      "columnDefs": [{
        "searchable": false,
        "targets": 8
      }]
    });
  });
</script>
</body>

</html>