<div class="modal fade bd-example-modal-lg " id="createUserModal" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form id="createUserForm" action="javascript:void(0)" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="myLargeModalLabel">Create User</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--end modal-header-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control" placeholder="User Name">
                            <div id="name-error" class="text-danger mt-2"></div>
                        </div>
                        <!--end col-->


                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control" placeholder="User Email">
                            <div id="email-error" class="text-danger mt-2"></div>
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
    </div>
    <!--end modal-dialog-->
</div>