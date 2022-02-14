<?php 
require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Services\Shortening\Shortener;

Auth::instance()->logInGuard();

$shorts = Auth::instance()->user()->shortUrls();

include 'Common/header.php' ;
?>


<div class=" position-absolute w-100  "  >
<br>
<h5 style="text-align:center">List of your shortened URLs</h5>
<table class=" table table-sm  w-75  table-bordered" style="margin:auto">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ShortCode</th>
      <th scope="col">Link</th>
      <th scope="col">Url</th>
      <th scope="col">QR</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($shorts); $i++) { ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$shorts[$i]->shortcode?></td>
        <td>
          <a href="<?=Shortener::instance()->buildUrl($shorts[$i]->shortcode)?>">Link!</a>
        </td>
        <td>
          <a href="<?=$shorts[$i]->url?>">
            <?=$shorts[$i]->url?>
          </a>
        </td>
        <td>
          <a href="/urlshortener/api/shorts/getQr.php?short=<?=$shorts[$i]->shortcode?>">QR</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php 

include_once 'Common/footer.php';
?>