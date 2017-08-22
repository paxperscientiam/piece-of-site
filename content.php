<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);

$menu = Menu::drillDown()
    ->addItem("USA", "/lol.php")
    ->addItem(Menu::subMenu("Canada")
              ->addItem("Yukon")
              ->addItem("Quebec"))
    ;


echo $menu->saveHTML();
