VM masin selleks projektiks on Ubuntu 24.04 LTS
# MariaDB paigaldus ja seadistamine

## 1. Keskkond

Paigaldus tehti Linux keskkonnas (Ubuntu server).
Ligipääs läbi terminali (SSH).

---

## 2. MariaDB paigaldamine

Paigalda MariaDB server ja klient:

```bash
sudo apt install mariadb-server mariadb-client galera-4
```

---

## 3. Kontrolli versiooni

```bash
mariadb --version
```

Näide väljundist:

```
mariadb  Ver 15.1 Distrib 10.11.14-MariaDB
```

---

## 4. Kontrolli teenuse olekut

```bash
systemctl status mariadb
```

Oluline:

* Service peab olema **active (running)**
* Enabled (käivitub automaatselt)

---

## 5. Ühendu andmebaasiga

```bash
mysql -u root -p
```

Kuva andmebaasid:

```sql
show databases;
```

Vaikimisi andmebaasid:

* information_schema
* mysql
* performance_schema
* sys

---

## 6. Turvaseadistus

Käivita turvaskript:

```bash
mariadb-secure-installation
```

Valikud:

* Switch to unix_socket authentication → **y**
* Change root password → **n**
* Remove anonymous users → **y**
* Disallow root login remotely → **y**
* Remove test database → **y**
* Reload privilege tables → **y**

Tulemus:

* anonüümsed kasutajad eemaldatud
* test andmebaas eemaldatud
* root remote login keelatud

---

## 7. Konfiguratsioon (valikuline)

```bash
sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf
```

Pärast muudatusi taaskäivita teenus:

```bash
systemctl restart mariadb
```

---

## 8. Kontrolli porte

```bash
ss -tlnp
```

Oluline:

* MariaDB kuulab: **127.0.0.1:3306**
* See tähendab, et ühendus on lubatud ainult lokaalselt

---

## 9. Kokkuvõte

Tehtud sammud:

* MariaDB paigaldatud
* Teenus töötab ja käivitub automaatselt
* Turvaseaded rakendatud
* Testandmebaas eemaldatud
* Kontrollitud port (3306)

MariaDB server on valmis kasutamiseks.
