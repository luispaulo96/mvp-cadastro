'use strict';

const togglePassword = document.querySelectorAll('#toggle-password');

togglePassword.forEach((button) => {
  button.addEventListener('click', (ev) => {
    const input = button.previousElementSibling;
    input.type = input.type === 'password' ? 'text' : 'password';

    const icon = button.querySelector('i');
    icon.classList.toggle('bi-eye');
  });
});
