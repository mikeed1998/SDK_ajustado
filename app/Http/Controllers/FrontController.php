<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectImages;
use App\ProjectTechnologies;
use App\Configuration;
use App\Seccion;
use App\Elemento;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FrontController extends Controller
{
    public function home()
    {
        $projects = Project::all();

        return view('front.home', compact('projects'));
    }

    public function admin() {
        return view('front.admin');
    }

    public function about()
    {
        return view('front.about');
    }

    public function experience()
    {
        return view('front.experience');
    }

    public function my_cv()
    {
        return view('front.my_cv');
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function contact()
    {
        return view('front.contact');
    }
    
    public function formularioContactoTest()
    {

    }

    public function formularioContacto(Request $request)
    {
        // Reglas de validación
        $rules = [
            'name' => 'required|string|min:3',
            'phone' => 'required|string|min:10|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ];

        // Mensajes personalizados opcionales
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.min' => 'El teléfono debe tener al menos 10 caracteres.',
            'phone.max' => 'El teléfono no puede tener más de 15 caracteres.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.max' => 'El asunto no puede exceder los 255 caracteres.',
            'message.required' => 'El mensaje es obligatorio.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
        ];

        // Validar los datos
        $validatedData = $request->validate($rules, $messages);

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.michcvdev.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'testing@michcvdev.com';
            $mail->Password = 'yI!TRH{7dQzI';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Configuración del correo
            $mail->setFrom('testing@michcvdev.com', 'Formulario de Contacto');
            $mail->addAddress('mikeed1998@gmail.com');

            // Cargar vista del correo con los datos validados
            $html = view('emails.contact', [
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
            ])->render();

            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $html;

            // Enviar el correo
            $mail->send();

            return response()->json(['type' => 'success', 'message' => 'Correo enviado correctamente.']);
        } catch (Exception $e) {
            return response()->json(['type' => 'error', 'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo]);
        }
    }

    public function validarCampo(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3',
            'phone' => 'required|string|min:10|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ];

        $validator = \Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        return response()->json(['success' => true]);
    }

    
}
