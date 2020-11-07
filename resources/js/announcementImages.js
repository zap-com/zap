window.addEventListener("load", () =>{
    
    if(document.querySelector('#drophere')){
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        const secret =  document.querySelector('input[name="secret"]').value;

        const drop = new Dropzone('#drophere',{
            url : '/announcement/uploadImages',
            params: {
                _token: csrfToken,
                secret
            }
        })
    }


  });