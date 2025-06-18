$(document).on('submit',"#createPermissionForm" ,function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/permission/store",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshPermission()
            closeModal('permissionModal');
        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            $('#permission-error').text(errors.name);
        }
    });
});



$(document).on('click','#openEditpermissionModal',function(){

    const id = $(this).data('id')

    $.ajax({
        url:'/permission/edit/'+id,
        type:'get',
        success:function(response)
        {
            $('#modal-dialog').html(response); 
        }
    })
})


$(document).on('submit', "#editPermissionForm",function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/permission/update",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            sweetAlert(response.message,'success')
            tableRefreshPermission()
            closeModal('editpermissionModal');
        },
         error: function (xhr) {
           
            let errors = xhr.responseJSON?.errors || {};
            $('#permission-error').text(errors.name?.[0] || '');
        }
    });
});



//delte role script
$(document).on('click', '.delete-permission', function (e) {
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
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/permission/delete/' + id,
                type: 'get',
                success: function (response) {

                    sweetAlert(response.message,'error')
                    $('#permission-row-' + id).remove();
                },
                error: function (xhr) {
                    alert('Failed to delete.');
                }
            });
        }
    });
});//end of script


function tableRefreshPermission() {

    $('#permissionTableWrapper').load(location.href + ' #permissionTableWrapper > *', function () {
        $('#datatable_2').DataTable(); // Re-initialize
    });
}