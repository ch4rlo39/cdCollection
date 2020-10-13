<div style="text-align: center">
    <h1>Charles-Olivier Allard</h1>
    <h2>420-5B7 MO Applications Internet</h2>
    <h2>Automne 2020, Collège Montmorency</h2>
</div>

<div>
    <ol>
        <li>Remise du lien GitHub et page À propos : 
            <ol>
                <li><a href="https://github.com/ch4rlo39/cdCollection">https://github.com/ch4rlo39/cdCollection</a></li>
                <li>.../pages/a-propos</li>
            </ol>
        </li><br>
        <li>Ces étapes permettent de vérifier les exigences du TP1 : 
            <ol>
                <li>BD avec hasMany (1-n) et belongsToMany (n-n) : 
                    <ol>
                        <li>.../users permet de constater l'association hasMany en sélectionnant un utilisateur et en voyant les CDs créés par cet utilisateur</li>
                        <li>.../cds permet de constater l'associer belongsToMany entre les CDs et les Genres. Sélectionner un CD et constater les Genres liés à celui-ci</li>
                    </ol>
                </li><br>
                <li>cake bake pour 5 tables + validations : 
                    <ol>
                        <li>Les tables de contenu sont les suivantes : Users, CDs, Reviews, Covers et Genres</li>
                        <li>L'application est basée sur le résusltat des modèles, vues et controleurs obtenus à partir de la commande cake bake all pour chaque table</li>
                    </ol>
                </li><br>
                <li>Actions et infos en menu pour trois types d'utilisateurs : 
                    <ol>
                        <li>Les utilisateurs ayant le rôle d'administrateur ont accès à l'intégralité du site</li>
                        <li>Les utilisateurs ayant le rôle de vendeur n'ont accès qu'aux CDs qu'ils ont ajoutés
                            <ol>
                                <li>Démarrez une session en tant que vendeur --> email : vendorbob@email.com | password : vendorbob</li>
                                <li>Essayez de modifier un CD appartenant à Bob --> l'accès est autorisé</li>
                                <li>Ensuite, essayez de modifier un CD appartenant à un autre utilisateur --> l'accès est refusé</li>
                            </ol>
                        </li>
                        <li>Les visiteurs ne peuvent qu'afficher les CDs. Ils ne peuvent pas en ajouter ni les modifier
                            <ol>
                                <li>En tant que visiteur, essayez d'ajouter un CD --> l'accès est refusé</li>
                                <li>En tant que visiteur, essayez de modifier un CD --> l'accès est refusé</li>
                            </ol>
                        </li>
                        <li>Le menu indique si un utilisateur est en session. Si oui, on voit son courriel et un lien pour se déconnecter. Sinon, il y a un lien pour se connecter</li>
                    </ol>
                </li><br>
                <li>Traduction i18n en français et 3ième langue : 
                    <ol>
                        <li>Une partie de l'interface et du contenu du site est disponible en anglais, en français et en espagnol : 
                            <ol>
                                <li>Il est possible de changer la langue en tout temps en la sélectionnant dans le menu</li>
                                <li>Le contenu des avis (reviews) peut être traduit, afficher un avis et changer la langue pour le constater</li>
                            </ol>
                        </li>
                    </ol>
                </li><br>
                <li>Gestion multilingue du contenu de la BD : 
                    <ol>
                        <li>Voir le point 4</li>
                    </ol>
                </li><br>
                <li>Téléversement et affichage d'images liées : 
                    <ol>
                        <li>Ajoutez une image via ".../covers/add"</li>
                        <li>Une fois l'image ajoutée, il est possible de la lier à un CD : 
                            <ol>
                                <li>Ajoutez ou modifiez un CD et sélectionnez l'image juste ajoutée</li>
                                <li>Vous pouvez voir l'image en affichant la liste des CDs ou le CD directement</li>
                            </ol>
                        </li>
                    </ol>
                </li><br>
                <li>Envoi d'un courriel de confirmation avec UUID : 
                    <ol>
                        <li>Connectez-vous en tant qu'adminitrateur : <br> email : test@test.com | password : motdepasse</li>
                        <li>Ajoutez un nouvel utilisateur via ".../users/add"</li>
                        <li>Donnez une adresse courriel valide à laquelle vous pouvez accéder</li>
                        <li>Allez cliquer sur le lien du courriel reçu à la dite adresse</li>
                        <li>Un message de confirmation apparaît à l'écran</li>
                    </ol>
                </li><br>
            </ol>
        </li><br>
        <li>Le diagramme de la base de données actuelle utilisée par l'application : <br>
            <img src="../webroot/img/bd_cdCollection.png" >
        </li><br>
        <li>Lien vers l'emplacement d'où provient le diagramme original : <br>
            <a href="http://www.databaseanswers.org/data_models/cd_collection/index.htm">http://www.databaseanswers.org/data_models/cd_collection/index.htm</a>
        </li><br>
    </ol>
</div>