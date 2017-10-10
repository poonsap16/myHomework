วิธีใช้ helpers.php ใน Laravel
1. เอาไฟล์ไปใส่ใน app/
2. เขียน composer.json ให้ load file นี้ขึ้นมาได้ตามนี้
```json
"autoload": {
    "files": [
        "app/helpers.php"
    ]
}
```

3. เมื่อมีการแก้ไขไฟล์ composer.json ให้สั่ง composer dump-autoload ด้วยเพื่อให้เกิดผล
