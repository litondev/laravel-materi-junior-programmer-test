@extends("admin.layout.default")

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import</h1>
          </div>          
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">      
            <div class="card-body p-4">         
              <form method="post" action="{{route('admin.action.identity-card.import')}}" enctype="multipart/form-data">                
                @csrf
                
                <div class="form-group row">
                  <div class="col-12">
                    File
                  </div>
                  <div class="col-12 mt-2 mb-2">
                    <input type="file" class="form-control" name="file" placeholder="File . . .">
                  </div>                  
                </div>

                <div class="form-group row">
                  <div class="col-12">
                    <button class="btn btn-success">Kirim</button>
                  </div>
                </div>
              </form>
            </div>     
          </div>
        </div>
      </div>
    </section>
@endSection