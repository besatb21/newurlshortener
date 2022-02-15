<?php

namespace Shortener\Domain\Model;

use Shortener\Domain\Model\Base\BaseModel;

class User extends BaseModel
{
    public static $TABLE = "tbluser";
    public static $FIELDS = array(
        "id",
        "username",
        "password",
        "role",
        "disabled",
        "created_at",
        "updated_at"
    );
    public static $PRIMARY = "id";

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function shortUrls()
    {
        return Short::select()->where('user_id', '=', $this->id)->get();
    }

    public function isDisabled()
    {
        return $this->disabled == 1;
    }

    public function enable()
    {
        $this->disabled = 0;
        $this->update();
    }

    public function disable()
    {
        $this->disabled = 1;
        $this->update();
    }

    public function inRoles($roles)
    {
        return in_array($this->role, $roles);
    }

    public function isAdmin()
    {
        return $this->inRoles(array(UserRole::ADMIN));
    }
}