<?php
function requireWith($pg, $vars = [])
{
    extract($vars);
    require __DIR__ . $pg;
}
requireWith('/includes/htmlHead.view.php', ['htmlTitle' => "Edit profile"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/style.css") ?>">
<?php
requireWith('/includes/Navbar.view.php');
requireWith('/includes/singlePageHeader.view.php', ["title" => 'Edit profile']);
?>
<section class="my-5 px-3 py-5 border rounded col-md-6 mx-auto ">
    <h2 class='text-center py-3'>Edit you account</h2>
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
    <!-- START OF js ERRORS DISLAY HERE -->
    <div id='alertbox' class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- END OF js ERRORS DISLAY HERE -->
    <form id="Form" method="post" class="g-3 needs-validation">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control i py-3 my-3" name="Nickname" id="Nickname"
                    value="<?php echo getUser('Nickname'); ?>" placeholder="Nickname" required>
                <input type="text" class="form-control  py-3 my-3" name="Full_Name" id="Full_Name"
                    placeholder="Full_Name" value="<?php echo getUser('Full_Name'); ?>" required>
                <input type="email" class="form-control  py-3 my-3" name="Email" id="Email" placeholder="Email"
                    value="<?php echo getUser('Email'); ?>" required>
                <input type="password" class="form-control  py-3 my-3" name="Password" id="Password"
                    placeholder="Password" value="" required>
                <input type="password" class="form-control  py-3 my-3" name="ConfirmPassword" id="ConfirmPassword"
                    placeholder="Confirm Password" value="" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control i py-3 my-3" name="Address" id="Address"
                    value="<?php echo getUser('Address'); ?>" placeholder="Address" required>
                <input type="tel" class="form-control  py-3 my-3" name="Phone" id="Phone" placeholder="Phone"
                    value="<?php echo getUser('Phone'); ?>" required>
                <input type="text" class="form-control  py-3 my-3" name="CIN" id="CIN" placeholder="CIN"
                    value="<?php echo getUser('CIN'); ?>" required>
                <label class="birthdayLabel floatLabel" for="Birth_Date"> your Birth_Date</label>
                <input type="date" class="form-control  py-3 my-3" name="Birth_Date" id="Birth_Date"
                    value="<?php echo getUser('Birth_Date'); ?>" required>
                <select class="form-select py-3 my-3" id="Occupation" name="Occupation" value=""
                    placeholder="Occupation">
                    <option selected="" disabled="" value=""> Occupation </option>
                    <option value="student">Student</option>
                    <option value="Official">Official</option>
                    <option value="Employee">Employee</option>
                    <option value="Housewife">Housewife</option>
                </select>
            </div>
        </div>
        </div>
        <div class="d-grid mx-auto">
            <button id='FormSubmit' class="btn btn-primary py-3 my-2 " type="submit">save</button>
        </div>
    </form>
    <script>
        Occupation.value = '<?php echo getUser('Occupation') ?>';
    </script>
</section>
<script src="<?php echo asset("/js/RegistrationAndEditFormsValidator.js") ?>"></script>
<?php
requireWith('/includes/footer.view.php');
?>