<form id="assignRoleUserForm" action="javascript:void(0)" method="post">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title m-0" id="myLargeModalLabel">Assign Role to " {{ ucfirst($user->name) }} "</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--end modal-header-->
        <div class="modal-body">
            <input type="hidden" name="userId" value="{{ $user->id }}">
            <div class="row">
                @foreach ($roles as $role)
                <input type="checkbox" name="roles[]" id="" value="{{ $role->id }}" {{ $user->roles->contains('id',
                $role->id) ? 'checked' : '' }}> {{ $role->name }}
                @endforeach
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