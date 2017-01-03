# kbsystem
Knowledge base system namijenjen kompanijama i organizacijama i njegov glavni cilj je omogućavanje lakše razmjene znanja i edukacije uposlenika/članova organizacije. 

Mirza Ohranovic (Broj indeksa: 17063)

<h2>Spirala I</h2>
  
  I) Urađeno:
  
      * Napravljene skice 5 podstranica u bluprint mockup stlu
      * Napravljen CSS Grid framework (cssgridframework.css)
      * Napravljen eksterni css fajl za sve ostale elemente (main.css)
      * Napravljen resposnive izgled za normalnu veličinu ekrana (laptop), za tablete i mobitele (korišteni media queries)
      * Implementirane tri html forme: login, regstracija i unošenje članka
      * Implementiran meni web stranice vidljiv na svim podstranicama
      * Implementiran padajući meni za mobilne uređaje
      * Izgled stranice koristi konzistentu paletu boja, iste elemente, te je kreiran i logo.
      
   II) Nije urađeno:
   
      * Nisu napravljene skice za podstranice mobilne verzije :(
      
   III & IV) Bugovi:
   
      * Ništa nije primjećeno
      
   V) Lista fajlova:
   
      * index.html - Početna stranica, cover, osnovne informacije, CTA (Call to action)
      * article.html - Izgled članka/posta sa Lorem ipsum tekstom
      * create.html - Forma za kreiranje članka/posta
      * liftoff.html - Registracija novih korisnika i prijava starih
      * pricing.html - Cijene paketa korištenja servisa
      * js/main.js - Osnovni JS fajl, trenutno jedna funkcija (za padajući meni)
      * img/* - grafika (logoi: bijeli i crni, cover slika i vspace logo)
      * css/cssgridframework.css (grid framework sa 4 kolone, input elementi forme, buttoni)
      * css/main.css (style svih elemenata koji ne ulaze u grid framwork)

<h2>Spirala II</h2>
  
   I) Urađeno:

      * Napravljena validacija na formama: registracija, login i unos clanka
      * Napravljeno učitavanje putem Ajaxa (potreban http)
      * Implementiran self-moving carousell na landing page-u
      * Implementiran padajući meni na resposnive verziji
      * Implementiran Treeview na prvom linku kod side-menija na Article i Create

   II) Nije urađeno:

      * Galerija i localstorage (obzirom da carousell, padajući meni i treveiw jeste)
  
   III & IV) Bugovi:

      * Landing page, kada se ode s tog taba i ostavi da carousell sam scroll-a, te kada se vrati nazad na taj tab, carousell poremeti scroll

   V) Lista fajlova:

      * partials/* - Sve podstranice koje se učitavaju
      * .dumpedfiles/* - Svi dokumenti koji se više ne koriste (zbog ajaxa)
      * js/main.js - Glavni JS fajl, osnovne funkcije, padajući meni
      * js/spa.js - Ajax fajl, funckija i inicijalni poziv
      * js/slider.js - Carousell sa landing page-a
      * js/validation.js - Validacija formi

<h2>Spirala III</h2>

    I) Urađeno:
    
        * Kreirana sljedeća arhitektura:
            * Controllers/* - kontroleri za rad sa podacima 
                - AuthController - login i registracija 
                - MainController - autorizacija pristupa fajlovima
                - ArticleController - CRUD operacije sa člancima
            * Models/* - PHP klase, modeli koji se koriste unutar sistema 
                - article.php - model članka, definicija metoda CRUD, kao definicije dodtnih metoda za ispis i obradu
                - user.php - model korisnika, definicija metoda za registraciju i login
                
        * U skolupu ove arhitekture napravljeno:
            * Serijalizacija podataka u XML --- liftoff.php (USER), create.php, edit.php (ARTICLE)
            * Učitavanje podataka iz XML-a --- articles.php, article.php (ARTICLE)
            * Logovani korisnik (admin) može raditi editovanje i kreiranje podataka
            * Nakon logina, u meniju se pojavljuje ocpija "DOWNLOAD CSV" 
            * Nakon logina, u meniju se pojavljuje opcija "DOWNLOAD PDF"
            * Pretraga u sklopu Articles.php
                * Unosom riječi pretražuju se svi articles u bazi
                * Tražene riječi se boldiraju
                * Moguće je pokrenuti i pretragu koja nije u realtime-u
        * Web stranica je deployana na Heroku https://agile-cove-66292.herokuapp.com/ ali postoji određeni problem kada se učitavaju određene podstranice
        
      II) Nije urađeno:
       
        --
        
      III & IV) Bugovi:
    
        --
       
      V) Fajlovi:
      
        controllers/* - kontroleri podataka
        models/* - modeli podataka
        data/* - svi pdf, csv, xml fajlovi
        fpdf/* - fdpf biblioteka
        * ukinuto AJAX_SPA
            - create.php - kreiranje clanka
            - edit.php - editovanje clanka
            - articles.php - izlistavanje i pretraga clanaka
            - article.php - clanak pojedinacno
            - csv.php - generisanje i download csv fajla
            - pdf.php - generisanje i donwload pdf fajla
            - services.php - pozadinski servisi za pretragu
            


