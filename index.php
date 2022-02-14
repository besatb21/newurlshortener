<?php

use Shortener\Services\Shortening\Shortener;
use Shortener\Services\Shortening\ShorteningException;

require_once __DIR__ . '/startup.php';

if (isset($_POST['submit']))
{
    //Shorten the codes:
    $result = '';

    try
    {
        $shortEnt = Shortener::instance()->shorten($_POST['url']);
        $result = Shortener::instance()->buildUrl($shortEnt->shortcode);
    } 
    catch (ShorteningException $e)
    {
        $result = $e->getMessage();
    }
}

include_once "Common/header.php";
?>


<!-- this header  doe not have any classes included to it ,  -->

<div class=" container  " style="margin-top: 140px;" >
    <div class="p-5">
        <div  class= "row justify-content-md-center  ">
            <h1  >Shorten your URL!</h1>
        </div>
        <div style="padding:10px; " class= "row justify-content-md-center ">

            <form method="POST" action="">
                <input placeholder="Enter your URL"  style="margin-right:10px" name="url" type="text"/>
            
                <button type="submit" name="submit" style="background-color :#8df1e1" class="btn border-dark" type="submit">Shorten</button>
            </form>
            <br/> 
        </div>
        <div style="padding:10px;" class="row justify-content-md-center">
            <span>
                <? if (isset($result)) { ?>
                    <a href="<?=$result?>"><?=$result?></a>
                <? } ?>
            </span>
        </div>
    </div>
</div>
<?php
include_once "Common/footer.php";
?>

