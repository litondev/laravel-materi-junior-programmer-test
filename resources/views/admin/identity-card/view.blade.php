@extends("admin.layout.default")

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ktp</h1>
          </div>          
        </div>
      </div>
    </section>
   


    <section class="content">
      <div class="card">      
        <div class="card-body text-center p-4">
          <form action="{{route('admin.identity-card.index')}}">
            <div class="row">
              <div class="col-3">
                <input type="input" class="form-control" name="name" placeholder="Nama . . ."
                  onchange="this.form.submit()"
                  value="{{request()->get('name','')}}">
              </div>
              <div class="col-3">
                <input type="input" class="form-control" name="region" placeholder="Agama . . ."
                  onchange="this.form.submit()"
                  value="{{request()->get('region','')}}">
              </div>
              <div class="col-3">
                <input type="input" class="form-control" name="age" placeholder="Umur . . ."
                  onchange="this.form.submir()"
                  value="{{request()->get('age','')}}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">      
        <div class="card-body p-4">
          <div class="mt-3 mb-3">
            <a class="btn btn-warning"
              href="{{route('admin.identity-card.import')}}">Import Data</a>
            <a class="btn btn-success"
              href="{{route('admin.identity-card.export')}}">Export Data</a>
            <a class="btn btn-primary"
              href="{{route('admin.identity-card.create')}}">Add Data</a>
          </div>

          <table class="table table-hover">
            <tr>
              <td>Id</td>            
              <td>Nama</td>
              <td>Agama</td>
              <td>Umur</td>
              <td>Alamat</td>
              <td>Action</td>
            </tr>

            @forelse($identityCard as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->region}}</td>
              <td>{{$item->age}}</td>
              <td>{{optional($item->address)->address}}</td>
              <td>
                <a class="btn btn-info"
                  href="{{route('admin.identity-card.show',$item->id)}}">Detail</a>

                <form action="{{route('admin.action.identity-card.destroy',$item->id)}}" method="post">
                  @method("DELETE")
                  @csrf
                  <button class="btn btn-danger"                  
                    onclick="return confirm('Anda Yakin')">Delete</button>
                </form>

                <a class="btn btn-success"
                  href="{{route('admin.identity-card.edit',$item->id)}}">Update</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="10">
                Data tidak ditemukan
              </td>
            </tr>
            @endforelse
          </table>

          <div class="mt-3 mb-3">
            {{$identityCard->links()}}
          </div>
        </div>     
      </div>
    </section>
@endSection