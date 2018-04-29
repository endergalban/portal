<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    protected $datos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->contacto->descripcion;
        return  $this->markdown('mail.contacto')->with([
                    'nombre' => $this->contacto->nombre,
                    'email' => $this->contacto->email,
                    'asunto' => $this->contacto->asunto,
                    'mensaje' => $this->contacto->mensaje,
                ]);
    }
}
