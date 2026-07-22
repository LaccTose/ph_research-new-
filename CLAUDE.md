# Role & Task Summary
คุณคือ Senior Full-Stack Developer ผู้เชี่ยวชาญ Laravel 12 และ Tailwind CSS 
จงสร้างระบบบริหารจัดการและรายงานข้อมูลสาธารณสุข (Primary Care Health Management System) โดยเน้นความปลอดภัย ความถูกต้องของ UX/UI และโค้ดระดับ Production-Ready

---

## 🛠️ Tech Stack & Environment
- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** TailwindCSS 3.x, Alpine.js, Vite
- **Database:** SQLite (default)
- **Authentication:** Laravel Breeze (Role-based Authorization)
- **Testing:** PestPHP 4.x
- **Commands:**
  - Setup: `composer setup`
  - Dev: `composer dev` (รัน server + queue + logs + vite พร้อมกัน)
  - Test: `composer test`

---

## 🎨 Design Rules & UI Standards
- **Color Theme:** โทนสีหลักใช้ `green-700` (`#15803d`) และเฉดสีเขียวสาธารณสุข
- **Font Family:** ฟอนต์หลักของระบบใช้ "Sao Chingcha" (เสาชิงช้า)
- **Responsive:** รองรับทั้งหน้าจอ Desktop และ Mobile
- **Accessibility:** ห้ามมี Duplicate HTML IDs, ใส่ ARIA attributes ให้กับปุ่มและสื่อสัญลักษณ์ทุกจุด
- **Clean Frontend:** ห้ามเขียน Inline JS ให้แยก Logic ไปไว้ที่ Alpine.js Component และลบ `console.log` ออกทั้งหมด

---

## 🔐 Security & Authorization Architecture (Strict Rules)
1. **Protected Routes:** Route กลุ่มปฐมภูมิทั้งหมด (`/primary/*` ได้แก่ UMSC, SMC, PCU, PHCP) ต้องครอบด้วย `auth` และ `role` Middleware เพื่อป้องกันผู้ใช้ที่ไม่ล็อกอินแอบเข้าถึง
2. **Mass Assignment Protection:** ห้ามใส่ฟิลด์สิทธิ์ เช่น `is_admin` หรือ `role` ใน `$fillable` ของ Model เด็ดขาด
3. **Public Access:** หน้า Dashboard สรุปภาพรวมเปิดเป็น Public ให้ประชาชนทั่วไปเข้าชมได้โดยไม่ต้อง Login

---

## 🗄️ Database Schema Context (สำหรับระบบโซนและหน่วยบริการ)
- **Zones & Districts:**
  - ตาราง `health_centers` (ศบส./สถานพยาบาล) ให้เก็บสัมพันธ์กับ `zone_name` (กลุ่มโซน) และ `district_group` (กลุ่มเขต) เพื่อให้ Dashboard สามารถ Filter กรองยอดรวมตาม โซน / กลุ่มเขต / ศบส. รายแห่งได้

---

## 📦 System Modules & Specific Requirements

### 1. โมดูลหลักในระบบ
- **UMSC** (ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตร้อน)
- **SMC** (คลินิกพิเศษรับส่งต่อ)
- **PCU** (ศูนย์แพทย์ชุมชนเมือง)
- **PHCP** (ศูนย์บริการสาธารณสุขพลัส)
- **Events Calendar:** ระบบปฏิทินบันทึกข้อมูลการประชุม / การจัดกิจกรรม / การจัดงาน

---

### 2. รายละเอียดเฉพาะสำหรับ `smc_report` (คลินิกพิเศษรับส่งต่อ)

โครงสร้างโฟลเดอร์ Views: `resources/views/smc_report/`
ประกอบด้วย 4 หน้าหลัก:

#### (1) หน้ารายงานการให้บริการ (`index.blade.php`)
- แสดงตารางรายการรายงานที่บันทึกสำเร็จ ดึงข้อมูลมาจากฐานข้อมูล
- **Columns:** ลำดับ | รายการบันทึกรายงาน | ผู้รายงาน (ชื่อจาก username ที่ login) | วันที่บันทึก | เวลา | ปุ่มแก้ไข | ปุ่มลบ | หมายเหตุ
- **Edit Action:** กด Icon แก้ไข จะส่งไปหน้า `edit.blade.php` พร้อมดึงข้อมูลเดิมมาค้างในฟอร์มเพื่ออัปเดตแทนที่ข้อมูลเดิม

#### (2) หน้าเพิ่มรายงานใหม่ (`create.blade.php`)
- **ส่วนที่ 1 (ข้อมูลทั่วไป):** Dropdown ตัวเลือกคลินิกพิเศษ และ ตัวเลือก เดือน/ปี
- **ส่วนที่ 2 (จำนวนผู้รับบริการ):** เป็น Dynamic Form ควบคุมด้วย Alpine.js
  - ใช้กับเงื่อนไขข้อ 2 (Refer In) และข้อ 4 (Refer Out รพ.)
  - **Logic & Validations:**
    1. ต้องเลือกสถานพยาบาลและกรอกจำนวนครั้งให้ครบในแถวจจุบัน ก่อนจึงจะกดปุ่ม "เพิ่มแถวใหม่" ได้
    2. **ห้ามเลือกสถานพยาบาลซ้ำ** ในรายการที่เพิ่มไปแล้ว
    3. ปุ่ม "ลบแถว" จะเริ่มปรากฏตั้งแต่องค์ประกอบแถวที่ 2 เป็นต้นไป (แถวแรกห้ามลบ)
    4. กดปุ่ม 'ยกเลิก' ให้รีเซ็ตคืนค่าฟอร์มและลบแถวที่เพิ่มให้อยู่ในสถานะเริ่มต้น
    5. หากกรอกข้อมูลไม่ครบแล้วกด 'บันทึก' ให้แสดง Validation Error แจ้งเตือน
    6. ใส่ระบบเคลียร์ Form Data เมื่อผู้ใช้กด Back/Forward ในเบราว์เซอร์ (`pageshow` event handling)

#### (3) หน้าแก้ไขรายงาน (`edit.blade.php`)
- แสดงฟอร์มเหมือนหน้า `create.blade.php` แต่เติมข้อมูลเดิมลงในช่องต่างๆ พร้อมรองรับการกดอัปเดตข้อมูล

#### (4) หน้า Dashboard ภาพรวม (`dashboard.blade.php`) [Public Route]
- แสดงการสรุปยอดเป็น Card ตัวเลขยอดรวม + กราฟประมวลผล (ใช้ Chart.js หรือ ApexCharts)
- **หัวข้อการแสดงผล:**
  1. ผู้รับบริการคลินิกพิเศษ รวมจำนวนทั้งสิ้น (ครั้ง)
  2. ผู้รับบริการคลินิกพิเศษ (Walk in) (ครั้ง)
  3. ผู้รับบริการคลินิกพิเศษ (Refer in) (ครั้ง)
  4. Teleconsult (ระหว่าง ศบส. กับ ศบส.) (ครั้ง)
- **Filter Controls:** มี Filter Dropdown ให้ผู้ใช้เลือกกรองตาม:
  - กลุ่มโซน
  - กลุ่มเขต
  - ศูนย์บริการสาธารณสุข (ศบส.)
  - เดือน/ปี

---

## 🚀 Expected Output
จงสร้างไฟล์ Controller, Models, Migrations, Routes, และ Blade Views พร้อมสคริปต์ Alpine.js และ Pest Test Cases ที่ตรงตามเงื่อนไขด้านบนทั้งหมด