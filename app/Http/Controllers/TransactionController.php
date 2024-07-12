<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Car;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function showStep1Form($car_id)
    {
        $car = Car::findOrFail($car_id);
        return view('customers.form.step1', compact('car'));
    }

   // app/Http/Controllers/RentalController.php

   public function postStep1(Request $request)
   {
       $request->validate([
           'car_id' => 'required|exists:cars,id',
           'name' => 'required|string',
           'telp' => 'required|string',
           'email' => 'required|email',
           'ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
   
       $transaction = new Transaction();
       $transaction->car_id = $request->car_id;
       $transaction->name = $request->name;
       $transaction->telp = $request->telp;
       $transaction->email = $request->email;
   
       if ($request->hasFile('ktp')) {
           $ktpPath = $request->file('ktp')->store('ktp_images', 'public');
           $transaction->ktp = $ktpPath;
       }
   
       $transaction->status = 'pending';
       $transaction->save();
   
       return redirect()->route('form.step2', ['transaction_id' => $transaction->id]);
   }
   
    public function showStep2Form($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        $car = Car::findOrFail($transaction->car_id);
        return view('customers.form.step2', compact('transaction', 'car'));
    }

    public function postStep2(Request $request)
{
    $request->validate([
        'transaction_id' => 'required|exists:transactions,id',
        'start' => 'required|date',
        'end' => 'required|date|after_or_equal:start',
        'address' => 'required|string',
    ]);

    $transaction = Transaction::findOrFail($request->transaction_id);
    $transaction->start = $request->start;
    $transaction->end = $request->end;

    $start = Carbon::parse($request->start);
    $end = Carbon::parse($request->end);
    $days = $end->diffInDays($start) + 1;

    $car = Car::findOrFail($transaction->car_id);
    $transaction->price = $car->price * $days;
    $transaction->address = $request->address;
    $transaction->save();

    return redirect()->route('payment', ['transaction_id' => $transaction->id]);
}



    public function showPaymentForm($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        return view('customers.form.payment', compact('transaction'));
    }

    public function postPayment(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $transaction = Transaction::findOrFail($request->transaction_id);
    
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('payment_images', 'public');
            $transaction->img = $imgPath;
        }
    
        $transaction->status = 'pending';
        $transaction->backs = 'Belum Dikembalikan';
        $transaction->save();
    
        return redirect()->route('confirmation', ['transaction_id' => $transaction->id]);
    }
    
    

    public function confirmation($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        return view('customers.payment.index', compact('transaction'));




    }

 public function index()
    {
        $transactions = Transaction::all(); // Mengambil semua transaksi
        return view('admin.transaction.index', compact('transactions'));
    }

    public function updateStatus(Request $request, $id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->status = $request->status;
    $transaction->save();

    return response()->json(['success' => true]);
}

}


