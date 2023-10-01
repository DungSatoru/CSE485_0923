function check(ID, Regex, message = '') {
    if ($(ID).val() === "") {
        $(ID).next('.form-message').text('This field is requied!').show();
        return false;
    } else if (Regex !== '0') {
        if (!Regex.test($(ID).val())) {
            $(ID).next('.form-message').text(message).show();
            return false;
        }
    }
    $(ID).next(".form-message").hide();
    return true;
}

function reset() {
    $('#Email').val('');
    $(".form-message").hide();

}

$(document).ready(function () {
    $('#Email').on('blur', () => {
        return check('#Email', /^[^\s@]+@[^\s@]+\.[^\s@]+$/, 'Please enter the correct email format!\nFor example: abc@gmail.com');
    })
    $('#Password').on('blur', () => {
        return check('#Password', /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[\w!@#$%^&*()]{8,}$/ , 'Please enter 8 characters including lowercase letters, uppercase letters, numbers and special characters');
    })
    $('#Confirm_password').on('blur', function() {
        const confirmPassword = $('#Confirm_password').val();
        const password = $('#Password').val();
        if(confirmPassword === "") {
            $(this).next('.form-message').text('This field is requied!').show();
        } else {
            if (confirmPassword !== password) {
                const message = 'Passwords do not match!';
                $(this).next('.form-message').text(message).show();
            } else {
                $(this).next('.form-message').hide();
            }
        }
    });

    $('#Submit').click(function (e) {
        e.preventDefault();
        const isEmail = check('#Email', /^[^\s@]+@[^\s@]+\.[^\s@]+$/, 'Please enter the correct email format!\nFor example: abc@gmail.com');

        if (isName && isEmail && isContent && isNotRobot) {
            reset();
            alert('Bạn đã đăng ký thành công!')
        }
    })
})