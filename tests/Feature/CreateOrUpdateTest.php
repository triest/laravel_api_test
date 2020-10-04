<?php

    namespace Tests\Feature;

    use App\Services\HttpClient;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\File;
    use Tests\TestCase;

// vendor\bin\phpunit .\tests\Feature\ExampleTest.php

    class CreateOrUpdateTest extends TestCase
    {
        public function setUp(): void
        {
            parent::setUp();
            //do awesome thing
        }

        public function testPhoneNotSet()
        {
            $ch = curl_init('https://core.codepr.ru/api/v2/crm/user_create_or_update');
            curl_setopt($ch, CURLOPT_POST, true);
            $payload = json_encode(array("app_key" => "5240f691-60b0-4360-ac1f-836419c5408f"));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            curl_exec($ch);

            if (!curl_errno($ch)) {
                $info = curl_getinfo($ch);
            }

            curl_close($ch);
            $this->assertEquals(400, 400);

        }

        public function testCorrect()
        {
            $ch = curl_init('https://core.codepr.ru/api/v2/crm/user_create_or_update');
            curl_setopt($ch, CURLOPT_POST, true);
            $payload = json_encode(array(
                    "app_key" => "5240f691-60b0-4360-ac1f-836419c5408f",
                    "phone" => "+7114444444",
                    "name" => "name"
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            curl_exec($ch);

            if (!curl_errno($ch)) {
                $info = curl_getinfo($ch);
            }
            curl_close($ch);
            $this->assertEquals($info["http_code"], 200);
        }


        public function tetsLink()
        {
            $ch = curl_init('https://core.codepr.ru/api/v2/crm/user_create_or_update');
            curl_setopt($ch, CURLOPT_POST, true);
            $payload = json_encode(array(
                    "app_key" => "5240f691-60b0-4360-ac1f-836419c5408f",
                    "phone" => "+7114444444",
                    "name" => "name"
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            curl_exec($ch);

            if (!curl_errno($ch)) {
                $info = curl_getinfo($ch);
            }

            curl_close($ch);
            $this->assertEquals($info["http_code"], 200);
        }

        public function testLink()
        {
            $ch = curl_init('https://core.codepr.ru/api/v2/crm/user_create_or_update');
            curl_setopt($ch, CURLOPT_POST, true);
            $payload = json_encode(array(
                    "app_key" => "5240f691-60b0-4360-ac1f-836419c5408f",
                    "phone" => "+7114444444",
                    "name" => "Testname"
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Запускаем
            $result=curl_exec($ch);

            if (!curl_errno($ch)) {
                $info = curl_getinfo($ch);
            }
// Закрываем дескриптор
            curl_close($ch);
            $array=json_decode($result, true);

             $card_url=$array["card_url"];

       //      var_dump($card_url);
            //тест download card

            $ch = curl_init($card_url);

            $result=curl_exec($ch);
            curl_exec($ch);

            if (!curl_errno($ch)) {
                $info = curl_getinfo($ch);
            }
            $this->assertEquals($info["http_code"], 200);

        }


    }
