<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);

$menu = Menu::responsive()
    ->addItem("USA", "/lol.php")
    ->addItem("Canada")
    ;


echo $menu->saveHTML();
