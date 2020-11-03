const flashSuccess = $('.flash-data').data('success');
const flashError = $('.flash-data').data('error');
const flashWarning = $('.flash-data').data('warning');
const flashLogin = $('.flash-data').data('login');

if (flashSuccess) {
    Swal.fire(
        'Congratulations !',
        '' + flashSuccess,
        'success'
    )
} else if (flashError) {
    Swal.fire(
        'Error !',
        '' + flashError,
        'error'
    )
} else if (flashLogin) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: '' + flashLogin
    })
} else if (flashWarning) {
    Swal.fire(
        'Information !',
        '' + flashWarning,
        'info'
    )
}


// delete-button
$('.delete-button').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const message = $(this).data('message');
    Swal.fire({
        title: 'Are you sure,',
        text: 'Delete this ' + message + ' data?',
        type: 'warning',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// verified-button
$('.verified-button').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const message = $(this).data('message');
    Swal.fire({
        title: 'Are you sure,',
        html: 'Verify this payment ?<hr>' + message,
        type: 'info',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verify it!',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// Order Program
$('.order-button').on('click', function (e) {
    e.preventDefault();
    const message = $(this).data('message');
    Swal.fire({
        title: 'Are you sure,',
        html: 'Order this program ?<hr>' + message,
        type: 'info',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, order it!',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            $('#orderProgram').submit();
        }
    })
});
