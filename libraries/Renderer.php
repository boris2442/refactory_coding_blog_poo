<?php
namespace Libraries;
class Renderer
{
   public static function render(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        require_once "layouts/" . $path . "_html.php";
        $pageContent = ob_get_clean();
        require_once 'layouts/layout_html.php';
    }
}
