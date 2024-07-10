<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function postStep1(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
        ]);

        // Create a new transaction with default values
        $transaction = Transaction::create([
            'car_id' => $request->car_id,
            'name' => '',
            'telp' => '',
            'email' => '',
            'ktp' => '',
            'transfer' => '',
            'status' => 'pending',
            'start' => null,
            'end' => null,
            'img' => '',
        ]);

        return view('form.step2', ['transaction_id' => $transaction->id]);
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Find the transaction and update with step 2 data
        $transaction = Transaction::find($request->transaction_id);
        $transaction->name = $request->name;
        $transaction->telp = $request->telp;
        $transaction->email = $request->email;

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('ktp');
            $transaction->ktp = $ktpPath;
        }

        $transaction->save();

        return view('form.step3', ['transaction_id' => $transaction->id]);
    }

    public function postStep3(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'alamat' => 'required|string|max:255',
        ]);
    
        // Ambil data transaksi berdasarkan ID
        $transaction = Transaction::find($request->transaction_id);
    
        // Hitung selisih hari antara start dan end date
        $startDate = new DateTime($request->start);
        $endDate = new DateTime($request->end);
        $diff = $startDate->diff($endDate);
        $days = $diff->days + 1; // Termasuk hari terakhir
    
        // Ambil harga mobil dari tabel cars
        $car = Car::find($transaction->car_id);
        $price = $car->price;
    
        // Hitung total harga berdasarkan harga per hari
        $total = $price * $days;
    
        // Simpan data ke dalam transaksi
        $transaction->start = $request->start;
        $transaction->end = $request->end;
        $transaction->transfer = $total; // Simpan total harga ke dalam transfer (atau sesuaikan dengan field yang sesuai)
        $transaction->alamat = $request->alamat;
        $transaction->status = 'pending';
        $transaction->save();
    
        return view('payment', ['transaction_id' => $transaction->id]);
    }

    public function postPayment(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'bukti_transfer' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Find the transaction and update with payment data
        $transaction = Transaction::find($request->transaction_id);

        if ($request->hasFile('bukti_transfer')) {
            $imgPath = $request->file('bukti_transfer')->store('bukti_transfer');
            $transaction->img = $imgPath;
        }

        $transaction->status = 'completed';
        $transaction->save();

        return redirect()->route('some.route')->with('success', 'Pembayaran berhasil');
    }
}
