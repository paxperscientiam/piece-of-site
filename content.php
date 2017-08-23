<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);




$menu = Menu::dropDown()
    ->addItem("USA", "/lol.php")
    ->addItem("Moon", "/june.php")
    // ->addItem(Menu::subMenu("this is fine")
    //           ->addItem("find"))
    // ->addItem(Menu::subMenu("not fine")
    //           ->addItem(Menu::subMenu("bile")
    //                     ->addItem("lasjfljkasf")))
    ;



echo $menu->saveHTML();
