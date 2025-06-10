$("#createRoleForm").on('submit', function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "/admin/role/store",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            $('#createRoleModal').modal('hide')
            location.reload();
        },
        error: function (xhr) {
            let error = xhr.responseJSON?.errors?.name?.[0] || 'Something went wrong';
            $('#role-error').text(error);
            $('#role-category-error').text(error);
        }
    });
});


$(document).on('click','#openRoleModal',function(){

    const id = $(this).data('id')

    $.ajax({
        url:'/admin/role/edit/'+id,
        type:'get',
        success:function(response)
        {
            $('#modal-dialog').html(response); 
        }
    })
})