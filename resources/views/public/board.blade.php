@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    

<div class="py-6 px-4 max-w-7xl mx-auto">
        



        <div class="text-xl lg:text-3xl py-2">Vorstandschaft</div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3 mb-6">
        @foreach($members as $member)
        <div class="card text-base-100 w-full bg-info-content">
            <div class="card-body flex justify-between">
                <div class="badge bg-base-100">{{$member->position}}</div>
                <h2 class="card-title">{{$member->name}}</h2>
                
                <div class="card-actions justify-end">
                
                
                
                </div>
            </div>
        </div>
        @endforeach
        </div>

        <div class="text-xl lg:text-3xl py-2 mt-6">Satzung</div>

        <div tabindex="0" class="collapse bg-base-100 border-base-300 border">
        <div class="collapse-title font-semibold">Satzung für den Verein „Pro  Schönbrunn am Lusen“</div>
        <div class="collapse-content text-sm">
        <span class="badge bg-info-content text-base-100 my-2">§1 Name, Sitz, Geschäftsjahr</span>
<p>
Der Verein führt den Namen Pro Schönbrunn am Lusen  nach der beabsichtigten Eintragung in das Vereinsregister mit dem Zusatz “e. V.”.
Der Sitz des Vereins ist in der Gemeinde Hohenau, Ortsteil Schönbrunn am Lusen
Geschäftsjahr ist das Kalenderjahr.</p>
<span class="badge bg-info-content text-base-100 my-2">§ 2 Zweck</span>
<p>
Zweck des Vereins ist Organisation und Durchführung von Aktionen im Bereich Schönbrunn am Lusen, soweit erforderlich auch darüber hinaus.
Der Verein ist selbstlos tätig; er verfolgt nicht in erster Linie eigenwirtschaftliche Zwecke.
Mittel des Vereins werden nach einem jeweils durch die Mitgliederversammlung festzulegenden Schlüssel auf die Vereine innerhalb Schönbrunn am Lusen verteilt. Die Entscheidung der Mitgliederversammlung ist endgültig.
Die Mitglieder des Vereins erhalten keine Gewinnanteile und in ihrer Eigenschaft als Mitglieder auch keine sonstigen Zuwendungen aus Mitteln des Vereins.
Es darf keine Person durch Ausgaben, die dem Zweck des Vereins fremd sind, oder durch unverhältnismäßig hohe Vergütungen begünstigt werden.
</p>
<span class="badge bg-info-content text-base-100 my-2">§ 3 Mitgliedschaft</span>
<p>
<ul>
<li> 1. Mitglied des Vereins kann jede natürliche Person werden, die Mitglied in einer Vorstandschaft oder eines ähnlichen Gremiums eines Vereins oder Zusammenschlusses innerhalb Schönbrunn am Lusen ist. Je Verein dürfen nur zwei Personen die Mitgliedschaft mit Stimmrecht erwerben. Natürliche Personen können als beratende Mitglieder, ohne Stimmrecht in den Verein aufgenommen werden.</li>
<li> 2. Der Aufnahmeantrag ist schriftlich zu stellen. Darüber entscheidet die Mitgliederversammlung.Ein Anspruch auf Mitgliedschaft besteht nicht, die Ablehnung eines Aufnahmegesuchs muss nicht begründet werden.</li>

<li> 3.Die Mitgliedschaft endet
<ul>
<li> a) mit dem Tod des Mitglieds,</li>

<li> b) mit dem Ende des Vorstandsamtes bei einem Verein in Schönbrunn am Lusen</li>

<li> c) durch Austritt,</li>

<li> d) durch Ausschluss aus dem Verein.</li>
</ul>
</ul>
</p>
<p>
Der Austritt muss schriftlich gegenüber einem Vorstandsmitglied erklärt werden. Dieser ist mit Eingang der Erklärung gültig, soweit keine Verbindlichkeiten vorhanden sind. Ein Mitglied kann aus dem Verein ausgeschlossen werden, wenn es in schwerwiegender Weise gegen die Interessen des Vereins verstoßen hat.

