TODO

* DB struktūra (ir sukūrimo instrukcija)

* Naudotojo prisijungimo sąsaja  (https://drive.google.com/file/d/0B9fygqXqjcgxMEFISlRiSVVTTkk/view?usp=sharing)
  Kol kas tik HTML (bet naudojant HTML/CSS/JS karkasą Bootstrap (Twiterio sukurtą) (https://github.com/twbs/bootstrap/releases/download/v3.3.2/bootstrap-3.3.2-dist.zip) )
  
Apie jį http://getbootstrap.com/css/#forms, http://getbootstrap.com/getting-started/#examples, https://www.youtube.com/watch?v=GU6EWzBGo64
  - Prisijungimo forma 
  - Registracijos forma
  - Priminimo forma
  
 == Ankstesni reikalai ==

1) Pažintis 2015-03-05

Pažintis su **versijų kontrolės sistemomis**:  anksčiau buvo centralizuota VCS, SVN, dabar populiariausios decentralizuotos Mercurial bei GIT
- Ką nuveikėm:
   - pažiūrėjom idėjas https://docs.google.com/spreadsheets/d/1XybeyEPG9502Bg1V1xcGQLSoUfA1ag3q2V2prqdVBs4/edit#gid=2038695298
   - nusprendėm, kad daugumai projektų reikia  naudotojo prisijungimo formos 
   - suinstaliavus Git, galima klonuoti saugyklą iš https://github.com/donatasbartkus/ktu-prisijungimo-forma.git
   - tada dirbama su lokalia kopija, o pakeitimai vėliau vėl siunčiami į serverį.
   - pasimokėm dirbti su GIT shell:
       - cd <darbine direktorija> 
       - git pull                           // atsisiunčia naujausius pakeitimus
       - git branch  <variantoVardas>        // lygiagrečiai sukuria/perjungia atskirą projekto variantą/šaką (atskiroms programmerių komandoms) -- per Git shell ne visiems veikė :/
       -                                    // paredaguojam kažką
       - git add                            // prideda naujus failus į versijavimo sistemą, jei sukūrėm naujų failų
       - git commit -m "trumpa žinutė apie pakeitimus"      // "priduodam" (užfiksuojam) savo pakeitimus į lokalią projekto kopiją -- pradžioj, įrašom savo vardą į failą
       - git push                          // siunčiam pakeitimus į serverį (reik užsiregistruoti http://GitHub.com ir gaut teises šiam projektui)

Pažintis su  PHPStorm programavimo aplinka -- ją parsisiųst galima ir namie, registracijos kodą rasite http://e.ktug.lt/mod/assignment/view.php?id=2305
Paleidus PHPStorm: Menu: Open Directory: parinkti savo projekto direktoriją 
Tada išbandyti integruotą versijavimą: VCS -> Git -> Pull/Push ir pan..

Bandėm paleist serverio aplinką per VirtualBox, bet sistemos atvaizdas buvo "su kaprizais", pabandysime kt. kart geresnį. 

   
  
