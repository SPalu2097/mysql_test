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

ANDMEBAASI ETTEVALMISTUS
MariaDB [(none)]> create database cr_simon;
Query OK, 1 row affected (0.001 sec)

MariaDB [(none)]> create user 'simon'@'localhost' identified by 'Passw0rd';
Query OK, 0 rows affected (0.007 sec)

MariaDB [(none)]> grant all privileges on cr_simon.* to 'simon'@'localhost';

Query OK, 0 rows affected (0.006 sec)

MariaDB [(none)]> flush privileges;
Query OK, 0 rows affected (0.001 sec)

mysql -u simon -p cr_simon <cr_simon.sql(enne seda peaks olema apache2 ja repo õiges kohas)
kontrolli: mysql -u simon -p cr_simon -> show databases; -> use cr_simon; -> select * from cr_simon;
Kuvatakse kogu andmebaasi sisu.

Aga kui on tõrge siis kontrolli: php -version, kui ei ole siis: 
sudo apt install php libapache2-mod-php
sudo apt install php-mysql
Ja igaksjuhuks veebserver ka kui ei ole sudo apt install apache2 -> sudo systemctl status apache2 (kui ei tööta siis systemctl enable apache2 && systemctl start apache2)

Et see projekt ka õnnestuks siis sikuta repo enda /var/www/html kausta: sudo git clone <repo link>
