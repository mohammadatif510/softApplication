$(document).on('submit',"#createUserForm" ,function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/admin/user/store",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshUser()
            closeModal('createUserModal');
        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            $('#name-error').text(errors.name);
        }
    });
});


$(document).on('click', ".openEditAssignRoleModal",function() {
    const id = $(this).data('id');
    $.ajax({
        url: '/admin/user/assign/role/' + id,
        type: 'get',
        success: function(response) {
            $('#assign-role-modal-dialog').html(response);
        }
    });
});


$(document).on('submit', "#assignRoleUserForm",function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/admin/user/assign/role",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshUser()
            closeModal('assignRoleModal');
        },
         error: function (xhr) {
           
            let errors = xhr.responseJSON?.errors || {};
            $('#permission-error').text(errors.name?.[0] || '');
        }
    });
});


function tableRefreshUser() {

    $('#userTableWrapper').load(location.href + ' #userTableWrapper > *', function () {
        $('#datatable_2').DataTable(); // Re-initialize
    });
}