# PHP, IBM DB2, Docker Compose

## ความต้องการ
- Linux หรือ macOS
- Docker (https://docs.docker.com/docker-for-mac/install/)
- Docker compose (https://docs.docker.com/compose/install/)

## วิธีใช้งาน

- เมื่อดาวน์โหลด Project มาแล้วให้ cd compose
- สร้างโฟลเดอร์ database ใช้คำสั่ง mkdir database
- ใช้คำสั่ง docker-compose up --build เพื่อสร้าง container ทั้งหมด
- รอจนกว่า docker build container เสร็จ (สร้าง database testdb เสร็จ)
- เมื่อเสร็จแล้ว เปิด browser เข้า localhost เพื่อทดสอบการใช้งาน

