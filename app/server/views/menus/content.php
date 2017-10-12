<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$drilldown = Menu::drilldown()
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

echo $drilldown->saveHTML();


$dropdown = Menu::dropdown()
          ->addItem("music")
          ->addItem(Menu::subMenu("Tools")
                    ->addItem("hammer")
                    ->addItem("drill"))
          ->addItem("tea")
          ;

echo $dropdown->saveHTML();


$accordion = Menu::accordion()
           ->addItem("video games")
           ->addItem("movies")
           ->addItem("politics")
           ;

echo $accordion->saveHTML();