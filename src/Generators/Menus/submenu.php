<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $item;
    private $header;

    public function __construct(string $header = null)
    {
        self::$subMenu = self::$dom->createElement("ul");
        $this->header = $header;
    }

    public function addItem($text)
    {
        $this->item = self::$dom->createElement("li");
        $this->item->textContent = $text;
        self::$subMenu->appendChild($this->item);
        //
        return $this;
    }

    private function setSubMenuClasses()
    {
        if (!empty(self::$subMenuClasses)) {
            $classes = implode(" ", self::$subMenuClasses);
            self::$subMenu->setAttribute("class", $classes);
        }
    }

    public function anchorThis($item)
    {
        if (!is_null($this->header)) {
            $item->textContent = $this->header;
        }
        $this->setSubMenuClasses();
        $item->appendChild(self::$subMenu);
    }
}
