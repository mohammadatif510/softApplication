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
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <input type="hidden" name="client_id" value="{{ $client->id }}">

                        {{-- client details --}}
                        <div class="tab-pane active" id="step1">
                            <h4 class="card-title mt-3 mb-1"></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="name" class="col-lg-3 col-form-label text-end">Contact
                                            Person</label>
                                        <div class="col-lg-9">
                                            <input id="name" name="name" type="text" value="{{ $client->name }}"
                                                class="form-control">
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
                                            <input id="mobile_no" name="mobile_no" value="{{ $client->phone }}"
                                                type="number" class="form-control">
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
                                            <input id="country" name="country" type="text"
                                                value="{{ $client->country }}" class=" form-control">
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
                                            <input id="email" value="{{ $client->email }}" name="email" type="email"
                                                class="form-control">
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
                                                class="form-control">{{ $client->address }}</textarea>
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
                                                class="form-control" value="{{ $client->company_name }}">
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
                                            <input id="website" name="website" value="{{ $client->website }}" type="url"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>

                            <div>
                                <button type="button" id="updateClient"
                                    class="btn btn-primary float-end">Update</button>
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