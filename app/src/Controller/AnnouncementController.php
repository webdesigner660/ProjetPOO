<?php


namespace App\Controller;

use App\Model\Entity\Adress;
use App\Model\Entity\Announcement;
use App\Session;
use Symplefony\View;
use Symplefony\Controller;
use Laminas\Diactoros\ServerRequest;
use App\Model\Repository\RepoManager;
use App\Model\Repository\AnnouncementRepository;

class AnnouncementController extends Controller
{
    /**
     * Méthode pour afficher les détails d'une annonce spécifique
     */
    public function details(int $id): void
    {

        $view = new View('page:announcement:details');
        // Récupérer l'instance du Repository
        $announcement = RepoManager::getRM()->getAnnouncementRepo()->getById($id);

        $data = [
            'announcement' => $announcement

        ];

        $view->render($data);
    }

    public function CreateAnnonce(): void
    {
        $view = new View('page:create-annonce');
        $data = [
            'title' => 'Créer une annonce - MoinCherBnb.com'

        ];
        $view->render($data);
    }



    public function createAnnouncement(ServerRequest $request): void
    {
        $announce_data = $request->getParsedBody();
        $adress =  new Adress(array('city' => $announce_data['city'], 'country' => $announce_data['country'], 'street' => $announce_data['street']));

        $adress_created = RepoManager::getRM()->getAdressRepo()->create($adress);

        $announce = new Announcement(array(
            'id_owner' => Session::get(Session::USER)->getId(),
            'title' => $announce_data['title'],
            'price' => $announce_data['price'],
            'size' => $announce_data['size'],
            'description' => $announce_data['description'],
            'sleeping' => $announce_data['sleeping'],
            'accommodation_id' => $announce_data['accommodation_id'],
            'id_adress' => $adress_created->getId()
        ));



        $announce_created = RepoManager::getRM()->getAnnouncementRepo()->createAnnouncement($announce);


        if (is_null($announce_created)) {
            // TODO: gérer une erreur
            $this->redirect('/create-annonce');
        }
        $this->redirect('/home/owner');
    }

    public function ViewAnnounce(): void
    {

        // Récupérer l'ID du propriétaire connecté
        $id_owner = Session::get(Session::USER)->getId();

        // Récupérer les annonces via la méthode `getAllForOwner`
        $announcements = RepoManager::getRM()->getAnnouncementRepo()->getAllForOwner($id_owner);
        $view = new View('page:announce');
        $data = [
            'title' => 'Gestion des annonces',
            'announcements' => $announcements
        ];
        $view->render($data);
    }
}
