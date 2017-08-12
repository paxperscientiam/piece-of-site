<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Simple;
use Ramoose\PieceOfSite\Generators\Menus\SubMenu;

/**
 * @SuppressWarnings(PHPMD.ElseExpression)
 */
class Menu
{
    protected static $dom;
    protected static $lulz = 66;
    private static $frag;
    protected static $container;
    private $item;
    private $node;
    private $anchor;
    //
    private $menuSelection;
    private $menuType = [
        "simple" => "simple",
        "dropdown" => "dropdown",
        "drilldown" => "drilldown",
        "accordion" => "accordion-menu",
        "topbar" => "top-bar"
    ];
    private $menuData = [
        "dropdown" => "data-dropdown-menu",
        "drilldown" => "data-drilldown",
        "accordion" => "data-accordion-menu"
    ];
    private $classes = [];
    private $nestedOrientation;


    public function __construct()
    {

    }

    protected static function build()
    {
        self::$dom = new \DOMDocument();
        self::$dom->encoding = 'UTF-8';
        self::$dom = new \DOMDocument();
        self::$dom->encoding = 'UTF-8';
        self::$dom->formatOutput = true;
        self::$dom->normalizeDocument();
        // //
        self::$frag = self::$dom->createDocumentFragment();
        self::$container = self::$dom->createElement("ul");
        // //
        self::$frag->appendChild(self::$container);
        self::$dom->appendChild(self::$frag);
        // //
        // $this->lii = $this->dom->createElement("li");
        // $this->anchor = $this->dom->createElement("a");
        // //
        // $this->classes[] = "menu";
    }

    public static function simple(): Simple
    {
        self::build();
        //
        return new Simple();
    }

    public static function dropDown(): DropDown
    {
        return new DropDown();
    }

    public static function drillDown(): DrillDown
    {
        return new DrillDown();
    }

    public static function accordion(): AccordionMenu
    {
        return new AccordionMenu();
    }

    public static function subMenu(string $heading = ""): SubMenu
    {
        return new SubMenu($heading);
    }


    // public function __construct(string $type = null)
    // {
    //     $this->menuSelection = $type;
    //     try {
    //         if ($type !== null) {
    //             if (!array_key_exists($type, $this->menuType)) {
    //                 throw new \Exception("Supported menu types: ".implode(", ", array_keys($this->menuType)));
    //             }
    //             $this->classes[] = $this->menuType[$type];
    //         }
    //     } catch (\Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     //
    //     $this->dom = new \DOMDocument();
    //     $this->dom->encoding = 'UTF-8';
    //     $this->dom->formatOutput = true;
    //     $this->dom->normalizeDocument();
    //     //
    //     $this->frag = $this->dom->createDocumentFragment();
    //     $this->container = $this->dom->createElement("ul");
    //     //
    //     $this->frag->appendChild($this->container);
    //     $this->dom->appendChild($this->frag);
    //     //
    //     $this->lii = $this->dom->createElement("li");
    //     $this->anchor = $this->dom->createElement("a");
    //     //
    //     $this->classes[] = "menu";
    // }

    // public static function simple()
    // {
    //     return new Simple();
    // }


    // public function align(string $alignment)
    // {
    //     try {
    //         switch ($alignment) {
    //             case "right":
    //                 $this->classes[] = "align-right";
    //                 break;
    //             case "center":
    //                 $this->classes[] = "align-center";
    //                 break;
    //             case "expanded":
    //                 $this->classes[] = "expanded";
    //                 break;
    //             case "left":
    //                 // 'left' is the default alignment
    //                 break;
    //             default:
    //                 throw new \Exception("Menu alignment '$alignment' unknown.");
    //         }
    //     } catch (\Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     return $this;
    // }

    // public function orient(string $orientation, $nestedOrientation = "horizontal")
    // {
    //     try {
    //         if (!in_array($nestedOrientation, ["vertical", "horizontal"])) {
    //             throw new \Exception("Allowed orientation for sub-menus: vertical, horizontal.");
    //         }
    //         $this->nestedOrientation = $nestedOrientation;
    //     } catch (\Exception $e) {
    //         echo $e->getMessage();
    //     }

    //     try {
    //         switch ($orientation) {
    //             case "v":
    //             case "vertical":
    //                 $this->classes[] = "vertical";
    //                 break;
    //             case "h":
    //             case "horizontal":
    //                 // do nothing cause this is default
    //                 break;
    //             default:
    //                 throw new \Exception("Menu orientation '$orientation' unknown.");
    //         }
    //     } catch (\Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     return $this;
    // }

    // public function addItem(string $text, string $href = "#")
    // {

    //     $this->item = $this->dom->createElement("li");
    //     $this->item->textContent = $text;
    //     $this->item->setAttribute("href", $href);
    //     //
    //     $this->container->appendChild($this->item);

    //     return $this;
    // }

    // public function addNode(string $text)
    // {
    //    $this->node = $this->dom->createElement("ul");
    //    $this->node->textContent = $text;
    //    $this->item->appendChild($this->node);

    //    return $this;
    // }


    // public function setLinks(array $links)
    // {

    //     $rai = new \RecursiveArrayIterator($links);
    //     $rii = new \RecursiveIteratorIterator($rai, \RecursiveIteratorIterator::SELF_FIRST);
    //     //
    //     $rii->next();
    //     //
    //     $arrDOM = [];

    //     while ($rii->valid()) {
    //         // $element = $this->dom->createElement("li");
    //         // $arrDOM[] = $element;

    //         //////
    //         $rii->next();
    //     }
    //     return $this;
    // }
    // ////d($this->container->parentNode->parentNode->parentNode);


    // public function addDataAttribute(string $dataAttribute)
    // {
    //     $this->container->appendChild($this->dom->createAttribute($dataAttribute));
    // }

    // private function setClasses()
    // {
    //     $classes = implode(" ", $this->classes);
    //     //
    //     $this->container->setAttribute("class", $classes);
    //     //
    //     if (array_key_exists($this->menuSelection, $this->menuData)) {
    //         $this->container->appendChild($this->dom->createAttribute($this->menuData[$this->menuSelection]));
    //     }
    // }
    // private function assemble()
    // {
    //     //
    // }
    public function saveHTML()
    {

        $this->setClasses();
        $this->assemble();
        //
        return $this->dom->saveHTML();
    }
}
