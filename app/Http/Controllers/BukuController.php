<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const API_URL = "http://127.0.0.1:8000/api/buku";

    public function index(Request $request)
    {
        $current_url = url()->current();

        $client = new Client();

        // url dari backend api
        $url = static::API_URL;

        // untuk memanggil data dari paginate
        if ($request->input('page') != '') {
            $url .= "?page=" . $request->input('page');
        }

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();

        // convert json to array
        $contentArray = json_decode($content, true);

        $data = $contentArray['data'];

        foreach ($data['links'] as $key => $value) {
            $data['links'][$key]['url2'] = str_replace(static::API_URL, $current_url, $value['url']);
        }
        return view('buku.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // menangkap inputan
        $judul = $request->judul;
        $pengarang = $request->pengarang;
        $tanggal_publikasi = $request->tanggal_publikasi;

        // dijadikan array untuk post ke api
        $parameter = [
            'judul' => $judul,
            'pengarang' => $pengarang,
            'tanggal_publikasi' => $tanggal_publikasi
        ];

        $client = new Client();

        // url dari backend api
        $url = "http://127.0.0.1:8000/api/buku";

        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            //array to json
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();

        // convert json to array
        $contentArray = json_decode($content, true);

        // cek validasi
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('buku')->withErrors($error)->withInput();
        } else {
            return redirect()->to('buku')->with('success', 'Berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();

        // url dari backend api
        $url = "http://127.0.0.1:8000/api/buku/{$id}";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();

        // convert json to array
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('buku')->withErrors($error);
        } else {
            $data = $contentArray['data'];
            return view('buku.index', ['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // menangkap inputan
        $judul = $request->judul;
        $pengarang = $request->pengarang;
        $tanggal_publikasi = $request->tanggal_publikasi;

        // dijadikan array untuk post ke api
        $parameter = [
            'judul' => $judul,
            'pengarang' => $pengarang,
            'tanggal_publikasi' => $tanggal_publikasi
        ];

        $client = new Client();

        // url dari backend api
        $url = "http://127.0.0.1:8000/api/buku/{$id}";

        $response = $client->request('put', $url, [
            'headers' => ['Content-type' => 'application/json'],
            //array to json
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();

        // convert json to array
        $contentArray = json_decode($content, true);

        // cek validasi
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('buku')->withErrors($error)->withInput();
        } else {
            return redirect()->to('buku')->with('success', 'Berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        // url dari backend api
        $url = "http://127.0.0.1:8000/api/buku/{$id}";

        $response = $client->request('delete', $url);
        $content = $response->getBody()->getContents();

        // convert json to array
        $contentArray = json_decode($content, true);

        // cek validasi
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('buku')->withErrors($error)->withInput();
        } else {
            return redirect()->to('buku')->with('successs', 'Berhasil dihapus');
        }
    }
}
