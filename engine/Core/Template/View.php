<?php
namespace Engine\Core\Template;

use Engine\Core\Template\Theme;
use Engine\Core\Config\Config;
use Engine\DI\DI;
use Engine\Helper\Common;
use Engine\Helper\Cookie;

class View extends Theme
{

    /**
    * @var object Engine\Core\Template\Theme
    */
    
    private $db;
    private $di;
    private $functions;
    public $request;

    public function __construct(DI $di)
    {
        $this->themeDir = $this->getThemeName();
        $this->db       = $di->get('db');
        $this->request  = $di->get('request');
    }
    
    public function render($template)
    {
        $templatePath = $this->getTemplatePath($template, ENV);
        
        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
            sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }
        
        ob_start();
        ob_implicit_flush(0);
        
        try {
            require_once $this->functionRequire(ENV);
            require_once $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }
    
    /**
    * Undocumented function
    *
    * @param string $template
    * @param string $env
    * @return string
    */
    
    private function functionRequire($env)
    {
        if ($env === 'Cms') {
            return ROOT_DIR . '/content/themes/' . $this->themeDir . '/functions.php';
        }
        else {
            return ROOT_DIR . '/View/functions.php';
        }
    }
    
    private function getTemplatePath($template, $env)
    {
        
        if ($env === 'Cms') {
            
            return ROOT_DIR . '/content/themes/' . $this->themeDir . '/' . $template . '.php';
        }
        
        return ROOT_DIR . '/View/' . $template . '.php';
        
    }
    
    private function getThemeName()
    {
        
        $theme = Config::file('main');
        
        if (!isset($theme['theme'])) {
            
            return 'default';
        }
        return $theme['theme'];
    }
}