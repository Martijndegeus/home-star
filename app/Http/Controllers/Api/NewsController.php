<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class NewsController extends Controller
{
    public function feed($source)
    {
        if($source == 'nos') {
            $feed = FeedReader::read('http://feeds.nos.nl/nosnieuwsalgemeen');
        } else if($source == 'nu') {
            $feed = FeedReader::read('https://www.nu.nl/rss/Algemeen');
        } else {
            return response("Not Found", 404);
        }

        $items = [];

        foreach($feed->get_items(0, 10) as $item) {
            $items[] = $item->get_title();
        }

        return response()->json($items);
    }
}
