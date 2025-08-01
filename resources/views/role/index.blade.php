@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModalLarge">Create Role</button>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive" id="roleTableWrapper">
                    <table class="table" id="datatable_2">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Role Category</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr id="role-row-{{ $role->id }}">
                                <td>
                                    {{ $role->name }}

                                </td>

                                <td>
                                    {{ $role->roleCategory->name ?? '' }}

                                </td>
                                <td>
                                    {{ $role->created_at->format('Y : d : M') }}
                                </td>
                                <td>
                                    @if ($role->name != 'admin')

                                    <a href="javascript::void(0)" id="openRoleModal" data-id="{{ $role->id }}"
                                        class="btn btn-de-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal">
                                        <i class=" fas fa-edit"></i> Edit
                                    </a>
                                    <a href="javascript:void(0)" data-id="{{ $role->id }}"
                                        data-role-name="{{ $role->name }}" class="btn btn-de-danger btn-sm delete-role">
                                        <i class="fas fa-trash "></i> Delete
                                    </a>
                                    <a href="javascript:void(0)" data-id="{{ $role->id }}"
                                        class="btn btn-de-success btn-sm assignPermission" data-bs-toggle="modal"
                                        data-bs-target="#assignPermissionModal">
                                        <i class="fas fa-user-shield"></i> Assign
                                    </a>

                                    @endif
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
@include('role.modals.createRole')

<div class="modal fade bd-example-modal-lg " id="editRoleModal" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" id="modal-dialog" role="document">

    </div>
    <!--end modal-dialog-->
</div>


<div class="modal fade bd-example-modal-lg " id="assignPermissionModal" tabindex="-1"
    aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" id="modal-dialog-assign-permission" role="document">

    </div>
    <!--end modal-dialog-->
</div>

@endsection