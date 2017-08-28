<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);



$m = Menu::drilldown()
    ->addItem("hello")
    ->addItem("byebye")
    ->addItem("bones")
    ->addItem(Menu::subMenu("LOL")
              ->addItem("SHIT")
              ->addItem("BALLS"))
    ;


echo $m->saveHTML();
