<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Services\BootcampService;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $bootcampService;
    private $transactionService;
    public function __construct(
        BootcampService $bootcampService,
        TransactionService $transactionService)
    {
        $this->bootcampService = $bootcampService;
        $this->transactionService = $transactionService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bukus = $this->bootcampService->list();
        return view('buku.catalog', ['bukus' => $bukus]);
    }

    public function checkout($bukuID)
    {

        $data = $this->bootcampService->detail(Auth::id(), $bukuID);
        if ($data['checkkout'] == true) {

            return to_route('detail', $data['memberTransaction']->transaction_id);
        }

        // dd($data);
        return view('buku.checkout', ['buku' => $data['buku']]);
    }

    public function actCheckout(Request $request, $bukuID)
    {

        return $this->transactionService->create(Auth::user(), $bukuID, $request->all());
    }

    public function detail($bootcampTransactionID)
    {
        $memberTransaction = $this->transactionService->detail(Auth::id(), $bootcampTransactionID);

        if (!$memberTransaction) {
            return to_route('bukus');
        }
        return view('detail', ['memberTransaction' => $memberTransaction]);
    }


}
