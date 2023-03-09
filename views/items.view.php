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
<section class="SearchAndFilteR RelativeSection col-md-8 mx-auto p-4 border rounded">
    <form class="row g-3">
        <div class="col-md-4">
            <input type="text" class="form-control" id="Title" name="Title" value="<?php echo old('Title'); ?>"
                placeholder="Title">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="Author_Name" name="Author_Name"
                value="<?php echo old('Author_Name'); ?>" placeholder="Author Name">
        </div>
        <div class="col-md-4">
            <select class="form-select" id="State" name="State" value="<?php echo old('State'); ?>" placeholder="State">
                <option selected disabled value=""> state </option>
                <option value='new'>new</option>
                <option value='Good condition'>Good condition</option>
                <option value='Acceptable'>Acceptable</option>
                <option value='quite worn'>quite worn</option>
                <option value='Torn'>Torn</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" id="Type" name="Type" value="<?php echo old('Type'); ?>" placeholder="Type">
                <option selected disabled value=""> Type </option>
                <option value='book'>book</option>
                <option value='novel'>novel</option>
                <option value='DVD'>DVD</option>
                <option value='research paper'>research paper</option>
                <option value='magazine'>magazine</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="MinEditionDate" class="floatLabel">Min Edition Date</label>
            <input type="date" class="form-control " id="MinEditionDate" name="MinEditionDate"
                value="<?php echo old('MinEditionDate'); ?>" placeholder="MinEditionDate">
        </div>
        <div class="col-md-4">
            <label for="MaxEditionDate" class="floatLabel">Max Edition Date</label>
            <input type="date" class="form-control" id="MaxEditionDate" name="MaxEditionDate"
                value="<?php echo old('MaxEditionDate'); ?>" placeholder="MaxEditionDate">
        </div>
        <div class="d-grid mx-auto">
            <button class="btn btn-primary py-3 mt-2 " type="submit">Search</button>
        </div>
    </form>
</section>
<section class="itemsSection  mb-3 pb-3 col-md-10 mx-auto">
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
    <h2 class="text-center mb-5">Our items</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        foreach ($items as $key => $item) {
            ?>
            <div class="col">
                <div class="card text-center h-100">
                    <img src="<?php echo asset($item['Cover_Image']) ?>" class="card-img-top mx-auto d-flex img-fluid"
                        alt="item image">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php echo $item['Title'] ?>
                        </h3>
                        <div class="row">
                            <div class="col px-1">
                                <h5>author</h5>
                                <p>
                                    <?php echo $item['Author_Name'] ?>
                                </p>
                                <h5>state </h5>
                                <p>
                                    <?php echo $item['State'] ?>
                                </p>
                                <h5>date of purchase </h5>
                                <p>
                                    <?php echo $item['Purchase_Date'] ?>
                                </p>
                            </div>
                            <div class="col px-1">
                                <h5>type </h5>
                                <p>
                                    <?php echo $item['Type'] ?>
                                </p>
                                <h5>Edition date </h5>
                                <p>
                                    <?php echo $item['Edition_Date'] ?>
                                </p>
                                <?php if (isset($item['PagesNumber']) && !empty($item['PagesNumber'])) {
                                    ?>
                                    <h5>pages number </h5>
                                    <p>
                                        <?php echo $item['PagesNumber'] ?>
                                    </p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <p class="text-center text-success">
                            <?php echo $item['Status'] ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <!-- eneble  only if status is available if not disabled it -->
                        <?php if (is_user()) {
                            ?>
                            <button <?php if ($item['Status'] != 'Available') {
                                echo 'disabled';
                            } ?> class="btn btn-primary"> <a
                                    class="mx-auto text-light" href="/items/reserve?id=<?php echo $item['Item_Code'] ?>">Reserve
                                </a></button>
                        <?php } ?>
                        <?php if (is_admin()) {
                            ?>
                            <a class="mx-auto" href="/items/edit?id=<?php echo $item['Item_Code'] ?>"> <button
                                    class="btn btn-primary">Edit</button></a>
                            <a class="mx-auto" href="/items/delete?id=<?php echo $item['Item_Code'] ?>"> <button
                                    class="btn btn-danger">Delete</button></a>
                        <?php } ?>
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