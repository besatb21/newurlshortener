<?php 
require_once __DIR__ . '/startup.php';

include 'Common/header.php' ;
?>


<div class=" position-absolute w-100  "  >
<br>
<h5 style="text-align:center">Contents of the table </h5>
<table class=" table table-sm  w-75  table-bordered" style="margin:auto">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
<?php 

include_once 'Common/footer.php';
?>