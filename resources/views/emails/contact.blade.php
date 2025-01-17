<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f8f8; color: #333;">
    <table align="center" width="600" style="border-collapse: collapse; background-color: #ffffff; margin: 20px auto; border: 1px solid #ddd;">
        <tr>
            <td style="background-color: #6a0dad; padding: 20px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px;">Nuevo Mensaje de Contacto</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="margin: 0 0 10px; font-size: 16px; line-height: 1.5;">
                    <strong>Nombre:</strong> {{ $name }}
                </p>
                <p style="margin: 0 0 10px; font-size: 16px; line-height: 1.5;">
                    <strong>Asunto:</strong> {{ $subject }}
                </p>
                <p style="margin: 0 0 10px; font-size: 16px; line-height: 1.5;">
                    <strong>Teléfono:</strong> {{ $phone }}
                </p>
                <p style="margin: 0 0 10px; font-size: 16px; line-height: 1.5;">
                    <strong>Mensaje:</strong>
                </p>
                <p style="margin: 0 0 10px; font-size: 14px; line-height: 1.5; color: #555;">
                    {{ $message }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #000; padding: 15px; text-align: center; color: #ffffff;">
                <p style="margin: 0; font-size: 14px;">
                    © 2025 Tu Empresa. Todos los derechos reservados.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
