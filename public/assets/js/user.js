$(document).on('submit',"#createUserForm" ,function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/user/store",
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



$(document).on('click','#openEdituserModal',function(){

    const id = $(this).data('id')

    $.ajax({
        url:'/user/edit/'+id,
        type:'get',
        success:function(response)
        {
            $('#edit-user-modal-dialog').html(response); 
        }
    })
})



$(document).on('submit', "#editUserForm",function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/user/update",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshPermission()
            closeModal('edituserModal');
        },
         error: function (xhr) {
           
            let errors = xhr.responseJSON?.errors || {};
            $('#permission-error').text(errors.name?.[0] || '');
        }
    });
});


$(document).on('click', ".openEditAssignRoleModal",function() {
    const id = $(this).data('id');
    $.ajax({
        url: '/user/assign/role/' + id,
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
        url: "/user/assign/role",
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

//delte role category script
$(document).on('click', '.deActive-user', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, do it!'
    }).then((result) => {
        if (result.isConfirmed) {
          
            const id = $(this).data('id');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/user/deactive/' + id ,
                type: 'get',
                success: function (response) {

                     sweetAlert(response.message,response.res)
                    tableRefreshUser()

                },
                error: function (xhr) {
                    alert('Failed to delete.');
                }
            });
        }
    });
});//end of script

function tableRefreshUser() {

    $('#userTableWrapper').load(location.href + ' #userTableWrapper > *', function () {
        $('#datatable_2').DataTable(); // Re-initialize
    });
}