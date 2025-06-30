@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="javascript:void(0)" method="post" id="custom-step">
                    @csrf
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab">
                            <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">Client
                                Details</a>
                            <a class="nav-link " id="step2-tab" data-bs-toggle="tab" href="#step2">Project
                                Details</a>
                            <a class="nav-link " id="step3-tab" data-bs-toggle="tab" href="#step3">Project Budget</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        {{-- client details --}}
                        <div class="tab-pane active" id="step1">
                            <h4 class="card-title mt-3 mb-1"></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="name" class="col-lg-3 col-form-label text-end">Contact
                                            Person</label>
                                        <div class="col-lg-9">
                                            <input id="name" name="name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="mobile_no" class="col-lg-3 col-form-label text-end">Mobile
                                            No.</label>
                                        <div class="col-lg-9">
                                            <input id="mobile_no" name="mobile_no" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="country" class="col-lg-3 col-form-label text-end">Country</label>
                                        <div class="col-lg-9">
                                            <input id="country" name="country" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="email" class="col-lg-3 col-form-label text-end">Email
                                            Address</label>
                                        <div class="col-lg-9">
                                            <input id="email" name="email" type="email" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="address" class="col-lg-3 col-form-label text-end">Address</label>
                                        <div class="col-lg-9">
                                            <textarea id="address" name="address" rows="4"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="company_name" class="col-lg-3 col-form-label text-end">Company
                                            Name</label>
                                        <div class="col-lg-9">
                                            <input id="company_name" name="company_name" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="website" class="col-lg-3 col-form-label text-end">website</label>
                                        <div class="col-lg-9">
                                            <input id="website" name="website" type="url" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>

                            <div class="">
                                <button type="button" id="step1Next" class="btn btn-primary float-end">Next</button>
                            </div>
                        </div>

                        {{-- Project details section --}}
                        <div class="tab-pane" id="step2">
                            <h4 class="card-title mt-3 mb-1"></h4>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group row mb-2">
                                        <label for="title" class="col-lg-3 col-form-label text-end">Title</label>
                                        <div class="col-lg-9">
                                            <input id="title" name="title" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="status" class="col-lg-3 col-form-label text-end">Status</label>
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
                                        <label for="deadline" class="col-lg-3 col-form-label text-end">DeadLine</label>
                                        <div class="col-lg-9">
                                            <input id="deadline" name="deadline" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div>
                                <button type="button" id="step2Prev"
                                    class="btn btn-secondary float-start">Previous</button>
                                <button type="button" id="step2Next" class="btn btn-primary float-end">Next</button>
                            </div>
                        </div>

                        {{-- Budget section --}}
                        <div class="tab-pane" id="step3">
                            <h4 class="card-title mt-3 mb-1"></h4>
                            <div class="row">
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
                            <div>
                                <button type="button" id="step3Prev"
                                    class="btn btn-secondary float-start">Previous</button>
                                <button type="button" id="submit" class="btn btn-primary float-end">Create</button>
                            </div>
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
<!--end row-->

@endsection