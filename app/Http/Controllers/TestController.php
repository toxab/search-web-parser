<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use DiDom\Document;

class TestController extends BaseApiController
{
    
    public function index()
    {
        $data = [];
        return $this->getResponse(['data' => [1, 2, 3]], 'hello index test', 200);
    }
    
    public function history()
    {
        $data = [];
        return $this->getResponse(['data' => [1, 2, 3]], 'hello history test', 200);
    }
    
    public function test()
    {
        $str = '<!DOCTYPE html>
        <html>
         <head>
           <title>!DOCTYPE</title>
           <meta charset="utf-8">
         </head>
         <body>
         <div id="container">
         <div class="asd">

          <p>111Разум — это Будда, а прекращение умозрительного мышления — это путь.
          Перестав мыслить понятиями и размышлять о путях существования и небытия,
          о душе и плоти, о пассивном и активном и о других подобных вещах,
          начинаешь осознавать, что разум — это Будда,
          что Будда — это сущность разума,
          и что разум подобен бесконечности.</p>
          </div>
          <div>
          <p>222Разум — это Будда, а прекращение умозрительного мышления — это путь.
          Перестав мыслить понятиями и размышлять о путях существования и небытия,
          о душе и плоти, о пассивном и активном и о других подобных вещах,
          начинаешь осознавать, что разум — это Будда,
          что Будда — это сущность разума,
          и что разум подобен бесконечности.</p>
          </div>
          <div>
          <p>333Разум — это Будда, а прекращение умозрительного мышления — это путь.
          Перестав мыслить понятиями и размышлять о путях существования и небытия,
          о душе и плоти, о пассивном и активном и о других подобных вещах,
          начинаешь осознавать, что разум — это Будда,
          что Будда — это сущность разума,
          и что разум подобен бесконечности.</p>
          </div>
        </div>

         </body>
        </html>';
    
        $url = 'https://www.google.com/search?q=kroliki.ru/&oq=kroliki.ru/&num=10';
        $document = new Document($url, true);
        $searchLinks = $document->find('div#main')[0]->children();
        $searchLinks = array_splice($searchLinks, 3, 10);
        foreach ($searchLinks as $k => $v) {
            $kTemp = $k;
            $lastChild = $v->lastChild();
            $classNode = $v->cloneNode();
            $node = $v->getNode();
            $attr = $v->attr('div');
            $nextS = $v->nextSibling();
            $nextAllS = $v->nextSiblings();
            $childNodes = $v->children();
            $closest = $v->closest('#rso');
            $text = $v->text();
            $clases = $v->classes();
        
        }
    }
}
