# cvm.thonburi.ac.th
-
## วิธีติดตั้งและเตรียมโปรเจกต์

### 1. ติดตั้ง Composer
ดาวน์โหลดและติดตั้ง Composer จาก https://getcomposer.org/download/
หลังจากติดตั้งแล้ว ให้รันคำสั่งนี้ในโฟลเดอร์โปรเจกต์:
(รันบน terminal ใน vscode หรือ cmd ก็ได้)
```bash
composer install
```

### 2. ติดตั้ง Node.js และ npm
ดาวน์โหลดและติดตั้ง Node.js (npm จะติดตั้งมาด้วย) จาก https://nodejs.org/
หลังจากติดตั้งแล้ว ให้รันคำสั่งนี้ในโฟลเดอร์โปรเจกต์:

```bash
npm install
```

### 3. สร้างไฟล์ build สำหรับ frontend
รันคำสั่งนี้เพื่อ build assets:

```bash
npm run build
```

หากต้องการพัฒนาแบบ hot reload ให้ใช้:

```bash
npm run dev
```

### 4. รันคำสั่ง migrate สำหรับฐานข้อมูล

หลังจากตั้งค่า `.env` และเชื่อมต่อฐานข้อมูลแล้ว ให้รันคำสั่งนี้เพื่อสร้างตารางในฐานข้อมูล:

```bash
php artisan migrate
```


Reference
SVG Icon
https://tablericons.com/
