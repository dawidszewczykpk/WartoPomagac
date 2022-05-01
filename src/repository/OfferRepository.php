<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Offer.php';

class OfferRepository extends Repository
{

    public function getOffers(int $id): ?Offer
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.projects WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) {
            return null;
        }

        return new Project(
            $project['title'],
            $project['description'],
            $project['image']
        );
    }

    public function addProject(Project $project): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO projects (title, description, image, created_at, id_assigned_by)
            VALUES (?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

        $stmt->execute([
            $project->getTitle(),
            $project->getDescription(),
            $project->getImage(),
            $date->format('Y-m-d'),
            $assignedById
        ]);
    }

    public function getProjects(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers;
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $result[] = new Project(
                $project['title'],
                $project['description'],
                $project['image'],
                $project['like'],
                $project['dislike'],
                $project['id']
            );
        }

        return $result;
    }

    public function getRandomProjects(int $ammounts): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.offers;
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($projects as $project) {
            $result[] = new Project(
                $project['title'],
                $project['description'],
                $project['image'],
                $project['like'],
                $project['dislike'],
                $project['id']
            );
        }

        return $result;
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

    public function like(int $id) {
        $stmt = $this->database->connect()->prepare('
            UPDATE projects SET "like" = "like" + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislike(int $id) {
        $stmt = $this->database->connect()->prepare('
            UPDATE projects SET dislike = dislike + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}