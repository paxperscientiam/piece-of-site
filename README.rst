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




Disclaimer: This library is currently in development phase; there have been no releases as of yet. Use are your own peril!
