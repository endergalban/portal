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
    public function __construct($compra,$vendedor)
    {
        $this->compra = $compra;
        $this->vendedor = $vendedor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->compra->descripcion;
        return  $this->markdown('mail.compra')->with([
                    'descripcion' => $this->compra->descripcion,
                    'cantidad' => $this->compra->cantidad,
                    'monto' => $this->compra->monto,
                    'vendedor' =>  $this->vendedor->name.' '.$this->vendedor->lastname,
                    'email' => $this->vendedor->email,
                    'telefono' => $this->vendedor->telefono,
                ]);
    }
}
