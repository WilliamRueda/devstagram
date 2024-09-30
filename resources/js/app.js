import Dropzone from "dropzone";
Dropzone.autoDiscover = false;


document.addEventListener('DOMContentLoaded', function() {
    const dropzoneElement = document.querySelector('.dropzone');
    if (dropzoneElement) {
        const dropzone = new Dropzone('.dropzone', {
            dictDefaultMessage: 'Sube tu imagen',
            acceptedFiles: ".png, .jpg, .jpeg, .gif",
            addRemoveLinks: true,
            dictRemoveFile: 'Eliminar archivo',
            maxFiles: 1,
            uploadMultiple: false
        });
    } else {
        console.error('El elemento .dropzone no fue encontrado');
    }
});