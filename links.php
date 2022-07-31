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
          <button class="btn btn-primary qr-button" data-short="<?=$shorts[$i]->shortcode?>">QR</button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<!--  -->
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">QR code for the link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center">
        <p>Since this project is hosted locally (and not on Epoka's server), the QR code does not actually lead you , but if you scan it you will see that the url actually makes sense</p>
        <img class="qr"></img>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/links.js"></script>
<?php 

include_once 'Common/footer.php';
?>