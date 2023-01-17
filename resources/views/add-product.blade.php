<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="" method="post" id="addProductForm">
    @csrf

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsg mb-2">

          </div>
          <div class="form-group">
            <label for="name"><strong>Product Name</strong></label>
            <input class="form-control mb-2" type="text" name="name" id="name" placeholder="Product Name">
            <label for="price"><strong>Product Price</strong></label>
            <input class="form-control" type="text" name="price" id="price" placeholder="Product Price">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_product">Add this Product</button>
        </div>
      </div>
    </div>
  </form>
</div>
