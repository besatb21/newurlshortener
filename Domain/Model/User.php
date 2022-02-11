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
}