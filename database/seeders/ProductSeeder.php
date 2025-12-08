<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            'Fast Foods' => [
                ['en' => 'Cheese Burger', 'ru' => 'Чизбургер', 'tm' => 'Çiz burger'],
                ['en' => 'Chicken Nuggets', 'ru' => 'Куриные наггетсы', 'tm' => 'Towuk naggetleri'],
                ['en' => 'Fries', 'ru' => 'Картофель фри', 'tm' => 'Fri kartof'],
                ['en' => 'Hot Dog', 'ru' => 'Хот-дог', 'tm' => 'Hot-dog'],
                ['en' => 'Onion Rings', 'ru' => 'Луковые кольца', 'tm' => 'Sogan halkasy'],
                ['en' => 'Zinger Burger', 'ru' => 'Зингер бургер', 'tm' => 'Zinger burger'],
                ['en' => 'Mini Pizza', 'ru' => 'Мини-пицца', 'tm' => 'Mini pizza'],
                ['en' => 'Chicken Wrap', 'ru' => 'Куриный ролл', 'tm' => 'Towuk wrap (roll)'],
                ['en' => 'Mozzarella Sticks', 'ru' => 'Сырные палочки моцарелла', 'tm' => 'Mozzarella çöpleri'],
                ['en' => 'BBQ Wings', 'ru' => 'Крылья BBQ', 'tm' => 'BBQ ganatlar'],
                ['en' => 'Corn Dog', 'ru' => 'Корн дог', 'tm' => 'Korn dog'],
                ['en' => 'Loaded Nachos', 'ru' => 'Начос с начинкой', 'tm' => 'Nahatly nahoç'],
            ],
            'Soups' => [
                ['en' => 'Tomato Soup', 'ru' => 'Томатный суп', 'tm' => 'Pomidor çorbasy'],
                ['en' => 'Chicken Noodle Soup', 'ru' => 'Куриный суп с лапшой', 'tm' => 'Towukly şehriýeli şorba'],
                ['en' => 'Mushroom Cream Soup', 'ru' => 'Грибной крем-суп', 'tm' => 'Mantar krem-şorba'],
                ['en' => 'Lentil Soup', 'ru' => 'Чечевичный суп', 'tm' => 'Nohut şorba'],
                ['en' => 'Pumpkin Soup', 'ru' => 'Тыквенный суп', 'tm' => 'Kädi şorba'],
                ['en' => 'Vegetable Soup', 'ru' => 'Овощной суп', 'tm' => 'Göktizelen şorba'],
                ['en' => 'Beef Soup', 'ru' => 'Говяжий суп', 'tm' => 'Sygyr eti şorba'],
                ['en' => 'Clam Chowder', 'ru' => 'Суп Чаудер с моллюсками', 'tm' => 'Klem çowder şorba'],
                ['en' => 'French Onion Soup', 'ru' => 'Французский луковый суп', 'tm' => 'Fransuz sogan şorbasy'],
                ['en' => 'Minestrone', 'ru' => 'Минестроне', 'tm' => 'Minestrone'],
                ['en' => 'Seafood Bisque', 'ru' => 'Биск из морепродуктов', 'tm' => 'Deňiz önümleri bisk'],
                ['en' => 'Chicken & Corn Soup', 'ru' => 'Суп с курицей и кукурузой', 'tm' => 'Towukly we mekgejöwenli şorba'],
            ],
            'Desserts' => [
                ['en' => 'Chocolate Cake', 'ru' => 'Шоколадный торт', 'tm' => 'Şokolad torty'],
                ['en' => 'Brownie', 'ru' => 'Брауни', 'tm' => 'Brouni'],
                ['en' => 'Cheesecake', 'ru' => 'Чизкейк', 'tm' => 'Çizkeýk'],
                ['en' => 'Ice Cream Sundae', 'ru' => 'Мороженое Сандэй', 'tm' => 'Sundae doňdurma'],
                ['en' => 'Tiramisu', 'ru' => 'Тирамису', 'tm' => 'Tiramisu'],
                ['en' => 'Panna Cotta', 'ru' => 'Панна-котта', 'tm' => 'Panna kotta'],
                ['en' => 'Cupcake', 'ru' => 'Капкейк', 'tm' => 'Kapkeýk'],
                ['en' => 'Apple Pie', 'ru' => 'Яблочный пирог', 'tm' => 'Alma pirogy'],
                ['en' => 'Creme Brulee', 'ru' => 'Крем-брюле', 'tm' => 'Krem brýule'],
                ['en' => 'Donuts', 'ru' => 'Пончики', 'tm' => 'Donutlar'],
                ['en' => 'Macarons', 'ru' => 'Макароны', 'tm' => 'Makaronlar (Süýji)'],
                ['en' => 'Churros', 'ru' => 'Чуррос', 'tm' => 'Çurros'],
            ],
            'Salads' => [
                ['en' => 'Caesar Salad', 'ru' => 'Салат Цезарь', 'tm' => 'Sezar salat'],
                ['en' => 'Greek Salad', 'ru' => 'Греческий салат', 'tm' => 'Grek salat'],
                ['en' => 'Tuna Salad', 'ru' => 'Салат с тунцом', 'tm' => 'Tunsaly salat'],
                ['en' => 'Garden Salad', 'ru' => 'Салат из свежих овощей', 'tm' => 'Bag salat'],
                ['en' => 'Cobb Salad', 'ru' => 'Салат Кобб', 'tm' => 'Kobb salat'],
                ['en' => 'Caprese Salad', 'ru' => 'Салат Капрезе', 'tm' => 'Kapreze salat'],
                ['en' => 'Quinoa Salad', 'ru' => 'Салат с киноа', 'tm' => 'Kinoa salat'],
                ['en' => 'Spinach Salad', 'ru' => 'Салат со шпинатом', 'tm' => 'Isfahanakly salat'],
                ['en' => 'Kale Salad', 'ru' => 'Салат с капустой кале', 'tm' => 'Kale salat'],
                ['en' => 'Waldorf Salad', 'ru' => 'Салат Уолдорф', 'tm' => 'Waldorf salat'],
                ['en' => 'Potato Salad', 'ru' => 'Картофельный салат', 'tm' => 'Kartofel salat'],
                ['en' => 'Pasta Salad', 'ru' => 'Салат с макаронами', 'tm' => 'Makaronly salat'],
            ],
            'Pizzas' => [
                ['en' => 'Pepperoni Pizza', 'ru' => 'Пицца Пепперони', 'tm' => 'Pepperoni pizza'],
                ['en' => 'Margherita Pizza', 'ru' => 'Пицца Маргарита', 'tm' => 'Margherita pizza'],
                ['en' => 'BBQ Chicken Pizza', 'ru' => 'Пицца с курицей BBQ', 'tm' => 'BBQ towukly pizza'],
                ['en' => 'Veggie Supreme Pizza', 'ru' => 'Пицца Овощной Сюрприз', 'tm' => 'Supreme gök önüm pizza'],
                ['en' => 'Hawaiian Pizza', 'ru' => 'Гавайская пицца', 'tm' => 'Gawaý pizza'],
                ['en' => 'Four Cheese Pizza', 'ru' => 'Пицца Четыре Сыра', 'tm' => 'Dört peýnirli pizza'],
                ['en' => 'Meat Lovers Pizza', 'ru' => 'Пицца для любителей мяса', 'tm' => 'Et söýüjiler pizza'],
                ['en' => 'Buffalo Chicken Pizza', 'ru' => 'Пицца с курицей Баффало', 'tm' => 'Buffalo towukly pizza'],
                ['en' => 'Mushroom Pizza', 'ru' => 'Грибная пицца', 'tm' => 'Mantar pizza'],
                ['en' => 'Sausage Pizza', 'ru' => 'Пицца с колбасой', 'tm' => 'Sosiskaly pizza'],
                ['en' => 'Spinach Pizza', 'ru' => 'Пицца со шпинатом', 'tm' => 'Isfahanakly pizza'],
                ['en' => 'Seafood Pizza', 'ru' => 'Пицца с морепродуктами', 'tm' => 'Deňiz önümli pizza'],
            ],
            'Pastas' => [
                ['en' => 'Spaghetti Bolognese', 'ru' => 'Спагетти Болоньезе', 'tm' => 'Spagetti Boloneze'],
                ['en' => 'Fettuccine Alfredo', 'ru' => 'Феттучини Альфредо', 'tm' => 'Fettuçini Alfredo'],
                ['en' => 'Mac & Cheese', 'ru' => 'Макароны с сыром', 'tm' => 'Makaron we peýnir'],
                ['en' => 'Penne Arrabbiata', 'ru' => 'Пенне Аррабиата', 'tm' => 'Penne Arrabiata'],
                ['en' => 'Lasagna', 'ru' => 'Лазанья', 'tm' => 'Lasanýa'],
                ['en' => 'Ravioli', 'ru' => 'Равиоли', 'tm' => 'Ravioli'],
                ['en' => 'Carbonara', 'ru' => 'Карбонара', 'tm' => 'Karbonara'],
                ['en' => 'Seafood Pasta', 'ru' => 'Паста с морепродуктами', 'tm' => 'Deňiz önümli pasta'],
                ['en' => 'Pesto Pasta', 'ru' => 'Паста Песто', 'tm' => 'Pesto pasta'],
                ['en' => 'Chicken Alfredo', 'ru' => 'Паста с курицей Альфредо', 'tm' => 'Towukly Alfredo pasta'],
                ['en' => 'Baked Ziti', 'ru' => 'Запеченный Зити', 'tm' => 'Bişirilen Ziti'],
                ['en' => 'Shrimp Scampi', 'ru' => 'Креветки Скампи', 'tm' => 'Krevetka Skampi'],
            ],
            'Seafood' => [
                ['en' => 'Grilled Salmon', 'ru' => 'Лосось на гриле', 'tm' => 'Grillenen losos'],
                ['en' => 'Garlic Butter Shrimp', 'ru' => 'Креветки в чесночном масле', 'tm' => 'Sarymsakly ýagly krevetka'],
                ['en' => 'Fish & Chips', 'ru' => 'Рыба и чипсы', 'tm' => 'Balyk we çips'],
                ['en' => 'Seafood Pasta', 'ru' => 'Паста с морепродуктами', 'tm' => 'Deňiz önümli pasta'],
                ['en' => 'Lobster Tail', 'ru' => 'Хвост омара', 'tm' => 'Omor guýrugy'],
                ['en' => 'Crab Cakes', 'ru' => 'Крабовые котлеты', 'tm' => 'Krab kotletleri'],
                ['en' => 'Fried Calamari', 'ru' => 'Жареные кальмары', 'tm' => 'Gowrulan kalamari'],
                ['en' => 'Tuna Steak', 'ru' => 'Стейк из тунца', 'tm' => 'Tuns steýk'],
                ['en' => 'Grilled Octopus', 'ru' => 'Осьминог на гриле', 'tm' => 'Grillenen osminog'],
                ['en' => 'Clams in White Wine', 'ru' => 'Моллюски в белом вине', 'tm' => 'Ak şerabdaky klem'],
                ['en' => 'Salmon Teriyaki', 'ru' => 'Лосось Терияки', 'tm' => 'Losos Teriyaki'],
                ['en' => 'Shrimp Cocktail', 'ru' => 'Коктейль из креветок', 'tm' => 'Krevetka kokteýli'],
            ],
            'Breakfast' => [
                ['en' => 'Pancakes', 'ru' => 'Панкейки', 'tm' => 'Pankeýkler'],
                ['en' => 'French Toast', 'ru' => 'Французский тост', 'tm' => 'Fransuz tost'],
                ['en' => 'Omelette', 'ru' => 'Омлет', 'tm' => 'Omlet'],
                ['en' => 'English Breakfast', 'ru' => 'Английский завтрак', 'tm' => 'Iňlis ertirligi'],
                ['en' => 'Waffles', 'ru' => 'Вафли', 'tm' => 'Wafliler'],
                ['en' => 'Bagel with Cream Cheese', 'ru' => 'Бейгл с сырным кремом', 'tm' => 'Kremli peýnirli beýgel'],
                ['en' => 'Breakfast Burrito', 'ru' => 'Буррито на завтрак', 'tm' => 'Ertirlik burrito'],
                ['en' => 'Eggs Benedict', 'ru' => 'Яйца Бенедикт', 'tm' => 'Benedikt ýumurtgasy'],
                ['en' => 'Avocado Toast', 'ru' => 'Тост с авокадо', 'tm' => 'Awokadoly tost'],
                ['en' => 'Granola Bowl', 'ru' => 'Гранола в миске', 'tm' => 'Granola çanak'],
                ['en' => 'Smoothie Bowl', 'ru' => 'Смузи в миске', 'tm' => 'Smusi çanak'],
                ['en' => 'Breakfast Sandwich', 'ru' => 'Сэндвич на завтрак', 'tm' => 'Ertirlik sendwiç'],
            ],
            'Grills' => [
                ['en' => 'BBQ Ribs', 'ru' => 'Рёбрышки BBQ', 'tm' => 'BBQ gapyrgasy'],
                ['en' => 'Grilled Chicken', 'ru' => 'Курица на гриле', 'tm' => 'Grillenen towuk'],
                ['en' => 'Lamb Kebab', 'ru' => 'Кебаб из баранины', 'tm' => 'Guzu kebaby'],
                ['en' => 'Mixed Grill Platter', 'ru' => 'Ассорти на гриле', 'tm' => 'Garyşyk grill assortisi'],
                ['en' => 'Grilled Steak', 'ru' => 'Стейк на гриле', 'tm' => 'Grillenen steýk'],
                ['en' => 'Grilled Vegetables', 'ru' => 'Овощи на гриле', 'tm' => 'Grillenen gök önümler'],
                ['en' => 'Pork Chops', 'ru' => 'Свиные отбивные', 'tm' => 'Doňuz eti çop'],
                ['en' => 'Grilled Sausages', 'ru' => 'Колбаски на гриле', 'tm' => 'Grillenen sosiska'],
                ['en' => 'Chicken Skewers', 'ru' => 'Куриные шашлычки', 'tm' => 'Towuk şişlikleri'],
                ['en' => 'Beef Skewers', 'ru' => 'Говяжьи шашлычки', 'tm' => 'Sygyr eti şişlikleri'],
                ['en' => 'Grilled Fish', 'ru' => 'Рыба на гриле', 'tm' => 'Grillenen balyk'],
                ['en' => 'BBQ Tofu', 'ru' => 'Тофу BBQ', 'tm' => 'BBQ Tofu'],
            ],
            'Burgers' => [
                ['en' => 'Classic Beef Burger', 'ru' => 'Классический говяжий бургер', 'tm' => 'Klassiki sygyr eti burger'],
                ['en' => 'Cheese Burger', 'ru' => 'Чизбургер', 'tm' => 'Çiz burger'],
                ['en' => 'Chicken Burger', 'ru' => 'Куриный бургер', 'tm' => 'Towuk burger'],
                ['en' => 'Double Smash Burger', 'ru' => 'Двойной Смэш Бургер', 'tm' => 'Goşa Smash burger'],
                ['en' => 'Veggie Burger', 'ru' => 'Вегетарианский бургер', 'tm' => 'Weggie burger'],
                ['en' => 'Bacon Burger', 'ru' => 'Бургер с беконом', 'tm' => 'Bekonly burger'],
                ['en' => 'Mushroom Swiss Burger', 'ru' => 'Бургер с грибами и сыром Свисс', 'tm' => 'Mantarly Şweýsar peýnirli burger'],
                ['en' => 'Spicy Chicken Burger', 'ru' => 'Острый куриный бургер', 'tm' => 'Ajy towuk burger'],
                ['en' => 'BBQ Burger', 'ru' => 'Бургер BBQ', 'tm' => 'BBQ burger'],
                ['en' => 'Turkey Burger', 'ru' => 'Бургер с индейкой', 'tm' => 'Hindi towuk burger'],
                ['en' => 'Fish Burger', 'ru' => 'Рыбный бургер', 'tm' => 'Balyk burger'],
                ['en' => 'Buffalo Burger', 'ru' => 'Бургер Баффало', 'tm' => 'Buffalo burger'],
            ],
            'Drinks' => [
                ['en' => 'Coffee', 'ru' => 'Кофе', 'tm' => 'Kofe'],
                ['en' => 'Tea', 'ru' => 'Чай', 'tm' => 'Çaý'],
                ['en' => 'Orange Juice', 'ru' => 'Апельсиновый сок', 'tm' => 'Apelsin suwy'],
                ['en' => 'Smoothie', 'ru' => 'Смузи', 'tm' => 'Smusi'],
                ['en' => 'Milkshake', 'ru' => 'Молочный коктейль', 'tm' => 'Milkşeýk'],
                ['en' => 'Coca Cola', 'ru' => 'Кока-Кола', 'tm' => 'Koka Kola'],
                ['en' => 'Pepsi', 'ru' => 'Пепси', 'tm' => 'Pepsi'],
                ['en' => 'Fresh Lemonade', 'ru' => 'Свежий лимонад', 'tm' => 'Täze limonad'],
                ['en' => 'Iced Tea', 'ru' => 'Холодный чай', 'tm' => 'Sowuk çaý'],
                ['en' => 'Hot Chocolate', 'ru' => 'Горячий шоколад', 'tm' => 'Yssy şokolad'],
                ['en' => 'Apple Juice', 'ru' => 'Яблочный сок', 'tm' => 'Alma suwy'],
                ['en' => 'Energy Drink', 'ru' => 'Энергетический напиток', 'tm' => 'Energetiki içgi'],
            ],
            'Snacks' => [
                ['en' => 'Nachos', 'ru' => 'Начос', 'tm' => 'Nahoç'],
                ['en' => 'Popcorn', 'ru' => 'Попкорн', 'tm' => 'Popkorn'],
                ['en' => 'Pretzel', 'ru' => 'Крендель', 'tm' => 'Pretzel'],
                ['en' => 'Potato Chips', 'ru' => 'Картофельные чипсы', 'tm' => 'Kartof çipsi'],
                ['en' => 'Trail Mix', 'ru' => 'Смесь для перекуса', 'tm' => 'Gatnaşyk garyndy'],
                ['en' => 'Cheese Sticks', 'ru' => 'Сырные палочки', 'tm' => 'Peýnir çöpleri'],
                ['en' => 'Fruit Bowl', 'ru' => 'Фруктовая тарелка', 'tm' => 'Miweli çanak'],
                ['en' => 'Veggie Sticks', 'ru' => 'Овощные палочки', 'tm' => 'Gök önüm çöpleri'],
                ['en' => 'Mini Sandwiches', 'ru' => 'Мини-сэндвичи', 'tm' => 'Mini sendwiçler'],
                ['en' => 'Chicken Fingers', 'ru' => 'Куриные пальчики', 'tm' => 'Towuk barmaklary'],
                ['en' => 'Spring Rolls', 'ru' => 'Весенние роллы', 'tm' => 'Ýaz rollary'],
                ['en' => 'Mozzarella Balls', 'ru' => 'Шарики моцарелла', 'tm' => 'Mozzarella toplary'],
            ],
        ];

        foreach ($products as $categoryName => $productList) {
            $category = Category::where('name', $categoryName)->first();

            if (!$category) continue;

            foreach ($productList as $p) {
                Product::create([
                    'category_id' => $category->id,

                    'name' => $p['en'],
                    'name_ru' => $p['ru'],
                    'name_tm' => $p['tm'],

                    'price' => rand(5, 50),
                    'code' => 'PRD-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),

                    'description' => 'Delicious ' . $p['en'],
                    'description_ru' => 'Вкусный ' . $p['ru'],
                    'description_tm' => 'Tagamly ' . $p['tm'],

                    'image' => null,
                    'discount_percent' => rand(0, 30),
                    'weight' => rand(1, 500) / 100,
                ]);
            }
        }
    }
}
