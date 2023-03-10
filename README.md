# PHP-MVC-OOP-Library


_____________________________________________________________

composer install

cd .\public\

From public Folder : php -S localhost:8000

change example.env to .env


DB in DB-DATA FOLDER Library.sql


___________________________________________________________


PSR-4 USED TO AUTOLOAD CLASSES FROM APP AND SRC FOLDERS


ROUTE Class for routing / URL MAPPING : use src\Http\Route;

-> Route::get('path' , function || array);



VIEW Class for including view files from view folder  : use src\Http\Route; 

-> example.view.php / view::make('example' , []) : use src\View\View;



Session Class session managing + Session Flash Messages / old / errors / success  | use src\Support\Session;

->   $session->setFlash('errors', $errors); // $session->setFlash('old', $_REQUEST);



Request class GET request data / method / path 

-> use src\Http\Request;



Model ->  MySql Manager / querybuilder 

-> User::all(); |Posts::Update(['col' => 'val' , 'col' => 'val'])->where()  | CRUD | ->OrderBy() 



App => App/models , App/controllers

_________________________________________________________________________________________

-> $_ENV / .env / vlucas/phpdotenv

-> dd() / dump() / symfony/var-dumper

-> helpers.php => src/Support/helpers.php #### old() / is_user() / is_gest() / is_admin() / asset() / view() / env() / require_with()

_____________________________________________________________
FIGMA DESIGN
https://www.figma.com/file/HmRbechQQ3m5Y9szquq7bY/Library?node-id=0%3A1&t=6nkYV2USKihDQop8-1


