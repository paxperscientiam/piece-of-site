<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::simple()
    ->align("r")
    ->addItem("string", "/lol", "is-active")
    ->addItem("double")
    ;
echo $menu->saveHTML();
//d($menu->saveHTML());
