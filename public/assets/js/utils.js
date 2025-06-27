
function ToastifyModal(response, icon, backgroundColor)
{
    Toastify({
        text: response,
        className: icon,
        backgroundColor: backgroundColor,
        duration: 3000
    }).showToast();

    // Swal.fire({
    //     toast: true,
    //     position: 'top-end',
    //     icon: icon,
    //     title: response,
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // });
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
