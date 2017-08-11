<?PHP

require_once "../vendor/autoload.php";

use Ramoose\PieceOfSite\Generators\Menu;

$menu = new Menu("simple");
//
$menu->setLinks([
    "home" => [
        "NY" => "#",
        "VT" => "#"
    ],
    "dino" => "/ca",
    "logos" => "/ld",
    "countries" => [
        "America" => [
            "NY" => "#",
            "ND" => [
                "city1" => "#",
                "city2" => "#"
            ]
        ]
    ]
]);
echo $menu->getHTML();
?>
