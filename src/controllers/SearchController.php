<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/OfferRepository.php';

class SearchController extends AppController
{
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository();
    }
    public function search()
    {
        $randomProjects = $this->offerRepository->getRandomProjects(3);
        $provinces = $this->offerRepository->getProvinces();
        $this->render('search', ['projects' => $randomProjects, 'provinces' => $provinces]);
    }

    public function show_offers()
    {
        if (!$this->isPost()) {
            return $this->render('offers');
        }
        $province = $_POST['province'];
        $city = $_POST['city'];
        $numberOfPeople = $_POST['number-of-people'];

        if ($province === "") {
            $randomProjects = $this->offerRepository->getRandomProjects(3);
            $provinces = $this->offerRepository->getProvinces();
            return$this->render('search', ['projects' => $randomProjects, 'provinces' => $provinces, 'messages' => ['Complete the necessary data!']]);
        }

        $this->render('offers', ['offersList' => $this->offerRepository->getOffers($province, $city, $numberOfPeople)]);
    }

    public function cities()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json; charset=utf-8');
            http_response_code(200);

            echo json_encode($this->offerRepository->getCities($decoded['province']));
        }
    }

    public function random()
    {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->offerRepository->getRandomProjects());
    }
}
