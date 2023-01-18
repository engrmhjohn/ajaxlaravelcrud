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
{!! $products->links() !!}