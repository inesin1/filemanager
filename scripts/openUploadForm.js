let uploadButton = document.getElementById('upload-button');
let uploadForm = document.querySelector('.upload-form');
    
uploadButton.addEventListener('click', () => {
    uploadForm.classList.toggle('open-flex');
});