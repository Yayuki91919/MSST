<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020 | Edited By __</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../assets/js/jquery-3.7.0.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->


<!-- Plugin js for this page -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/myscript.js"></script>
<!-- End custom js for this page -->

<!-- for delete btn with ajax -->
<script>
    $(document).ready(function() {
        $('.delete_btn_ajax').click(function(e) {
            e.preventDefault();
            var deleteid = $(this).parent().attr('id');
            // console.log(deleteid); 
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
// console.log(deleteid)
                        $.ajax({
                            type: "post",
                            url: "brand_delete.php",
                            data: {id:deleteid},
                            success: function(response) {
                                swal("Data Deleted Succefully.!",{
                                    icon:"success",
                                }).then((result)=>{
                                    location.reload();
                                });
                                
                            }
                        });
                    }
                });


        });
    });
</script>


</body>

</html>