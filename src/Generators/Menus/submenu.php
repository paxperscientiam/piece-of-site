<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    protected $subDoc;
    protected $header;

    public function __construct(Document $subDoc, string $header = null)
    {
        $this->header = $header;
        $this->subDoc = $subDoc;




        d($this->subDoc->saveHTML());
    }
}
