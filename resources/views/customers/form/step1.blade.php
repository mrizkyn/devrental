

@extends('customers.layouts.app')
@section('content')


@include('layouts.alert')
    <section class="py-0" id="form1">
        <div class="container">
            <div class="row align-items-center min-vh-md-75">
                <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                    <h2 class="form-title" style="text-align: center;">Form Penyewaan</h2>
                    <div class="row">
                        <div class="col">
                            <div class="form mb-3">
                                <form action="{{ route('form.step1.post') }}" method="POST" enctype="multipart/form-data" style="text-align: start">
                                    @csrf
                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">No Telp</label>
                                        <input type="tel" class="form-control" name="telp" id="telp" placeholder="08xxxxxxxx">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ktp" class="form-label">Upload KTP/SIM <p style="font-size:10px; color: rgb(180, 179, 179);">*Ukuran file tidak boleh lebih dari 2048KB</p></label>
                                        <input class="form-control mb-2" type="file" name="ktp" id="ktp">
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary" style="padding: 10px 25px; border-radius:20px 20px; background-color: #102C42">Next</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

