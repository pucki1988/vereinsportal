@component('mail::message')
# Einladung zum Verein

Du wurdest eingeladen, dich als Vereinsverwalter zu registrieren.

<p>Registriere dich über folgenden Button</p>
@component('mail::button', ['url' => $url])
Registrieren
@endcomponent

<p>oder alternativ durch manuell eingabe des Token.</p>
@component('mail::button', ['url' => $base_url])
Manuelle Eingabe
@endcomponent

<p>Einladungscode: <b>{{ $invitation->token }}</b></p>


Diese Einladung läuft am {{ $invitation->expires_at->format('d.m.Y') }} ab.

@endcomponent