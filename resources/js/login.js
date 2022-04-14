'use strict';

const loginForm = document.querySelectorAll('#login-form');

loginForm.forEach((form) => {
  form.addEventListener('submit', (ev) => {
    ev.preventDefault();

    const button = form.querySelector('button[type="submit"]');
    button.disabled = true;

    const spinner = button.querySelector('span');
    spinner.hidden = false;

    const loginSuccess = form.querySelector('#login-success');
    const loginError = form.querySelector('#login-error');

    const formData = new FormData(form);

    axios({
      method: 'post',
      url: '/login/auth',
      data: formData,
    }).then((response) => {
      loginError.hidden = true;

      loginSuccess.textContent = response.data.message;
      loginSuccess.hidden = false;

      window.location = '/';
    }).catch((error) => {
      loginSuccess.hidden = true;

      loginError.textContent = error.response.data.message;
      loginError.hidden = false;
    }).then(() => {
      button.disabled = false;
      spinner.hidden = true;
    });
  });
});
