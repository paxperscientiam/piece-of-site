<?PHP

require_once "vendor/autoload.php";

use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);


$menu = Menu::simple()
    ->align("right")
    ->orient("V")
    ->addItem("USA")
    ->addItem("Canada")

    ;


echo $menu->saveHTML();
