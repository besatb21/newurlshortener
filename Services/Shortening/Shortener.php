<?php

namespace Shortener\Services\Shortening;

use Shortener\Services\BaseService;
use Shortener\Services\Authentication\Auth;

use Shortener\Domain\Model\Short;

class Shortener extends BaseService
{
    private function generate()
    {
        return substr(str_shuffle(MD5(microtime())), 0, 10);
    }

    public function shorten($url)
    {
        $short = $this->generate();

        // Given a URL, shorten it
        $user = Auth::instance()->user();


        $shortEnt = new Short();
        $shortEnt->shortcode = $short;
        $shortEnt->url = $url;

        if ($user)
            $shortEnt->user_id = $user->id;

        $shortEnt->insert();

        return $shortEnt;
    }

    public function redirect($shortCode)
    {
        $shortEnt = Short::select()->where('shortcode', '=', $shortCode)->first();

        if (!$shortEnt)
            throw new ShorteningException("Shortcode doesn't exit in DB: {$shortCode}");
        
        ob_clean();
        header("Location: {$shortEnt->url}");

        // Given a shortcode, redirect to its target, log and stuff
        // Or, throw an exception
    }

}