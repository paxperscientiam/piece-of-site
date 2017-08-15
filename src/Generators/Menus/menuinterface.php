<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

interface MenuInterface
{
    public function addItem($item);
    public function saveHTML();
}
