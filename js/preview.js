function previewImage(e) {
    const input = e.target;
    const image = document.getElementById("previewImage");
    const inputImage = document.querySelector(".inputImage");
    if(input.files && input.files[0]) { // Vérifiez si un fichier a été sélectionné
        const reader = new FileReader(); // FileReader permet de lire le contenu des fichiers
        reader.onload = function (e) { // se déclenche lorsque la lecture du fichier est terminée 
            image.src = e.target.result;
            inputImage.style.display = "none";
            image.style.display = "block";
        }
        reader.readAsDataURL(input.files[0]); // on recupere le premier fichier dans la liste des fichiers sélectionnés
    } else {
        image.src = "";
        inputImage.style.display = "flex";
        image.style.display = "none";
    }
}

document.getElementById("cover").addEventListener("change", previewImage);