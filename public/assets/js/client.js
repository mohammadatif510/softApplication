
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

                ToastifyModal(response.message,"success","#28a745");
                $('#custom-step')[0].reset();

                setTimeout(() => {
                    window.location.href="/client/index";

                },3000)

            },
            error: function (xhr) {
                let errors = xhr.responseJSON?.errors || {};
                let msg = xhr.responseJSON?.message || "Something went wrong";

                ToastifyModal(msg,"error","#dc3545");

            }
        });
    });