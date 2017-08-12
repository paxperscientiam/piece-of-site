<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Submenu;


class Simple extends Menu
{
    private $item;
    private $list = [];
    private $subMenu;


    /**
     * @param string|SubMenu
     */
    public function addItem($thing)
    {
        $this->item = self::$dom->createElement("li");
        if (is_string($thing)) {

            $this->item->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }

        $this->list[] = $this->item;
        return $this;
    }

    private function assemble()
    {
        foreach ($this->list as $item) {
            self::$container->appendChild($item);
        }
    }

    public function saveHTML()
    {
        $this->assemble();
        return self::$dom->saveHTML();
    }
}
