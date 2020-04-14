<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\History;
use DiDom\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParserController extends BaseApiController
{
    
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
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
    
        return $this->getResponse([], 'index parser');
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function searchData(Request $request): JsonResponse
    {
        $data = $request->all();
        
        $url = "https://www.google.com/search?q={$data['domain_name']}&oq={$data['domain_name']}&num=1000";
        $document = new Document($url, true);
        $searchLinks = $document->find('div#main')[0]->children();
        $searchLinks = array_splice($searchLinks, 3, 10);
        $position = 0;
        foreach ($searchLinks as $key => $link) {
            $text = $link->text();
            if (strpos($text, $data['key_world']) !== false) {
                $position = $key + 1;
                break;
            }
        }
        $data['position'] = $position;
        History::create($data);
        
        return $this->getResponse([
            'success' => true,
            'position' => $position
        ], 'success', 200);
    }
    
    /**
     * @return array
     */
    public function getHistory(): array
    {
        $history = History::all();
        return ['history' => $history];
    }
}
