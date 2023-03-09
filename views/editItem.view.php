<?php
function requireWith($pg, $vars = [])
{
    extract($vars);
    require __DIR__ . $pg;
}
requireWith('/includes/htmlHead.view.php', ['htmlTitle' => "Edit item"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/style.css") ?>">
<?php
requireWith('/includes/Navbar.view.php');
requireWith('/includes/singlePageHeader.view.php', ["title" => 'Edit item']);
?>
<section class="my-5 px-3 py-5 border rounded col-md-6 mx-auto ">
    <h2 class='text-center py-3'>Edit item</h2>
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
    <?php
    if (isset($item) && isset($item)) {
        ?>
        <form method="POST" class="g-3 needs-validation" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control i py-3 my-3" name="Title" id="Title"
                        value="<?php echo $item['Title']; ?>" placeholder="Title" required>
                    <input type="text" class="form-control  py-3 my-3" name="Author_Name" id="Author_Name"
                        placeholder="Author Name" value="<?php echo $item['Author_Name'] ?>" required>
                    <select class="form-select py-3 my-3" id="Type" name="Type" placeholder="Type">
                        <option selected disabled value=""> Type </option>
                        <option value='book'>book</option>
                        <option value='novel'>novel</option>
                        <option value='DVD'>DVD</option>
                        <option value='research paper'>research paper</option>
                        <option value='magazine'>magazine</option>
                    </select>
                    <select class="form-select py-3 my-3" id="State" name="State" placeholder="State">
                        <option selected disabled value=""> State </option>
                        <option value='new'>new</option>
                        <option value='Good condition'>Good condition</option>
                        <option value='Acceptable'>Acceptable</option>
                        <option value='quite worn'>quite worn</option>
                        <option value='Torn'>Torn</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="num" class="form-control i py-3 my-3" name="PagesNumber" id="PagesNumber"
                        value="<?php echo $item['PagesNumber'] ?>" placeholder="pages Number" required>
                    <label class="birthdayLabel floatLabel" for="Edition_Date"> Edition Date </label>
                    <input type="date" class="form-control  py-3 my-3" name="Edition_Date" id="Edition_Date"
                        value="<?php echo $item['Edition_Date'] ?>" required>
                    <label class="birthdayLabel floatLabel" for="Purchase_Date"> purchase Date</label>
                    <input type="date" class="form-control  py-3 my-3" name="Purchase_Date" id="Purchase_Date"
                        value="<?php echo $item['Purchase_Date'] ?>" required>
                    <select class="form-select py-3 my-3" id="Status" name="Status" placeholder="Status">
                        <option selected disabled value=""> Status </option>
                        <option value='Available'>Available</option>
                        <option value='Reserved'>Reserved</option>
                        <option value='Borrowed'>Borrowed</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo asset($item['Cover_Image']) ?>" class=" mx-auto d-flex img-fluid" alt="item image"
                        width='200'>
                </div>
                <div class="col-md-6">
                    <input class="form-control my-auto form-control-lg mb-2" id="Cover_Image" name="Cover_Image"
                        type="file">
                </div>
            </div>
            <input type="hidden" name="Item_Code" value="<?php echo $id ?>" required>
            </div>
            <div class="d-grid mx-auto">
                <button class="btn btn-primary py-3 my-2 " type="submit">Save</button>
            </div>
        </form>
        <script>
            Status.value = '<?php echo $item['Status'] ?>';
            State.value = '<?php echo $item['State'] ?>';
            Type.value = '<?php echo $item['Type'] ?>';
        </script>
        <?php
    }
    ?>
</section>
<?php
requireWith('/includes/footer.view.php');
?>