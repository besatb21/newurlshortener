<?php

namespace Shortener\Domain\Model;

final class UserRole
{
    private function __construct() { }

    public const NORMAL = 0;
    public const ADMIN = 10;
}