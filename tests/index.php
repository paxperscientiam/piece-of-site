<?PHP

require_once "../vendor/autoload.php";

use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;
$logger = new Logger('Monologger');
ErrorHandler::register($logger);


$menu = Menu::simple()
    ->addItem("USA")
    ->addItem("Canada")
    ->addItem(Menu::subMenu("head")
              ->addItem("BESTEEE")
              ->addItem("reversee")
    )
    ->addItem("LOVE ME")
    ;



echo $menu->saveHTML();
?>
