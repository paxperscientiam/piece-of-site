<?PHP
namespace App\Moose\SRF;

class CopyRight
{
    public function __construct()
    {
    }

    public function set($entity, $startYear)
    {
        $thisYear = (int)date('Y');

        $result = "&copy; "
            .$entity
            ." "
            .$startYear
            .(($startYear != $thisYear) ? '-' . $thisYear : '')
            ;
        return $result;
    }
}
