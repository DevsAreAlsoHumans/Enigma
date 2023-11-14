document.addEventListener("DOMContentLoaded", function() {
    let burger = document.querySelector('.burger');
    let lien1 = document.querySelector('.lien1');
    let lien2 = document.querySelector('.lien2');
    let lien3 = document.querySelector('.lien3');
    let lien4 = document.querySelector('.lien4');
    let i = document.querySelector('i');
    let recherche = document.querySelector('.recherche');

    burger.addEventListener("click", () => {
        lien1.classList.toggle('montre');
        lien2.classList.toggle('montre');
        lien3.classList.toggle('montre');
        lien4.classList.toggle('montre');
        recherche.classList.toggle('montre');
    })

});