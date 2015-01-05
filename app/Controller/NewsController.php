<?php
class NewsController extends AppController {
  public $helpers = array("Html", "Form");
  public $components = array("Cookie");
  
  public function index() {
    // Cookie handling
    if (isset($this->request->query["netzwerke"]) && preg_match("/^[0-1]{1}$/", $this->request->query["netzwerke"])) {
      $this->Cookie->write("nw", $this->request->query["netzwerke"]);
    }
    $this->set("networks", array(
      "activated" => $this->Cookie->read("nw") || 0,
      "status" => array("de", null)
    ));
    $this->set("news", $this->News->find("all", array(
      "conditions" => array("News.published" => "1"),
      "order" => array("News.created" => "DESC")
    )));
    $this->set("description", "DARKNEuSS.de ist wieder da! Erfahrt alles Aktuelle rund um unsere &bdquo;Dreifaltigkeitsbegriffe&rdquo; Metal, Gothic und Neuss.");
    $this->set("ogp", array(
      "title" => "News - DARKNEuSS.de",
      "type" => "website",
      "url" => "http://darkneuss.de/news",
      "image" => "http://darkneuss.de/img/fbdn.png"
    ));
  }
  
  public function hashtag($tag = null) {
    $this->set("networks", array(
      "activated" => $this->Cookie->read("nw") || 0,
      "status" => array("de", null)
    ));
    $this->set("news", $this->News->find("all", array(
      "conditions" => array("News.tag" => $tag),
      "order" => array("News.created" => "DESC")
    )));
    $this->set("title_for_layout", sprintf("Alle News mit dem Hashtag #%s", ucfirst($tag)));
    $this->set("description", sprintf("Auf dieser Seite findet ihr alle Artikel von DARKNEuSS.de mit dem Hashtag #%s", ucfirst($tag)));
    $this->set("ogp", array(
      "title" => sprintf("News mit dem Hashtag #%s - DARKNEuSS.de", ucfirst($tag)),
      "type" => "website",
      "url" => sprintf("http://darkneuss.de/news/hashtag/%s", $tag),
      "image" => "http://darkneuss.de/img/fbdn.png"
    ));
    
    $this->render("index");
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
      "url" => "http://darkneuss.de/news/" . $news["News"]["url_id"],
      "image" => (isset($news["Image"]["id"])) ? sprintf("http://darkneuss.de/img/news/%s/%s.%s", substr($news["Image"]["timestamp"], 0, 4), $news["Image"]["filename"], $news["Image"]["ext"]) : "http://darkneuss.de/img/fbdn.png"
    ));
  }
  
  public function year($year = null) {
    $year = $this->request->params["year"];
  
    $this->set("title_for_layout", "News aus dem Jahre " . $year);
  
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

  public function most_read() {
    $news = $this->News->find("all", array(
      "order" => array("News.visited" => "DESC"),
      "limit" => 5
    ));
    if (!empty($this->request->params["requested"])) {
      return $news;
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
