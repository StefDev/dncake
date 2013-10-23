<?php

class NavigationHelper extends AppHelper {
  //http://advitum.de/2013/05/cakephp-tutorial-views-layouts-und-helpers
  
  /* Properties */
  public $name = "Navigation";
  
  public $helpers = array("Html");
  
  private $navItems = array(
    array(
      "title" => "News",
      "url" => array("controller" => "news", "action" => "index"),
      "external" => false
    ),
    array(
      "title" => "Kalender",
      "url"   => array("controller" => "events", "action" => "index"),
      "external" => false
    ),    
    array(
      "title" => "Platten",
      "url"   => array("controller" => "records", "action" => "index"),
      "external" => false
    ),
    array(
      "title" => "Bands",
      "url"   => array("controller" => "bands", "action" => "index"),
      "external" => false
    ),
    array(
      "title" => "Locations",
      "url" => array("controller" => "locations", "action" => "index"),
      "external" => false
    )
  );
  
  /* Methods */
  public function main() {
    return sprintf("<nav><ul>%s</ul></nav>", $this->nav($this->navItems));
  }
  
  private function nav($items) {
    $content = "";
    
    foreach ($items as $item) {
      $class = array();
      
      if ($this->isActive($item)) {
        $class[] = "active";
        $class[] = "text-shadow";
      }
      
      $url = $this->getUrl($item);
      
      if ($item["external"]) {
        $itemLink = $this->Html->link($item["title"], $url, array("escape" => false, "class" => implode(" ", $class), "target" => "_blank"));
      } else {
        $itemLink = $this->Html->link($item["title"], $url, array("escape" => false, "class" => implode(" ", $class)));
      }
      
      $content .= sprintf("<li>%s</li>", $itemLink);
    }
    
    return $content;
  }
  
  private function getUrl($item) {
    $url = false;
    if (isset($item["url"])) {
      $url = $item["url"];
    }
    return $url;
  }
  
  private function isActive($item) {
    $url = $this->Html->url($this->getUrl($item));
    
    if ($this->here == $url ||
       ($url != "/" && strlen($this->here) > strlen($url) && substr($this->here, 0, strlen($url)) == $url)) {
           $active = true;
       } else {
           $active = false;
       }
       
     return $active;
  }  
}