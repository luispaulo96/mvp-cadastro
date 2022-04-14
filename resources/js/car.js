'use strict';

const carForm = document.querySelectorAll('#car-form');

carForm.forEach((form) => {
  form.addEventListener('submit', (ev) => {
    ev.preventDefault();

    const button = form.querySelector('button[type="submit"]');
    button.disabled = true;

    const spinner = button.querySelector('span');
    spinner.hidden = false;

    const divSuccess = form.querySelector('#div-success');
    const divError = form.querySelector('#div-error');

    const formData = new FormData(form);

    const carId = form.querySelector('#hf-id').value;

    if (carId) {
      formData.append('_method', 'put');
    }

    axios({
      method: 'post',
      url: carId ? `/cars/update/${carId}` : '/cars/store',
      data: formData,
    }).then((response) => {
      divError.hidden = true;

      divSuccess.textContent = response.data.message;
      divSuccess.hidden = false;

      setTimeout(() => {
        window.location = '/';
      }, 1000);
    }).catch((error) => {
      divSuccess.hidden = true;

      divError.textContent = error.response.data.message;
      divError.hidden = false;
    }).then(() => {
      button.disabled = false;
      spinner.hidden = true;
    });
  });

  const deleteButton = form.querySelector('#btn-delete');
  deleteButton.addEventListener('click', (ev) => {
    ev.preventDefault();

    const divSuccess = form.querySelector('#div-success');
    const divError = form.querySelector('#div-error');

    const carId = form.querySelector('#hf-id').value;

    axios({
      method: 'delete',
      url: `/cars/destroy/${carId}`,
    }).then((response) => {
      divError.hidden = true;

      divSuccess.textContent = response.data.message;
      divSuccess.hidden = false;

      setTimeout(() => {
        window.location = '/';
      }, 1000);
    }).catch((error) => {
      divSuccess.hidden = true;

      divError.textContent = error.response.data.message;
      divError.hidden = false;
    });
  });
});
