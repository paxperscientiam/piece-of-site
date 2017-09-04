<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class SubMenu extends Menu
{
    public $header;

    public function __construct(string $header = null)
    {
        $this->header = $header;


        // $this->dom = self::$container->get("state")->doc;
        // $this->root = $this->dom->createElement("ul");
        // $this->lii = self::$container->get("state")->lii;


    }

    public function addItem($bbb)
    {
        // $uu = $this->dom->createElement("div");
        // $this->lii->appendChild($uu);

        return $this;
    }
}
