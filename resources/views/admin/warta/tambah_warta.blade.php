@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Formulir Warta Jemaat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Forms
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Warta Jemaat
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <br>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" enctype="multipart/form-data"
                    action="{{ url('/' . $nama_gereja . '/admin/warta/simpan_warta') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gambar_option" id="defaultGambar"
                                    value="default" checked>
                                <label class="form-check-label" for="defaultGambar">
                                    Gunakan Gambar Default
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gambar_option" id="customGambar"
                                    value="custom">
                                <label class="form-check-label" for="customGambar">
                                    Unggah Gambar Sendiri
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row custom-gambar">
                        <label class="col-sm-12 col-md-2 col-form-label">Unggah Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="gambar" type="file" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="judul" placeholder="Warta Jemaat" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Deskripsi Singkat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" name="tanggal" placeholder="" />
                        </div>
                    </div>
                    <br>
                    <h4 class="text-blue h4">Pelayanan Pagi</h4>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="pengkotbahToggle">Pengkotbah Pagi</label>
                            <input type="checkbox" id="pengkotbahToggle"
                                onchange="toggleInputVisibility('pengkotbahInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="pengkotbah_pagi" id="pengkotbahInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="liturgisToggle">Liturgis Pagi</label>
                            <input type="checkbox" id="liturgisToggle"
                                onchange="toggleInputVisibility('liturgisInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="liturgis_pagi" id="liturgisInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="singersToggle">Singers Pagi</label>
                            <input type="checkbox" id="singersToggle" onchange="toggleInputVisibility('singersInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="singers_pagi" id="singersInput" placeholder=""
                                style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="pemusikToggle">Pemusik Pagi</label>
                            <input type="checkbox" id="pemusikToggle" onchange="toggleInputVisibility('pemusikInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="pemusik_pagi" id="pemusikInput" placeholder=""
                                style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="tamborinToggle">Tamborin Pagi</label>
                            <input type="checkbox" id="tamborinToggle"
                                onchange="toggleInputVisibility('tamborinInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="tamborin_pagi" id="tamborinInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="penyambutToggle">Penyambut Jemaat Pagi</label>
                            <input type="checkbox" id="penyambutToggle"
                                onchange="toggleInputVisibility('penyambutInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="penyambut_jemaat_pagi" id="penyambutInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="cameraToggle">Operator Camera Pagi</label>
                            <input type="checkbox" id="cameraToggle" onchange="toggleInputVisibility('cameraInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_camera_pagi" id="cameraInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="computerToggle">Operator Computer Pagi</label>
                            <input type="checkbox" id="computerToggle"
                                onchange="toggleInputVisibility('computerInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_computer_pagi" id="computerInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="soundToggle">Operator Sound Pagi</label>
                            <input type="checkbox" id="soundToggle" onchange="toggleInputVisibility('soundInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_sound_pagi" id="soundInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <br>
                    <h4 class="text-blue h4">Pelayanan Siang</h4>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="pengkotbahSiangToggle">Pengkotbah Siang</label>
                            <input type="checkbox" id="pengkotbahSiangToggle"
                                onchange="toggleInputVisibility('pengkotbahSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="pengkotbah_siang" id="pengkotbahSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="liturgisSiangToggle">Liturgis Siang</label>
                            <input type="checkbox" id="liturgisSiangToggle"
                                onchange="toggleInputVisibility('liturgisSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="liturgis_siang" id="liturgisSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="singersSiangToggle">Singers Siang</label>
                            <input type="checkbox" id="singersSiangToggle"
                                onchange="toggleInputVisibility('singersSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="singers_siang" id="singersSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="pemusikSiangToggle">Pemusik Siang</label>
                            <input type="checkbox" id="pemusikSiangToggle"
                                onchange="toggleInputVisibility('pemusikSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="pemusik_siang" id="pemusikSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="tamborinSiangToggle">Tamborin Siang</label>
                            <input type="checkbox" id="tamborinSiangToggle"
                                onchange="toggleInputVisibility('tamborinSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="tamborin_siang" id="tamborinSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="penyambutJemaatSiangToggle">Penyambut Jemaat
                                Siang</label>
                            <input type="checkbox" id="penyambutJemaatSiangToggle"
                                onchange="toggleInputVisibility('penyambutJemaatSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="penyambut_jemaat_siang"
                                id="penyambutJemaatSiangInput" placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="cameraSiangToggle">Operator Camera Siang</label>
                            <input type="checkbox" id="cameraSiangToggle"
                                onchange="toggleInputVisibility('cameraSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_camera_siang" id="cameraSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="computerSiangToggle">Operator Computer Siang</label>
                            <input type="checkbox" id="computerSiangToggle"
                                onchange="toggleInputVisibility('computerSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_computer_siang"
                                id="computerSiangInput" placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-3 d-flex justify-content-between align-items-center">
                            <label class="col-form-label" for="soundSiangToggle">Operator Sound Siang</label>
                            <input type="checkbox" id="soundSiangToggle"
                                onchange="toggleInputVisibility('soundSiangInput')">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <input class="form-control" type="text" name="operator_sound_siang" id="soundSiangInput"
                                placeholder="" style="display: none;" />
                        </div>
                    </div>

                    <script>
                        function toggleInputVisibility(inputId) { 
                            var checkbox = document.getElementById(inputId.replace('Input', 'Toggle')); 
                            var input = document.getElementById(inputId); 
                            if (checkbox.checked) { 
                                input.style.display = 'block';  
                            } else { 
                                input.style.display = 'none';  
                                input.value = '';  
                            } 
                        } 
                    </script>

                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Tata Ibadah</strong></label>
                        <textarea class="form-control tinymce-editor" name="tata_ibadah"
                            placeholder="Masukkan detail Tata Ibadah..."></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Laporan Persembahan</strong></label>
                        <textarea class="form-control tinymce-editor" name="laporan_persembahan"
                            placeholder="Masukkan detail Laporan Persembahan..."></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Laporan Perpuluhan</strong></label>
                        <textarea class="form-control tinymce-editor" name="laporan_perpuluhan"
                            placeholder="Masukkan detail Laporan Perpuluhan..."></textarea>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const defaultGambarRadio = document.getElementById('defaultGambar');
                        const customGambarRadio = document.getElementById('customGambar');
                        const customGambarInput = document.querySelector('.custom-gambar');

                        function toggleGambarInput() {
                            if (customGambarRadio.checked) {
                                customGambarInput.style.display = 'block';
                            } else {
                                customGambarInput.style.display = 'none';
                            }
                        }

                        defaultGambarRadio.addEventListener('change', toggleGambarInput);
                        customGambarRadio.addEventListener('change', toggleGambarInput);

                        toggleGambarInput(); // Initial call
                    });
                </script>
            </div>
            <!-- Default Basic Forms End -->
        </div>
    </div>
</div>
@endsection