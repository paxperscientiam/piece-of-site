<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::dropdown()
    ->addItem("string", "/lol")
    ->addItem("shit")
    ->addItem(Menu::subMenu("farts"))
    ;

d($menu->saveHTML());
