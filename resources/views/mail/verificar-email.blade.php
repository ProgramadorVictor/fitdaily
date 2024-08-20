@component('mail::message')
# Verificação de Email

Recebemos um pedido para verificar seu endereço de email. Se você fez essa solicitação, por favor, clique no botão abaixo para confirmar sua conta. Caso contrário, você pode ignorar este email.

@component('mail::button', ['url' => $url])
Verificar Meu Email
@endcomponent

Agradecemos pela sua atenção!<br>
{{ config('app.name') }}
@endcomponent
