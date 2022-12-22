<div class="modal fade" id="delete-user-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content border border-danger">
            <div class="modal-header border-0 border-bottom border-danger">
                <h4 class="text-danger">Delete User</h4>
            </div>
            <div class="modal-body">
                <h6 class="text-danger fw-bold text-start">Are you sure Delete your accont?</h6> 
                <div class="mt-1">
                    <div class="row">
                        <div class="col text-start">
                            <span>Name: {{$user->name}}</span><br>
                            <span>Working Duration: {{$user->how_long}}year</span><br>
                            <span>
                                Role:   @if ($user->roke_id===1)
                                        Admin</h3>
                                    @else
                                        General</h3>
                                    @endif
                            </span>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img src="{{asset('storage/user/'.$user->image)}}" alt="{{$user->image}}" class="img-mid">
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="row">
                    <div class="col-auto">
                        <button type="button" data-bs-dismiss="modal" class="form-control">
                            Cancel
                        </button>
                    </div>
                    <div class="col-auto">
                        <form action="{{route('profile.destroy',Auth::user()->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white" class="form-control">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>