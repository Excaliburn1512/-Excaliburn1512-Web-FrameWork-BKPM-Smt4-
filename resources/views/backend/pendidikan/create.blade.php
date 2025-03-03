@extends('backend.layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Tambah Data Pendidikan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ route('dash.index') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i>Pendidikan</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Tambah Pendidikan
                        </header>
                        <div class="panel-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('pendidikan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Sekolah</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>

                                <div class="form-group">
                                    <label for="tingkatan">Tingkatan</label>
                                    <select class="form-control" name="tingkatan" required>
                                        <option value="" disabled selected>Pilih Tingkatan</option>
                                        <option value="1">TK</option>
                                        <option value="2">SD</option>
                                        <option value="3">SMP</option>
                                        <option value="4">SMA/SMK</option>
                                        <option value="5">D3</option>
                                        <option value="6">D4/S1</option>
                                        <option value="7">S2</option>
                                        <option value="8">S3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Masuk</label>
                                    <input type="number" class="form-control" name="tahun_masuk" required>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_keluar">Tahun Keluar</label>
                                    <input type="number" class="form-control" name="tahun_keluar" required>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Batal
                                </a>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection