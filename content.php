<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::drilldown()
    ->orient("v")
    ->addItem("string", "/lol", "is-active")
    ->addItem("double", "/double")
    ->addItem(Menu::submenu("candy")
              ->addItem("chocolate")
    )
    ;
echo $menu->saveHTML();
//d($menu->saveHTML());
