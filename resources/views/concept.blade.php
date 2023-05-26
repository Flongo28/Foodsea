@extends('layouts/app')

@section('title')
Concept
@endsection

@section('content')
    @component('components/card')
        <h1 class="blog-post-title">Konzept</h1>

        <h2 class="blog-post-title">Anforderungen</h2>
        <ul>
            <li>Es sollte eine Suchzeile geben, um nach Rezepten zu suchen</li>
            <ul>
                <li>Zutatensuche</li>
                <li>Kochzeitensuche</li>
                <li>Kategoriesuche</li>
                <li>Herausfiltern von Premiumrezepten</li>
            </ul>
            <li>Weiterleitung zu den Suchergebnissen</li>
            <li>Bildvorschau der Rezepte</li>
        </ul>

        <h2 class="blog-post-title">Erweiterungen</h2>
        <ul>
            <li>Ladeanzeigen</li>
            <li>Erhöhung der Geschwindigkeit</li>
            <li>Kontinuierliches Laden der Rezepte</li>
            <li>Erstellen eines Benutzerkontos</li>
            <li>Erstellen von Favoritenlisten</li>
            <li>Anpassung des Designs an das Mock Up</li>
            <li>Durchsuchen der Kategorien</li>
            <li>Implementierung eines double Sliders mit noUiSlider</li>
        </ul>

        <h2 class="blog-post-title">Mock Up</h2>
        <img src="{{ asset('img/concept.png') }}" alt="Mock Up" width="100%">

        <h2 class="blog-post-title">Technologien</h2>
        <ul>
            <li>Laravel</li>
            <ul>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>Composer</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>Bootstrap</li>
                <li>Blade</li>
            </ul>
            <li>node</li>
            <li>MySQL</li>
            <li>Livewire</li>
            <li>cURL</li>
            <li>noUi</li>
        </ul>

        <h2 class="blog-post-title">Verifikation und Validierung</h2>

        <h3 class="blog-post-title">Versuche mit der Chefkoch API</h3>
        Rezepte werden erfolgreich von der Chefkoch API Seite geladen und angezeigt. Das Laden wird mit PHP und cURL gemacht. 
        Der Ansatz mit der API für PHP ist Fehlgeschlagen aufgrund von Schnittstellenänderungen der Seite, welche von der API verwendet werden.
        Zudem ist der Ansatz mit der node API verworfen worden, aufgrund von großen Ladezeiten und Parsing Problemen mit der API.
        
        <h3 class="blog-post-title">Laden der Rezepte</h3>
        Die Rezepte werden erfolgreich angezeigt und die Bilder für diese durch Chefkoch in die richtige Größe skaliert.
        Dabei werden 100 Rezepte bei jeder Suche geladen und Herausfiltert, falls diese nicht den Anforderungen entsprechen.
        Im vorhinein können durch die API bereits die Kategorien gefiltert werden, um die Anzahl der Rezepte zu verringern.
        Außerdem können Premiumrezepte im vorhinein herausgefiltert werden.

        <h4 class="blog-post-title">Kopieren der Datenbank</h4>
        Die Datenbank wurde erfolgreich kopiert und in eine lokale Datenbank gespeichert. Die Daten wurden über einen WebCrawler gesammelt
        und ausgelesen. Da die Datenbank sehr groß ist, wurde nur ein Teil der Datenbank kopiert. Außerdem mussten Mechanismen eingebaut werden,
        um bei einen Abbruch des Crawlers die Datenbank nicht zu beschädigen und an der richtigen Stelle weiterzumachen. Damit kann eine 
        hohe Anzahl an Rezepten geladen werden, ohne die API zu überlasten. 

        <h3 class="blog-post-title">UI Verbesserungen</h3>
        Um die UI zu verbessern, wurde ein double Slider mit noUiSlider implementiert, um die Kochzeit zu filtern. Außerdem wurde
        die Kategorieliste so sortiert, dass sie sich nur ausklappt, wenn die überliegende Kategorie ausgewählt wurde. 
        Es ist möglich nach Kateogien zu suchen in einer Suchleiste. Die Kategorien werden dann dynamisch geladen und angezeigt.

        <h3 class="blog-post-title">Benutzerkonto</h3>
        Das Benutzerkonto wurde implementiert. Es werden die Standard Sicherheits Features von Laravel verwendet.
        Es ist möglich sich zu registrieren, sich anzumelden und sich abzumelden. Die Passwörter werden verschlüsselt gespeichert.
        Die Benutzerkonten werden in einer Datenbank gespeichert. Für einige Funktionen ist ein Benutzerkonto notwendig wie z.B. die Favoritenliste.

        <h3 class="blog-post-title">Favoritenlisten</h3>
        Die Favoritenliste wurde implementiert. Es ist möglich Rezepte zu favorisieren und diese in einer Favoritenliste zu speichern.
        Zudem ist es möglich die Favoritenliste zu löschen. Die Favoritenliste wird in einer Datenbank gespeichert. Für diese Funktion ist ein Benutzerkonto notwendig.

        <h3 class="blog-post-title">Design</h3>
        Das Design wurde mit einen eigenen Stylesheet und Bootstrap umgesetzt. Die Farben wurden aus dem Mock Up übernommen.
        Die Schriftart konnte nicht übernommen werden, da die Google API nicht die Namen der Schriftarten angegeben hat. 
        Daher wurde eine ähnliche Schriftart verwendet. Es wurde ein Logo erstellt und verwendet.

        <h3 class="blog-post-title">Performance</h3>
        Eine Suche dauert aktuell maximal ca. 60 Sekunden. Die API hat eine Drosselung bei vielen Anfragen. Die einzige Möglichkeit für
        eine beschleunigung ist die Anzahl der Rezepte zu verringern, welche geladen werden. Daher ist es eine interessante Idee
        die Rezepte auf eine lokale Datenbank zu speichern und diese zu durchsuchen. Dies würde die Geschwindigkeit erhöhen. Die 
        Geschwindigkeit konnte etwas erhöht werden durch unterscheidungen der Suchkategorien in Vorsuche und Nachsuche. Die Vorsuche
        wird durch die API gemacht und die Nachsuche durch die PHP und benötigt das Laden der Rezeptdetails. Dies ist jedoch nur
        eine kleine Verbesserung.
    
        <h3 class="blog-post-title">Ladeanzeigen</h3>
        Eine Ladeanzeige wurde umgesetzt mit Livewire und zeigt an, wenn die Rezepte geladen werden. Diese ist besonders wichtig,
        wenn neue Rezepte aus der anderen Datenbank geladen werden müssen. Diese Ladeanzeige ist nur für die Suche implementiert.
    @endcomponent
@endsection

@section('scripts')
@endsection