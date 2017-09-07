<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::dropdown()
    ->orient("h")
    ->addItem("string", "/lol", "is-active")
    ->addItem("double", "/double")
    ->addItem(Menu::submenu("candy")
              ->addItem("chocolate", "", "is-active")
              ->addItem("vanilla")
              ->addItem("strawberry")
              ->addItem(Menu::submenu("pudding")
                        ->addItem("kozyshack")
                        ->addItem("generic")
              )
    )
    ;
echo $menu->saveHTML();
//d($menu->saveHTML());
