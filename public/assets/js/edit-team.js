document.addEventListener("DOMContentLoaded", function () {
        
    var selectMULT = document.querySelector("#multiSelect");
    new Selectr(selectMULT);
});

new Selectr('#multiSelect', {
    multiple: true,
    searchable: true,
    placeholder: "Select multiple options"
});

$(document).ready(function () {
    var roleDropdown = $('#roleDropdown');
    var teamLeaderDropdown = $('#teamLeaderDropdown');

    if (selectedCategoryId) {
        $.ajax({
            url: '/team/role/' + selectedCategoryId,
            type: 'get',
            success: function (response) {
                roleDropdown.empty().append('<option value="">Select Role</option>');
                response.roles.forEach(function (role) {
                    var selected = (role.id == selectedRoleId) ? 'selected' : '';
                    roleDropdown.append(`<option value="${role.id}" ${selected}>${role.name}</option>`);
                });
            }
        });
    }

    if (selectedRoleId) {
        $.ajax({
            url: '/team/select/team/leader/' + selectedRoleId,
            type: 'get',
            success: function (response) {
                teamLeaderDropdown.empty().append('<option value="">Select Role</option>');
                response.teamLeaders.forEach(function (teamLeaders) {
                    var selected = (teamLeaders.id == selectedTeamLeaderId) ? 'selected' : '';
                    teamLeaderDropdown.append(`<option value="${teamLeaders.id}" ${selected}>${teamLeaders.name}</option>`);
                });
            }
        });
    }

});

$(document).on('submit','#editTeamForm',function(e){
     e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url:'/team/update',
        type:'post',
        data:formData,
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {

            ToastifyModal(response.message,'success',"#28a745")

            teamRowRefresh()
            closeModal('teamEditModal');
        },
        error: function (xhr) {
            let error = xhr.responseJSON?.errors?.name?.[0] || 'Something went wrong';
            $('#role-error').text(error);
        }
    })
})