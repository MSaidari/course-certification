# Kurs Sertifikalandırma Web Sitesi

Bu proje, mevcut bir kurs merkezi için geliştirilen bir **kurs yönetim ve sertifikalandırma sistemidir**. HTML, CSS, PHP ve JavaScript teknolojileri kullanılarak hazırlanmıştır. Kullanıcılar sisteme **öğrenci** veya **öğretmen** olarak giriş yapabilir. Sistem, kurslara kayıt, ödeme, kurs yönetimi ve sertifika oluşturma gibi birçok özelliği içermektedir.

##  Projenin Amacı

Bir eğitim merkezinin tüm süreçlerini dijital ortama taşımak:
- Kurs kayıtları
- Sertifika oluşturma
- Öğretmen-öğrenci yönetimi
- Ödeme işlemleri

##  Kullanıcı Rolleri

###  Öğrenci Paneli
- Kursları listeleme ve filtreleme
- İstediği kursa kayıt olma
- Ödeme yapma
- Kursu istek listesine ekleme
- Kurs bitiminde otomatik **sertifika oluşturma ve indirme**

###  Öğretmen Paneli
- Kurs oluşturma ve düzenleme
- Öğrencileri listeleme veya sistemden çıkarma
- Öğrencilere **sertifika verme** işlemi

##  Kullanılan Teknolojiler

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Veritabanı:** MySQL (phpMyAdmin üzerinden)
- **PDF Sertifika:** PHP PDF kütüphaneleri (FPDF)
- **Ödeme Sistemi:** 


##  Kurulum

1. Proje dosyalarını bir XAMPP/WAMP sunucusuna yerleştirin.
2. `sql/` klasöründeki `.sql` dosyasını phpMyAdmin ile içe aktarın.
3. `includes/db.php` (veya benzeri) dosyasından veritabanı bağlantı ayarlarını yapın.
4. Web tarayıcınızdan `localhost/kurs-sistemi` dizinine giderek projeyi başlatın.


##  Ek Bilgiler

- Sistem tamamlanan kurslar için **otomatik PDF sertifika** üretir.
- Kullanıcı oturum yönetimi PHP ile yapılmıştır.
- Güvenlik için temel giriş doğrulama ve veri filtreleme uygulanmıştır.




