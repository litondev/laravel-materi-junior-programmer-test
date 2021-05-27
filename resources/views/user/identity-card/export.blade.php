@extends("user.layout.default")

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Export</h1>
          </div>          
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card">      
            <div class="card-body p-4">         
              <form method="get">
                <div class="form-group row">
                  <div class="col-12">
                    Nama
                  </div>
                  <div class="col-12 mt-2 mb-2">
                    <input type="text" class="form-control" name="name" placeholder="Nama . . ."
                      onchange="this.form.submit()"
                      value="{{$name ?? ''}}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12">
                    Agama
                  </div>
                  <div class="col-12 mt-2 mb-2">
                    <input type="text" class="form-control" name="region" placeholder="Agama . . ."
                      onchange="this.form.submit()"
                      value="{{$region ?? ''}}">
                  </div>                  
                </div>
              </form>
            </div>     
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-4 text-center">
              @if($count)
                <a class="btn btn-success"
                  href="{{$export_url}}">
                  Export
                </a>
              @else
                Data tidak ditemukan
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
@endSection