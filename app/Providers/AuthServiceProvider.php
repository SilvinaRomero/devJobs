<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     * subject -> Asunto de mensaje
     * greeting -> titulo mensaje
     * line -> texto mensaje
     * action -> texto boton
     * salutation -> pie de pagina
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable,$url){
            return (new MailMessage)
            ->subject('Verificar Cuenta')
            ->greeting('Hola')
            ->line("Tu cuenta está casi lista, solo debes presionar el enlace a continuación")
            ->action("Confirmar cuenta",$url)
            ->line("Si no creaste eta cuenta, puedes ignorar este mensaje")
            ->salutation(new HtmlString(
                Lang::get("Saludos.").'<br><strong>'.Lang::get("El equipo de DevJobs").'</strong>'
            ));
        });

        // ResetPassword::toMailUsing(function($notifiable,$url){
        //     // dd($notifiable);
        //     return (new MailMessage)
        //     ->subject('Actualizar Password')
        //     ->greeting('Hola')
        //     ->line("Ha recibido este correo electrónico porque recibimos una solicitud de restablecimiento de la contraseña ")
        //     ->action("Reestablecer contraseña",$url)
        //     ->line("Si no solicitó el reestablecimiento de su contraseña, puedes ignorar este mensaje")
        //     ->salutation(new HtmlString(
        //         Lang::get("Saludos.").'<br><strong>'.Lang::get("El equipo de DevJobs").'</strong>'
        //     ));
        // });
    }
}
