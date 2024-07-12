@extends('customers.layouts.app')
@section('content')

<form action="{{ route('form.step1.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="car_id" value="{{ $car->id }}">
    <div>
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="telp">No Telp</label>
        <input type="text" name="telp" id="telp" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="ktp">Upload KTP/SIM</label>
        <input type="file" name="ktp" id="ktp" required>
    </div>
    <button type="submit">Next</button>
</form>
@endsection
