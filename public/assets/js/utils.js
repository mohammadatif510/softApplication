
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
