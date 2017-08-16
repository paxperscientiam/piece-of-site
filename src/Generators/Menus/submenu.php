<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;


class SubMenu extends Base
{
    private $item;
    private $subMenu;
    private $header;

    public function __construct(string $header = null)
    {
        $this->subMenu = self::$dom->createElement("ul");
        $this->header = $header;
    }

    public function addItem($text)
    {
        $this->item = self::$dom->createElement("li");
        $this->item->textContent = $text;
        $this->subMenu->appendChild($this->item);
        //
        return $this;
    }


    public function anchorThis($item)
    {
        if (!is_null($this->header)) {
            $item->textContent = $this->header;
        }
        $this->setClasses();
        $item->appendChild($this->subMenu);
    }
}
