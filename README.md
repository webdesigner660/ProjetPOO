Ce code est un projet PHP Objet qui recrée un site de locations d'habitations similaire au site Airbnb.
Ce site permet dans un premier temps de visualiser une page avec des annonces sans pour autant y etre connecté ( donc en tant que visiteur il est tout à fait possible de voir de vraies annonces existantes dans la Base de données ).
Ensuite, il y'a la possibilité de voir certains détails des annonces directement à partir de la première page.
On a également la possibilité de créer des comptes ( directement cablés à la BDD ) avec un choix de role utilisateur ou annonceur ( user/owner ).
On a également une connexion pareil liée à la BDD et possible uniquement si un compté a été créé. Il ya 2 pages home, une page pour l'user, une pour l'owner, l'utilisateur arrivera sur une des 2 pages en fonction de son role et de son id, qui reconnait si c'est un user ou un owner grace à la BDD.
Lorsque qu'on créer un compte, donc dans la partie inscription, l'utilisateur est directement redirigé vers la page home correcte en fonction de son role ( pas besoin de créer un compte puis de devoir se connecter manuellement, la connexion se fait toute seule lors de l'inscription ).
Sur la page Home de l'owner on a 2 boutons, un pour créer des annonces ( qui amene vers un formulaire de création d'annonces ) et un bouton "mes annonces" qui permet à l'owner de voir toutes ses annonces.
Lorsque l'owner créer une annonce, celle ci est aussitot créée dans la BDD et permet donc de l'afficher dans "mes annonces".
Grace a la création des annonces dans la BDD, on fait un forEach pour afficher chaque annonces de l'owner dans sa page announce grace a au bouton mes annonces. Toutes les annonces appartiennent a l'owner connecté dans la session ( il ne peut pas avoir les annonces d'un autre compte owner dans ses annonces )
Chaque annonce est bien cablée a la BDD, et l'adresse et le type de logement sont bien répresentés par les données qu'on leur a donné ( exemple : 1 Rue des Lilas et Appartement ) plutot que recevoir directement l'id lié a la BDD.


