<div class="modal fade" id="ModalEdit{{ $show->id }}" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('showtimes-update/' . $show->id) }}" class="form-container" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEdit">Edit Showtimes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label class="form-label"style="color: black">Show Date</label>
                        <input type="date" name="date_show" id="date_show" class="form-control "
                            value="{{ $show->date_show }}" required/>
                        <label class="form-label">Show Time</label>
                        <input type="time" name="start_time" id="start_time" class="form-control"
                            value="{{ $show->start_time }}" required  />
                        <label class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <input type="text" name="price" id="price" class="form-control row-md-2"
                                value="{{ $show->price }}" required />
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary px-5"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary px-5">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