Über den Ausschluss entscheidet auf Antrag des Vorstands die Mitgliederversammlung mit 2/3-Mehrheit. Der Vorstand hat dem betroffenen Mitglied mindestens zwei Wochen vor der Mitgliederversammlung den Ausschließungsantrag mit Begründung in Abschrift zu übersenden. Eine schriftliche Stellungnahme des betroffenen Mitglieds ist der Mitgliederversammlung durch deren Verlesung zur Kenntnis zu bringen.

Der Ausschließungsbeschluss wird dem Mitglied durch den Vorstand schriftlich mitgeteilt und wird mit dem Zugang wirksam.

Bei Beendigung der Mitgliedschaft besteht kein Anspruch auf einen Anteil am Vereinsvermögen.
</p>
<span class="badge bg-info-content text-base-100 my-2">§ 4 Mitgliedsbeiträge</span>
<p>
1. Die Mitglieder zahlen Mitgliedsbeiträge, über deren Höhe und Fälligkeit die Mitgliederversammlung  entscheidet.
</p>
 

<span class="badge bg-info-content text-base-100 my-2">§ 5 Organe</span>
<p>
Organe des Vereins sind
</p>
<ul>
<li>1.       der Vorstand,</li>

<li>2.       die Mitgliederversammlung.</li>
</ul>
<p>
Die Mitgliederversammlung kann die Bildung weiterer Vereinsorgane oder Gremien beschließen.
</p>
<span class="badge bg-info-content text-base-100 my-2">§ 6 Vorstand</span>
<ul>
<li>1.       Der Vorstand besteht aus dem Vorsitzenden, einem stellvertretenden Vorsitzenden, dem Schriftführer und  einem Kassenverwalter.</li>

<li>2.       Der Vorsitzende und der stellvertretende Vorsitzende bilden den Vorstand im Sinn von § 26 BGB (Vertretungsvorstand). Der Verein wird gerichtlich und außergerichtlich allein durch den Vorsitzenden,  oder den stellvertretenden Vorsitzenden vertreten. Im Innenverhältnis wird geregelt, daß der stellvertretende Vorsitzende nur bei Verhinderung des Vorsitzenden tätig wird.</li>

<li>3.       Der Vorstand, der Schriftführer und Kassier werden  von der Mitgliederversammlung für die Dauer von zwei Jahren gewählt. Bis zu einer Neuwahl bleibt der Vorstand im Amt. Scheidet ein Mitglied während der Amtszeit aus, kann die Mitgliederversammlung  ein Ersatzmitglied für die restliche Amtsdauer des Ausgeschiedenen wählen.</li>

<li>4.       Der Vorstand führt die Geschäfte des Vereins und erledigt alle Verwaltungsaufgaben, soweit sie nicht durch die Satzung oder Gesetz einem anderen Vereinsorgan zugewiesen sind. Er hat insbesondere folgende Aufgaben:
<ul>
<li>a.       Die Ausführung der Beschlüsse der Mitgliederversammlung.</li>

<li>b.       Die Einberufung und Vorbereitung der Mitgliederversammlung. Die Leitung der Mitgliederversammlung durch den Vorsitzenden oder einen der stellvertretenden Vorsitzenden. </li>

<li>c.       Abschluss und Kündigung von Arbeitsverträgen.</li>
</ul></li>
<li>
5.       Der Vorstand ist in seinen Sitzungen beschlussfähig, wenn alle Mitglieder eingeladen und mindestens drei Mitglieder, darunter der Vorsitzende oder ein stellvertretender Vorsitzender, anwesend sind.
</li>
</ul>
<p>
Die Einladung erfolgt schriftlich durch den Vorsitzenden oder bei dessen Verhinderung durch den stellvertretenden Vorsitzenden spätestens eine Woche vor der Sitzung. Der Vorstand beschließt mit einfacher Mehrheit der abgegebenen gültigen Stimmen. Bei Stimmengleichheit entscheidet die Stimme des Vorsitzenden oder bei dessen Abwesenheit die des stellvertretenden Vorsitzenden.

