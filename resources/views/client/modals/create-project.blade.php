

<form id="creteClientProject" action="javascript:void(0)" method="post">
    @csrf
    <input type="hidden" name="client_id" value="{{ $clientData->id }}">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title m-0" id="myLargeModalLabel">Create project for {{ ucfirst($clientData->name) }}</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--end modal-header-->
        <div class="modal-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="javascript:void(0)" method="post" id="custom-step">
                            @csrf
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab">
                                    <a class="nav-link " id="step2-tab" data-bs-toggle="tab" href="#step2">Project
                                        Details</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                {{-- Project details section --}}
                                <div class="tab-pane active" id="step2">
                                    <h4 class="card-title mt-3 mb-1"></h4>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row mb-2">
                                                <label for="title"
                                                    class="col-lg-3 col-form-label text-end">Title</label>
                                                <div class="col-lg-9">
                                                    <input id="title" name="title" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="status"
                                                    class="col-lg-3 col-form-label text-end">Status</label>
                                                <div class="col-lg-9">
                                                    <select name="status" id="default">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="completed">Completed</option>
                                                        <option value="on-hold">On-Hold</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-->
                                        
                                    </div>
                                    <!--end row-->
                                    <div class="row">

                                        <!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="description"
                                                    class="col-lg-3 col-form-label text-end">Description</label>
                                                <div class="col-lg-9">
                                                    <textarea id="description" name="description" rows="4"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="deadline"
                                                    class="col-lg-3 col-form-label text-end">DeadLine</label>
                                                <div class="col-lg-9">
                                                    <input id="deadline" name="deadline" type="date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-->

                                         <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="budget" class="col-lg-3 col-form-label text-end">Total
                                                    Budget</label>
                                                <div class="col-lg-9">
                                                    <input id="budget" name="budget" type="number" class="form-control">
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </form>
                        <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
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

<script src="{{ asset('assets/plugins/select/selectr.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
         
        var selectMULT = document.querySelector("#default");
        new Selectr(selectMULT);
    });

        new Selectr('#default', {
            searchable: true,
            placeholder: "Select options"
        });

</script>