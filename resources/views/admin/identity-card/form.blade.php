@extends("admin.layout.default")

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{isset($id) ? 'Edit' : 'Tambah'}} Data</h1>
          </div>          
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="card">      
        <div class="card-body p-4">         
        <form action="{{isset($id) ? route('admin.action.identity-card.update',$id) : route('admin.action.identity-card.store')}}" method="post" enctype="multipart/form-data">
          @isset($id)
            @method("PUT")
          @endisset

          @csrf

          <div class="form-group row">
            <div class="col-12 p-2">Nik</div>
            <div class="col-12">
              <input type="text" class="form-control" name="nik" placeholder="Nik . . ."
                value="{{isset($id) ? $identity_card->nik : $nik}}"
                readonly>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-12 p-2">Nama</div>
            <div class="col-12">
              <input type="text" class="form-control" name="name" placeholder="Nama . . ."
                value="{{old('name',isset($id) ? $identity_card->name : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Tempat Lahir</div>
            <div class="col-12">
              <input type="text" class="form-control" name="born_at" placeholder="Tempat Lahir . . ."
                value="{{old('born_at',isset($id) ? $identity_card->born_at : '')}}">
            </div>
          </div>    
              
          <div class="form-group row">
            <div class="col-12 p-2">Tgl Lahir</div>
            <div class="col-12">
              <input type="date" class="form-control" name="birth" placeholder="Tgl Lahir . . ."
                value="{{old('birth',isset($id) ? $identity_card->birth : '')}}">
            </div>
          </div>   

          <div class="form-group row">
            <div class="col-12 p-2">Umur</div>
            <div class="col-12">
              <input type="text" class="form-control" name="age" placeholder="Umur . . ."
                value="{{old('age',isset($id) ? $identity_card->age : '')}}"
                readonly>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Gender</div>
            <div class="col-12">
              <select name="gender" class="form-control">
                <option value="L" {{isset($id) ? ($identity_card->gender == "L" ? 'selected' : '') : ''}}>Laki-Laki</option>
                <option value="P" {{isset($id) ? ($identity_card->gender == "P" ? 'selected' : '') : ''}}>Perempuan</option>
              </select>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Golongan Darah</div>
            <div class="col-12">
              <select name="blood_type" class="form-control">
                <option value="-">Tidak Dipilih</option>
                <option value="A" {{isset($id) ? ($identity_card->blood_type == "A" ? 'selected' : '') : ''}}>A</option>
                <option value="B" {{isset($id) ? ($identity_card->blood_type == "B" ? 'selected' : '') : ''}}>B</option>
                <option value="C" {{isset($id) ? ($identity_card->blood_type == "C" ? 'selected' : '') : ''}}>C</option>
              </select>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Agama</div>
            <div class="col-12">
              <input type="text" class="form-control" name="region" placeholder="Agama . . ."
                value="{{old('region',isset($id) ? $identity_card->region : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Status Pernikahan</div>
            <div class="col-12">
              <select name="is_married" class="form-control">              
                <option value="1" {{isset($id) ? ($identity_card->is_married == true ? 'selected' : '') : ''}}>Sudah Menikah</option>
                <option value="0" {{isset($id) ? ($identity_card->is_married == false ? 'selected' : '') : ''}}>Belum Menikah</option>
              </select>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Pekerjaan</div>
            <div class="col-12">
              <textarea class="form-control" name="jobs" placeholder="Pekerjaan . . .">{{old('jobs',isset($id) ? $identity_card->jobs : '')}}</textarea>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Kewarganegaraan</div>
            <div class="col-12">
              <select name="nationality" class="form-control">              
                <option value="WNI" {{isset($id) ? ($identity_card->nationality == 'WNI' ? 'selected' : '') : ''}}>Warga Negara Indonesia</option>
                <option value="WNA" {{isset($id) ? ($identity_card->nationality == 'WNA' ? 'selected' : '') : ''}}>Warga Negara Asing</option>
              </select>
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Berlaku Hingga</div>
            <div class="col-12">
              <div style="display:inline-block">
                  <input type="radio" name="is_valid_until" value="text" checked
                    onclick="document.querySelector('[name=valid_until]').type = 'text'"> Text
              </div>

              <div style="display:inline-block;margin-left:10px;margin-bottom:10px">
                <input type="radio" name="is_valid_until" value="date"
                    onclick="document.querySelector('[name=valid_until]').type = 'date'"> Tanggal
              </div>

              <input type="text" class="form-control" name="valid_until" placeholder="Berlaku hingga . . ."
                value="{{old('valid_until',isset($id) ? $identity_card->valid_until : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Photo</div>
            <div class="col-12">
              <input type="file" name="photo" class="form-control">
            </div>
          </div>  

          <div class="form-group row">
            <div class="col-12 p-2">Alamat</div>
            <div class="col-12">
              <input type="text" class="form-control" name="address" placeholder="Alamat . . ."
                value="{{old('address',isset($id) ? optional($identity_card->address)->address : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Kota</div>
            <div class="col-12">
              <input type="text" class="form-control" name="district" placeholder="Kota . . ."
                value="{{old('district',isset($id) ? optional($identity_card->address)->district : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Desa/Kelurahan</div>
            <div class="col-12">
              <input type="text" class="form-control" name="village" placeholder="Desa . . ."
                value="{{old('village',isset($id) ? optional($identity_card->address)->village : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Rt</div>
            <div class="col-12">
              <input type="text" class="form-control" name="rt" placeholder="Rt . . ."
                value="{{old('rt',isset($id) ? optional($identity_card->address)->rt : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12 p-2">Rw</div>
            <div class="col-12">
              <input type="text" class="form-control" name="rw" placeholder="Rw . . ."
                value="{{old('rw',isset($id) ? optional($identity_card->address)->rw : '')}}">
            </div>
          </div> 

          <div class="form-group row">
            <div class="col-12">
              <button class="btn btn-info"
                onclick="this.innerText = ' . . .'">
                {{isset($id) ? 'Edit' : 'Tambah'}}
              </button>
            </div>
          </div>
        </form>
        </div>     
      </div>
    </section>
@endSection

@section("sc_footer")
<script>
  document.querySelector('[name=is_valid_until][value=text]').checked = true

  document.querySelector('[name=birth]').addEventListener('change',function(e){
    var today = new Date();

    var birthDate = new Date(e.target.value);

    var age = today.getFullYear() - birthDate.getFullYear();

    var month = today.getMonth() - birthDate.getMonth();

    if(month < 0 || (month === 0 && today.getDate() < birthDate.getDate())){
      age--;
    }

    document.querySelector('[name=age]').value = age;
  })
</script>
@endSection