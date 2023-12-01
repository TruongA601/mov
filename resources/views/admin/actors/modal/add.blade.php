<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('actor-create') }}" class="form-container" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCreate">Create Actor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" placeholder="Enter name" name="name" required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary px-5">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
