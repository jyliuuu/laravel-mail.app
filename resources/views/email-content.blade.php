@extends('master')
<?php
$x = 1; //0 = not mail template -- 1 = yes mail template = yes navbar gone
?>

@section('content')
    {{-- <h1>Subject: <strong>{{ $details['title'] }}.</strong></h1> --}}
    {{-- <p>Hello,</p> --}}
    {{-- @isset($details['reasoning']) --}}
    {{-- @if (is_null($details['reasoning'])) --}}
    {{-- <br> --}}
    {{-- @else --}}
    {{-- <p>I decided to write an email to you because I wanted to <strong>{{ $details['reasoning'] }}.</strong></p> --}}
    {{-- @endif --}}
    {{-- @endisset --}}
    {{-- <p>{{ $details['message'] }}.</p> --}}
    {{-- <br> --}}
    {{-- <p>It will be helpful if you give me a response soon.</p> --}}
    {{-- <br> --}}
    {{-- <p>Kind regards,<br> --}}
    {{-- {{ $details['name'] }}<br> --}}
    {{-- <strong>Sent from Laravel Email App by jyliu</strong></p> --}}

    <h1 class="title">Werkopdracht voor <span class="recipient">Vereniging van Eigenaars van het flatgebouw
            Ierlandstraat 103 tot en met 197 (oneven nummers)</span> te <span class="location">Haarlem</span></h1>

    <p class="greet">Geachte heer / mevrouw,</p>

    <p class="summary">Voor de VvE Vereniging van Eigenaars van het flatgebouw Ierlandstraat 103 tot en met 197
        (oneven nummers) te Haarlem is op een reparatieverzoek ingediend. Hieronder volgt de informatie van het
        reparatieverzoek en werkopdracht.</p>

    <h1>
        Melder en contactinformatie
    </h1>
    <br>
    <br>
    <p>
        Dit reparatieverzoek is gemeld door:
    </p>
    <br>
    <p>
        Naam:
        <span class="name">
            I.E.M. van den Berg
        </span>
    </p>
    <p>
        E-mailadres:
        <span class="mail">
            iemvdberg@planet.nl
        </span>
    </p>
    <p>
        Contactadres:
        <span class="contact-address">
            Ierlandstraat 145, 2034LM Haarlem
        </span>
    </p>
    <p>
        Telefoonnummer:
        <span class="tel">
            0651361204
        </span>
    </p>
    <br>
    <h1>
        Werkopdracht informatie
    </h1>

    <p>
        Referentiecode:
        <span class="ref">
            Ierl-3656
        </span>
    </p>

    <p>
        Aanmaakdatum:
        <span class="creation-date">
            21-9-21
        </span>
    </p>

    <p>
        Urgentie:
        <span class="urgency">
            Dringend: Repareren binnen 5 werkdagen
        </span>
    </p>

    <p>
        Maximaal factuurbedrag:
        <span class="max-price">
            € 500.00 inclusief BTW
        </span>
    </p>
    <br>
    <p>
        Bij overschrijding van het maximaal factuurbedrag eerst een offerte indienen op vvebeheer@vanroemburg.info
    </p>
    <br>
    <p>
        Omschrijving:
        <span class="description">
            Graffititag verwijderen foto reeds gedeeld. svp foto nemen van verwijderde tag en terugkoppelen wanneer de
            werkzaamheden zijn uitgevoerd.

            Contact opnemen met de melder en afspraak inplannen om de benodigde reparaties uit te voeren.
            Correspondentie en/of factuur dient u onder vermelding van opdrachtnummer 3656 te richten aan:

            VvE Ierlandstraat 103-197 (oneven nummers)
            Ierlandstraat 145
            2034LM Haarlem
        </span>

    </p>
    <br>
    <p class="contacting">
        Facturen dienen digitaal aangeboden te worden in PDF formaat op mail adres: financieel@vanroemburg.info, of direct
        geplaatst op VvE-Dashboard:

        http://vanroemburg.vve-dashboard.nl/

        Opdracht afmelden alleen via internet op bovenstaand adres. U kunt hier tevens uw notities kwijt aangaande de
        voortgang en afhandeling van deze opdracht.

        Facturen met een onjuiste adressering en/of omschrijving worden niet in behandeling genomen.
    </p>

    <p>
        Gegevensbescherming
        De persoonsgegevens behorende bij de verstrekte opdracht worden door Van Roemburg VvE-Beheer gedeeld met u / uw
        onderneming ten behoeve van het uitvoeren van deze opdracht.
        Met het aanvaarden van deze opdracht bevestigt u dat de persoonsgegevens door u / uw onderneming
        worden verwerkt overeenkomstig de bepalingen uit de Algemene Verordening Gegevensbescherming (AVG).
        Dit houdt o.a. in dat u de gegevens geheim houdt, niet deelt met een derde zonder onze voorafgaande
        toestemming en verwijdert indien de gegevens niet langer nodig zijn voor het doel van de opdracht en de
        administratieve verwerking. Bij verlies of onrechtmatig gebruik van de persoonsgegevens (datalek) dient u
        binnen 24 uur na ontdekking hiervan melding te maken via beheer@vanroemburg.info.
    </p>

@endsection
