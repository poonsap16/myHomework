<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function display($resource, $topic)
    {
        $items = $this->loadCSV($resource . '-' . $topic); // โหลดข้อมูลโดยนำค่าจาก route มาเป็นชื่อไฟล์

        if ($items) { // ถ้ามีข้อมูลจากการโหลดก็ทำต่อ

            if ($resource == 'consults') {
                // กำหนดสีพื้นหลังตามโจย์
                $backgroundColors = ['base' => 'pink', 'alternate' => 'aqua'];

                // topic นี้กำหนดสีพื้นเองไม่ได้ ต้องโหลดข้อมูลอีกชุดมาใช้
                if ($topic == 'case') {
                    $doctors = $this->loadCSV('consults-doctor');
                }

                // ตึงข้อมูลที่โหลดมา process ทีละตัว
                foreach ($items as $item) {

                    // จัดข้อความตาม topic โดย divText คือข้อความที่จะแสดงใน div ส่วน divClass เอาไว้จัด style
                    if ($topic == 'case') {
                        $divText = $item['an'] . ' รับเคสโดยแพทย์ ' . $item['doctor'];
                        $divClass = $this->searchArray($doctors, 'doctor', $item['doctor'])['gender'] == 'female' ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    } else {
                        $divText = $item['doctor'] . ' เพศ' . ($item['gender'] == 'female' ? 'หญิง' : 'ชาย');
                        $divClass = $item['gender'] == 'female' ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    }
                }
                return view('index', ['data' => $data, 'backgroundColors' => $backgroundColors]);
            }

            if ($resource == 'employees') {
                // กำหนดสีพื้นหลังตามโจย์
                $backgroundColors = ['base' => 'green', 'alternate' => 'red'];

                // topic นี้กำหนดสีพื้นเองไม่ได้ ต้องโหลดข้อมูลอีกชุดมาใช้
                if ($topic == 'position') {
                    $scores = $this->loadCSV('employees-mu-test-score');
                }

                // ตึงข้อมูลที่โหลดมา process ทีละตัว
                foreach ($items as $item) {

                    // จัดข้อความตาม topic โดย divText คือข้อความที่จะแสดงใน div ส่วน divClass เอาไว้จัด style
                    if ($topic == 'position') {
                        $divText = $item['name'] . ' เป็นเจ้าหน้าที่ฝ่าย' . $item['position'];
                        $divClass = $this->searchArray($scores, 'name', $item['name'])['mu_test_score'] >= 36 ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    } else {
                        $divText = $item['name'] . ' สอบได้ mu-test ' . $item['mu_test_score'] . ' คะแนน';
                        $divClass = $item['mu_test_score'] >= 36 ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    }
                }
                return view('index', ['data' => $data, 'backgroundColors' => $backgroundColors]);
            }

            if ($resource == 'phones') {
                // กำหนดสีพื้นหลังตามโจย์
                $backgroundColors = ['base' => 'green', 'alternate' => 'red'];

                // topic นี้กำหนดสีพื้นเองไม่ได้ ต้องโหลดข้อมูลอีกชุดมาใช้
                if ($topic == 'sell') {
                    $scores = $this->loadCSV('phones-price');
                }

                // ตึงข้อมูลที่โหลดมา process ทีละตัว
                foreach ($items as $item) {

                    // จัดข้อความตาม topic โดย divText คือข้อความที่จะแสดงใน div ส่วน divClass เอาไว้จัด style
                    if ($topic == 'sell') {
                        $divText = $item['name'] . ' ขายได้ ' . $item['sell'] . ' เครื่อง';
                        $divClass = $this->searchArray($scores, 'name', $item['name'])['price'] > 19500 ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    } else {
                        $divText = $item['name'] . ' ราคา ' . $item['price'] . ' บาท';
                        $divClass = $item['price'] > 19500 ? 'base' : 'alternate';
                        $data[$divText] = $divClass;
                    }
                }
                return view('index', ['data' => $data, 'backgroundColors' => $backgroundColors]);
            }
        }

        // ไม่มีข้อมูลจากการโหลด ให้แจ้งว่าไม่พบหน้าที่ค้นหา error code 404
        abort(404);
    }

    /**
     * Read file in storage/csv then return collection of assosiative array.
     *
     * @param string
     * @return array
     */
    private function loadCSV($fileName)
    {
        $fileName = storage_path(). '/csv/' . $fileName . '.csv';
        if (!file_exists($fileName) || !is_readable($fileName)) {
            return [];
        } else {
            $header = null;
            if (($handle = fopen($fileName, 'r')) !== false) {
                while (($row = fgetcsv($handle, 3000, ",")) !== false) { // 3000 = max lenght of longest line
                    if (!$header) {
                        $header = $row;
                    } else {
                        $data[] = array_combine($header, $row);
                    }
                }
            }
            fclose($handle);
            return $data;
        }
    }

    private function searchArray(&$items, $key, $search)
    {
        foreach ($items as $item) {
            if ($item[$key] == $search) {
                return $item;
            }
        }
    }
}
