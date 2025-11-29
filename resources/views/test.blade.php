<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Test Tom Select</title>

    <!-- Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
</head>
<body style="padding: 40px">

    <label for="clinic">เลือกคลินิก:</label>
    <select id="clinic" placeholder="ค้นหาคลินิก...">
        <option value="">-- เลือก --</option>
        <option>อายุรกรรม</option>
        <option>กุมารเวชกรรม</option>
        <option>สูตินรีเวช</option>
        <option>หู คอ จมูก</option>
        <option>จักษุ</option>
        <option>ผิวหนัง</option>
        <option>พัฒนาการเด็ก</option>
        <option>แพทย์แผนไทย</option>
        <option>เวชศาสตร์ฟื้นฟู</option>
        <option>อายุรกรรมต่อมไร้ท่อ</option>
    </select>

    <!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect("#clinic", {
            maxItems: 1,
            create: false,
            openOnFocus: true,          // เปิดลิสต์ทันทีเมื่อ focus
            placeholder: "ระบุ"
        });
    </script>

</body>
</html>
