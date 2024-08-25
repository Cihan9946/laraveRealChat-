# Laravel Live Chat Uygulaması

Bu proje, Laravel framework kullanılarak geliştirilmiş bir canlı sohbet (live chat) uygulamasıdır. Bu uygulama, kullanıcıların gerçek zamanlı olarak birbirleriyle mesajlaşmasını sağlar ve basit bir şekilde entegre edilebilir.

## Özellikler

- **Gerçek Zamanlı Mesajlaşma**: Kullanıcılar arasında anında mesaj gönderimi ve alımı.
- **Kullanıcı Doğrulama**: Laravel'in dahili kullanıcı doğrulama sistemiyle entegre.
- **Oturum Yönetimi**: Oturum açan kullanıcılar, sohbet odalarına veya bireysel sohbetlere katılabilir.
- **WebSocket Desteği**: Daha hızlı ve kesintisiz mesaj iletimi için WebSocket entegrasyonu.
- **Responsive Arayüz**: Tüm cihazlarla uyumlu kullanıcı dostu arayüz.

## Gereksinimler

- PHP >= 7.4
- Laravel >= 8.x
- MySQL veya benzeri bir veritabanı
- Composer
- Node.js ve NPM

## Kurulum

1. **Proje Dosyalarını Klonlayın**:
    ```bash
    git clone https://github.com/kullanici_adi/laravel-live-chat.git
    cd laravel-live-chat
    ```

2. **Gerekli Bağımlılıkları Kurun**:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **.env Dosyasını Yapılandırın**:
    Proje klasöründeki `.env.example` dosyasını `.env` olarak yeniden adlandırın ve aşağıdaki ayarları yapılandırın:
    
    ```bash
    APP_NAME=LaravelLiveChat
    APP_ENV=local
    APP_KEY=base64:randomgeneratedkey=
    APP_DEBUG=true
    APP_URL=http://localhost
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=live_chat_db
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
    ```

4. **Veritabanı Migrasyonlarını Çalıştırın**:
    ```bash
    php artisan migrate
    ```

5. **WebSocket Sunucusunu Başlatın**:
    Laravel Echo Server veya benzeri bir WebSocket sunucusu kurduysanız, şu komutu çalıştırarak sunucuyu başlatın:
    ```bash
    php artisan serve
    npm run websocket
    ```

6. **Uygulamayı Başlatın**:
    Artık uygulama `http://localhost:8000` adresinde çalışır durumda olacaktır. Tarayıcınızda bu adresi ziyaret ederek canlı sohbet uygulamasını deneyebilirsiniz.

## Kullanım

- Uygulamayı başlattıktan sonra, giriş yaparak veya yeni bir hesap oluşturarak sisteme giriş yapabilirsiniz.
- Mesaj göndermek için herhangi bir kullanıcıya tıklayın veya yeni bir sohbet başlatın.
- Gönderilen mesajlar anında diğer kullanıcıya iletilecektir.

## Geliştirme

- **WebSocket Sunucusu**: `resources/js/bootstrap.js` dosyasındaki WebSocket ayarlarını ihtiyaçlarınıza göre özelleştirebilirsiniz.
- **UI Özelleştirme**: `resources/views` dizinindeki Blade şablonlarıyla arayüzü kişiselleştirebilirsiniz.
- **Yeni Özellikler**: Laravel'in güçlü ORM yapısı ve olaylar sistemi ile kolayca yeni özellikler ekleyebilirsiniz.

## Katkıda Bulunma

Katkıda bulunmak isterseniz, lütfen bir fork yapın ve bir pull request gönderin. Katkılarınızdan memnuniyet duyarız!

## Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için `LICENSE` dosyasını inceleyin.

