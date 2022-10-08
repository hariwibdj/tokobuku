<?php

namespace App\Services;

use App\Models\MemberTransaction;
use App\Repositories\BootcampRepository;
use App\Repositories\TransactionRepository;

class BootcampService
{
    private $bootcampRepository;
    private $transactionRepository;

    public function __construct(
        BootcampRepository $bootcampRepository,
        TransactionRepository $transactionRepository
    ) {
        $this->bootcampRepository = $bootcampRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function list()
    {
        return $this->bootcampRepository->list();
    }

    public function detail($memberID, $bukuID)
    {
        $memberTransaction = $this->transactionRepository->memberTransaction($memberID, $bukuID);

        if ($memberTransaction && $memberTransaction->status != MemberTransaction::PAYMENT_STATUS_EXPIRED) {
            return [
                'checkkout' => true,
                'memberTransaction' => $memberTransaction
            ];
        }
        $buku = $this->bootcampRepository->detail($bukuID);

        $buku->ppn = 0.11 * $buku->harga;
        $buku->total = $buku->ppn + $buku->harga;
        return [
            'checkkout' => false,
            'buku' => $buku
        ];
    }
}
