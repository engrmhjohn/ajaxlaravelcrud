<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <form action="" method="post" id="editProductForm">
    @csrf
    <input type="hidden" id="up_id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Update Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsg mb-2">

          </div>
          <div class="form-group">
            <label for="name"><strong>Product Name</strong></label>
            <input class="form-control mb-2" type="text" name="up_name" id="up_name" placeholder="Product Name">
            <label for="price"><strong>Product Price</strong></label>
            <input class="form-control" type="text" name="up_price" id="up_price" placeholder="Product Price">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary update_product">Update this Product</button>
        </div>
      </div>
    </div>
  </form>
</div>
