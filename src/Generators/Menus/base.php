<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;
use Ramoose\PieceOfSite\Generators\Menus\Submenu;

class Base
{
    // protected $dom;
    // protected $frag;
    // protected $subMenu;
    // //
    // protected $menu;
    // protected $classes = [];
    // protected $subMenuClasses = [];
    // //
    // protected $menuData = [];
    // protected $subMenuData = [];
    // protected $domList = [];
    // //
    // public $objMenu;

    // autowiring
    public $menu;
    public $doc;
    //
    //
    public function __construct(Document $doc, $objMenu)
    {
        $this->doc = $doc;
        $this->menu = $objMenu;
        //
        $this->ele = $this->doc->createChunk("ul");
        //
        if (isset($this->menu->classes)) {
            $this->doc->setClasses($this->menu->classes, $this->ele);
        }
        if (isset($this->menu->menuData)) {
            $this->doc->setData($this->menu->menuData, $this->ele);
        }
    }

    public function addItem($thing)
    {
        $lii = $this->doc->createElement("li");
        $laa = $this->doc->createElement("a");
        //        d(get_called_class());
        //
        $this->doc->appendChild($laa, $lii);

        if (is_object($thing) && $thing->menu instanceof Submenu) {
            $node = $this->doc->importNode($thing->doc->frag);
            $this->doc->appendChild($node, $lii);
            //
            if (!is_null($thing->menu->header)) {
                $laa->textContent = $thing->menu->header;
            }
        }
        if (is_string($thing)) {
            $laa->textContent = $thing;
        }

        return $this;
    }

    public function saveHTML()
    {
        return $this->doc->saveHTML();
    }

    // public function __construct()
    // {
    //     die("no");
    //     $this->objMenu = $objMenu;
    //     //
    //     $this->dom = new \DOMDocument();
    //     $this->dom->encoding = 'UTF-8';
    //     $this->dom->formatOutput = true;
    //     $this->dom->normalizeDocument();
    //     //
    //     $this->frag = $this->dom->createDocumentFragment();
    //     $this->menu = $this->dom->createElement("ul");
    //     //
    //     $this->frag->appendChild($this->menu);
    //     $this->dom->appendChild($this->frag);
    // }
    // /**
    //  * @param string|SubMenu, string
    //  */
    // public function addItem($thing, string $href = "#")
    // {
    //     $link = $this->dom->createElement("a");
    //     $link->setAttribute("href", $href);
    //     //
    //     $item = $this->dom->createElement("li");
    //     //
    //     $item->appendChild($link);
    //     //
    //     if ($thing instanceof SubMenu) {
    //         $this->hoistSubMenu($thing, $link, $item);
    //         return $this;
    //     }
    //     if (is_string($thing)) {
    //         $link->textContent = $thing;
    //     }
    //     $this->domList[] = $item;
    //     //
    //     return $this;
    // }

    // protected function hoistSubMenu($thing, $link, $item)
    // {

    //     //        $reflect = new \ReflectionClass(get_called_class());
    //     //
    //     if (!is_null($this->objMenu)) {
    //         $this->setClasses($thing->subContainer, $this->objMenu->subMenuClasses);
    //         $node = $this->importNode($thing->subContainer);
    //         $link->textContent = $thing->header;

    //         // this is only for dropdown
    //         //$item->setAttribute("class", "is-dropdown-submenu-parent");
    //         $item->appendChild($node);
    //         $this->domList[] = $item;
    //     }
    //     //
    //     return $this;
    // }

    // protected function setClasses(\DOMElement $obj, array $classes)
    // {
    //     if (!empty($classes)) {
    //         $classes = implode(" ", $classes);
    //         $obj->setAttribute("class", $classes);
    //     }
    //     return $this;
    // }

    // protected function setData(\DOMElement $obj, array $data)
    // {
    //     if (!empty($data)) {
    //         $data = implode(" ", $data);
    //         $obj->appendChild($this->dom->createAttribute($data));
    //     }
    // }

    // private function importNode($subItem)
    // {
    //     return $this->doc->importNode($subItem, true);
    // }

    // private function assemble()
    // {
    //     foreach ($this->domList as $item) {
    //         $this->menu->appendChild($item);
    //     }
    // }

    // public function saveHTML()
    // {
    //     $this->classes[] = "menu";
    //     $this->setClasses($this->menu, $this->objMenu->classes);
    //     $this->setData($this->menu, $this->objMenu->menuData);
    //     $this->assemble();
    //     //
    //     return $this->dom->saveHTML();
    // }
}
