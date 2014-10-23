$(document).ready(function() {
    $('#create_account_open_modal_button').click(function() {
        var emailValue = $('#input_email').val();
        $('#input_email_create').val(emailValue);

        var passwordValue = $('#input_password').val();
        $('#input_password_create').val(passwordValue);
    });
});

