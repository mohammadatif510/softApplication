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
                            <a class="nav-link " id="step2-tab" data-bs-toggle="tab" href="#step2">Project
                                Details</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        {{-- Project details section --}}
                        <div class="tab-pane active" id="step2">
                            <h4 class="card-title mt-3 mb-1"></h4>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group row mb-2">
                                        <label for="title" class="col-lg-3 col-form-label text-end">Title</label>
                                        <div class="col-lg-9">
                                            <input id="title" name="title" type="text" class="form-control"
                                                value="{{ $project->title }}">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="status" class="col-lg-3 col-form-label text-end">Status</label>
                                        <div class="col-lg-9">
                                            <select name="status" id="project_status" class="form-control">
                                                <option value="" disabled {{ is_null($project->status) ? 'selected' : ''
                                                    }}>Select Status</option>
                                                <option value="active" {{ $project->status == 'active' ? 'selected' : ''
                                                    }}>Active</option>
                                                <option value="completed" {{ $project->status == 'completed' ?
                                                    'selected' : '' }}>Completed</option>
                                                <option value="on-hold" {{ $project->status == 'on-hold' ? 'selected' :
                                                    '' }}>On-Hold</option>
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
                                                class="form-control">{{ $project->description }}</textarea>
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row mb-2">
                                        <label for="deadline" class="col-lg-3 col-form-label text-end">DeadLine</label>
                                        <div class="col-lg-9">
                                            <input id="deadline" name="deadline" type="date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($project->deadline)->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label for="budget" class="col-lg-3 col-form-label text-end">Total
                                        Budget</label>
                                    <div class="col-lg-9">
                                        <input id="budget" name="budget" type="number" class="form-control"
                                            value="{{ $project->budget->total_budget }}">
                                    </div>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end col-->

                            <div>
                                <button type="button" id="update" class="btn btn-primary float-end">Update</button>
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