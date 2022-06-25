<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Offer.php';
require_once __DIR__ . '/../repository/OfferRepository.php';

class OfferController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository();
    }

    public function offers()
    {
        $offers = $this->offerRepository->getOffers();
        $this->render('offer', ['offers' => $offers]);
    }

    public function add_offer()
    {
        if (!$this->isPost()) {
            $provinces = $this->offerRepository->getProvinces();
            return $this->render('add_offer', ['provinces' => $provinces]);
        }

        if(!isset($_SESSION['email']))
            return $this->render('add_offer', ['messages' => "You do not have permission to create an offer"]);
        else{
            if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
                );

                $offerProvince = $_POST['offer-province'];
                $offerCity = $_POST['offer-city'];
                $offerNumberOfPeople = $_POST['offer-number-of-people'];
                $offerTime = $_POST['offer-time'];

                if($offerProvince === "" || $offerCity === "" || $offerNumberOfPeople === "" || $offerTime === "") {
                    $provinces = $this->offerRepository->getProvinces();
                    return $this->render('add_offer', ['messages' => ['Complete all the necessary information!', 'provinces' => $provinces]]);
                }

                $offerExist = $this->offerRepository->getOffers($offerProvince, $offerCity);

                if ($offerExist) {
                    $provinces = $this->offerRepository->getProvinces();
                    return $this->render('add_offer', ['messages' => ['This offer already exists!'], 'provinces' => $provinces]);
                }

                $offer = new Offer($_SESSION['email'],$offerProvince,$offerCity,$offerNumberOfPeople,$offerTime,$_FILES['file']['name']);
                $this->offerRepository->addOffer($offer);

                $provinces = $this->offerRepository->getProvinces();
                return $this->render('search', ['provinces' => $provinces]);
            }

            $provinces = $this->offerRepository->getProvinces();
            return $this->render('add_offer', ['messages' => $this->message, 'provinces' => $provinces]);
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
