<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class SubMenu
{
    public $header;
    public $root;

    public static $container;

    public function __construct($container, string $header = null)
    {
        self::$container = $container;

        $this->header = $header;
        $this->root = self::$container->get("state")->ull;
    }

    public function addItem($thing)
    {
        self::$container->get("state")->addItem($thing);
        return $this;
    }
}
