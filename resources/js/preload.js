document.addEventListener("DOMContentLoaded", () => document.body.className = "")

if(navigator.language == 'it-IT' && !localStorage.getItem('locale')){

    localStorage.setItem('locale', 'it-IT');
    window.location.replace("/local/it");
}else if (!localStorage.getItem('locale')){
    localStorage.setItem('locale', 'en-GB');
    window.location.replace("/local/en");
}