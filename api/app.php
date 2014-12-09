<?php

class App {

  private $entries;
  private $response;

  public function __construct($response) {
    $this->response = $response;
    if ($this->isJSON($this->response)) {
      $this->entries = json_decode($this->response, true);
    }
  }
  
  public function getEntries() {
    return $this->entries;
  }
  
  private function isJSON($val) {
    json_decode($val);
    return (json_last_error() == JSON_ERROR_NONE);
  }

}

?>