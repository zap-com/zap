let registerBtn = document.querySelector("#registerBtn");

registerBtn.addEventListener("click", e => {
    let form = document.querySelector("#form");
    let formInner = document.querySelector("#formInner");
    let oldFormInner = formInner.innerHTML;
    console.log('click');
    e.preventDefault();
    //Toogle form action
    if (form.action.includes("login")) {
        form.action = `http://localhost:8000/register`;
        
        formInner.innerHTML = `<div class="form-group">
        <label for="name">Your name and surname</label>
        <input type="text" class="form-control " name="name"
            id="name" value="" required autocomplete="name" autofocus>
    
     
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control "
                    name="email" id="email" aria-describedby="emailHelp"  }}"
                    required autocomplete="email" autofocus>
            
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password"
                    class="form-control" name="password"
                    required autocomplete="current-password">

                
            </div>
            <div class="form-group">
                <label for="password-confirmation">Confirm Password</label>
                <input id="password-confirmation" type="password"
                    class="form-control"
                    name="password_confirmation" required autocomplete="current-password">

                
            </div>
            <div class="form-row align-items-center">
                <div class="col">
                    <button type="submit"
                        class="btn b-btn w-100">Register</button>
                </div>
                <span class="px-3 text-muted">or</span>
                <div class="col text-center">
                    <a class="color-main" id="#registerBtn">Login</a>
                </div>
            </div>`;
    } 
    else if(form.action.includes("register")) {
        
        form.action = `http://localhost:8000/login`;
     
    }

    
});


