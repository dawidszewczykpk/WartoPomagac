<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Offer.php';

class OfferRepository extends Repository
{

    public function getOffers(string $province, string $city, string $numberOfPeople ): array
    {
        $result = [];

        if($province !== "" && $city !== "" && $numberOfPeople !== "")
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers WHERE province = :province AND city = :city AND number_of_people >= :numberOfPeople;
            ');
            $stmt->bindParam(':province', $province, PDO::PARAM_INT);
            $stmt->bindParam(':city', $city, PDO::PARAM_INT);
            $stmt->bindParam(':numberOfPeople', $numberOfPeople, PDO::PARAM_INT);
            $stmt->execute();
            $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($offers as $offer) {
                $result[] = new Offer(
                    $offer['user_email'],
                    $offer['province'],
                    $offer['city'],
                    $offer['number_of_people'],
                    $offer['how_long'],
                    $offer['img']
                );
            }
        }
        else if($province !== "" && $city !== "")
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers WHERE province = :province AND city = :city;
            ');
            $stmt->bindParam(':province', $province, PDO::PARAM_INT);
            $stmt->bindParam(':city', $city, PDO::PARAM_INT);
            $stmt->execute();
            $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($offers as $offer) {
                $result[] = new Offer(
                    $offer['user_email'],
                    $offer['province'],
                    $offer['city'],
                    $offer['number_of_people'],
                    $offer['how_long'],
                    $offer['img']
                );
            }
        }
        else if($province !== "")
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers WHERE province = :province;
            ');
            $stmt->bindParam(':province', $province, PDO::PARAM_INT);
            $stmt->execute();
            $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($offers as $offer) {
                $result[] = new Offer(
                    $offer['user_email'],
                    $offer['province'],
                    $offer['city'],
                    $offer['number_of_people'],
                    $offer['how_long'],
                    $offer['img']
                );
            }
        }
        return $result;
    }

    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO schemas.offers (user_email, province, city, number_of_people, how_long, img)
            VALUES (?, ?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $offer->getUserEmail(),
            $offer->getProvince(),
            $offer->getCity(),
            $offer->getNumberOfPeople(),
            $offer->getHowLong(),
            $offer->getImage()
        ]);
    }

    public function getRandomProjects(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers ORDER BY random() LIMIT 1;
        ');
        $stmt->execute();
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $offers;
    }

    public function getProjectByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProvinces()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT name FROM schemas.provinces;
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCities(string $province_name)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT u.name FROM schemas.cities u RIGHT JOIN schemas.provinces ud
                                          ON u.province_id = ud.id WHERE ud.name = :province_name;
        ');
        $stmt->bindParam(':province_name', $province_name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}