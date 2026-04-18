<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body style="margin:0;padding:0;background-color:#061527;font-family:'Segoe UI',Tahoma,Arial,sans-serif;color:#e2e8f0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#061527;padding:24px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px;background:linear-gradient(150deg,#071a33 0%,#0a2345 50%,#08172d 100%);border:1px solid #274873;border-radius:18px;overflow:hidden;">
                <tr>
                    <td style="padding:28px 28px 0 28px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="width:48px;vertical-align:top;">
                                    <div style="height:40px;width:40px;border-radius:10px;background:#e11d48;color:#ffffff;font-size:20px;font-weight:700;line-height:40px;text-align:center;">F</div>
                                </td>
                                <td style="vertical-align:middle;">
                                    <div style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#94a3b8;">Festival Kuliner</div>
                                    <div style="font-size:21px;font-weight:800;color:#f8fafc;line-height:1.2;margin-top:4px;">Ngawi Timur</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:24px 28px 0 28px;">
                        <div style="display:inline-block;padding:6px 12px;border:1px solid #375e93;border-radius:999px;background:#0b213f;color:#b8c9e2;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">
                            Keamanan Akun
                        </div>
                        <h1 style="margin:16px 0 10px 0;font-size:30px;line-height:1.25;color:#f8fafc;">Permintaan Reset Password</h1>
                        <p style="margin:0;font-size:15px;line-height:1.7;color:#c3d3ea;">
                            Halo {{ $userName }}, kami menerima permintaan untuk mereset password akun {{ $appName }}.
                            Klik tombol di bawah untuk membuat password baru.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #38567e;background:#0b213f;border-radius:14px;">
                            <tr>
                                <td style="padding:20px;">
                                    <div style="font-size:13px;color:#9db3d4;line-height:1.65;">
                                        Link reset berlaku selama <strong style="color:#ffffff;">{{ $expireMinutes }} menit</strong>.
                                        Jika kamu tidak merasa meminta reset password, abaikan email ini.
                                    </div>

                                    <table role="presentation" cellpadding="0" cellspacing="0" style="margin-top:18px;">
                                        <tr>
                                            <td align="center" style="border-radius:10px;background:#e11d48;">
                                                <a href="{{ $resetUrl }}" style="display:inline-block;padding:12px 22px;color:#ffffff;text-decoration:none;font-weight:700;font-size:14px;">
                                                    Reset Password Sekarang
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 28px 24px 28px;">
                        <p style="margin:0 0 10px 0;color:#9fb2ce;font-size:13px;line-height:1.65;">
                            Jika tombol tidak berfungsi, salin dan buka tautan berikut:
                        </p>
                        <p style="margin:0;word-break:break-all;font-size:12px;line-height:1.6;color:#fda4af;">{{ $resetUrl }}</p>
                    </td>
                </tr>

                <tr>
                    <td style="border-top:1px solid #274873;padding:18px 28px 24px 28px;">
                        <p style="margin:0 0 8px 0;font-size:12px;line-height:1.6;color:#8fa4c3;">
                            Email otomatis dari sistem. Mohon tidak membalas email ini.
                        </p>
                        <a href="{{ $homeUrl }}" style="font-size:12px;color:#f43f5e;text-decoration:none;">Buka Website Festival Kuliner</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
