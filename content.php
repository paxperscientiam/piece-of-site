<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::dropdown()
    ->addItem("string")
    ->addItem("shit")
    ->addItem(Menu::subMenu("farts")
              ->addItem("balls"))
    ;

Menu::drilldown();

d($menu->saveHTML());
