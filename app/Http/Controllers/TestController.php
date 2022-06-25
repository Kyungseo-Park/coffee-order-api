<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Office;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function category()
    {
        try {
            Office::truncate();
            Category::truncate();
            Product::truncate();
            Option::truncate();
        } catch (\Throwable $th) {
        }


        $office = [
            ['name' => "DNSEver 화인타워", 'address' => '화인타워', "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Office::insert($office);

        // TODO: 새로운 음료에 대한 카테고리는 API 에서 생성
        $categories = [
            ["office_id" => 1, 'slug' => Str::slug("Coffee"), 'name_ko' => '커피', 'name_en' => 'Coffee', 'sort' => 1, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["office_id" => 1, 'slug' => Str::slug("Tea"), 'name_ko' => '차', 'name_en' => 'Tea', 'sort' => 2, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["office_id" => 1, 'slug' => Str::slug("Drink"), 'name_ko' => '음료', 'name_en' => 'Drink', 'sort' => 3, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["office_id" => 1, 'slug' => Str::slug("Shake"), 'name_ko' => '쉐이크', 'name_en' => 'Shake', 'sort' => 4, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["office_id" => 1, 'slug' => Str::slug("ADE"), 'name_ko' => '에이드', 'name_en' => 'ADE', 'sort' => 5, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];

        Category::insert($categories);
        $coffees = [
            ["category_id" => 1, "slug" => Str::slug("Americano"), "name_ko" => "아메리카노", "name_en" => "Americano", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/americano.jpg", "sort" => 1, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Cafe latte"), "name_ko" => "카페라떼", "name_en" => "Cafe latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/americano.jpg", "sort" => 2, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("flat White"), "name_ko" => "플랫화이트", "name_en" => "flat White", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/flat-white.jpg", "sort" => 3, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Cappuccino"), "name_ko" => "카푸치노", "name_en" => "Cappuccino", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/cappuccino.jpg", "sort" => 4, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Vanilla latte"), "name_ko" => "바닐라라떼", "name_en" => "Vanilla latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/vanilla-latte.jpg", "sort" => 5, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Hazelunt latte"), "name_ko" => "헤이즐럿라떼", "name_en" => "Hazelunt latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/hazelunt-latte.jpg", "sort" => 6, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Caramel Macchiato"), "name_ko" => "카라멜 마끼아또", "name_en" => "Caramel Macchiato", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/caramel-macchiato.jpg", "sort" => 7, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Einspanner"), "name_ko" => "아인슈페너", "name_en" => "Einspanner", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/einspanner.jpg", "sort" => 8, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Creamlatte"), "name_ko" => "크림라떼", "name_en" => "Creamlatte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/creamlatte.jpg", "sort" => 9, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Dolcelatte"), "name_ko" => "돌체라떼", "name_en" => "Dolcelatte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/dolcelatte.jpg", "sort" => 10, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 1, "slug" => Str::slug("Cold brew"), "name_ko" => "콜드브루", "name_en" => "Cold brew", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/cold-brew.jpg", "sort" => 11, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Product::insert($coffees);

        $teas = [
            ["category_id" => 2, "slug" => Str::slug("Citron"), "name_ko" => "유자", "name_en" => "Citron", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/citron.jpg", "sort" => 1, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Lemon"), "name_ko" => "레몬", "name_en" => "Lemon", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/lemon.jpg", "sort" => 2, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Milk tea"), "name_ko" => "밀크티", "name_en" => "Milk tea", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/milk-tea.jpg", "sort" => 3, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Earl Grey"), "name_ko" => "얼그레이", "name_en" => "Earl Grey", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/earl-grey.jpg", "sort" => 4, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Mint"), "name_ko" => "민트", "name_en" => "Mint", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/mint.jpg", "sort" => 5, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Chamomile"), "name_ko" => "캐모마일", "name_en" => "Chamomile", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/chamomile.jpg", "sort" => 6, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Chamomile"), "name_ko" => "캐모마일", "name_en" => "Chamomile", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/chamomile.jpg", "sort" => 7, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Genmicha (Green tea)"), "name_ko" => "현미녹차", "name_en" => "Genmicha (Green tea)", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/genmicha-green-tea.jpg", "sort" => 8, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 2, "slug" => Str::slug("Peach ice tea"), "name_ko" => "아이스티", "name_en" => "Peach ice tea", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/coffee/peach-ice-tea.jpg", "sort" => 9, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Product::insert($teas);

        $drinks = [
            ["category_id" => 3, "slug" => Str::slug("Green tea latte"), "name_ko" => "녹차라떼", "name_en" => "Green tea latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/green-tea-latte.jpg", "sort" => 1, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 3, "slug" => Str::slug("Chocolate latte"), "name_ko" => "초코라떼", "name_en" => "Chocolate latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/chocolate-latte.jpg", "sort" => 2, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 3, "slug" => Str::slug("Sweet potato latte"), "name_ko" => "고구마라떼", "name_en" => "Sweet potato latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/sweet-potato-latte.jpg", "sort" => 3, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 3, "slug" => Str::slug("Grain latte"), "name_ko" => "곡물라떼", "name_en" => "Grain latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/grain-latte.jpg", "sort" => 4, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 3, "slug" => Str::slug("Strawberry latte"), "name_ko" => "딸기라떼", "name_en" => "Strawberry latte", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/strawberry-latte.jpg", "sort" => 5, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Product::insert($drinks);

        $shakes = [
            [
                "category_id" => 4,
                "slug" => Str::slug("Milk shake"),
                "name_ko" => "밀크쉐이크",
                "name_en" => "Milk shake",
                "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/milk-shake.jpg",
                "sort" => 1,
                "star" => false,
                "status" => "sell",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 4,
                "slug" => Str::slug("Strawberry shake"),
                "name_ko" => "딸기쉐이크",
                "name_en" => "Strawberry shake",
                "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/strawberry-shake.jpg",
                "sort" => 2,
                "star" => false,
                "status" => "sell",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()],
            ["category_id" => 4,
                "slug" => Str::slug("Plain yogurt smoothie"),
                "name_ko" => "플레인요거트스무디",
                "name_en" => "Plain yogurt smoothie",
                "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/plain-yogurt-smoothie.jpg",
                "sort" => 3,
                "star" => false,
                "status" => "sell",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 4,
                "slug" => Str::slug("Cookies and Cream shake"),
                "name_ko" => "쿠앤크쉐이크",
                "name_en" => "Cookies and Cream shake",
                "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/cookies-and-cream-shake.jpg",
                "sort" => 4,
                "star" => false,
                "status" => "sell",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 4,
                "slug" => Str::slug("Banana shake"),
                "name_ko" => "바나나쉐이크",
                "name_en" => "Banana shake",
                "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/banana-shake.jpg",
                "sort" => 5,
                "star" => true,
                "status" => "sell",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Product::insert($shakes);

        $ade = [
            ["category_id" => 5, "slug" => Str::slug("Lemonade"), "name_ko" => "레몬에이드", "name_en" => "Lemonade", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/lemonade.gif", "sort" => 1, "star" => false, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 5, "slug" => Str::slug("Grapefruit ade"), "name_ko" => "자몽에이드", "name_en" => "Grapefruit ade", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/grapefruit-ade.jpg", "sort" => 2, "star" => false, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 5, "slug" => Str::slug("Cherry ade"), "name_ko" => "체리에이드", "name_en" => "Cherry ade", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/cherry-ade.jpg", "sort" => 3, "star" => false, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 5, "slug" => Str::slug("Lemon and Pomegranate shake"), "name_ko" => "레몬석류에이드", "name_en" => "Lemon and Pomegranate shake", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/lemon-and-pomegranate-shake.jpg", "sort" => 4, "star" => true, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["category_id" => 5, "slug" => Str::slug("Ginc ade"), "name_ko" => "진크에이드", "name_en" => "Ginc ade", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/pruducts/1/ginc-ade.jpg", "sort" => 5, "star" => true, "status" => "sell", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Product::insert($ade);

        $options = [
            ["slug" => Str::slug("Extra shot"), "name_ko" => "샷 추가", "name_en" => "Extra shot", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/options/1/extra-shot.jpg", "sort" => "1", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["slug" => Str::slug("Change Milk"), "name_ko" => "우유 변경", "name_en" => "Change Milk", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/options/1/change-milk.jpg", "sort" => "2", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["slug" => Str::slug("Decaffein"), "name_ko" => "디카페인", "name_en" => "Decaffein", "thumbnail" => "https://coffee-order.s3.ap-northeast-2.amazonaws.com/public/options/1/decaffein.jpg", "sort" => "3", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ];
        Option::insert($options);

        $products = Product::all();
        $options = Option::all();
        foreach ($products as $value) {
            foreach ($options as $op) {
                DB::table('product_option')->insert([
                    "product_id" => $value->id,
                    "option_id" => $op->id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            }
        }
    }

    public function backdoor()
    {
        $faker = \Faker\Factory::create();
        return User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('password'),
            'auth' => 'master',
            'office_id' => 1,
            'Invitation_link' => 'backdoor',
        ]);
    }
}

