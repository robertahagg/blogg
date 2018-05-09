<?php
namespace Blog\Controllers;

use Blog\Core\Request;

abstract class AbstractController
{
    protected $request;
    protected $view;
    protected $customerId;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setCustomerId(int $customerId)
    {
        $this->customerId = $customerId;
    }

    protected function render(string $view, array $params) : string
    {
        extract($params);

        ob_start();
        include_once('templates/header.php');
            include $view;
        include_once('templates/footer.php');
        $renderedView = ob_get_clean();

        return $renderedView;
    }

    function redirect($url)
    {
        ob_start();
        header('Location: ' . $url);
        ob_end_flush();
        die();
    }
}
