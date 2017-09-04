<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class Menu
{
    public static $container;
    public static $dom;

    public function __construct()
    {
        self::$container = new \League\Container\Container;
        // autowiring
        self::$container->delegate(
            new \League\Container\ReflectionContainer
        );

        self::$dom = new Document;
    }

    public static function __callStatic($name, $arguments)
    {
        $thisClass = get_called_class();
        $msg = "Uknown static method: $thisClass::$name( ) ";
        $menuClass = "Ramoose\PieceOfSite\Generators\Menus\Foundation\\$name";

        try {
            if (class_exists($menuClass)) {
                if (strcasecmp($name, "submenu") !== 0) {
                    new Menu();
                    self::$container->add('Document', self::$dom);
                    self::$container->add('Menu', $menuClass);
                }
                if (strcasecmp($name, "submenu") === 0) {
                    self::$container->add('Menu', $menuClass)
                        ->withArgument("Document")
                        ->withArgument(new \League\Container\Argument\RawArgument($arguments[0]));
                    return self::$container->get('Menu');
                }


                //
                self::$container->add('Base', 'Ramoose\PieceOfSite\Generators\Menus\Base')
                    ->withArgument('Document')
                    ->withArgument('Menu')
                    ;

                return self::$container->get('Base');
            }
            throw new \Exception($msg);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
