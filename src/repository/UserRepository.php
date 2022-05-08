<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserPermission(): ?int
    {
        return isset($_SESSION['email']) ? $this->getUser($_SESSION['email'])->getPermission() : 1;
    }

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.users u LEFT JOIN schemas.users_details ud 
            ON u.id_user_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['permission']
        );
    }

    public function addUser(User $user) : bool
    {
        if (!$this->getUser($user->getEmail()))
        {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO schemas.users_details (name, surname, permission)
            VALUES (?, ?, ?)
        ');

            $stmt->execute([
                $user->getName(),
                $user->getSurname(),
                $user->getPermission()
            ]);

            $stmt = $this->database->connect()->prepare('
            INSERT INTO schemas.users (email, password, id_user_details)
            VALUES (?, ?, ?)
        ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $this->getUserDetailsId($user)
            ]);

            return true;
        }
        else
            return false;
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schemas.users_details WHERE name = :name AND surname = :surname AND permission = :permission
        ');
        $name = $user->getName();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $surname = $user->getSurname();
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $permission = $user->getPermission();
        $stmt->bindParam(':permission', $permission, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}