<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Document;

interface MenuInterface
{
    public function __construct(Document $doc);
    public function addItem($thing);
    public function saveHTML();
}
