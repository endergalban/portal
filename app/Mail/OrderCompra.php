<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Compra;

class OrderCompra extends Mailable
{
    use Queueable, SerializesModels;

    protected $compra;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Compra $compra)
    {
        $this->compra = $compra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.compra')
                ->with([
                    'descripcion' => $this->compra->descripcion,
                    'cantidad' => $this->compra->cantidad,
                    'monto' => $this->compra->monto,
                ]);
    }
}
