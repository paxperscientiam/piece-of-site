<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class Simple extends Menu
{
    private $item;
    private $subMenu;

    public function __construct()
    {
    }

    public function addItem(string $text, SubMenu $thing = null)
    {
        $this->item = self::$dom->createElement("li");
        $this->item->textContent = $text;
        self::$container->appendChild($this->item);
        //
        if ($thing !== null) {

        }

        return $this;
    }

    public function addSubMenu(SubMenu $subParent)
    {
        // d($subParent);die();
        $this->subMenu = self::$dom->createElement("ul");
        $this->subMenu->textContent = "submenu";

        $this->item->appendChild($this->subMenu);

        //        $this->subMenu->appendChild($subParent);
        //
        return $this;
    }

    public function saveHTML()
    {
        return self::$dom->saveHTML();
    }
}
