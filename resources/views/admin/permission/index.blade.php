@extends('layouts.admin.admin-layout')

@section('admin-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#permissionModal">Create Permission</button>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive" id="permissionTableWrapper">
                    <table class="table" id="datatable_2">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr id="permission-row-{{ $permission->id }}">
                                <td>
                                    {{ $permission->name }}

                                </td>
                                <td>
                                    @foreach ($permission->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $permission->created_at->format('Y : d : M') }}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-de-primary btn-sm"
                                        id="openEditpermissionModal" data-bs-toggle="modal"
                                        data-bs-target="#editpermissionModal" data-id="{{ $permission->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="javascript:void(0)" data-id="{{ $permission->id }}"
                                        class=" btn btn-de-primary btn-sm delete-permission">
                                        <i class="fas fa-trash "></i>
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
@include('admin.permission.modals.createPermission')
<div class="modal fade" id="editpermissionModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" id="modal-dialog" role="document">

    </div>

</div>
@endsection