<?php
function requireWith($pg, $vars = [])
{
  extract($vars);
  require __DIR__ . $pg;
}
requireWith('/includes/htmlHead.view.php', ['htmlTitle' => "Library Profile"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/style.css") ?>">
<?php
requireWith('/includes/Navbar.view.php');
requireWith('/includes/singlePageHeader.view.php', ["title" => 'Welcome , ']);
?>
<section class="RelativeSection itemsSection col-md-11 mx-auto p-4 border row rounded">
  <div class="col-md-6 p-3">
    <h2 class="text-center py-2">Reservation List</h2>
    <?php
    if (is_admin()) {
      ?>
      <form class="g-3 needs-validation">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Reservation_Code" id="Reservation_Code"
            value="<?php echo old('Reservation_Code'); ?>" placeholder="Reservation Code">
          <input type="text" class="form-control" name="Reservation_NickName" id="Reservation_NickName"
            value="<?php echo old('Reservation_NickName'); ?>" placeholder="Nickname">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
      <?php
    }
    ?>
    <?php
    foreach ($Reservations as $key => $Reservation) {
      ?>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-3">
            <img src="<?php echo asset($Reservation['Cover_Image']) ?>"
              class="mx-md-0 img-fluid  d-flex mx-auto d-md-block rounded-start" alt="item image" width="160">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h3 class="card-title">
                <?php echo $Reservation['Title'] ?>
              </h3>
              <div class="row my-3">
                <div class="col-md-3 px-3">
                  <h5>author</h5>
                  <p>
                    <?php echo $Reservation['Author_Name'] ?>
                  </p>
                  <h5>state </h5>
                  <p>
                    <?php echo $Reservation['State'] ?>
                  </p>
                </div>
                <div class="col-md-3 px-3">
                  <h5> item id </h5>
                  <p>
                    <?php echo $Reservation['Item_Code'] ?>
                  </p>
                  <h5>Reserved By</h5>
                  <p>
                    <?php echo $Reservation['Nickname'] ?>
                  </p>
                </div>
                <div class="col-md-6 px-3">
                  <h5>Reservation Date </h5>
                  <p>
                    <?php echo $Reservation['Reservation_Date'] ?>
                  </p>
                  <h5 class="text-danger">Reservation expire at</h5>
                  <p class="text-danger">
                    <?php echo $Reservation['Reservation_Expiration_Date'] ?>
                  </p>
                </div>
              </div>
              <?php
              if (is_user() && strtotime(now()) <= strtotime($Reservation['Reservation_Expiration_Date']) && $Reservation['Borrowing_Code'] == null) {
                ?>
                <a href="/reservation/cancel?id=<?php echo $Reservation['Reservation_Code'] ?>"> <button
                    class="btn my-1 btn-danger "> cancel Reservation </button> </a>
                <?php
              }
              ?>
              <?php
              if (is_admin() && strtotime(now()) <= strtotime($Reservation['Reservation_Expiration_Date']) && $Reservation['Borrowing_Code'] == null) {
                ?>
                <a href="/reservation/active?id=<?php echo $Reservation['Reservation_Code'] ?>"> <button
                    class="btn my-1 btn-success "> Active Reservation </button> </a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <div class="col-md-6 p-3">
    <h2 class="text-center py-2">Borrow List</h2>
    <?php
    if (is_admin()) {
      ?>
      <form class="g-3 needs-validation">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Borrowing_Code" id="Borrowing_Code"
            value="<?php echo old('Borrowing_Code'); ?>" placeholder="Borrowing Code">
          <input type="text" class="form-control" name="Borrowing_NickName" id="Borrowing_NickName"
            value="<?php echo old('Borrowing_NickName'); ?>" placeholder="NickName">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
      <?php
    }
    ?>
    <?php
    foreach ($Borrowings as $key => $Borrowing) {
      ?>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-3">
            <img src="<?php echo asset($Borrowing['Cover_Image']) ?>"
              class="mx-md-0 img-fluid  d-flex mx-auto d-md-block rounded-start" alt="item image" width="160">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h3 class="card-title">
                <?php echo $Borrowing['Title'] ?>
              </h3>
              <div class="row my-3">
                <div class="col-md-3 px-3">
                  <h5>author</h5>
                  <p>
                    <?php echo $Borrowing['Author_Name'] ?>
                  </p>
                  <h5>state </h5>
                  <p>
                    <?php echo $Borrowing['State'] ?>
                  </p>
                </div>
                <div class="col-md-3 px-3">
                  <h5>item id </h5>
                  <p>
                    <?php echo $Borrowing['Item_Code'] ?>
                  </p>
                  <h5>Borrowed By </h5>
                  <p>
                    <?php echo $Borrowing['Nickname'] ?>
                  </p>
                </div>
                <div class="col-md-6 px-3">
                  <h5>Borrow Date </h5>
                  <p>
                    <?php echo $Borrowing['Borrowing_Date'] ?>
                  </p>
                  <?php
                  if (!empty($Borrowing['Borrowing_Return_Date'])) {
                    ?>
                    <h5 class="text-success">Borrowing Return Date</h5>
                    <p class="text-success">
                      <?php echo $Borrowing['Borrowing_Return_Date'] ?>
                    </p>
                    <?php
                  } else {
                    echo '<h5  class="text-danger">this item is not returned yet</h5>';
                  }
                  ?>
                </div>
              </div>
              <?php
              if (is_admin() && empty($Borrowing['Borrowing_Return_Date'])) {
                ?>
                <a href="/borrowing/restored?id=<?php echo $Borrowing['Borrowing_Code'] ?>"> <button
                    class="btn my-1 btn-danger "> restored </button> </a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</section>
<?php
requireWith('/includes/footer.view.php');
?>