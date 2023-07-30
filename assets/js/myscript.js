
new WOW().init();

//     $(document).ready(function() {
//         $('.delete_btn_ajax').click(function(e) {
//             e.preventDefault();
//             var deleteid = $(this).parent().attr('id');
//             // console.log(deleteid); 
//             swal({
//                     title: "Are you sure?",
//                     text: "Once deleted, you will not be able to recover this Data!",
//                     icon: "warning",
//                     buttons: true,
//                     dangerMode: true,
//                 })
//                 .then((willDelete) => {
//                     if (willDelete) {
// // console.log(deleteid)
//                         $.ajax({
//                             type: "post",
//                             url: "brand_delete.php",
//                             data: {id:deleteid},
//                             success: function(response) {
//                                 swal("Data Deleted Succefully.!",{
//                                     icon:"success",
//                                 }).then((result)=>{
//                                     location.reload();
//                                 });
                                
//                             }
//                         });
//                     }
//                 });


//         });
//     });