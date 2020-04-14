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
