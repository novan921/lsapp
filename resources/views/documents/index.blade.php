@extends('layouts.app')

@section('content')
    <h1 class="mb-4">
        Documents
        @guest
            <div class=""></div>
        @else
            <div class="float-right">
                <a href="/documents/create" class="btn btn-primary" role="button">
                    <i class="fa fa-plus"></i>
                    New Document
                </a>
            </div>
        @endguest

    </h1>
    @if (count($documents) > 0)
        <div id="accordion" class="mb-3">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Search Documents <i class="fa fa-search"></i>
                    </button>
                </h5>
                </div>
            
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="col-sm-6">
                        <div class="row mb-3">
                            <h6>&nbsp;&nbsp;Judul</h6>
                            <input class="form-control" type="text" id="inputJudul" placeholder="Input Judul">
                        </div>
                        <div class="row">
                            <button onclick="search()" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
        
        
        <table id="myTable" class="table tabled-bordered table-hover">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Jenis Surat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($documents as $document)
                      <tr>
                          <th scope="row">{{$document->id}}</th>
                          <td>{{$document->judul}}</td>
                          <td>{{$document->tanggal}}</td>
                          <td>{{$document->nomor_surat}}</td>
                          <td>{{$document->jenis_surat}}</td>
                          <td>
                            @guest
                                @else
                                <div class="d-flex flex-row">
                                    <div class="pr-2">
                                        <a href="/documents/{{$document->id}}/edit" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="">
                                        {!!Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => ''])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            @endguest
                          </td>
                      </tr>
                  @endforeach
                
              </tbody>
        </table>

        <script>
            function search() {
              var input, filter, table, tr, judul, tgl, noSurat, jenisSurat, i, 
              txtJudul, dateTgl, txtNoSurat, txtJenisSurat;

              input = document.getElementById("inputJudul");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                // judul
                judul = tr[i].getElementsByTagName("td")[0];
                // tgl
                tgl = tr[i].getElementsByTagName("td")[1];
                // nomor surat
                noSurat = tr[i].getElementsByTagName("td")[2];
                // jenis surat
                jenisSurat = tr[i].getElementsByTagName("td")[3];

                if (judul) {
                    txtJudul = judul.value;
                    alert(txtJudul);
                //   if (txtJudul.toUpperCase().indexOf(filter) > -1) {
                //     tr[i].style.display = "";
                //   } else {
                //     tr[i].style.display = "none";
                //   }
                }       
              }
            }
        </script>

        {{-- @foreach ($documents as $document)
            <div class="card my-2">
                <div class="card-body">
                    <h4 class="card-text"><a href="{{ URL::to('documents/' . $document->id) }}">{{$document->judul}}</a></h4>
                    <small>Created at {{$document->created_at}}</small>
                </div>
            </div>
        @endforeach --}}
        {{-- {{$documents->links()}} --}}
    @else
        <p>No documents found</p>
    @endif
@endsection