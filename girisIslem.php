<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";
$dbname = "kurs_sertifikalandirma";
$username = "root";
$password = "12345678";

try {
    // Veritabanına PDO ile bağlanma
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Hatalar için istisna modunu ayarlama
} catch (PDOException $e) {
    // Veritabanı bağlantısında hata oluşursa, hata mesajını ekrana yazdır ve işlemi sonlandır
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Giriş işleminin kontrolü
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Formdan gönderilen değerleri al ve özel karakterlerden arındır
    $e_posta = htmlspecialchars($_POST['e_posta']); // E-posta giriş alanı
    $sifre = $_POST['password']; // Şifre giriş alanı
    $rol = $_POST['role']; // Kullanıcının seçtiği rol (student/instructor)

    // Kullanıcının rolüne göre doğru tablo adını belirle
    $table = $rol === "student" ? "ogrenciler" : ($rol === "instructor" ? "egitmenler" : null);

    // Eğer geçersiz bir rol seçimi yapılmışsa işlemi sonlandır
    if (!$table) {
        die("Geçersiz rol seçimi.");
    }

    // Veritabanında e-posta adresine göre kullanıcıyı bul
    $query = $dbConnection->prepare("SELECT * FROM $table WHERE e_posta = :e_posta");
    $query->execute([':e_posta' => $e_posta]); // Sorguyu çalıştır
    $user = $query->fetch(PDO::FETCH_ASSOC); // Sonucu bir dizi olarak getir

    // Kullanıcı bulunduysa ve girilen şifre hash ile doğrulanıyorsa
    if ($user && password_verify($sifre, $user['sifre'])) {
        session_start(); // Oturumu başlat
        $_SESSION['user_id'] = $user['id']; // Kullanıcının ID'sini oturum değişkenine kaydet
        $_SESSION['role'] = $rol; // Kullanıcının rolünü oturum değişkenine kaydet
        header("Location: profil.php"); // Profil sayfasına yönlendir
        exit(); // Yönlendirme sonrası işlemi sonlandır
    } else {
        // Giriş başarısızsa giriş sayfasına hata mesajı ile geri dön
        header("Location: giris.php?status=error&message=invalid_credentials");
        exit(); // Yönlendirme sonrası işlemi sonlandır
    }
}
?>
