<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ThemedResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $resetUrl = $this->resetUrl($notifiable);
        $passwordBroker = (string) config('auth.defaults.passwords', 'users');
        $expireMinutes = (int) config("auth.passwords.{$passwordBroker}.expire", 60);

        return (new MailMessage)
            ->subject('Reset Password Akun Festival Kuliner Ngawi Timur')
            ->view('emails.auth.reset-password', [
                'resetUrl' => $resetUrl,
                'homeUrl' => route('home'),
                'userName' => $notifiable->name,
                'expireMinutes' => $expireMinutes,
                'appName' => (string) config('app.name', 'Festival Kuliner Ngawi Timur'),
            ]);
    }
}
