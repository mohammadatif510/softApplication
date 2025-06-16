@extends('layouts.admin.admin-layout')

@section('admin-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#createUserModal">Create User</button>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive" id="userTableWrapper">
                    <table class="table" id="datatable_2">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr id="user-row-{{ $user->id }}">
                                <td>
                                    {{ ucfirst($user->name) }}

                                </td>
                                <td>
                                    {{ $user->email }}

                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                    <span class="badge bg-primary"> {{ ucfirst($role->name) }} </span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user->deActive == 1)
                                    <span class="badge bg-info"> DeActive </span>

                                    @else
                                    <span class="badge bg-success"> Activate </span>

                                    @endif
                                </td>
                                <td>
                                    {{ $user->created_at->format('Y : d : M') }}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-de-primary btn-sm"
                                        id="openEdituserModal" data-bs-toggle="modal" data-bs-target="#edituserModal"
                                        data-id="{{ $user->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @if ($user->deActive == 1)
                                    <a href="javascript:void(0)" data-id="{{ $user->id }}"
                                        data-role-category-name="{{ $user->name }}"
                                        class="btn btn-de-danger btn-sm deActive-user">
                                        <i class="fas fa-trash "></i> Activate
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" data-id="{{ $user->id }}"
                                        data-role-category-name="{{ $user->name }}"
                                        class="btn btn-de-danger btn-sm deActive-user">
                                        <i class="fas fa-trash "></i> DeActive
                                    </a>
                                    @endif

                                    <a href="javascript:void(0)" data-id="{{ $user->id }}"
                                        class="btn btn-de-success btn-sm openEditAssignRoleModal" data-bs-toggle="modal"
                                        data-bs-target="#assignRoleModal">
                                        <i class="fas fa-user-shield"></i> Assign
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@include('admin.user.modals.createUser')
<div class="modal fade" id="edituserModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" id="edit-user-modal-dialog" role="document">

    </div>

</div>

<div class="modal fade" id="assignRoleModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" id="assign-role-modal-dialog" role="document">

    </div>

</div>
@endsection