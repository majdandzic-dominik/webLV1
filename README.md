# webLV1

Zadatak 1:
Napraviti klasu DiplomskiRadovi u PHP-u. Klasa mora implementirati interfejs iRadovi (koje će imati
metode create, save i read) što znači da klasa mora imate navedene metode. Primjer interfejsa imate u
predavanju 1 u skripti User.php. Klasa DiplomskiRadovi će imati varijable naziv_rada, tekst_rada,
link_rada i oib_tvrtke. Pomoću socket-a ili cURL-a se trebate spojiti na stranicu
https://stup.ferit.hr/index.php/zavrsni-radovi/page/$redni_broj/
gdje $redni_broj ide od 2 do 6. Na primjer spajate se na:
https://stup.ferit.hr/index.php/zavrsni-radovi/page/2
Stranica će Vam kao rezultat vratiti HTML kod u kojem se nalaze podaci potrebni za stvaranje objekta
klase DiplomskiRadovi. Primjer koda u kojem se nalaze potrebne informacije:
Stvoriti novi objekt klase DiplomskiRadovi i u njega spremiti podatke koje dohvatite sa stranice pomoću
metode create. Možete napraviti vlastiti parser za HTML ili korisiti postojeći
(http://simplehtmldom.sourceforge.net/).
<img width="320" height="202" src="https://stup.ferit.hr/wpcontent/uploads/2016/11/08393361027.png" class="attachment-blog-medium size-blog-medium wppost-image" alt="" srcset="https://stup.ferit.hr/wp-content/uploads/2016/11/08393361027-200x126.png
200w, https://stup.etfos.hr/wp-content/uploads/2016/11/08393361027-300x189.png 300w,
https://stup.ferit.hr/wp-content/uploads/2016/11/08393361027.png 320w" sizes="(max-width: 320px)
100vw, 320px" />
Crveni brojevi u gornjem primjeru su oib tvrtke.
<a href="https://stup.ferit.hr/index.php/2016/12/28/tehnologija-rada-pod-naponom-na-niskonaponskimpostrojenjima-u-republici-hrvatskoj/"> Tehnologija rada pod naponom na niskonaponskim postrojenjima
u Republici Hrvatskoj </a>
Crveni brojevi u gornjem primjeru je link rada. Plavi tekst je naslov rada, a tekst rada može se saznati na
linku rada.
