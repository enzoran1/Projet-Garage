<?php

abstract class AbstractController
{
    protected abstract function index();
    
    /**
     * renderView : permet d'instancier et d'afficher une vue
     *
     * @param  mixed $viewFileName
     * @return void
     */
    protected function renderView(string $viewFileName, array $data = [])
    {
        $vue = new View($viewFileName);
        return $vue->render($data);
    }
}