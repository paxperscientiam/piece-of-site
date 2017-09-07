<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::drilldown()
    ->addItem("USA")
    ->addItem("Canada")
    ->addItem(Menu::subMenu("Cities")
              ->addItem("Toronto")
              ->addItem("Montreal")
    )
    ->addItem(Menu::subMenu("Dinosaurs")
              ->addItem("Trex")
              ->addItem(Menu::subMenu("Pterosaur")
                        ->addItem("Pteranodon")))
    ->addItem("Barf")
    ;
echo $menu->saveHTML();
//d($menu->saveHTML());
