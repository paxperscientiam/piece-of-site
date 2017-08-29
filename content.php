<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);


$m = Menu::dropDown()
    ->addItem("farts")
    ->addItem("tarts")
    ->addItem(Menu::subMenu("LOOOL")
              ->addItem("BALLS")
              ->addItem("SHIT")
              ->addItem("SDFS")
    )
    ;



    // $m = Menu::dropdown()
//     ->addItem("Polaris")
//     ->addItem("Pollux")
//     ->addItem("Andromeda")
//     ->addItem(Menu::subMenu("Sol")
//               ->addItem("Mercury")
//               ->addItem("Venus")
//     )
//     ->addItem("Anger")
//     ->addItem("Sadness")
//     ->addItem(Menu::subMenu("Books")
//               ->addItem("Lord of the Rings")
//               ->addItem(Menu::subMenu("Sci-Fi"))
//     )
//     ;


echo $m->saveHTML();
