<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);

$menu = Menu::dropDown()
    ->addItem("USA", "/lol.php")
    ->addItem(Menu::subMenu("Canada")
              ->addItem(Menu::subMenu("Hamburger")))

    ;


echo $menu->saveHTML();
