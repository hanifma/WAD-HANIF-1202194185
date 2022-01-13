@extends("nav")
@section("target")
            
            <h3 class="mt-5 mb-5 text-center">
                Edit Pasien
            </h3>
            
            <div class="row">
              <div class="col-10 mx-auto">
                <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')  
                @csrf
                  <label for="vaccine-id" class="form-label">Vaccine ID</label>
                  <div class="input-group mb-3">
                    <input name="vaccine_id" value="{{ $pasien->vaccine_id }}" type="text" class="form-control" id="vaccine-id" readonly>
                  </div>

                  <label for="Patient-name" class="form-label">Patient Name</label>
                  <div class="input-group mb-3">
                    <input name="name" value="{{ $pasien->name }}" type="text" class="form-control" id="patient-name">
                  </div>

                  <label for="nik" class="form-label">NIK</label>
                  <div class="input-group mb-3">
                    <input name="nik" value="{{ $pasien->nik }}" type="text" class="form-control" id="nik">
                  </div>

                  <label for="address" class="form-label">Address</label>
                  <div class="input-group mb-3">
                    <input name="alamat" value="{{ $pasien->alamat }}" type="text" class="form-control" id="address">
                  </div>

                  <label for="ktp" class="form-label">KTP</label>
                  <div class="input-group mb-3">
                    <input name="image_ktp" value="{{ $pasien->ktp }}" type="file" class="" id="image_ktp">
                  </div>

                  <label for="no-hp" class="form-label">No Hp</label>
                  <div class="input-group mb-3">
                    <input name="no_hp" value="{{ $pasien->no_hp }}" type="no" class="form-control" id="no-hp">
                  </div>

                  <div class="input-group mb-3">
                    <button class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>



@endsection
