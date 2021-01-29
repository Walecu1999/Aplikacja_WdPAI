<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT u.id, u.email, u.password, u.name, u.surname FROM users u WHERE u.email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }
        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']

        );
    }
    public function getUserById()
    {
        $stmt = $this->execute('
               SELECT u.id, u.email, u.password, ud.name, ud.surname FROM users u LEFT JOIN users_details ud
                                                                             ON u.id_user_details = ud.id WHERE u.id=?
        ',[$_COOKIE['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id']
        );
    }
    public function addUser(User $user)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, name, surname, password)
            VALUES (?, ?, ?,? )
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getName(),
            $user->getSurname(),
            $user->getPassword()
        ]);
        $user->setId($this->getUserId($user));

    }
    private function getUserId(User $user){
        $statement = $this->execute('SELECT id FROM public.users WHERE email=? AND password=?', [$user->getEmail(), $user->getPassword()]);
        return $statement->fetch()['id'];
    }

    public function getVolunteers(): array{

        $results = [];
        $statement = $this->execute('SELECT * from users WHERE volunteer=true');
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $rs){
            $results[] = $rs;
        }
        return $results;
    }

    public function logUser(int $userId){
        $this->execute('UPDATE users SET enable=true WHERE id=?', [$userId]);
    }
    public function logOut(int $userId)
    {
        $this->execute('UPDATE users SET enable=false WHERE id=?',[$userId]);
    }
}