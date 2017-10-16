<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

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
