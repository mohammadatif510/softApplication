$(document).on('submit',"#createRoleForm" ,function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/role/store",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshRole()
            closeModal('exampleModalLarge');
        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            $('#role-error').text(errors.name?.[0] || '');
        }
    });
});

//open role edit model
$(document).on('click','#openRoleModal',function(){

    const id = $(this).data('id')

    $.ajax({
        url:'/role/edit/'+id,
        type:'get',
        success:function(response)
        {
            $('#modal-dialog').html(response); 
        }
    })
})

//open permission assign role modal
$(document).on('click','.assignPermission',function(){
    const roleId = $(this).data('id')

    $.ajax({
        url:'/role/assign-permission/'+roleId,
        type:'get',
        success:function(response)
        {
            $('#modal-dialog-assign-permission').html(response); 
        }
    })
})


$(document).on('submit',"#updateAssignPermission" ,function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/role/update/assign/permission",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response)
            sweetAlert(response.message,'success')
            tableRefreshRole()
            closeModal('assignPermissionModal');
        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            $('#role-error').text(errors.name?.[0] || '');
        }
    });
});

$(document).on('submit', "#editRoleFormModal",function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/role/update",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshRole()
            closeModal('editRoleModal');
        },
         error: function (xhr) {
           
            let errors = xhr.responseJSON?.errors || {};
            $('#role-error').text(errors.name?.[0] || '');
        }
    });
});

//delte role script
$(document).on('click', '.delete-role', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          
            const id = $(this).data('id');
            const roleName = $(this).data('role-name');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/role/delete/' + id + '/'+ roleName,
                type: 'get',
                success: function (response) {

                     sweetAlert(response.message,'error')
                    $('#role-row-' + id).remove();
                },
                error: function (xhr) {
                    alert('Failed to delete.');
                }
            });
        }
    });
});//end of script


function tableRefreshRole() {

    $('#roleTableWrapper').load(location.href + ' #roleTableWrapper > *', function () {
        $('#datatable_2').DataTable(); // Re-initialize
    });
}