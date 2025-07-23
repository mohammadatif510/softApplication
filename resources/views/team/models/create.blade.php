<link href="{{ asset('assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />


<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="teamCreateModalLabel">Create New Team</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form id="createTeamForm" method="POST" action="javascript:void(0)">
        @csrf
        <div class="modal-body">

            <div class="mb-3">
                <label for="role_category_id" class="form-label">Role Category</label>
                <select name="role_category_id" class="form-select" id="roleCategorySelect" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                <select name="team_leader_id" class="form-select team_leader_id" required>
                    <option value="">Select Team Leader</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Team Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>


            <div class="mb-3">
                <label class="mb-3">Multi Select</label>
                <select name="members[]" id="multiSelect" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" class="form-select" required>
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-de-primary btn-sm">Save</button>
            <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
</div>

<script src="{{ asset('assets/plugins/select/selectr.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
         
        var selectMULT = document.querySelector("#multiSelect");
        new Selectr(selectMULT);
    });

        new Selectr('#multiSelect', {
            multiple: true,
            searchable: true,
            placeholder: "Select multiple options"
        });

</script>