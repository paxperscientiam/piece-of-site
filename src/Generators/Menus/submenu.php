<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Document;


class SubMenu extends Base
{
    protected $header;
    public $doc;
    public $frag;
    public $subMenu;

    public function __construct(Document $doc, string $header = null)
    {
        $this->doc = $doc;
        $this->header = $header;
        $this->frag = $this->doc->frag;

        $this->subMenu = $this->doc->createChunk("ul");
    }
}
