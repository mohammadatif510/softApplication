<form action="{{ route('admin.role.category.update',['id' => $roleCategory->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title m-0" id="myLargeModalLabel">Edit Role Category</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--end modal-header-->
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-8">
                    <input type="text" name="name" class="form-control" placeholder="Role Category Name"
                        value="{{ $roleCategory->name }}">
                    <div id="role-error" class="text-danger mt-2"></div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!--end modal-body-->
        <div class="modal-footer">
            <button type="submit" class="btn btn-de-primary btn-sm">Save</button>
            <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
        <!--end modal-footer-->
    </div>
    <!--end modal-content-->
</form>
<!--end modal-dialog-->