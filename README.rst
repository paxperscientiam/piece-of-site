Create menus with PHP!

.. code-block:: PHP
                   
   $menu = Menu::simple()
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
 

    

Disclaimer: Use are your own peril!
