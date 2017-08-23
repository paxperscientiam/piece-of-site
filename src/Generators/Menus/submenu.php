<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $anchorLink;

    public function __construct(string $header = null)
    {
        self::$subMenu = self::$dom->createElement("ul");
        if (!is_null($header)) {
            $this->anchorLink = self::$dom->createElement("a");
            $this->anchorLink->textContent = $header;
        }
    }

    public function addItem($thing, string $href = "#")
    {
        $item = self::$dom->createElement("li");
        $link = self::$dom->createElement("a");
        //
        $link->setAttribute("href", $href);

        if (is_string($thing)) {
            $link->textContent = $thing;
        }

        $item->appendChild($link);


        self::$subMenu->appendChild($item);

        return $this;
    }

    public function anchorThis($item)
    {

        $item->appendChild($this->anchorLink);
        //
        $this->setClasses(self::$subMenu, self::$subMenuClasses);
        $item->appendChild(self::$subMenu);
    }
}
