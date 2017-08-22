<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $header;

    public function __construct(string $header = null)
    {
        self::$subMenu = self::$dom->createElement("ul");
        $this->header = $header;
    }

    public function anchorThis($item)
    {
        $anchorLink = self::$dom->createElement("a");
        $anchorLink->setAttribute("href", "#");
        if (!is_null($this->header)) {
            $anchorLink->textContent = $this->header;
            $item->appendChild($anchorLink);
        }
        $this->setClasses(self::$subMenu, self::$subMenuClasses);
        $item->appendChild(self::$subMenu);
    }
}
