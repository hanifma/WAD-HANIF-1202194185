@extends("nav")
@section("target")

            <h3 class="mt-5 mb-5 text-center">
                Input Patient
            </h3>

            <div class="row">
              <div class="col-10 mx-auto">
                <form action="/pasien" method="POST" enctype="multipart/form-data">
                  @csrf
                  <label for="vaccine-id" class="form-label">Vaccine ID</label>
                  <div class="input-group mb-3">
                    <input name="vaccine_id" type="text" class="form-control" id="vaccine_id" value="{{ $vaksin_id->id }}" readonly>
                  </div>

                  <label for="Patient-name" class="form-label">Patient Name</label>
                  <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control" id="patient-name">
                  </div>

                  <label for="nik" class="form-label">NIK</label>
                  <div class="input-group mb-3">
                    <input name="nik" type="text" class="form-control" id="nik">
                  </div>

                  <label for="alamat" class="form-label">Alamat</label>
                  <div class="input-group mb-3">
                    <input name="alamat" type="text" class="form-control" id="alamat">
                  </div>

                  <label for="upload-file" class="form-label">KTP</label>
                  <div class="input-group mb-3">
                    <input name="image_ktp" type="file" class="" id="upload-file">
                  </div>

                  <label for="no-hp" class="form-label">No Hp</label>
                  <div class="input-group mb-3">
                    <input name="no_hp" type="no" class="form-control" id="no-hp">
                  </div>

                  <div class="input-group mb-3">
                    <button class="btn btn-primary">Register</button>
                  </div>
                </form>
              </div>
            </div>

@endsection
