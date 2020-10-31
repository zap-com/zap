const registerBtn = document.querySelector('#registerBtn');
const loginForm = document.querySelector('#formLogin');
const registerForm = document.querySelector('#formRegister');

registerBtn.onclick = () => {
   if(registerForm.classList.contains('d-none')){
        loginForm.classList.add('d-none');
    registerForm.classList.remove('d-none');
    registerBtn.innerText = 'Sing-in';
   }else{
       console.log('else')
    loginForm.classList.remove('d-none');
    registerForm.classList.add('d-none');
    registerBtn.innerText = 'Register now';
   }
   
}

