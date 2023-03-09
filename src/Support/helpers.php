<?php
use src\View\View;

function require_with($pg, $vars = [])
{
	extract($vars);
	require $pg;
}
if (!function_exists('env')) {
	function env($key, $default = null)
	{
		return $_ENV[$key] ?? value($default);
	}
}
// function config($path , $key ){
// 	 return config::get($path , $key);
// }
if (!function_exists('value')) {
	function value($value)
	{
		return ($value instanceof Closure) ? $value() : $value;
	}
}
function old($key)
{
	return $_SESSION['Flash']['old']['content'][$key] ?? false;
}
function asset($filePath)
{
	return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $filePath;
}
if (!function_exists('view')) {
	function view($value, $data = [])
	{
		return View::make($value, $data);
	}
}
function is_guest()
{
	if (!isset($_SESSION['UserData'])) {
		return true;
	} else {
		return false;
	}
}
function is_user()
{
	if (!is_guest() && $_SESSION['UserData']['Admin'] === false) {
		return true;
	} else {
		return false;
	}
}
function is_admin()
{
	if (!is_guest() && $_SESSION['UserData']['Admin'] === true) {
		return true;
	} else {
		return false;
	}
}
function getUser($key)
{
	return $_SESSION['UserData'][$key] ?? false;
}
function not_auth_redirect()
{
	if (!is_guest()) {
		header("location:login.php");
	}
}
function auth_redirect()
{
	if (is_guest()) {
		header("location:profile.php");
	}
}
function now()
{
	return date("Y-m-d H:i:s");
}
function nowPlus24h()
{
	return date("Y-m-d H:i:s", strtotime('+24 hours'));
}