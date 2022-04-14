'use strict';

const registerForm = document.querySelectorAll('#register-form');

registerForm.forEach((form) => {
  form.addEventListener('submit', (ev) => {
    ev.preventDefault();

    const button = form.querySelector('button[type="submit"]');
    button.disabled = true;

    const spinner = button.querySelector('span');
    spinner.hidden = false;

    const registerSuccess = form.querySelector('#register-success');
    const registerError = form.querySelector('#register-error');

    const formData = new FormData(form);

    axios({
      method: 'post',
      url: '/register/send',
      data: formData,
    }).then((response) => {
      registerError.hidden = true;

      registerSuccess.textContent = response.data.message;
      registerSuccess.hidden = false;
      form.reset();

      setTimeout(() => {
        window.location = '/login';
      }, 1000);
    }).catch((error) => {
      registerSuccess.hidden = true;

      registerError.textContent = error.response.data.message;
      registerError.hidden = false;
    }).then(() => {
      button.disabled = false;
      spinner.hidden = true;
    });
  });
});
