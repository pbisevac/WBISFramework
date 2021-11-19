<?php
namespace app\core;

class Router
{
    public Request $request;
    public array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false)
        {
            $this->request->redirect("notFound"); exit;
        }

        if (is_string($callback))
        {
            $this->view($callback, "main"); exit;
        }

        if (is_array($callback))
        {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }

    public function renderPartialView($view)
    {
        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }

    public function renderPartialViewWithParams($view, $params)
    {
        if ($params !==null)
        {
            foreach ($params as $key => $value)
            {
                $$key = $value;
            }
        }

        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }

    public function renderLayout($layout)
    {
        ob_start();
        include_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function view($partialView, $layout)
    {
        $layoutViewContent = $this->renderLayout($layout);
        $partialViewContent = $this->renderPartialView($partialView);

        $view = str_replace("{{ renderBody }}", $partialViewContent, $layoutViewContent);

        echo $view;
    }

    public function viewWithParams($partialView, $layout, $params)
    {
        $layoutViewContent = $this->renderLayout($layout);
        $partialViewContent = $this->renderPartialViewWithParams($partialView, $params);

        $view = str_replace("{{ renderBody }}", $partialViewContent, $layoutViewContent);

        echo $view;
    }
}