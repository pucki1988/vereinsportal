@component('mail::message')
# Einladung zum Verein

Du wurdest eingeladen, dich als Vereinsverwalter zu registrieren.

<p>Nimm die Einladung über folgenden Button an</p>
@component('mail::button', ['url' => $url])
Einladung annehmen
@endcomponent

## ODER

<p>Gib den Einladungscode selbst ein</p>
@component('mail::button', ['url' => $base_url])
Einladungscode selber eingeben
@endcomponent
<p>Einladungscode <b>{{ $invitation->token }}</b></p>


Diese Einladung läuft am {{ $invitation->expires_at->format('d.m.Y') }} ab.

@endcomponent