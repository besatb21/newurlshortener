<?php

namespace Shortener\Services\Shortening;

use Shortener\Services\BaseService;
use Shortener\Services\Authentication\Auth;

use Shortener\Domain\Model\Short;

use Shortener\Configs\ShortConfig;

class Shortener extends BaseService
{
    use ShortConfig;

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

    public function getShort($shortCode)
    {
        return Short::select()->where('shortcode', '=', $shortCode)->first();
    }

    public function redirect($shortCode)
    {
        $shortEnt = $this->getShort($shortCode);

        if (!$shortEnt)
            throw new ShorteningException("Shortcode doesn't exit in DB: {$shortCode}");
        
        ob_clean();
        header("Location: {$shortEnt->url}");

        // Given a shortcode, redirect to its target, log and stuff
        // Or, throw an exception
    }

    public function buildUrl($shortCode)
    {
        return "http://{$this->BASE}/redirect.php?short=" . $shortCode;
    }
}