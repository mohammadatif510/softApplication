
$(document).on('click', '#updateClient', function (e) {
    e.preventDefault();

    const form = $('#custom-step')[0];
    const formData = new FormData(form);

    $.ajax({
        url: "/client/update", // Adjust to your route
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            ToastifyModal(response.message, "success", "#28a745");
            $('#custom-step')[0].reset();

            setTimeout(() => {
                window.location.href = "/client/index";

            }, 3000)

        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            let msg = xhr.responseJSON?.message || "Something went wrong";

            ToastifyModal(msg, "error", "#dc3545");

        }
    });
});

$(document).on("click", "#createClientProject", function () {

    const id = $(this).data('id');

    $.ajax({
        url: "/client/create/project/" + id,
        type: "get",
        success: function (res) {
            $("#create-project-modal-dialog").html(res);
        }
    })

});

$(document).on('submit', '#creteClientProject', function (e) {
    e.preventDefault();

    const form = $('#creteClientProject')[0];
    const formData = new FormData(form);

    $.ajax({
        url: "/client/project/create",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            console.log(response);

            ToastifyModal(response.message, "success", "#28a745");
            closeModal('createProjecteModal');
           
            tableRefreshClient();

        },
        error: function (xhr) {
            let errors = xhr.responseJSON?.errors || {};
            let msg = xhr.responseJSON?.message || "Something went wrong";

            ToastifyModal(msg, "error", "#dc3545");

        }
    });
})

function tableRefreshClient() {

    $('#clientProjectTableWrapper').load(location.href + ' #clientProjectTableWrapper > *', function () {
        $('#datatable_2').DataTable(); // Re-initialize
    });
}