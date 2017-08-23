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

    public function anchorThis($item)
    {

        $item->appendChild($this->anchorLink);
        //
        $this->setClasses(self::$subMenu, self::$subMenuClasses);
        $item->appendChild(self::$subMenu);
    }
}
