<?php

require_once "./api/app.php";
require_once "./src/Mustache/Autoloader.php";
Mustache_Autoloader::register();

class Template extends Mustache_Engine {
  
  public static $SITE_TITLE = "Salzburg AG";
  
  private $entries;
  private $template;
  private $defines;
  
  public function __construct($entries) {
    $this->constructor("main", $entries);
  }
    
  public function constructor($template, $entries) {
    $this->defines = array(
      'cache' => dirname('./views/tmp/cache/mustache'),
      'loader' => new Mustache_Loader_FilesystemLoader('./views'),
      'partials_loader' => new Mustache_Loader_FilesystemLoader('./views/partials'),
      'escape' => function($value) {
          return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
      },
      'charset' => 'UTF-8',
      'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
      'strict_callables' => true,
    );
    parent::__construct($this->defines);
    $this->template = parent::loadTemplate($template);
    $this->entries = $entries;
  }
    
  public function render() {
    $values = array("title" => Template::$SITE_TITLE, "entries" => $this->entries);
    return $this->template->render($values);
  }
}

?>