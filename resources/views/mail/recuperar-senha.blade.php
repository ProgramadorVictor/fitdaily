@component('mail::message')
# Recuperação de Senha

Recebemos um pedido para redefinir sua senha. Se você fez essa solicitação, por favor, clique no botão abaixo para criar uma nova senha. Caso contrário, você pode ignorar este email.

@component('mail::button', ['url' => $url])
Redefinir Minha Senha
@endcomponent

Agradecemos pela sua atenção!<br>
{{ config('app.name') }}
@endcomponent
