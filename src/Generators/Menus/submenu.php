<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $item;
    private $link;
    private $header;

    public function __construct(string $header = null)
    {
        self::$subMenu = self::$dom->createElement("ul");

        $this->header = $header;
    }

    public function addItem($text, string $href = "#")
    {
        $this->item = self::$dom->createElement("li");
        $this->link = self::$dom->createElement("a");

        $this->link->textContent = $text;

        $this->link->setAttribute("href", $href);
        $this->item->appendChild($this->link);

        //$this->item->textContent = $text;
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
        $anchorLink = self::$dom->createElement("a");
        $anchorLink->setAttribute("href", "#");
        if (!is_null($this->header)) {
            $anchorLink->textContent = $this->header;
            $item->appendChild($anchorLink);
        }
        $this->setSubMenuClasses();
        $item->appendChild(self::$subMenu);
    }
}
