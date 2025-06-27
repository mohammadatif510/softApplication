
    document.addEventListener('DOMContentLoaded', function () {
        // Step 1 fields
        const step1Fields = [
            '#name', '#mobile_no', '#country', '#email',
            '#address', '#company_name', '#website'
        ];
        // Step 2 fields
        const step2Fields = [
            '#title', '#default', '#description', '#deadline'
        ];
        // Step 3 fields
        const step3Fields = [
            '#budget'
        ];

        function checkFields(fields, buttonId) {
            let allFilled = true;
            fields.forEach(selector => {
                const field = document.querySelector(selector);
                if (!field || field.value.trim() === '') {
                    allFilled = false;
                }
            });
            document.getElementById(buttonId).disabled = !allFilled;
        }

        function attachInputListeners(fields, buttonId) {
            fields.forEach(selector => {
                const field = document.querySelector(selector);
                if (field) {
                    field.addEventListener('input', () => checkFields(fields, buttonId));
                    field.addEventListener('change', () => checkFields(fields, buttonId)); // for select fields
                }
            });
            checkFields(fields, buttonId); // initial check
        }

        // Attach listeners to each step
        attachInputListeners(step1Fields, 'step1Next');
        attachInputListeners(step2Fields, 'step2Next');
        attachInputListeners(step3Fields, 'step3Next');
    });


      $(document).on('click', '#step3Next', function (e) {
        e.preventDefault();

        const form = $('#custom-step')[0];
        const formData = new FormData(form);

        $.ajax({
            url: "/project/store", // Adjust to your route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                ToastifyModal(response.message,"success","#28a745");

                console.log(response.data);

                // reset form or redirect if needed
                $('#custom-step')[0].reset();
            },
            error: function (xhr) {
                let errors = xhr.responseJSON?.errors || {};
                let msg = xhr.responseJSON?.message || "Something went wrong";

                ToastifyModal(response.message,"success","#dc3545");

            }
        });
    });