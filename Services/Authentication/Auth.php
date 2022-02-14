<?php

namespace Shortener\Services\Authentication;

use Shortener\Services\BaseService;
use Shortener\Domain\Model\{User, UserRole};

class Auth extends BaseService
{
    public function userExists($username)
    {
        return User::select()->where('username', '=', $username)->first() != null;
    }
    public function user()
    {
        // Return currently logged in user:

        if (isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }

        return null;
    }

    public function loggedIn()
    {
        return $this->user() != null;
    }

    public function logIn($username, $password)
    {
        $user = User::select()->where('username', '=', $username)->first();

        if (!$user)
            throw new AuthException("User does not exist!");
        
        if (!$user->checkPassword($password))
            throw new AuthException("Wrong password");
        
        if ($user->disabled)
            throw new AuthException("User is disabled!");
        

        $_SESSION['user'] = $user;
        return $user;
    }

    public function logOut()
    {
        unset($_SESSION['user']);
    }

    public function register($username, $password)
    {
        $user = new User();

        $user->username = $username;
        $user->setPassword($password);
        $user->role = UserRole::NORMAL;

        // Insert the user:
        return $user->insert();
    }

    public function logInGuard()
    {
        if (!$this->loggedIn())
        {
            header('Location: index.php');
            exit();
        }
    }
}

?>