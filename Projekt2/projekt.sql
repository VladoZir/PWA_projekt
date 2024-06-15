-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2024 at 10:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(9, 'Admin', 'Admin', 'admin', '$2y$10$JFfll/X1/RbWpyS.VKiHKuK3WzeKPVOd0yOs0b/KfrYlB0PeFWylq', 1),
(11, 'Hrvoje', 'Horvat', 'Hrvoje', '$2y$10$/Jv6zliUONBb6IVOQkQdrusegn26vMmeO8OwGuH8anGYrptfiMosW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(100) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(26, '06.06.2024.', 'Izložba \"Obruč\" Ivana Posavca', 'Razgledajte izložbu \"Obruč\" uz vodstvo autora fotografija Ivana  Posavca.', 'U Galeriji Galženica je početkom svibnja otvorena izložba poznatog hrvatskog fotografa Ivana Posavca. Izložba, nazvana ?Obruč?, okuplja 10 panoramskih fotografija formata 3,60 x 0.90 metara, snimljenih u razdoblju od 2000. do 2022. godine, korištenjem sovjetskog fotoaparata FT2.U petak, 7. lipnja, na zadnji dan izložbe, autor Ivan Posavec će provesti posjetitelje kroz izložbu panoramskih fotografija. Druženje započinje u 19 sati i bit će organizirano kao ležerni i neformalni razgovor s umjetnikom. Posjetitelji će moći saznati sve što ih zanima o aktualnoj izložbi, specifičnoj fotografskoj opremi korištenoj za njenu realizaciju (sovjetski vojni fotoaparati), kao i o Posavčevom dugogodišnjem radu u brojnim novinarskim redakcijama, uključujući Polet, Start, Arenu, Globus, Gloriju i druge.', 'izlozba.jpg', 'Kultura', 0),
(28, '06.06.2024.', 'Izložite svoje radove u galeriji.', 'Prijavite svoje umjetničke radove za izlaganje u Galeriji Trumbetaš.', 'Ako ste umjetnik, afirmiran ili manje afirmiran, likovni amater ili organizacija koja se bavi umjetnošću, mogao bi vas zanimati natječaj Galerije Trumbetaš. Riječ je o natječaju za izlaganje u Galeriji u 2025. godinu.Ovo su podaci koje trebaju sadržavati prijave za koje je rok do 21. lipnja 2024. godine:ime, prezime i kontakt (broj mobitela i e-adresu) autora/ice; za pravne osobe\r\nnavesti i naziv udruge, ustanove ili umjetničke organizacije koja prijavljuje izložbu\r\nživotopis autora/ice\r\nosnovne informacije o izložbi: naziv, koncept i opis (do 500 riječi)\r\nvizualni materijal\r\ntehničke specifikacije za realizaciju rada', 'galerija.jpg', 'Kultura', 0),
(29, '06.06.2024.', 'Premijera dugoočekivane predstave.', 'Premijera predstave \"O štetnosti duhana\" u izvedbi Štoos teatra.', 'Štoos teatar sa zadovoljstvom najavljuje premijeru Čehovljeve šale u jednom činu: \"O štetnosti duhana\". Predstava će se održati u petak, 17. svibnja, s početkom u 19:30 sati, u prostorima knjižnice Galženica na adresi Trg Stjepana Radića 5. U ovoj izvedbi, tekstu A.P. Čehova pridonosi scenografija i osvjetljenje koje potpisuje Mirel Huskić, dok će glavnu ulogu tumačiti Luka Kuzmanović. Produkciju predstave potpisuje Štoos teatar.', 'predstava.jpg', 'Kultura', 0),
(30, '06.06.2024.', 'HNK GORICA : NK ISTRA 1961 2-0', 'U završnici sezone Gorica s igračem više pobijedila Istru!', 'U 36. kolu Supersport HNL-a na Gradskom stadionu HNK Gorica pobijedila je NK Istru 1961 rezultatom 1-0. Gorica sezonu Supersport HNL-a pobjedom protiv izravnog konkurenta zaključuje na sedmom mjestu u poretku deset klubova elitnog razreda hrvatskog nogometa.\r\n\r\nVidović mijenja tek u 70. minuti. S namjerom da osvoji s igračem više sva tri boda, u igru šalje Matavža umjesto Lazarova. Zadnjih deset minuta dobiva Sagna namjesto Mrzljaka, završnicu Blummel. Unatoč pobjedi, još jedna loša utakmica Gorice.', 'gorica.jpg', 'Sport', 0),
(31, '06.06.2024.', 'Predstavila se šampionska momčad pionira Gorice!', 'Šampionska momčad pionira Gorice.', 'Ovogodišnji prvaci Hrvatske u 26 odigranih utakmica ligaške sezone, mladići pod vodstvom trenera Borisa Trivunova skupili su 59 bodova. Ostvarili su 17 pobjeda, 8 neriješenih rezultata i samo jedan poraz u sezoni.', 'sampioni.jpg', 'Sport', 0),
(32, '06.06.2024.', 'Prvi međunarodni Adapted judo turnir!', 'Velika Gorica i Fuji domaćini prvog međunarodnog Adapted judo turnira.', 'Kako smo najavili, Velika Gorica i Judo klub osoba s invaliditetom Fuji domaćini su velikog europskog judo turnira Get Together Tour u organizaciji Europske judo unije. Riječ je o turniru koji se po prvi puta održava. Kako nam je objasnila Marina Drašković koja vodi Judo klub Fuji, prvog dana u Velikoj Gorici se održala klasifikacija natjecatelja i sudački sastanak, a danas je vrijeme za natjecanja u Gradskoj sportskoj dvorani.Turnir je otvorio gradonačelnik Krešimir Ačkar te uručio ugovor o sufinanciranju ovog natjecanja, u vrijednosti od 18.000 eura. ?Ovaj turnir, kojeg čine četiri natjecanja u različitim zemljama, započinje upravo ovdje, u našem Turopolju, Velikoj Gorici.\r\nVelika Gorica je ponosna što je domaćin ovog izvanrednog događaja, koji nije samo prilika za sportsko nadmetanje, već i za izgradnju prijateljstava, razumijevanja i solidarnosti među sportašima iz različitih zemalja. Judo je sport koji promiče disciplinu, poštovanje i ravnopravnost. Drago mi je da svi natjecatelji, bez obzira na svoje fizičke izazove, mogu uživati u sportu i pokazati svoje vještine. Za naše hrvatske judaše, ovo je jedinstvena prilika da se natječu na međunarodnoj razini i odmjere snage s kolegama koji se suočavaju sa sličnim životnim izazovima. Znamo da su financijske prepreke često veliki problem za sudjelovanje na natjecanjima u inozemstvu, stoga nam je posebno drago što možemo pružiti podršku i omogućiti im da se natječu na domaćem terenu?, izjavio je.', 'judo.jpg', 'Sport', 0),
(38, '08.06.2024.', 'Goričke Večeri 2024.', 'Magazin, Jole i Pavel stižu na ovogodišnje Goričke večeri.', 'Uskoro stižu Goričke večeri, mnogima omiljeni kulturno-zabavni događaj koji će se održati od 17. do 30. 5. na dobro poznatoj lokaciji ? Parku dr. Franje Tuđmana u samom centru grada. Očekuje vas širok spektar programa prilagođenih svim generacijama, obećavajući nezaboravne trenutke za male i velike posjetitelje. Kao i svake godine, vrhunac će biti koncerti na otvorenom, pružajući priliku svim ljubiteljima glazbe da uživaju pod zvijezdama. Otvorenje će označiti nastup popularne grupe Magazin (17. 5.), čiji su hitovi kroz godine osvojili srca mnogih generacija. Za ljubitelje zabave, Jole (25. 5.) će svojim ?zabavnjacima? podići atmosferu do usijanja, dok će Pavel (24. 5.) spojiti rock i pop na velikoj pozornici. Publiku će zabaviti i Metaklapa (18. 5.) koji će svojim jedinstvenim izvedbama najvećih metal hitova u klapskom stilu osigurati nezaboravno glazbeno iskustvo.\r\n\r\nOldtimer show će zadovoljiti apetite ljubitelja starih automobila, pružajući priliku za divljenje brojnim povijesnim vozilima. Kino u parku na otvorenom će vas i ove godine odvesti na filmska putovanja uz blockbustere, animirane filmove i komedije pod zvijezdama.\r\n\r\nUlaz na sve programe je besplatan, stoga pozivamo sve da se pridruže i uživaju u čarima Goričkih večeri 2024.', 'gveceri.jpg', 'Kultura', 0),
(39, '08.06.2024.', '64. Rođendan POUVG-a!', 'Proslava 64. rođendana POUVG: Pripremili su bogat program uz radionice, filmove, koncerte...', 'Pučko otvoreno učilište Velika Gorica slavi svoj 64. rođendan, a povodom ovog velikog jubileja pripremilo je bogat program koji će trajati od 22. do 27. travnja na dobro poznatim lokacijama, Zagrebačka 37 (POUVG) i Trg Stjepana Radića 5 (Dom kulture Galženica). Posjetitelji će imati priliku uživati u raznolikim besplatnim programima gotovo svih djelatnosti koje Učilište nudi, uključujući kazalište, kino, izdavaštvo i obrazovanje. Slavljenički program počinje u ponedjeljak, 22. travnja, na Dan planeta Zemlje, s besplatnim radionicama za djecu i odrasle. Ekološke radionice o važnosti očuvanja okoliša uključivat će izradu eko deterdženta, sadnju proljetnog cvijeća i školu crtanja. Također, tu je i Kiparska radionica u petak, 26. travnja, u 19:00 sati, za one malo starije kreativce.\r\n\r\nU utorak, 23. travnja, Kino Gorica će prikazati dva filma: sinkronizirani crtić ?Patke selice? i komediju ?The Holdovers?, ovogodišnju Oscarom nagrađenu produkciju, s projekcijama u 18:00 i 20:00 sati.\r\n\r\nSrijeda, 24. travnja, donosi zanimljivu izložbu u Galeriji Trumbetaš, koja će prikazati upotrebu pisma glagoljice u Turopolju kroz ?Ščitarjevsku bilježnicu? otvorenu i predstavljenu u 19:00 sati.\r\n\r\nČetvrtak, 25. travnja, rezerviran je za koncert hrvatskih sopranistica Valentine Fijačko Kobić i Helene Lucić Šego pod nazivom ?Operni dueti i arije?, uz pratnju klavijaturista Marija Čopora, s početkom u 19:30 sati.\r\n\r\nVeliki slavljenički tulum očekuje nas u subotu, 27. travnja, s bogatim zabavnim programom koji počinje u 10:00 sati. Plesni klub Megablast, Orkestar UŠFL, Dječji zbor Cvrkutavci te brojne radionice i performansi garantiraju nezaboravan dan za sve posjetitelje.\r\n\r\nU isto vrijeme, u 17:00 sati, na GK ?Scena Gorica? održat će se 100. izvedba predstave za djecu ?Gospođica Neću?, koja kombinira glumu i lutkarstvo te poučno zabavno tematizira posljedice tvrdoglavosti.\r\n\r\nUlaznice za predstave i kino projekcije možete podići na blagajni Učilišta sat vremena prije početka događaja. Iz POUVG pozivaju sve zainteresirane da im se pridruže i proslave rođendan Učilišta u ovom raznolikom i bogatom programu.', 'pouvg.jpg', 'Kultura', 0),
(40, '08.06.2024.', 'Sajam knjiga u Velikoj Gorici.', 'Sajam knjiga u Velikoj Gorici: Istražite različite naslove po promotivnim cijenama.', 'Biblioteka Albatros i ove godine povodom blagdana sv. Jurja i Dana Pučkog otvorenog učilišta Velika Gorica organizira Jurjevski sajam knjiga. Na sajmu će biti dostupna promotivna prodaja knjiga iz njihove izdavačke djelatnosti. Od 1980. godine, Biblioteka Albatros je objavila oko 200 izdanja, uključujući knjige, časopise i publikacije, koja su većinom posvećena zavičajnim velikogoričkim temama. Knjige za djecu, mlade i one željne saznanja o Turopolju i bogatoj kulturnoj baštini dostupne su po pristupačnim cijenama. Ove knjige čuvaju uspomene na vremena, ljude, stvaralaštvo i umjetničko izražavanje pojedinaca čiji je umjetnički dar sastavni dio njihovog života. Pronaći ih možete u predvorju POUVG.', 'knjige.jpg', 'Kultura', 0),
(41, '08.06.2024.', 'Formula Student Mičevec', 'Samo najbolji od prijavljenih 280 timova stižu u Mičevec, predstavljamo natjecatelje iz Hrvatske.', 'Mladi inovatori s tri hrvatska Sveučilišta završili su izradu svojih trkaćih bolida s kojima će se od 20. do 25. kolovoza na Bugatti Rimac testnom poligonu u Mičevcu natjecati na sedmom izdanju Formule Student Alpe Adria. Na prestižnom natjecanju koja je izvrsna odskočna daska za karijeru u svijetu autoindustrije ove godine sudjeluje čak 280 timova iz cijelog svijeta, a Hrvatsku predvode tri tima inženjera sa Sveučilišta u Splitu, Rijeci i Zagrebu. Zagrebački FSB Racing Team predvodi 72 mlada stručnjaka koji su uz stečeno znanje u praksi u proteklim mjesecima stvarali pravo tehnološko čudo. \"Najviše nas ima s FSB-a i činimo otprilike 60 % tima. Tu su i FER, Ekonomski, PMF, FKIT i drugi fakulteti. Naši članovi kroz sudjelovanje u timu stječu radne navike, vještine i znanja koja će im biti potrebna u budućem radu i karijeri. Upravo smo zato najkompetentniji na tržištu rada.\" ? govori Filip Čavić, vođa tima te dodaje: \"Prošle godine na Formuli Student ostvarili smo visoko 6. mjesto te izvrsno konkurirali najboljim timovima. Ove godine bolid smo poboljšali novim aero paketom, sustavima hlađenja, smještajem kilera, novom, puno lakšom i čvršćom šasijom, otklonili sve probleme po pitanju struje, upravljačkih sustava, smanjili masu, a funkcionalnost je i dalje bude ista što dovodi i do puno boljih performansi. U timu Sveučilišta u Rijeci ih je 40, a svoje slobodno vrijeme u proteklom razdoblju s veseljem su trošili kako bi izgradili što bolji bolid, poboljšali njegove performanse, te uz što bolji rezultat na Formuli Student Alpe Adria, stekli vrijedno praktično iskustvo koje će im pomoći u daljnjem razvoju karijera. \"Ove godine imamo 25 novih članova i vrlo nam je važno da im u kratkom roku prenesemo potrebno znanje.\" ? kaže vođa tima Petar Cerin te otkriva karakteristike njihovog novog bolida: \"Promijenili smo šasiju, smanjili cijeli prednji dio. Cijeli aero paket ponovo smo izgradili. Radili smo i na telemetriji koja šalje sve podatke, senzore brzine vozila, tlaka, temperature vode i različitih drugih parametara u kokpit i na laptop gdje tim direktno vidi što se s formulom događa na stazi. Naša formula bila je dobra i na dosadašnjim natjecanjima, a ove godine planiramo biti najbolji do sada.\" Novi bolid dolazi i iz radionice na Fakultetu elektrotehnike, strojarstva i brodogradnje u Splitu, gdje su mladi inženjeri iz cijele Dalmacije stvorili inovativna rješenja kojima na ovogodišnjem natjecanju žele postići maksimalne rezultate. \"Ove godine predstavljamo prvu Električnu formulu u koju je već uloženo nekoliko godina razvoja te nam je veliki iskorak jer smo do sada radili na motorima s unutarnjim izgaranjem. Uložili smo puno testiranja, bilo je puno sklapanja komponenti, prototipiranja, analize, prikupljanja financija i svega što dolazi s jednim takvim projektom.\" ?ističe vođa tima Luka Terihaj te dodaje koliko je konkurentan njihov novi bolid: \"Prednost je njegova aerodinamika i sustav Torque vectoring-a kojim mijenjamo klasičan diferencijal i dobivamo nešto malo više sekundi brzine po krugu koje na kraju čine veliku razliku. Glavni cilj nam je prvo proći sav elektronički scruteenering samog baterijskog paketa i na kraju se naravno utrkivati. Smatram da su svi timovi jako kvalitetni, a ishod ćemo vidjeti na stazi. Svemu ozbiljno pristupamo, želimo napraviti kvalitetan proizvod te se nadamo da ćemo ostvariti odličan rezultat!? Interes za ovogodišnji događaj Formula Student Alpe Adria dosegnuo je izuzetne razmjere. Za sudjelovanje se prijavilo čak 280 timova iz cijelog svijeta od kojih je na temelju stručnog kviza odabrano 60 najboljih. Tako mladi inženjeri iz 56 zemalja poput Francuske, Islanda, Kazahstana, Njemačke, Portugala, Rumunjske, Španjolske i brojnih drugih dolaze u Hrvatsku. Formula Student Alpe Adria međunarodno je studentsko natjecanje na kojem mladi inženjeri imaju priliku dizajnirati, konstruirati, testirati i utrkivati se s vlastitim prototipovima trkaćih bolida. Sudjelovanje u ovom natjecanju predstavlja korak prema budućim karijerama u inženjeringu te priliku za stjecanje neprocjenjivog praktičnog iskustva i komunikacijskih vještina. Natjecanje se održava uz podršku Grada Velike Gorice, Turističke zajednice Grada Velika Gorica i Zagrebačke županije.', 'formula.jpg', 'Sport', 0),
(42, '08.06.2024.', 'Odličan početak Turopoljske lige trčanja', 'Sudjelovalo 60 trkača: Evo tko je odnio pobjedu u prvom kolu', 'Početak 21. sezone Turopoljske lige trčanja obilježen je izvanrednim odazivom, s čak 60 sudionika okupljenih u utorak popodne na TLT stazi između Velike Gorice i Vukovine. Maraton klub Velika Gorica zahvalio je svima na prisustvu te s nestrpljenjem iščekuje idući utorak, uz nadu da će se pridružiti još veći broj trkača.\r\n\r\n\r\nPobjednici prvog kola lige u 2024. su Martin Marčec i Jasna Mikulić na dugoj stazi od osam kilometara, dok su Slavko Parlov i Vedrana Janjić trijumfirali na kratkoj stazi od četiri kilometra.\r\n\r\n\r\nSve detaljne rezultate možete pronaći na službenim internetskim stranicama kluba, gdje također možete pronaći i prijavu ako se želite pridružiti jednoj od narednih utrka koje slijede.', 'trcanje.jpg', 'Sport', 0),
(43, '08.06.2024.', 'Predstavljen novi trener HNK Gorice Rajko Vidović', 'HNK Gorica spremna za nove izazove sa novim trenerom.', 'Novi trener HNK Gorice je Rajko Vidović. Vidović Goricu preuzima u trenucima krize. Utakmicu protiv Istre gledao je s tribina, a vidjeli smo na njoj već neke nove ideje te povratak Valentina Majstorovića. Ako se uskoro oporavi i Ndockyt, Gorica bi, nakon reprezentativne stanke, mogla u zadnjoj četvrtini prvenstva biti konkurentna da pomrsi račune nekome od pretendenata za naslov.\r\n\r\n\r\n?Mogu reći da dosta poznajem Goricu, pratim HNL i često sam dolazio na utakmice u Veliku Goricu. Smatram da je riječ o kvalitetnoj momčadi koja je imala peha, ali normalno je da se takve stvari događaju, da dolazi i do pada forme. Međutim, vjerujem u ovu momčad jer su to dečki koji su ranije pobjeđivali Dinamo, Hajduk, Rijeku, Osijek? I sigurno nisu zaboravili igrati. Sada je potrebno da uložimo dodatne napore i uz pošten i kvalitetan rad vratimo Goricu na put na kojem je bila?, izjavio je Vidović.\r\n\r\n\r\nVidović je rođen 1975. godine u Zavidovićima kod Zenice, a nogomet je aktivno igrao do 2014. godine. Igrao je na poziciji klasičnog napadača u Zagrebu, Kamen Ingradu, Rijeci, Interu iz Zaprešiča te u Lokomotivi. Nakratko je bio član kineskog BJ Hondenga, vijetnamskog SLNA FC te Čelika Zenica.\r\n\r\nTrenersku karijeru započeo je 2015. godine u Dugom Selu, a trenirao je niželigaše Maksimir, Trnje, Lučko, Sesvete i Kustošiju. Posljednji angažman Vidović je imao u Kustošiji od koje se oprostio proteklog petka, remijem protiv Mladosti iz Ždralova. ?Ovim putem želim izraziti veliku zahvalnost ljudima iz Kustošije koji su me podržali i pokazali izuzetnu korektnost i razumijevanje za ovu priliku koja je korak naprijed u mojoj trenerskoj karijeri. Drago mi je što sam preuzeo Goricu, a Kustošiji želim da ostvare zacrtani cilj, a to je povratak u rang više?, rekao je.\r\n\r\nSuradnja s Goricom je dogovorena do ljeta 2025. godine.', 'trener.jpg', 'Sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
