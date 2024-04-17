<div class="modal-content">
    <div class="modal-header ml-3">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Product</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('admin.category.update', $product_category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-12">
                <label class="col-sm-3 col-form-label">Nama Kategori:</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                    placeholder="Enter Nama Kategori..." value="{{ $product_category->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="modal-footer mt-3">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
