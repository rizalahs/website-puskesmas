<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ExternalRssController extends Controller
{
    public function index()
    {
        $feeds = [
            'Kegiatan Kemenkes' => 'https://kemkes.go.id/id/rss/article/kegiatan-kemenkes',
            'Tips Kesehatan' => 'https://kemkes.go.id/id/rss/article/tips-kesehatan',
        ];

        $data = [];

        foreach ($feeds as $title => $url) {
            // ✅ Tambahkan timeout di sini
            try {
                $response = Http::timeout(5)->get($url);

                if ($response->successful()) {
                    $xml = simplexml_load_string($response->body(), null, LIBXML_NOCDATA);
                    $items = [];

                    foreach ($xml->channel->item as $item) {
                        $items[] = [
                            'title' => (string) $item->title,
                            'link' => (string) $item->link,
                            'description' => Str::limit(strip_tags((string) $item->description), 150),
                            'pubDate' => date('d F Y H:i', strtotime((string) $item->pubDate)),
                        ];
                    }

                    $data[] = [
                        'title' => $title,
                        'items' => array_slice($items, 0, 5),
                    ];
                }

            } catch (\Exception $e) {
                // 🛑 Fallback jika timeout atau error
                $data[] = [
                    'title' => $title,
                    'items' => [],
                    'error' => 'Gagal memuat RSS (Timeout)',
                ];
            }
        }

        return view('rss.tips-kesehatan', compact('data'));
    }
}
