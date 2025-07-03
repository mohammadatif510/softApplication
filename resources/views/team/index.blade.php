@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
    </div>
    <!--end col-->

    <div class="col-lg-6 text-end">
        <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal"
            data-bs-target="#teamCreateModal" id="createTeamModel">Create Team</button>
    </div>
    <!--end col-->
</div>
<!--end row-->
<div class="row" id="teamRow">
    @foreach ($teams as $team)
    <div class="col-lg-4">
        <div class="card team-card">
            <div class="card-body">
                <div class="float-end">
                    <div class="dropdown d-inline-block">
                        <a class="dropdown-toggle" id="dLabel1" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="las la-ellipsis-v font-24 text-muted"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel1">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#teamEditModal"
                                id="editTeamModel" data-id="{{ $team->id }}">Edit Team</a>
                            <a class="dropdown-item" href="#" id="deleteTeam" data-id="{{ $team->id }}">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="media align-items-center">
                    <div class="img-group">
                        <a class="user-avatar me-1" href="#">
                            <img src="{{ asset('assets/images/users/user-10.jpg') }}" alt="user"
                                class="rounded-circle thumb-md">
                            <span class="avatar-badge online"></span>
                        </a>
                    </div>
                    <div class="media-body ms-2 align-self-center">
                        <h5 class="m-0">{{ $team->teamLeader->name }}</h5>
                        <p class="text-muted font-12 mb-0">{{ $team->roles->name }}</p>
                    </div>
                </div>
                <h4 class="m-0 mt-3 font-13 mb-0 fw-bold">{{ $team->roleCategories->name }} Team</h4>
                <p class="text-muted mb-0 fw-semibold">{{ $team->description }}</p>
                <div class="mt-3 d-flex justify-content-between">
                    <div class="img-group">
                        @foreach ($team->members as $memeber)

                        <a class="user-avatar" href="#">
                            <img src="{{ asset('assets/images/users/user-8.jpg') }}" alt="user"
                                class="thumb-xs rounded-circle">
                        </a>
                        @endforeach
                    </div>
                    <div class="align-self-center">
                        <button type="button" class="btn btn-xs btn-light btn-round">View Details <i
                                class="mdi mdi-arrow-right"></i></button>
                    </div>
                </div>
                <hr class="hr-dashed my-3">
                <div class="media align-items-center">
                    <img src="{{ asset('assets/images/small/project-2.jpg') }}" alt="" class="rounded-circle thumb-sm">
                    <div class="media-body ms-3 align-self-center">
                        <h6 class="m-0 font-15">{{ $team->projects->title }}</h6>
                        <div class="d-flex justify-content-between">

                            <span class="text-muted">55% Complete</span>
                        </div>
                        <div class="progress mt-0" style="height:3px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 55%;"
                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->

    </div>
    <!--end col-->
    @endforeach
</div>
<!--end row-->


<div class="modal fade" id="teamCreateModal" tabindex="-1" aria-labelledby="teamCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="team-modal-dialog">
    </div>
</div>


<div class="modal fade" id="teamEditModal" tabindex="-1" aria-labelledby="teamEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="team-edit-modal-dialog">
    </div>
</div>

@endsection