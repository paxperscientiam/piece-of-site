<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

$m = Menu::dropdown()
    ->addItem("")
    ->addItem("byebye")
    ->addItem("bones")
    ->addItem(Menu::subMenu("Sub Header")
              ->addItem("hi")
              ->addItem("shalom")
    )
    ->addItem("SHIT")
    ->addItem("BALLS")
    ;


echo $m->saveHTML();
