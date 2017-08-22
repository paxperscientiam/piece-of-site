<?PHP
require_once "vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8"/>

    <link rel="stylesheet" href="vendor/zurb/foundation/dist/css/foundation.min.css" />
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <title>Document</title>
    </head>
    <body>
    <?PHP
    require_once "content.php";

    ?>
    <script src="vendor/zurb/foundation/dist/js/foundation.min.js"></script>
    <script>
    $(document).foundation();
</script>
 </body>
</html>
