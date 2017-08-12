<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;


class SubMenu extends Menu
{
    private $item;
    private $list = [];

    private $subMenu;

    private $header;

    public function __construct($header)
    {
        $this->subMenu = self::$dom->createElement("ul");
        $this->header = $header;
    }

    public function addItem($thing)
    {

        $this->item = self::$dom->createElement("li");


        $this->subMenu->appendChild($this->item);
        // $this->list[] = $this->item;
        if (is_string($thing)) {
            $this->item->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }

        return $this;
    }

    private function setClasses()
    {
        $classes = implode(" ", self::$subMenuClasses);
        $this->subMenu->setAttribute("class", $classes);
    }

    public function anchorThis($item)
    {
        $this->setClasses();
        $item->textContent = $this->header;
        $item->appendChild($this->subMenu);
    }
}
