# Popis
Web zobrazuje seznam recenzovaných kaváren. Cílem webu je umožnit komunitě uživatelů zjistět více informací o kavárnách a poskytnout
k nim vlastní zpětnou vazbu.

# Uživatelské role

* Návštěvník (nepřihlášený uživatel)
* Uživatel (po přihlášení)
* Admin (s extra pravomocemi)

# Funkce podle rolí:
* Nepřihlášení uživatelé můžou registrovat se.Oni vidí
domovskou stránku, kde je seznam kaváren,mohou si otevřít
libovolný článek kavárny a přečíst si všechny komentáře,
ale nemohou sami psát komentáře.

* Běžní přihlášení uživatelé můžou se odhlásit z webu, psát vzkazy a smazat je. 

* Admin může smazat všechny komentáře a přidat komentáře na stránku kavárny. Může také upravit název a popis kavárny.

## Stack

PHP, Databáze (podle toho co bude dostupné), HTML 5, Figma.

---

## Akceptační podmínky

### Přihlášení uživatele
Uživatel vyplní username a password. Formulář obsahuje validace na vyplnění obou položek.

### Registrace uživatele

Uživatel vyplní username, birthday, e-mail, password a confirm password. Formulář obsahuje validace na vyplnění všech položek.

### Přidání a editace komentáře (pouze uživatel)

Uživatel přidává nový komentáře nebo vymazuje již existující.Formulář validuje vyplnění pole v komentáři a tokenu csrf uživatele.



