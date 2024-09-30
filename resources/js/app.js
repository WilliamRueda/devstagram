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
  
        dropzone.on('sending', function(file,xhr,formData){
            console.log(file);
        })

        dropzone.on("success", function(file,response){
            console.log(response)
        })

        dropzone.on("error", function(file,message){
            console.log(message)
        })
        
        dropzone.on("removedfile", function(){
            console.log('archivo eliminado')
        })
  
    } else {
        console.error('El elemento .dropzone no fue encontrado');
    }
});