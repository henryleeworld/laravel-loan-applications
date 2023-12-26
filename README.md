# Laravel 10 貸款申請

各銀行會依品項或目標族群，而規劃了許多產品，評估貸款方案時，須注意商品類型，是無需抵押品的一般信貸、或是房貸車貸，各產品又會依照不同的對象區分貸款方案，例如會有超低的貸款方案，但是這類貸款可能是限定族群，像是軍公教族群；另外，有的銀行推出低於 1% 的信貸方案，通常這類都是前三期的優惠利率，應該把手續費跟後續調整後的利息也要計算進去。

## 使用方式
- 打開 php.ini 檔案，啟用 PHP 擴充模組 sodium，並重啟服務器。
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/login` 來進行登入，預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/TmwrYJz.png)
> 收到完整之申貸資料後，需要相關人員進行審核作業

![](https://i.imgur.com/Theyq8B.png)
> 需填寫完整之申請書，並提供相關文件即可申辦