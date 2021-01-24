<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use DB;

class DocumentsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $documents = Document::all();
        // return Post::where('title','Document Two')-get();
        // $documents = DB::select('SELECT * FROM documents');
        // $documents = Document::orderBy('created_at', 'desc')->get();
        // $documents = Document::orderBy('created_at', 'desc')->take(1)->get();
        // $documents = Document::orderBy('created_at', 'desc')->paginate(10);

        $documents = Document::orderBy('id', 'asc')->get();
        return view('documents.index')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'=>'required',
            'tanggal'=>'required',
            'nomor_surat'=>'required',
            'jenis_surat'=>'required'
        ]);

        // Create Document
        $document = new Document;
        $document->judul = $request->input('judul');
        $document->tanggal = $request->input('tanggal');
        $document->nomor_surat = $request->input('nomor_surat');
        $document->jenis_surat = $request->input('jenis_surat');
        $document->save();

        return redirect('/documents')->with('success', 'Document Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $doc = Document::find($document)->first();
        // return Document::find($document);
        return view('documents.show')->with('document', $doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $doc = Document::find($document)->first();
        // return Document::find($document);
        return view('documents.edit')->with('document', $doc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $this->validate($request, [
            'judul'=>'required',
            'tanggal'=>'required',
            'nomor_surat'=>'required',
            'jenis_surat'=>'required'
        ]);

        // Update Document
        $doc = Document::find($document)->first();
        // return $doc;
        $doc->judul = $request->input('judul');
        $doc->tanggal = $request->input('tanggal');
        $doc->nomor_surat = $request->input('nomor_surat');
        $doc->jenis_surat = $request->input('jenis_surat');
        $doc->save();

        return redirect('/documents')->with('success', 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $doc = Document::find($document);
        $doc->delete();

        return redirect('/documents')->with('success', 'Document Removed');
    }
}
