<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactForm extends Component
{
    public $name;
    public $phone;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:3',
        'phone' => 'required|string|min:10',
        'subject' => 'required|string',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate($this->rules);

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.michcvdev.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testing@michcvdev.com';
            $mail->Password = 'yI!TRH{7dQzI';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('testing@michcvdev.com', 'Formulario de Contacto');
            $mail->addAddress('mikeed1998@gmail.com');

            $html = view('emails.contact', [
                'name' => $this->name,
                'phone' => $this->phone,
                'subject' => $this->subject,
                'message' => $this->message
            ])->render();

            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            // $mail->Body = "<p><strong>Nombre:</strong> {$this->name}</p><p><strong>Teléfono:</strong> {$this->phone}</p>";
            $mail->Body = $html;

            $mail->send();
            
            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => 'Correo enviado correctamente.'
            ]);

            $this->reset();
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo
            ]);
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules);
    }

}
