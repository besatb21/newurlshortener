<?php

namespace Shortener\Domain\Model;

use Shortener\Domain\Model\Base\BaseModel;

class Short extends BaseModel
{
    public static $TABLE = "tblshort";
    public static $FIELDS = array(
        "id",
        "user_id",
        "shortcode",
        "url",
        "created_at",
        "updated_at"
    );
    public static $PRIMARY = "id";
}