<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Menu\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class SubMenu
{
    public $header;

    public function __construct($dom, string $header = null)
    {
        $this->subUll = $dom->createElement("ul");
        $this->header = $header;
        $this->dom = $dom;
    }

    public function addItem($thing)
    {
        $item = $this->dom->createElement("li");
        $item->textContent = $thing;

        $this->subUll->appendChild($item);

        return $this;
    }
}
