<?php

namespace Shortener\Domain\Model;

use Shortener\Domain\Model\Base\BaseModel;

class ShortLog extends BaseModel
{ 
    public static $TABLE = "tbluser";
    public static $FIELDS = array(
        "id",
        "short_id",
        "IP",
        "time",
    );
    public static $PRIMARY = "id";
}