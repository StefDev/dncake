<?php
class ImagesController extends AppController {

  public function recent_flyer() {
    $flyer = $this->Image->find("first", array(
      "conditions" => array("Image.cat" => "flyer"),
      "order" => array("Image.timestamp" => "DESC")
    ));
    
    if ($this->request->is("requested")) {
      return $flyer;
    } else {
      $this->set("flyer", $flyer);
    }
  }

}
