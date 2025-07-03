<link href="{{ asset('/assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />


<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="teamCreateModalLabel">Edit Team</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form id="editTeamForm" method="POST" action="javascript:void(0)">
        @csrf
        <div class="modal-body">

            <input type="hidden" name="teamId" value="{{ $team->id }}">

            <div class="mb-3">
                <label for="role_category_id" class="form-label">Role Category</label>
                <select name="role_category_id" class="form-select" id="roleCategorySelect" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($team->role_category_id == $category->id) ? 'selected' : ''
                        }} >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="role_id" class="form-label">Team Role</label>
                <select name="role_id" class="form-select" id="roleDropdown" required>
                    <option value="">Select Role</option>
                    <!-- Roles will be populated dynamically based on category -->
                </select>
            </div>

            <div class="mb-3">
                <label for="team_leader_id" class="form-label">Team Leader</label>
                <select name="team_leader_id" class="form-select team_leader_id" id="teamLeaderDropdown" required>
                    <option value="">Select Team Leader</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Team Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $team->description }}</textarea>
            </div>


            <div class="mb-3">
                <label class="mb-3">Multi Select</label>
                <select name="members[]" id="multiSelect" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $team->members->contains($user->id) ? 'selected' : '' }}>{{
                        $user->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" class="form-select" required>
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ ($team->project_id == $project->id) ? 'selected' : '' }}>{{
                        $project->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-de-primary btn-sm">Update</button>
            <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
</div>

<script src="{{ asset('/assets/plugins/select/selectr.min.js') }}"></script>

<script>
    var selectedCategoryId = "{{ $team->role_category_id }}";
    var selectedRoleId = "{{ $team->role_id }}";
    var selectedTeamLeaderId = "{{ $team->team_leader_id }}";
</script>

<script src="{{ asset('/assets/js/edit-team.js') }}"></script>