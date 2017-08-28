<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\SubMenu;


use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);



$m = Menu::dropDown()
    ->addItem("hello")
    ->addItem("byebye")
    ->addItem("bones")
    ->addItem(Menu::subMenu("LOL"))
    ;


echo $m->saveHTML();
