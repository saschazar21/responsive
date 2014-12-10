<?php

require_once "./api/app.php";
require_once "./src/Mustache/Autoloader.php";
Mustache_Autoloader::register();

class RegisterGlobals {
  
  private $title;
  private $curryear;
  private $siteowner;
  private $footerlinks;
  
  public function __construct() {
    $this->constructor("Salzburg", "2014", "Salzburg AG für Energie, Verkehr und Telekommunikation", array(
      array("name" => "AGB", "link" => "agb"),
      array("name" => "Datenschutz und Impressum", "link" => "impressum"),
      array("name" => "Kontakt", "link" => "kontakt")
    ));
  }
  
  public function constructor($title, $curryear, $siteowner, $footerlinks) {
    $this->title = $title;
    $this->curryear = $curryear;
    $this->siteowner = $siteowner;
    $this->footerlinks = $footerlinks;
  }
  
  public function getTitle() {
    return $this->title;
  }
  
  public function getCurrYear() {
    return $this->curryear;
  }
  
  public function getSiteOwner() {
    return $this->siteowner;
  }
  
  public function getFooterLinks() {
    return $this->footerlinks;
  }
}

class Template extends Mustache_Engine {
  
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
    $globals = new RegisterGlobals();
    $values = array("title" => $globals->getTitle(), "curryear" => $globals->getCurrYear(), "siteowner" => $globals->getSiteOwner(), "footer-links" => $globals->getFooterLinks(), "entries" => $this->entries);
    return $this->template->render($values);
  }
}

?>