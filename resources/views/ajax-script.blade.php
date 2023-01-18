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
            // alert(product_id);

            if(confirm('Are you sure to delete this product?')){
                $.ajax({
                    url:"{{ route('delete-Product') }}",
                    method:'post',
                    data:{product_id:product_id},
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                        }
                    },
                });
            }
        });
    });
</script>