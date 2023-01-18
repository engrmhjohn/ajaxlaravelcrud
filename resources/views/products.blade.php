<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">    
</head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <h2 class="text-center text-bold">Laravel 9 ajax CRUD </h2>
                <a class="btn btn-success mb-2" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</a>
                <div class="table-data">
                    <table class="table table-bordered table-hover">
                        <tr class="bg-info">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                        @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td class="text-center">
                                <a href=""
                                class="btn btn-success edit_product_form" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editModal" 
                                data-id="{{$product->id}}" 
                                data-name="{{$product->name}}" 
                                data-price="{{$product->price}}"
                                >
                                    <i class="las la-edit"></i>
                                </a>
                                <a href="" 
                                class="btn btn-danger delete_product" 
                                data-id="{{$product->id}}"
                                >
                                    <i class="las la-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            @include('add-product')
            @include('edit-product')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@include('ajax-script')
{!! Toastr::message() !!}
    </body>
</html>
