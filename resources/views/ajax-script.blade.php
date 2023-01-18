<script>
    $(document).ready(function(){
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            var name = $('#name').val();
            var price = $('#price').val();
            // console.log(name+price);
            $.ajax({
                url:"{{ route('add-Product') }}",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status=='success'){
                        $('#exampleModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("You've added one product!", "Success")
                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error:function(err){
                    var error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                },
            });
        });

        //show data in update form
        $(document).on('click','.edit_product_form',function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        //update product
        $(document).on('click','.update_product',function(e){
            e.preventDefault();
            var up_id = $('#up_id').val();
            var up_name = $('#up_name').val();
            var up_price = $('#up_price').val();
            // console.log(name+price);
            $.ajax({
                url:"{{ route('update-Product') }}",
                method:'post',
                data:{up_id:up_id,up_name:up_name,up_price:up_price},
                success:function(res){
                    if(res.status=='success'){
                        $('#editModal').modal('hide');
                        $('#editProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("You've updated one product!", "Success")
                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error:function(err){
                    var error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                },
            });
        });

        //delete product
        $(document).on('click','.delete_product',function(e){
            e.preventDefault();
            var product_id = $(this).data('id');

            if(confirm('Are you sure to delete this product?')){
                $.ajax({
                    url:"{{ route('delete-Product') }}",
                    method:'post',
                    data:{product_id:product_id},
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"](" You've deleted one product!", "Success")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    },
                });
            }
        });

        //pagination customize
        // $(document).on('click','.pagination a', function(e){
        //     e.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1]
        //     pagination(page);
        // });
        // function pagination(page){
        //     $.ajax({
        //         url:"/pagination/paginate-data?page="+page,
        //         success: function(res){
        //             $('.table-data').html(res);
        //         }
        //     })
        // }

        //search
        $(document).on('keyup',function(e){
            e.preventDefault();
            var search_string = $('#search').val();
            $.ajax({
                url:"{{route('search-Product')}}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.table-data').html(res);
                    if(res.status=='Nothing_found'){
                        $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                    }
                }
            });
        });
    });
</script>