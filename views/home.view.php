<?php
function requireWith($pg, $vars = [])
{
  extract($vars);
  require __DIR__ . $pg;
}
requireWith('/includes/htmlHead.view.php', ['htmlTitle' => "Library"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/home.css") ?>">
<?php
requireWith('/includes/Navbar.view.php');
?>
<header>
  <div class="HeaderOverlay pt-5">
    <h1 class="text-center text-white">Beg, <span class="text-primary">borrow</span>, but please don’t steal. <span
        class="text-success">Return your books!</span> </h1>
  </div>
</header>
<section class="col-md-10  my-2 mx-auto  row py-3">
  <div class="col-sm-6 col-md-3  rounded p-2">
    <div class="col-12 mx-auto py-3 text-light border rounded   bg-success  px-2">
      <h2 class=" py-1 text-center">BOOKS</h2>
      <h3 class=" py-2 text-center counter ">999875</h3>
    </div>
  </div>
  <div class="col-sm-6 col-md-3  rounded p-2">
    <div class="col-12 mx-auto py-3 text-light border rounded   bg-success  px-2">
      <h2 class=" py-1 text-center">NOVELS</h2>
      <h3 class=" py-2 text-center counter ">456788</h3>
    </div>
  </div>
  <div class="col-sm-6 col-md-3  rounded p-2">
    <div class="col-12 mx-auto py-3 text-light border rounded   bg-success  px-2">
      <h2 class=" py-1 text-center"> DVDs</h2>
      <h3 class=" py-2 text-center counter ">456456</h3>
    </div>
  </div>
  <div class="col-sm-6 col-md-3  rounded p-2">
    <div class="col-12 mx-auto py-3 text-light border rounded   bg-success  px-2">
      <h2 class=" py-1 text-center">CDs</h2>
      <h3 class=" py-2 text-center counter ">1896</h3>
    </div>
  </div>
</section>
<?php
requireWith('/includes/footer.view.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"
  integrity="sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
  integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function ($) {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
  });
</script>