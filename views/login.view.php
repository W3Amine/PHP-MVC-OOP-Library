<?php
function requireWith($pg, $vars = [])
{
  extract($vars);
  require __DIR__ . $pg;
}
requireWith('/includes/htmlHead.view.php', ['htmlTitle' => "Library Login"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/style.css") ?>">
<?php
requireWith('/includes/Navbar.view.php');
requireWith('/includes/singlePageHeader.view.php', ["title" => 'Login']);
?>
<section class="my-5 px-3 py-5 border rounded col-md-4 mx-auto ">
  <h2 class='text-center py-3'>login to you account</h2>
  <!--  START OF ERRORS DISPLAY CODE IF EXIST -->
  <?php
  if (isset($errors)) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> errors : </strong>
      <?php
      foreach ($errors as $key => $value) {
        echo $value . '<br>';
      }
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
  }
  ?>
  <!--  END OF ERRORS DISPLAY CODE IF EXIST -->
  <form method="post" class="g-3 needs-validation">
    <label for="Nickname" class="form-label">Nickname</label>
    <input type="Nickname" class="form-control py-3 my-2" name="Nickname" id="Nickname"
      value="<?php echo old('Nickname'); ?>" placeholder="Nickname" required>
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control py-3 my-2" name="Password" id="Password" placeholder="Password" required>
    <div class="d-grid mx-auto">
      <button class="btn btn-primary py-3 my-2 " type="submit">login</button>
    </div>
  </form>
</section>
<?php
requireWith('/includes/footer.view.php');
?>