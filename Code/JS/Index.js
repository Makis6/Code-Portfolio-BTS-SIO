// récupération formulaire
let form = document.getElementById('frmContact');
//gestionnaire évènement submit
form.addEventListener('submit', function(e) {
    e.preventDefault();
    fetch('email.php',  {
        method: 'POST',
        body: new FormData(form)
    })
    .then(function(response) {
        if(response.ok) {
            response.json().then(function(retour) {
                if(retour.msg == 'ok') alert('Votre message a été envoyé');
                else alert("Le mail n'a pas été envoyé");
                form.nom.value= '';
                form.email.value= '';
                form.message.value= '';
            });
        }
        else {
            console.log('mauvaise réponse du serveur');
        }
    })
    //en cas d'erreur (404 ou autre)
    .catch(function(error) {
        console.log('problème appel API : ' + error.message);
    });
});