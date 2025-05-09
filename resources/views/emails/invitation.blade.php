@component('mail::message')
# Einladung zum Verein

Du wurdest eingeladen, dich als Vereinsverwalter zu registrieren.

@component('mail::button', ['url' => $url])
Registrieren
@endcomponent

Diese Einladung läuft am {{ $invitation->expires_at->format('d.m.Y') }} ab.

@endcomponent