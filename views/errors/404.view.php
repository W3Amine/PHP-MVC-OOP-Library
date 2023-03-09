<?php
function requireWith($pg, $vars = [])
{
	extract($vars);
	require __DIR__ . $pg;
}
requireWith('/../includes/htmlHead.view.php', ['htmlTitle' => "404 page not found"]);
// put here every css for current page 
?>
<link rel="stylesheet" href="<?php echo asset("/css/style.css") ?>">
<?php
requireWith('/../includes/Navbar.view.php');
requireWith('/../includes/singlePageHeader.view.php', ["title" => '404 page not found']);
?>
<img src="https://blog.thomasnet.com/hs-fs/hubfs/shutterstock_774749455.jpg?width=600&amp;name=shutterstock_774749455.jpg"
	style="margin: auto !important;display: block;margin-top: 92px !important;">
<?php
requireWith('/../includes/footer.view.php');
?>