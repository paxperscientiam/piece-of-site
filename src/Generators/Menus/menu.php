<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

// Foundation menus
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Simple;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Drilldown;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Accordion;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Responsive;

class Menu
{

    protected static $dom;
    protected static $container;
    protected static $subMenu;
    protected static $classes = [];
    protected static $subMenuClasses = [];
    protected static $menuData = [];
    protected static $domList = [];
    //
    private static $frag;
    //
    private $menuSelection;
    private $menuType = [
        "simple" => "simple",
        "dropdown" => "dropdown",
        "drilldown" => "drilldown",
        "accordion" => "accordion-menu",
        "topbar" => "top-bar"
    ];
    // private $menuData = [
    //     "dropdown" => "data-dropdown-menu",
    //     "drilldown" => "data-drilldown",
    //     "accordion" => "data-accordion-menu"
    // ];

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
    }

    public static function basic(): Base
    {
        self::build();
        return new Base();
    }

    public static function simple(): Simple
    {
        self::build();
        return new Simple();
    }

    public static function dropDown(): DropDown
    {
        self::build();
        return new DropDown();
    }

    public static function drillDown(): DrillDown
    {
        self::build();
        return new DrillDown();
    }

    public static function accordion(): AccordionMenu
    {
        self::build();
        return new AccordionMenu();
    }

    public static function subMenu(string $heading = ""): SubMenu
    {
        return new SubMenu($heading);
    }

    public static function responsive(string $heading = ""): Responsive
    {
        self::build();
        return new Responsive($heading);
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
}
