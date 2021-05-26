@extends("admin.layout.default")

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail {{$identity_card->name}}</h1>
          </div>          
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="card">      
        <div class="card-body p-4">
          <div class="row">
              <div class="col-md-4">
                Nik
                <p>
                  <span class="badge badge-success">{{$identity_card->nik}}</span>
                </p>
              </div>

              <div class="col-md-4">
                Nama 
                <p>
                  {{$identity_card->name}}
                </p>
              </div>

              <div class="col-md-2">
                Tempat,Tgl Lahir 
                <p>
                  {{$identity_card->born_at}},
                  {{$identity_card->birth}}
                </p>
              </div>

              <div class="col-md-2 text-center">
                <img src="{{$identity_card->photo}}" 
                  style="max-height:100px">
              </div>

              <div class="col-4">
                Agama 
                <p>
                  {{$identity_card->region}}
                </p>
              </div>

              <div class="col-4">
                Golongan Darah 
                <p>
                  {{$identity_card->blood_type}}
                </p>
              </div>

              <div class="col-2">
                Jenis Kelamin
                <p>
                  {{$identity_card->gender}}
                </p>
              </div>

              <div class="col-4">
                Setatus Pernikahan
                <p>
                  @if($identity_card->is_married)
                    Sudah Menikah
                  @else
                    Belum Menikah
                  @endif
                </p>
              </div>

              <div class="col-4">
                Pekerjaan
                <p>
                  {{$identity_card->jobs ?? '-'}}
                </p>
              </div>

              <div class="col-6">
                Kewarganegaraan
                <p>
                  {{$identity_card->nationality}}
                </p>
              </div>

              <div class="col-3">
                Berlaku Hingga
                <p>
                  {{$identity_card->valid_until}}
                </p>
              </div>

              <div class="col-12 mt-3">
                <div class="mt-2 mb-2"> Alamat : {{optional($identity_card->address)->address}}</div>
                <div class="mt-2 mb-2"> Rt/Rw : {{optional($identity_card->address)->rt}}/{{optional($identity_card->address)->rw}}</div>
                <div class="mt-2 mb-2"> Desa : {{optional($identity_card->address)->village}}</div>                 
                <div class="mt-2 mb-2"> Kota : {{optional($identity_card->address)->district}}</div>
              </div>
          </div>          
        </div>     
      </div>
    </section>
@endSection