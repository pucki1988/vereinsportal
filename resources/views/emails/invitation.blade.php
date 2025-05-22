@component('mail::message')
# Einladung zum Verein

Du wurdest eingeladen, dich als Vereinsverwalter zu registrieren.

<p>Nimm die Einladung über folgenden Button an</p>
@component('mail::button', ['url' => $url])
Einladung annehmen
@endcomponent

<p><b>ODER</b></p>

<p>Gib den Einladungscode selbst ein</p>
@component('mail::button', ['url' => $base_url])
Einladungscode selber eingeben
@endcomponent
<p>Einladungscode <b class="bg-info-content text-base-100 p-2">{{ $invitation->token }}</b></p>


Diese Einladung läuft am {{ $invitation->expires_at->format('d.m.Y') }} ab.

@endcomponent