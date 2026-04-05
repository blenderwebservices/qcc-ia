<!DOCTYPE html>
<html>
<head>
    <title>Recordatorio de Contraseña - QCC</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <div style="max-w: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eaeaea; border-radius: 8px;">
        <h2 style="color: #4f46e5;">QCC - Recordatorio de Contraseña</h2>
        <p>Hola,</p>
        <p>Has solicitado el recordatorio de la contraseña para acceder a la verificación del certificado asociado a tu ROC: <strong>{{ $certificate->roc }}</strong>.</p>
        <p style="padding: 15px; background-color: #f3f4f6; border-radius: 6px; font-size: 18px;">
            Tu contraseña de acceso es: <strong>{{ $certificate->access_password }}</strong>
        </p>
        <p>Puedes acceder a la plataforma de verificación desde el siguiente enlace:</p>
        <p>
            <a href="{{ route('certificates.index') }}" style="display: inline-block; padding: 10px 20px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                Ir a Verificación QCC
            </a>
        </p>
        <hr style="border: 0; border-top: 1px solid #eaeaea; margin: 30px 0;">
        <p style="font-size: 12px; color: #888;">
            Si no has solicitado este recordatorio, puedes ignorar este correo.
        </p>
    </div>
</body>
</html>
