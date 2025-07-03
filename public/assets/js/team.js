$(document).on('click','#createTeamModel',function(){
    
    $.ajax({
        url:'/team/create',
        type:'get',
        success:function(response)
        {
            $("#team-modal-dialog").html(response);
        }
    })

})
$(document).on('change', '#roleCategorySelect', function () {
    const roleCategoryId = $(this).val();

    $.ajax({
        url: '/team/role/' + roleCategoryId,
        type: 'get',
        success: function (response) {
            let roleDropdown = $('#roleDropdown');
            roleDropdown.empty().append('<option value="">Select Role</option>');

            response.roles.forEach(function (role) {
                roleDropdown.append(`<option value="${role.id}">${role.name}</option>`);
            });
        }
    });
});

$(document).on('change','#roleDropdown',function(){

    const roleId = $(this).val();

    $.ajax({
        url: '/team/select/team/leader/' + roleId,
        type: 'get',
        success: function (response) {
           let leaderDropdown = $('.team_leader_id');
            leaderDropdown.empty().append('<option value="">Select Team Leader</option>');

            response.teamLeaders.forEach(function (leader) {
                leaderDropdown.append(`<option value="${leader.id}">${leader.name}</option>`);
            });
        }
    });

});

$(document).on('submit','#createTeamForm',function(e){
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url:'/team/store',
        type:'post',
        data:formData,
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
  
            ToastifyModal(response.message,'success',"#28a745")

            teamRowRefresh()
            closeModal('teamCreateModal');
        },
        error: function (xhr) {
            let error = xhr.responseJSON?.errors?.name?.[0] || 'Something went wrong';
            $('#role-error').text(error);
        }
    })

});


function teamRowRefresh() {

    $('#teamRow').load(location.href + ' #teamRow > *');
}