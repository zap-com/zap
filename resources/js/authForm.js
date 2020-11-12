const registerBtn = document.querySelector('#registerBtn');
const loginForm = document.querySelector('#formLogin');
const registerForm = document.querySelector('#formRegister');

registerBtn.onclick = () => {
   if (registerForm.classList.contains('d-none')) {
      loginForm.classList.add('d-none');
      registerForm.classList.remove('d-none');
      if (localStorage.getItem('locale') == 'it-IT') {
         registerBtn.innerText = 'Connettiti';
      } else {
         registerBtn.innerText = 'Sign-in';
      }
   } else {
      loginForm.classList.remove('d-none');
      registerForm.classList.add('d-none');
      if (localStorage.getItem('locale') == 'it-IT') {
         registerBtn.innerText = 'Registrati ora';
      } else {
         registerBtn.innerText = 'Sign-up now';
      }
   }

}