Die Beschlüsse sind zu protokollieren und vom Sitzungsleiter zu unterschreiben. Die Eintragungen müssen enthalten:
</p>
<ul>
<li>–         Ort und Zeit der Sitzung,</li>

<li>–         die Namen der Teilnehmer und des Sitzungsleiters,</li>

<li>–         die gefassten Beschlüsse und die Abstimmungsergebnisse.</li>
</ul>
<p>Die Kasse wird durch den Kassenverwalter geführt .</p>

<span class="badge bg-info-content text-base-100 my-2">§ 7  Mitgliederversammlung</span>
<ul>
<li>1.       Die Mitgliederversammlung ist zuständig für alle Aufgaben, soweit sie nicht dem Vorstand oder anderen Vereinsorganen obliegen. Sie ist ausschließlich zuständig für folgende Angelegenheiten:
<ul>
<li>a.       Vorbereitung und Durchführung aller Aktionen ,</li>

<li>b.       Entgegennahme des Jahresberichts des Vorstands, des Rechnungsprüfungsberichts der Kassenverwalter, Entlastung des Vorstands,</li>

<li>c.       Festsetzung der Höhe und Fälligkeit des Mitgliedsbeitrags bzw. finanzielle Leistungen durch Vereine</li>

<li>d.       Verteilung der Finanzmittel zwischen den Vereinen in Schönbrunn am Lusen (soweit diese auch im Verein Pro Schönbrunn am Lusen  vertreten sind).</li>

<li>e.       Wahl und Abberufung der Mitglieder des Vorstands,</li>

<li>f.         Änderung der Satzung ,</li>

<li>g.       Auflösung des Vereins,</li>

<li>h.       Entscheidung über die Beschwerde gegen die Ablehnung eines Aufnahmeantrags,</li>

<li>i.         Ausschluss eines Vereinsmitglieds,</li>

<li>j.         Durchführung von Ehrungen. Dazu wird durch die Mitgliederversammlung eine Ehrenordnung beschlossen.</li>
</ul>
</li>
 

<li>2.       Die Mitgliederversammlung wird vom Vorsitzenden oder bei Verhinderung durch  seinem stellvertretenden Vorsitzenden schriftlich unter Einhaltung einer Frist von mindestens zwei Wochen unter Angabe der Tagesordnung einberufen. Wenn Eile geboten ist kann die Frist verkürzt werden.</li>

<li>3.       Jede ordnungsgemäß geladene Mitgliederversammlung ist beschlussfähig, wenn der Vorsitzende oder im Verhinderungsfalle der Stellvertretende Vorsitzende und mindestens 3 weitere stimmberechtigte Mitglieder anwesend sind.</li>

<li>4.       Jedes stimmberechtigte und nichtstimmberechtigte Mitglied kann bis spätestens eine Woche vor Beginn der Mitgliederversammlung schriftlich die Ergänzung der Tagesordnung verlangen.</li>

<li>5.       Jedes ordentliche Mitglied hat eine Stimme. Stimmübertragungen sind nicht zulässig.</li>

<li>6.        Beschlüsse werden mit einfacher Mehrheit der abgegebenen gültigen Stimmen gefasst. Stimmenthaltungen  werden nicht mitgezählt.</li>

<li>7.       Die Mitgliederversammlung wird vom Vorsitzenden, bei dessen Verhinderung vom stellvertretenden Vorsitzenden, bei dessen Verhinderung von einem anderen Mitglied der Mitgliederversammlung  geleitet.</li>

<li>8.       Für die Dauer der Durchführung von Vorstandswahlen wählt die Mitgliederversammlung einen Wahlausschuss.</li>

