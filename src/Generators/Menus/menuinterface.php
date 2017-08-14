<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

interface MenuInterface
{
    public function addItem($thing);
    public function appendSubMenu();
}
