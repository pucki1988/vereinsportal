@component('mail::message')
# Einladung zum Verein {{ $invitation->club->name }}

Du wurdest eingeladen, dich als Vereinsverwalter  für den Verein **{{ $invitation->club->name }}** zu registrieren.

<p>Nimm die Einladung über folgenden Button an</p>
@component('mail::button', ['url' => $url])
Einladung annehmen
@endcomponent

## ODER

<p>Gib den Einladungscode selbst ein</p>
@component('mail::button', ['url' => $base_url])
Einladungscode selber eingeben
@endcomponent

**Einladungscode**
> {{ $invitation->token }}


Diese Einladung läuft am {{ $invitation->expires_at->format('d.m.Y') }} ab.

@endcomponent