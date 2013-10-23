<?php
class NewsController extends AppController {
  public $helpers = array("Html", "Form");

  public function index() {
    $this->set("news", $this->News->find("all", array(
      "conditions" => array("News.published" => "1"),
      "order" => array("News.created" => "DESC")
    )));
    $this->set("description", "DARKNEuSS.de ist wieder da! Erfahrt alles Aktuelle rund um unsere Dreifaltigkeitsbegriffe 'Metal', 'Gothic' und 'Neuss'.");
    $this->set("ogp", array(
      "title" => "News - DARKNEuSS.de",
      "type" => "website",
      "url" => "/news"
    ));
  }

  public function view($url_id = null) {
    $url_id = $this->request->params["url_id"];
  
    if (!$url_id) {
      throw new NotFoundException(__("Invalid news"));
    }
    
    $news = $this->News->findByUrlId($url_id);
    if (!$news) {
      throw new NotFoundException(__("News not found"));
    }
    
    // update the 'visited' counter by using the model's save method
    $this->News->save(
      array("id" => $news["News"]["id"], "modified" => false, "visited" => $news["News"]["visited"] + 1),
      true,  // validate
      array("visited")
    );
    
    $this->set("entry", $news);
    $this->set("title_for_layout", $news["News"]["title"]);
    $this->set("description", $news["News"]["description"]);
    $this->set("ogp", array(
      "title" => $news["News"]["title"],
      "type" => "article",
      "url" => "/news/" . $news["News"]["url_id"],
    ));
  }
  
  public function year($year = null) {
    $year = $this->request->params["year"];
  
    $this->set("title_for_layout", "News aus dem Jahr " . $year);
  
    if (!$year) {
      throw new NotFoundException(__("Ungültige Jahreszahl"));
    }
    
    // http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
    $news = $this->News->find("all", array(
      "conditions" => array("YEAR(News.created)" => $year),
      "order" => array("News.created" => "DESC")
    ));    
    if (!$news) {
      throw new NotFoundException(__("Aus diesem Jahr existieren keine News"));
    }
    $this->set("news", $news);
  }

  
  
  /* deprecated methods */
  public function deprc_view($id = null) {
    if (!$id) {
      throw new NotFoundException(__("Invalid news"));
    }

    $news = $this->News->findById($id);
    if (!$news) {
      throw new NotFoundException(__("News not found"));
    }
    $this->set("news", $news);
  }
}
