<?php
//si le bouton envoyer a été cliqué  
if (isset($_POST["email"])) {
    //on recupère le nom  
    $nom = $_POST["nom"];
    //on recupère l'adresse email  
    $email = $_POST["email"];
    //on recupère le message  
    $message = 'Nom: '
               . $_POST['nom'] 
               . PHP_EOL
               .'Email: '  
               . $_POST['email']
               . PHP_EOL
               . 'Message : '
               . $_POST["message"];
    $objet = 'Message de ' . $nom;
    $to = "pascal.guelluy13@gmail.com";
    $headers = "From: " . $email;
    $retour = [];
    //on envoie le message avec la fonction mail  
    if (@mail($to, $objet, $message, $headers))
    //si le message a été envoyé, on le confirme  
    {
        $retour['msg'] = 'ok';
    }
    //sinon on n'affiche un message d'erreur  
    else {
        $retour['msg'] = 'ko';
    }
    echo json_encode($retour);
}
else echo 'oups';