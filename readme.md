# Android Tabanli Resim Isleme Ornegi

##Android-Client

Uygulamanin bu kismi, internetteki kaynaklardan yararlanildi. Burada kendinize gore degistirmeniz gereken bir kac veri bulunuyor. Asagidaki basliklardaki kod satirlarini kendinize gore duzeltmeniz gerekiyor.

PHP kodunuz fotografin anlik olarak buffer gorevi gorecek basit bir sitede depolanmasina yariyor. Ayrica veri giris ve cikisin kolay olmasida guzel avantajlardan. 

Alttaki basliklar -> app -> src -> main -> java -> edu -> ktu -> wp -> homework

### Config

Php yuklu olan endpoint belirtiyoruz.

```java
FILE_UPLOAD_URL = "http://domain.com/fileUpload.php"; 
```

### ShowActivity

Php kosulan web sitemizin resimleri kayit ettigi dizini tanimliyoruz.

```java
public static final String IMAGE_URL = "http://domain.com/uploads/IMG.jpg"; 
```

### UploadActivty

Burada tanimlanan mail, php dosyalari arasinda bir kontrol yapip resim islenmesini sagliyor. Bu yuzden bu mail adresi onemli.

```java
entity.addPart("email", new StringBody("uygulamadaki-mail@gmail.com")); 
```

## Image-Server

Resmin bir site uzerinde yuklenmesi ve soket baglantisi ile resim islenmesi ve baska bir server ile haberlesmesi icin bu ara katman kullanildi. Ayni islem aslinda direk uzak sunucudaki bilgisayar uzerinde yapilabilirdi. Request isteklerini bu sekilde parcalamak, uretkenlik acisindan daha kolaylik sagladigi icin tercih edildi. Zaman sikintisi olmasaydi, flask ile daha kontrollu ve guzel bir odev ortaya cikabilirdi...

### fileUpload

Buradaki email'in android cihazimizdaki kodlarin arasindaki email ile ayni olmasina dikkat etmek gerekiyor! DigitalOcean uzerinden sunucu alip asagidaki python kodlarini kostuktan sonra ip adresi ve tanimli port ile soket baglantisini asagidaki sekilde kurabilirsiniz.

```php
if($email=='uygulamadaki-mail@gmail.com'){

host    = "Sunucununipadresi";
$port    = 8080;
```

## Process-Server

DigitalOcean uzerinden alacaginiz bir ubuntu server'a proje icerisindeki import edilmis paketleri PIP yardimi ile yukleyin. Resim isleme kutuphanesi Python2 ile calistiginin altini cizmek istiyorum! 

PHP burasi ile bu paremetreler sayesinde haberlesiyor. 0.0.0.0 kendisine isaret eden bir yapi oldugunu ve degistirmemeniz gerektgini soyleyeyim. Ayni sekilde PORT numaraniz php kodlariniz icerisindeki port ile ayni olmalidir.

```python
HOST = '0.0.0.0'
PORT = 8080
```

Diger kodlarin anlasilirligi konusunda bir sorun yasayacaginizi dusunmuyorum.

Kodu kaydettikten sonra terminalde asagidaki komutu calistirarak, ssh kapatinca kapanmayan bir process halinda uygulamayi calistirmis oluyorsunuz. Bunun calisip calismadigini gormek icin ise 'ps aux' komutunu kullanabilirsiniz.

```bash
chmod 777 ./server.py
nohup ./server.py </dev/null &>/dev/null &
```

### Projeden Goruntuler

![1](http://i.hizliresim.com/0lGavD.png "1")

![2](http://i.hizliresim.com/41G370.png "2")

## Proje Gelistiricileri

- Abdullah Velioğlu
- Tolgahan Üzün