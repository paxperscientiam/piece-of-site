<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

interface MenuInterface
{
    function addItem($item);
    function saveHTML();
}
