@extends("user.layout.default")

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
          <form action="{{route('identity-card.index')}}">
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
            <a class="btn btn-success"
              href="{{route('identity-card.export')}}">Export Data</a>
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
                  href="{{route('identity-card.show',$item->id)}}">Detail</a>
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