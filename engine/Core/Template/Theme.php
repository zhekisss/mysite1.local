<?php
namespace Engine\Core\Template;

use Engine\Core\Config\Config;


class Theme
{
    
    const RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s'
    ];
    
    /**
    * @var string
    */
    public $url = '';
    
    /**
    * @var array
    */
    protected $data = [];
    
    protected $themeDir;
    
    /**
    * @param string $name
    * @return void
    */
    public function header($name = null)
    {
        
        
        $name = (string)$name;
        $file = 'header';
        
        if ($name) {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    /**
    *
    *
    * @param string $name
    * @return executes method loadTemplateFile($file)
    */
    public function footer($name = null)
    {
        
        
        $name = (string)$name;
        $file = 'footer';
        
        if ($name) {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    public function sidebar($name = null)
    {
        
        
        $name = (string)$name;
        $file = 'sidebar';
        
        if ($name) {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    /**
    * Undocumented function
    *
    * @param string $name
    * @param array $data
    * @return void
    */
    public function block($name = '', $data = [])
    {
        
        
        $name = (string)$name;
        
        if ($name) {
            $this->loadTemplateFile($name, $data);
        }
    }
    
    
    /**
    * Undocumented function
    *
    * @param string $fileName
    * @param array $data
    * @return void
    */
    private function loadTemplateFile($fileName, $data = [])
    {
        
        if (ENV === 'Admin') {
            $file = ROOT_DIR . '/View/' . $fileName . '.php';
        }
        else {
            $file = ROOT_DIR . '/content/themes/' . $this->themeDir . '/' . $fileName . '.php';
        }
        
        if (is_file($file)) {
            extract($data);
            require_once $file;
        }
        else {
            throw new \Exception(sprintf('View file %s does not exist!', $file));
        }
    }
    
    public function getData()
    {
        
        return $this->data;
    }
    
    public function setData($name, $data)
    {
        $this->{$name} = $data;
    }
}