<li>9.        Für Satzungsänderungen ist eine 3/4-Mehrheit der abgegebenen gültigen Stimmen, für die Änderung des Vereinszwecks und die Auflösung des Vereins ist eine solche von 4/5 erforderlich.</li>

<li>10.   Die Mitglieder des Vorstands werden einzeln gewählt, zuerst der Vorsitzende, dann der stellvertretende Vorsitzende und zuletzt die übrigen Mitglieder.</li>

<li>11.   Es gilt der Kandidat als gewählt, der mehr als die Hälfte der abgegebenen gültigen Stimmen erhalten hat. Ist diese Stimmenzahl nicht erreicht worden, findet im zweiten Wahlgang eine Stichwahl zwischen den beiden Kandidaten statt, die die meisten Stimmen erhalten haben. Bei Stimmengleichheit entscheidet der Versammlungsleiter durch Ziehung eines Loses.</li>

<li>12.   Das Versammlungsprotokoll ist vom Versammlungsleiter und dem Protokollführer zu unterzeichnen. Es muss enthalten:
<ul>
<li>a)       Ort und Zeit der Versammlung</li>

<li>b)       Name des Versammlungsleiters und des Protokollführers</li>

<li>c)       Anwesenheitsliste (beifügen)</li>

<li>d)       Feststellung der ordnungsgemäßen Einberufung und Beschlußfähigkeit</li>

<li>e)       die Einladung mit Tagesordnung (beifügen)</li>

<li>f)         die gestellten Anträge, das Abstimmungsergebnis (Zahl der Ja-Stimmen, Zahl der Nein-Stimmen, Enthaltungen, ungültigen Stimmen), die Art der Abstimmung</li>

<li>g)       Satzungs- und Zweckänderungsanträge</li>

<li>h)       Beschlüsse, die wörtlich aufzunehmen sind</li>
</ul></li>
</ul>
 

<span class="badge bg-info-content text-base-100 my-2">§ 8 Kassenprüfer</span>
<p>
Die Mitgliederversammlung wählt aus dem Kreis der stimmberechtigten Mitglieder zwei Kassenprüfer für eine Amtsdauer von zwei Jahren. Wahlberechtigt sind nur Mitglieder, die nicht dem Vorstand angehören.

Den Kassenprüfern obliegt die Prüfung aller Kassen des Vereins. Die Kassenprüfer sind zur umfassenden Prüfung der Kasse einschließlich des Belegwesens in sachlicher und rechnerischer Hinsicht berechtigt und verpflichtet. Prüfungsberichte sind in der Mitgliederversammlung vorzulegen und vorzutragen.

Bei festgestellten Beanstandungen ist zuvor der Vorstand zu unterrichten.
</p>
<span class="badge bg-info-content text-base-100 my-2">§ 9 Auflösung des Vereins</span>
<p>
Die Auflösung des Vereins kann nur in einer Mitgliederversammlung mit der in § 7 geregelten Stimmenmehrheit beschlossen werden. Sofern die Mitgliederversammlung nichts anderes beschließt, sind die Vorsitzenden und die stellvertretenden Vorsitzenden gemeinsam vertretungsberechtigte Liquidatoren. Die vorstehenden Vorschriften gelten entsprechend für den Fall, dass der Verein aus einem anderen Grund aufgelöst wird oder seine Rechtsfähigkeit verliert.

Bei Wegfall des Vereinswecks fällt das Vermögen des Vereins an die Vereine im Bereich von Schönbrunn am Lusen, soweit der jeweilige Verein im   Verein „Pro Schönbrunn am Lusen vertreten ist, zur Verwendung für Angelegenheiten die die jeweilige Vereinssatzung regelt.
</p>
<p>
Schönbrunn am Lusen, den 13.April 2002
</p>
        </div>
        </div>
</div>

</x-app-layout>