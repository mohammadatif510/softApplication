<form id="updateAssignPermission" action="javascript:void(0)" method="post">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title m-0" id="myLargeModalLabel">Assign Permission to this role " {{ $role->name }} "
            </h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--end modal-header-->
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="roleId" value="{{ $role->id }}">
                @foreach ($groupedPermissions as $group => $permissions)
                <div class="col-lg-4">
                    <div class="permission-group mb-3">
                        <h5 style="text-transform: capitalize;">{{ $group }}</h5>
                        @foreach ($permissions as $permission)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                @if($rolePermissions->contains('id', $permission->id)) checked @endif
                            >
                            {{ ucwords(str_replace('.', ' ', $permission->name)) }}
                        </label><br>
                        @endforeach
                    </div>
                </div>
                @endforeach

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