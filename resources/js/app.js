import './bootstrap';

$(document).ready(function () {
    // Automatically hide the success alert after 5 seconds
    setTimeout(function () {
        $('#success-alert').fadeOut('slow');
    }, 3000);
});