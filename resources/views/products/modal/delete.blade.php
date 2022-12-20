<div class="modal fade" id="delete-product-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Delete Product</h2>
            </div>
            <div class="modal-body">
                <h4>{{$product->name}}</h4>
                <p><span class="text-muted">Section:</span> {{$product->section->name}}</p>
                <p><span class="text-muted">Price:</span> {{$product->price}}</p>
                <p><span class="text-muted">Description:</span> {{$product->description}}</p>
            </div>
            <div class="modal-footer border-0">
                <div class="ms-auto">
                    <div class="row d-inline">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-outline-danger">Cancel</button>
                        <form action="{{ route('destroy',$product->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-triangle-exclamation"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>