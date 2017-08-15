<?PHP

require_once "../../vendor/autoload.php";

use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

$logger = new Logger('Monologger');
ErrorHandler::register($logger);


$menu = Menu::dropdown()
    ->addItem("USA")
    ->addItem("Canada")
    // ->addItem(Menu::subMenu("Cities")
    //           ->addItem("Toronto")
    //           ->addItem("Montreal")
    //    )
    // ->addItem(Menu::subMenu("Dinosaurs")
    //           ->addItem("Trex")
    //           ->addItem(Menu::subMenu("Pterosaur")
    //                     ->addItem("Pteranodon")))
    // ->addItem("Barf")
    ;


echo $menu->saveHTML();
