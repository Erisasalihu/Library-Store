const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const formLoginBtn = document.getElementById('form-login-btn');
const formRegisterBtn = document.getElementById('form-register-btn');

const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');

const registerFirstName = document.getElementById('register-first-name');
const registerLastName = document.getElementById('register-last-name');
const registerEmail = document.getElementById('register-email');
const registerPassword = document.getElementById('register-password');

function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailRegex.test(email);
}

const resetFields = () => {
    loginEmail.value = '';
    loginEmail.nextElementSibling.textContent = '';
    loginEmail.nextElementSibling.style.display = 'none';

    loginPassword.value = '';
    loginPassword.nextElementSibling.textContent = '';
    loginPassword.nextElementSibling.style.display = 'none';

    registerFirstName.value = '';
    registerFirstName.nextElementSibling.textContent = '';
    registerFirstName.nextElementSibling.style.display = 'none';

    registerLastName.value = '';
    registerLastName.nextElementSibling.textContent = '';
    registerLastName.nextElementSibling.style.display = 'none';

    registerEmail.value = '';
    registerEmail.nextElementSibling.textContent = '';
    registerEmail.nextElementSibling.style.display = 'none';

    registerPassword.value = '';
    registerPassword.nextElementSibling.textContent = '';
    registerPassword.nextElementSibling.style.display = 'none';
};

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
    resetFields();
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
    resetFields();
});

formLoginBtn.addEventListener('click', (e) => {
    e.preventDefault();

    const errors = {};

    if (loginEmail.value.trim() === '') {
        errors.email = 'Field is required!';
    } else if (!validateEmail(loginEmail.value)) {
        errors.email = 'Email is not valid!';
    } else {
        errors.email && delete errors.email;
        loginEmail.nextElementSibling.textContent = '';
        loginEmail.nextElementSibling.style.display = 'none';
    }

    if (loginPassword.value.trim() === '') {
        errors.password = 'Field is required!';
    } else if (loginPassword.value.trim().length < 6) {
        errors.password = 'Password should have min 6 characters';
    } else {
        errors.password && delete errors.password;
        loginPassword.nextElementSibling.textContent = '';
        loginPassword.nextElementSibling.style.display = 'none';
    }

    if (errors.email) {
        loginEmail.nextElementSibling.textContent = errors.email;
        loginEmail.nextElementSibling.style.display = 'block';
    }

    if (errors.password) {
        loginPassword.nextElementSibling.textContent = errors.password;
        loginPassword.nextElementSibling.style.display = 'block';
    }

    if (Object.keys(errors).length === 0) {
        document.querySelector('.login_form')?.submit();
    }
});

formRegisterBtn.addEventListener('click', (e) => {
    e.preventDefault();

    const errors = {};

    if (registerFirstName.value.trim() === '') {
        errors.firstname = 'Field is required!';
    } else {
        errors.firstname && delete errors.firstname;
        registerFirstName.nextElementSibling.textContent = '';
        registerFirstName.nextElementSibling.style.display = 'none';
    }
    if (registerLastName.value.trim() === '') {
        errors.lastname = 'Field is required!';

    } else {
        errors.lastname && delete errors.lastname;
        registerLastName.nextElementSibling.textContent = '';
        registerLastName.nextElementSibling.style.display = 'none';
    }

    if (registerEmail.value.trim() === '') {
        errors.email = 'Field is required!';
    } else if (!validateEmail(registerEmail.value)) {
        errors.email = 'Email is not valid!';
    } else {
        errors.email && delete errors.email;
        registerEmail.nextElementSibling.textContent = '';
        registerEmail.nextElementSibling.style.display = 'none';
    }

    if (registerPassword.value.trim() === '') {
        errors.password = 'Field is required!';
    } else if (registerPassword.value.trim().length < 6) {
        errors.password = 'Password should have min 6 characters';
    } else {
        errors.password && delete errors.password;
        registerPassword.nextElementSibling.textContent = '';
        registerPassword.nextElementSibling.style.display = 'none';
    }

    if (errors.firstname) {
        registerFirstName.nextElementSibling.textContent = errors.email;
        registerFirstName.nextElementSibling.style.display = 'block';
    }

    if (errors.lastname) {
        registerLastName.nextElementSibling.textContent = errors.email;
        registerLastName.nextElementSibling.style.display = 'block';
    }

    if (errors.email) {
        registerEmail.nextElementSibling.textContent = errors.email;
        registerEmail.nextElementSibling.style.display = 'block';
    }

    if (errors.password) {
        registerPassword.nextElementSibling.textContent = errors.password;
        registerPassword.nextElementSibling.style.display = 'block';
    }

    if (Object.keys(errors).length === 0) {
        document.querySelector('.register_form')?.submit();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const alertEl = document.querySelectorAll('.alert');

    if (alertEl?.length > 0) {
        setTimeout(() => {
            alertEl.forEach((el) => {
                el?.remove();
            });
        }, 4000);
    }
});