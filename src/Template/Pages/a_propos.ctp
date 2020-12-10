
<div style="text-align: center">
    <h1>Charles-Olivier Allard</h1>
    <h2>420-5B7 MO Applications Internet</h2>
    <h2>Automne 2020, Collège Montmorency</h2>
</div>


<div>
    <ol>
        <li style="font-size: 150%; margin-left: 10px;">Remise du lien GitHub : 
            <ul>
                <li><a href="https://github.com/ch4rlo39/cdCollection">https://github.com/ch4rlo39/cdCollection</a></li>
            </ul>
        </li><br>
        <li style="font-size: 150%; margin-left: 10px;">Fonctionnalités du TP3 : 
            <ol>
                <li style="font-size: 115%;">Démarrage de session JWT : 
                    <ol>
                        <li style="font-size: 110%;">Démarrage de session : 
                            <p>Un utilisateur se connecte avec son username et son password. On vérifie que ses informations sont exactes et figurent bien dans la base de données.
                            Si oui, on renvoie un jeton JWT valide et on le stocke dans le localStorage de l'application. Ce jeton permettra de vérifier que l'utilisateur est en session et l'autorisera à ajouter, modifier et supprimer les Genre Families.</p>
                        </li>
                        <li style="font-size: 110%;">Modification de mot de passe :
                            <p>Si un utilisateur est en session avec un jeton JWT valide, on autorise alors la modification de son mot de passe.
                            L'utilisateur n'a qu'à taper son nouveau mot de passe dans le champ Password et à cliquer sur le bouton Change password. 
                            Pour vérifier que le mot de passe a bien été changé, on clique sur le bouton Logout et on essaie de se reconnecter avec l'ancien mot de passe.
                            Cette action ne fonctionnera pas si le mot de passe a été changé, on réessaie avec le nouveau mot de passe pour pouvoir se connecter.</p>
                        </li>
                        <li style="font-size: 110%;">Captcha :
                            <p>L'option Captcha fournie par Google permet de vérifier que l'utilisateur est bien un humain.
                            Si on essaie de se connecter sans cocher le Captcha, on reçoit un message nous demandant de d'abord valider le Captcha.
                            En validant le Captcha, on peut alors se connecter sans problème avec la méthode des jetons JWT.
                            À noter que le Captcha ici présent utilise une clé de site en développement. Un site en production disonible publiquement doit être enregistré auprès de Google afin d'avoir une clé de site propre à celui-ci.</p>
                        </li>
                    </ol>
                </li><br>
                <li style="font-size: 115%;">Procédure de test de Angular JS pour les listes liées et le modèle "CRUD" monopage : 
                    <ul>
                        <li style="font-size: 110%;">Liste liées : 
                            <ol>
                                <li>Utiliser l'option Liste liées du menu afin d'accéder à la page d'ajout de genre musical (nécessite d'être connecté)</li>
                                <li>Modifier la sélection du champ Genre Family et constater le changement des options du champ Genre Subfamily</li>
                                <li>Utiliser l'option Liste des Genres du menu à gauche pour sélectionner un Genre à modifier</li>
                                <li>Cliquer sur l'option Modifier à côté d'un Genre et constater les listes se remplir selon les données du Genre sélectionné</li>
                            </ol>
                        </li>
                        <li style="font-size: 110%;">Modèle "CRUD" monopage : 
                            <ol>
                                <li>Utiliser l'option Monopage du menu pour accéder à la liste des Genre Families en application monopage</li>
                                <li>Constater l'affichage des Genre Families</li>
                                <li>Les fonctions d'ajout, de modification et de suppression de sont authorisées qu'aux utilisateurs en session - se connecter</li>
                                <li>Entrer "Test TP3 dans le champ Name, cliquer sur le bouton Add Genre Family et constater son ajout à la liste</li>
                                <li>Cliquer sur le bouton Edit du Genre Family "Test TP3" et ajouter "mod" dans le champ Name</li>
                                <li>Cliquer sur le bouton Update Genre Family et constater sa modification dans la liste</li>
                                <li>Cliquer sur le bouton Delete du Genre Family "Test TP3 mod" et confirmer la suppression</li>
                                <li>Constater la suppression du Genre Family "Test TP3 mod"</li>
                            </ol>
                        </li>
                    </ul>
                </li><br>
                <li style="font-size: 115%;">Cliquer-glisser pour ajouter une image : 
                    <p>Lorsque l'utilisateur est dans la liste des Covers, il a la possibilité d'ajouter des images avec un cliquer-glisser.
                        En utilisant DropZone, on transforme une bonne partie de la page en formulaire pouvant accueillir une image et l'ajouter à la liste. Lorsqu'une image est déposée dans cette zone, on envoie la requête pour ajouter l'image à la liste.
                        L'image est alors dans une zone temporaire de la page. Ensuite, on utilise un autre script pour rafraîchir celle-ci et constater l'ajout de l'image à la liste.
                    </p>
                </li><br>
            </ol>
        </li><br>
        <li style="font-size: 150%; margin-left: 10px;">Le diagramme de la base de données actuelle utilisée par l'application : <br>
            <img src="../webroot/img/bd_cdCollection.png" >
        </li><br>
        <li style="font-size: 150%; margin-left: 10px;">Lien vers l'emplacement d'où provient le diagramme original : <br>
            <ul> 
                <li><a href="http://www.databaseanswers.org/data_models/cd_collection/index.htm">http://www.databaseanswers.org/data_models/cd_collection/index.htm</a></li>
            </ul>
        </li><br>
    </ol>
</div>