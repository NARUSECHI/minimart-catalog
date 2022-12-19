<div class="modal fade" id="delete-{{$section->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-danger"><i class="fa-solid fa-trash-can"></i>Delete</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete {{$section->name}} section?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secodary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <form action="{{route('section.destroy',$section->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                </form>   
            </div>
        </div>
    </div>
</div>