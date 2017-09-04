<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;
use Ramoose\PieceOfSite\Generators\Menus\Submenu;

class Base extends Menu
{
    // autowiring
    public $menu;
    public $doc;
    public $lii;
    public $laa;
    public $ull;
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
        //
        d("new",self::$dom->saveHTML());
        die();
        self::$container->add("state", $this);
    }

    public function addItem($thing, string $blob = "#")
    {
        d("static",self::$dom->saveHTML());

        $this->ull = $this->doc->createElement("ul");
        //
        $this->lii = $this->doc->createElement("li");
        $this->laa = $this->doc->createElement("a");
        //
        $this->doc->appendChild($this->laa, $this->lii);
        $this->doc->appendChild($this->lii, $this->ele);

        if (is_string($thing)) {
            $this->laa->textContent = $thing;
        }

        if ($thing instanceof Submenu && !is_null($thing->header)) {
            $this->laa->textContent = $thing->header;

            $this->doc->setClasses($this->menu->classes, $this->ele);
            $this->doc->appendChild($this->ull, $this->lii);
        }
        $this->doc->setLink($blob, $this->laa);
        $this->doc->setClasses($this->menu->classes, $this->laa);

        d($this->doc->saveHTML());
        //
        self::$container->add("state", $this);
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
