//create Role Category Script
$("#createRoleCategoryForm").on('submit', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        url: "/admin/role/category/store",
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
  
            sweetAlert(response.message,'success')
            tableRefresh()
            closeModal('exampleModalLarge');
        },
        error: function (xhr) {
            let error = xhr.responseJSON?.errors?.name?.[0] || 'Something went wrong';
            $('#role-error').text(error);
        }
    });
});//end of script

//opne role category modal script
$(document).on('click', "#openEditRoleCategoryModal",function() {
    const id = $(this).data('id');

    $.ajax({
        url: '/admin/role/category/edit/' + id,
        type: 'get',
        success: function(response) {
            $('#modal-dialog').html(response);
        }
    });
});//end of script

//update role category modal script

$(document).on('submit', ".updateRoleCategoryModal", function(e) {
    e.preventDefault();
    let formData = $(this).serialize();
    const name = $('#name').val();
    
    // Clear previous errors first
    $('#role-error').text('');

    if (name != '') {
        $.ajax({
            url: "/admin/role/category/update",
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                sweetAlert(response.message,'success');
                tableRefresh();
                closeModal('editRoleCategoryModal');
            },
            error: function (xhr) {
                let error = xhr.responseJSON?.errors?.name?.[0] || 'Something went wrong';
                $('#role-error').text(error);
            }
        });     
    } else {
        $('#role-error').text('The name field is required.');
    }
});
//end of script


//delte role category script
$(document).on('click', '.delete-role-category-form', function (e) {
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
            const roleCategoryName = $(this).data('role-category-name');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/role/category/delete/' + id + '/'+ roleCategoryName,
                type: 'get',
                success: function (response) {

                     sweetAlert(response.message,'error')
                    $('#roleCategory-row-' + id).remove();
                },
                error: function (xhr) {
                    alert('Failed to delete.');
                }
            });
        }
    });
});//end of script

function sweetAlert(response, icon)
{
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: response,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}

function closeModal($modalName)
{
    let modalEl = document.getElementById($modalName);
    let modalInstance = bootstrap.Modal.getInstance(modalEl);
    if (!modalInstance) {
        modalInstance = new bootstrap.Modal(modalEl);
    }
    modalInstance.hide();

}

function tableRefresh()
{
    $('#roleCategoryTableWrapper').load(location.href + ' #roleCategoryTableWrapper > *', function () {
        if (!$.fn.dataTable.isDataTable('#datatable_2')) {
            $('#datatable_2').DataTable(); // Init again
        }
    });
}