<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\ProductsCharacters;
use App\Models\ProductsCharactersOptions;
use App\Models\ProductsCharactersValues;

class ProductCharacterValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use ru_RU for names where it helps
        $this->faker = fake('ru_RU');

        // ---- SEED EACH CATEGORY ----
        $this->seedBooks();
        $this->seedPhones();
        $this->seedHomeAppliances();
        $this->seedClimateControl();
        $this->seedComputers();
        $this->seedSportsOutdoors();
        $this->seedHomeOfficeSupplies();
        $this->seedTvVideoAudio();
        $this->seedGamingGear();
    }

    /* ------------------------------------------------------------
    | Helpers
    * ------------------------------------------------------------ */

    protected function getProductIdsByCategorySlugOrRange(string $slug, array $fallbackRange): \Illuminate\Support\Collection
    {
        // Prefer category slug → product ids
        $catId = DB::table('categories')->where('slug', $slug)->value('id');

        if ($catId) {
            return Products::where('category_id', $catId)->pluck('id');
        }

        // Fallback to fixed id range if category not found
        [$from, $to] = $fallbackRange;
        return Products::whereBetween('id', [$from, $to])->pluck('id');
    }

    protected function getOrCreateCharacteristic(string $slug, string $name, string $type, ?string $unit = null, int $sort = 0): ProductsCharacters
    {
        $char = ProductsCharacters::firstOrCreate(
            ['slug' => $slug],
            ['name' => $name, 'type' => $type, 'unit' => $unit, 'is_filterable' => true, 'sort_order' => $sort]
        );

        // If type changed later, keep latest definition
        if ($char->type !== $type || $char->unit !== $unit) {
            $char->type = $type;
            $char->unit = $unit;
            $char->save();
        }

        return $char;
    }

    protected function ensureOptions(ProductsCharacters $char, array $labels): array
    {
        // returns option IDs (in same order)
        $ids = [];
        $sort = 0;
        foreach ($labels as $label) {
            $opt = ProductsCharactersOptions::firstOrCreate(
                ['product_character_id' => $char->id, 'label' => $label],
                ['value' => null, 'sort_order' => $sort++]
            );
            $ids[] = $opt->id;
        }
        return $ids;
    }

    protected function setSimpleValue(int $productId, ProductsCharacters $char, array $payload): ProductsCharactersValues
    {
        // Unset all fields first to avoid stale data on type changes
        $clear = [
            'value_string' => null, 'value_text' => null, 'value_integer' => null,
            'value_decimal' => null, 'value_boolean' => null, 'value_date' => null,
            'option_id' => null,
        ];

        $value = ProductsCharactersValues::updateOrCreate(
            ['product_id' => $productId, 'product_character_id' => $char->id],
            array_merge($clear, $payload)
        );

        return $value;
    }

    protected function setSelectValue(int $productId, ProductsCharacters $char, string $label): ProductsCharactersValues
    {
        $option = ProductsCharactersOptions::firstOrCreate(
            ['product_character_id' => $char->id, 'label' => $label],
            ['value' => null, 'sort_order' => 0]
        );

        return $this->setSimpleValue($productId, $char, ['option_id' => $option->id]);
    }

    protected function setMultiSelectValue(int $productId, ProductsCharacters $char, array $labels): ProductsCharactersValues
    {
        // Base row (one per product/characteristic)
        $value = $this->setSimpleValue($productId, $char, []); // no option_id for multiselect

        // Ensure options exist (and collect IDs)
        $optionIds = [];
        foreach ($labels as $label) {
            $opt = ProductsCharactersOptions::firstOrCreate(
                ['product_character_id' => $char->id, 'label' => $label],
                ['value' => null, 'sort_order' => 0]
            );
            $optionIds[] = $opt->id;
        }

        // Attach on pivot table product_character_value_option
        $value->options()->sync($optionIds);

        return $value;
    }

    protected function some(array $arr, int $min = 1, ?int $max = null): array
    {
        $max ??= max($min, count($arr));
        $take = $this->faker->numberBetween($min, min($max, count($arr)));
        $shuffled = Arr::shuffle($arr);

        return array_slice($shuffled, 0, $take);
    }

    protected function seedBooks(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('books', [1, 20]);
        if ($productIds->isEmpty()) return;

        $char_weight     = $this->getOrCreateCharacteristic('book-weight', 'Вес', 'decimal', 'кг', 10);
        $char_isbn       = $this->getOrCreateCharacteristic('isbn', 'ISBN', 'string', null, 20);
        $char_author     = $this->getOrCreateCharacteristic('author', 'Автор', 'string', null, 30);
        $char_language   = $this->getOrCreateCharacteristic('language', 'Язык', 'select', null, 40);
        $char_script     = $this->getOrCreateCharacteristic('script', 'Надпись', 'select', null, 50);
        $char_size       = $this->getOrCreateCharacteristic('size', 'Размер', 'string', null, 60);
        $char_translator = $this->getOrCreateCharacteristic('translator', 'Переводчик', 'string', null, 70);
        $char_pages      = $this->getOrCreateCharacteristic('pages', 'Количество страниц', 'integer', 'стр', 80);
        $char_publisher  = $this->getOrCreateCharacteristic('publisher', 'Издательство', 'string', null, 90);
        $char_cover      = $this->getOrCreateCharacteristic('cover-type', 'Тип обложки', 'select', null, 100);
        $char_year       = $this->getOrCreateCharacteristic('publish-year', 'Год издания', 'integer', null, 110);
        $char_material   = $this->getOrCreateCharacteristic('binding-material', 'Материал переплета', 'string', null, 120);
        $char_surface    = $this->getOrCreateCharacteristic('paper-surface', 'Поверхность страниц', 'select', null, 130);
        $char_country    = $this->getOrCreateCharacteristic('country', 'Страна происхождения', 'select', null, 140);

        $this->ensureOptions($char_language, ['Узбекский', 'Русский', 'Английский', 'Турецкий']);
        $this->ensureOptions($char_script, ['Кириллица', 'Латиница']);
        $this->ensureOptions($char_cover, ['Мягкая', 'Твердая', 'Гибкая (средней жесткости)']);
        $this->ensureOptions($char_surface, ['Матовые', 'Глянцевые']);
        $this->ensureOptions($char_country, ['Узбекистан', 'Турция', 'Россия', 'Китай']);

        $authors   = ['Александр Дюма', 'Лев Толстой', 'Чингиз Айтматов', 'Абдулла Каххар', 'Уильям Шекспир'];
        $publishers= ['Asaxiy Books', 'Eksmo', 'AST', 'Mann, Ivanov & Ferber', 'Cambridge Press'];
        $sizes     = ['13x20', '14x21', '16x24.6', '17x24', '20x26'];
        $materials = ['Бумажный', 'Картон', 'Ламинированный'];

        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_weight,    ['value_decimal' => $this->faker->randomFloat(2, 0.2, 2.2)]);
            $this->setSimpleValue($pid, $char_isbn,      ['value_string'  => $this->faker->isbn13()]);
            $this->setSimpleValue($pid, $char_author,    ['value_string'  => Arr::random($authors)]);
            $this->setSelectValue($pid, $char_language,  Arr::random(['Узбекский','Русский','Английский','Турецкий']));
            $this->setSelectValue($pid, $char_script,    Arr::random(['Кириллица','Латиница']));
            $this->setSimpleValue($pid, $char_size,      ['value_string'  => Arr::random($sizes)]);
            // sometimes translator empty
            if ($this->faker->boolean(65)) {
                $this->setSimpleValue($pid, $char_translator, ['value_string' => $this->faker->name()]);
            }
            $this->setSimpleValue($pid, $char_pages,     ['value_integer' => $this->faker->numberBetween(80, 1500)]);
            $this->setSimpleValue($pid, $char_publisher, ['value_string'  => Arr::random($publishers)]);
            $this->setSelectValue($pid, $char_cover,     Arr::random(['Мягкая','Твердая','Гибкая (средней жесткости)']));
            $this->setSimpleValue($pid, $char_year,      ['value_integer' => $this->faker->numberBetween(1990, 2025)]);
            $this->setSimpleValue($pid, $char_material,  ['value_string'  => Arr::random($materials)]);
            $this->setSelectValue($pid, $char_surface,   Arr::random(['Матовые','Глянцевые']));
            $this->setSelectValue($pid, $char_country,   Arr::random(['Узбекистан','Турция','Россия','Китай']));
        }
    }

    protected function seedPhones(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('phones-gadgets', [21, 40]);
        if ($productIds->isEmpty()) return;

        $char_weight   = $this->getOrCreateCharacteristic('phone-weight', 'Вес', 'integer', 'г', 10);
        $char_dims     = $this->getOrCreateCharacteristic('dimensions', 'Размер', 'string', null, 20);
        $char_screen   = $this->getOrCreateCharacteristic('screen-size', 'Диагональ экрана', 'decimal', 'дюйм', 30);
        $char_panel    = $this->getOrCreateCharacteristic('screen-type', 'Тип экрана', 'select', null, 40);
        $char_os       = $this->getOrCreateCharacteristic('os-version', 'Версия ОС', 'string', null, 50);
        $char_connect  = $this->getOrCreateCharacteristic('connectivity', 'Коммуникации', 'multiselect', null, 60);
        $char_color    = $this->getOrCreateCharacteristic('color', 'Цвет', 'select', null, 70);
        $char_features = $this->getOrCreateCharacteristic('features', 'Особенности', 'multiselect', null, 80);
        $char_wifi     = $this->getOrCreateCharacteristic('wifi-standard', 'Стандарт Wi-Fi', 'select', null, 90);
        $char_simtype  = $this->getOrCreateCharacteristic('sim-type', 'Тип SIM-карты', 'select', null, 100);
        $char_model    = $this->getOrCreateCharacteristic('model', 'Модель', 'string', null, 110);
        $char_net      = $this->getOrCreateCharacteristic('network-std', 'Стандарт связи', 'multiselect', null, 120);
        $char_gpu      = $this->getOrCreateCharacteristic('gpu', 'Видеопроцессор', 'string', null, 130);
        $char_warranty = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 140);
        $char_maincam  = $this->getOrCreateCharacteristic('main-camera', 'Основная камера', 'string', null, 150);
        $char_frontcam = $this->getOrCreateCharacteristic('front-camera', 'Разрешение фронтальной камеры', 'string', null, 160);
        $char_jack     = $this->getOrCreateCharacteristic('jack', 'Выход на наушники', 'select', null, 170);
        $char_ram      = $this->getOrCreateCharacteristic('ram', 'Оперативная память', 'integer', 'ГБ', 180);
        $char_soc      = $this->getOrCreateCharacteristic('soc', 'Процессор', 'string', null, 190);
        $char_simcount = $this->getOrCreateCharacteristic('sim-count', 'Количество SIM-карт', 'integer', null, 200);
        $char_storage  = $this->getOrCreateCharacteristic('storage', 'Встроенная память', 'integer', 'ГБ', 210);
        $char_battery  = $this->getOrCreateCharacteristic('battery', 'Емкость аккумулятора', 'integer', 'мА*ч', 220);

        $this->ensureOptions($char_panel,  ['AMOLED','OLED','IPS','LCD']);
        $this->ensureOptions($char_color,  ['Чёрный','Белый','Синий','Зеленый','Серый']);
        $this->ensureOptions($char_wifi,   ['802.11 a/b/g/n/ac','802.11ax (Wi-Fi 6/6E)','802.11be (Wi-Fi 7)']);
        $this->ensureOptions($char_simtype,['Nano-SIM','eSIM','Nano-SIM / eSIM']);
        $this->ensureOptions($char_jack,   ['3.5 мм','USB-C','Нет']);

        $this->ensureOptions($char_connect, [
            'GPS','A-GPS','GLONASS','Beidou','QZSS','DualGPS','NFC','Wi-Fi','Bluetooth','IR'
        ]);

        $this->ensureOptions($char_features, [
            '4G','5G','С камерой','С фонариком','С большим экраном','С мощной батареей',
            'Игровые','С гироскопом','На 2 сим карты','С автофокусом','C макрообъективом',
            'С тройной камерой','Водонепроницаемые','С быстрой зарядкой','С голосовым управлением',
            'С разблокировкой по лицу','С широкоугольным объективом','Со сканером отпечатка пальцев',
            'С ультраширокоугольным объективом'
        ]);

        $this->ensureOptions($char_net, ['3G','4G','5G']);

        $gpus = ['Adreno 720','Adreno 730','Mali-G610','Immortalis-G715'];
        $socs = ['Snapdragon 7 Gen 3','Snapdragon 8 Gen 2','Dimensity 8200','Exynos 2400'];
        $models = ['HONOR 400','Galaxy S24','Xiaomi 14T','Pixel 9','realme GT Neo'];
        foreach ($productIds as $pid) {
            $weight = $this->faker->numberBetween(160, 230);
            $w = $this->faker->randomFloat(1, 68.0, 78.0);
            $h = $this->faker->randomFloat(1, 145.0, 163.0);
            $t = $this->faker->randomFloat(1, 6.9, 8.9);
            $dim = "{$h} × {$w} × {$t} мм";

            $this->setSimpleValue($pid, $char_weight,   ['value_integer' => $weight]);
            $this->setSimpleValue($pid, $char_dims,     ['value_string'  => $dim]);
            $this->setSimpleValue($pid, $char_screen,   ['value_decimal' => $this->faker->randomFloat(2, 6.1, 6.9)]);
            $this->setSelectValue($pid, $char_panel,    Arr::random(['AMOLED','OLED','IPS','LCD']));
            $this->setSimpleValue($pid, $char_os,       ['value_string'  => Arr::random(['Android 14','Android 15','MagicOS 9.0 (Android 15)'])]);
            $this->setMultiSelectValue($pid, $char_connect, $this->some(['GPS','A-GPS','GLONASS','Beidou','QZSS','DualGPS','NFC','Wi-Fi','Bluetooth','IR'], 3, 6));
            $this->setSelectValue($pid, $char_color,    Arr::random(['Чёрный','Белый','Синий','Зеленый','Серый']));
            $this->setMultiSelectValue($pid, $char_features, $this->some([
                '4G','5G','С камерой','С фонариком','С большим экраном','С мощной батареей',
                'Игровые','С гироскопом','На 2 сим карты','С автофокусом','C макрообъективом',
                'С тройной камерой','Водонепроницаемые','С быстрой зарядкой','С голосовым управлением',
                'С разблокировкой по лицу','С широкоугольным объективом','Со сканером отпечатка пальцев',
                'С ультраширокоугольным объективом'
            ], 4, 8));
            $this->setSelectValue($pid, $char_wifi,     Arr::random(['802.11 a/b/g/n/ac','802.11ax (Wi-Fi 6/6E)','802.11be (Wi-Fi 7)']));
            $this->setSelectValue($pid, $char_simtype,  Arr::random(['Nano-SIM','eSIM','Nano-SIM / eSIM']));
            $this->setSimpleValue($pid, $char_model,    ['value_string'  => Arr::random($models)]);
            $this->setMultiSelectValue($pid, $char_net, $this->some(['3G','4G','5G'], 2, 3));
            $this->setSimpleValue($pid, $char_gpu,      ['value_string'  => Arr::random($gpus)]);
            $this->setSimpleValue($pid, $char_warranty, ['value_string'  => Arr::random(['1 год','2 года'])]);
            $this->setSimpleValue($pid, $char_maincam,  ['value_string'  => Arr::random(['200 MP (OIS)','108 MP (OIS)','50 MP'])]);
            $this->setSimpleValue($pid, $char_frontcam, ['value_string'  => Arr::random(['32 MP','50 MP','20 MP'])]);
            $this->setSelectValue($pid, $char_jack,     Arr::random(['USB-C','3.5 мм','Нет']));
            $this->setSimpleValue($pid, $char_ram,      ['value_integer' => Arr::random([6,8,12,16])]);
            $this->setSimpleValue($pid, $char_soc,      ['value_string'  => Arr::random($socs)]);
            $this->setSimpleValue($pid, $char_simcount, ['value_integer' => Arr::random([1,2])]);
            $this->setSimpleValue($pid, $char_storage,  ['value_integer' => Arr::random([128,256,512])]);
            $this->setSimpleValue($pid, $char_battery,  ['value_integer' => $this->faker->numberBetween(4300, 6000)]);
        }
    }

    /* ------------------------------------------------------------
     | Home Appliances (fridge-like)
     * ------------------------------------------------------------ */
    protected function seedHomeAppliances(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('home-appliances', [41, 60]);
        if ($productIds->isEmpty()) return;

        $char_size     = $this->getOrCreateCharacteristic('size', 'Размер', 'string', null, 10);
        $char_h        = $this->getOrCreateCharacteristic('height', 'Высота', 'decimal', 'см', 20);
        $char_d        = $this->getOrCreateCharacteristic('depth', 'Глубина', 'decimal', 'см', 30);
        $char_w        = $this->getOrCreateCharacteristic('width', 'Ширина', 'decimal', 'см', 40);
        $char_total    = $this->getOrCreateCharacteristic('total-volume', 'Общий объем, Л', 'integer', 'л', 50);
        $char_features = $this->getOrCreateCharacteristic('features', 'Особенности', 'multiselect', null, 60);
        $char_type     = $this->getOrCreateCharacteristic('fridge-type', 'Тип холодильника', 'select', null, 70);
        $char_warr     = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 80);
        $char_install  = $this->getOrCreateCharacteristic('install-type', 'Способ установки', 'select', null, 90);
        $char_comp     = $this->getOrCreateCharacteristic('compressor', 'Тип компрессора', 'select', null, 100);
        $char_freezer  = $this->getOrCreateCharacteristic('freezer-volume', 'Объем морозильной камеры', 'integer', 'л', 110);
        $char_fridge   = $this->getOrCreateCharacteristic('fridge-volume', 'Объем холодильной камеры', 'integer', 'л', 120);
        $char_country  = $this->getOrCreateCharacteristic('country', 'Страна происхождения', 'select', null, 130);
        $char_freezerpos = $this->getOrCreateCharacteristic('freezer-pos', 'Расположение морозильной камеры', 'select', null, 140);
        $char_defrost  = $this->getOrCreateCharacteristic('defrost', 'Размораживание холодильной камеры', 'select', null, 150);
        $char_shelvesb = $this->getOrCreateCharacteristic('shelves-bottom', 'Количество полок в нижней камере', 'integer', 'шт', 160);
        $char_shelvest = $this->getOrCreateCharacteristic('shelves-top', 'Количество полок в верхней камере', 'string', null, 170);

        $this->ensureOptions($char_features, ['С дисплеем','С зоной свежести','С полкой для бутылок']);
        $this->ensureOptions($char_type, ['Двухкамерные','Однокамерные']);
        $this->ensureOptions($char_install, ['Встраиваемые','Отдельностоящие']);
        $this->ensureOptions($char_comp, ['Инверторные','Стандартные']);
        $this->ensureOptions($char_country, ['Румыния','Турция','Россия','Китай']);
        $this->ensureOptions($char_freezerpos, ['Снизу','Сверху']);
        $this->ensureOptions($char_defrost, ['No Frost','Капельная']);

        foreach ($productIds as $pid) {
            $h = $this->faker->randomFloat(1, 170, 205);
            $d = $this->faker->randomFloat(1, 50, 70);
            $w = $this->faker->randomFloat(1, 55, 80);
            $this->setSimpleValue($pid, $char_size,    ['value_string' => "ШхВхГ {$w}х{$h}х{$d} см"]);
            $this->setSimpleValue($pid, $char_h,       ['value_decimal'=> $h]);
            $this->setSimpleValue($pid, $char_d,       ['value_decimal'=> $d]);
            $this->setSimpleValue($pid, $char_w,       ['value_decimal'=> $w]);
            $total = $this->faker->numberBetween(250, 450);
            $this->setSimpleValue($pid, $char_total,   ['value_integer'=> $total]);
            $this->setMultiSelectValue($pid, $char_features, $this->some(['С дисплеем','С зоной свежести','С полкой для бутылок'], 1, 3));
            $this->setSelectValue($pid, $char_type,    'Двухкамерные');
            $this->setSimpleValue($pid, $char_warr,    ['value_string' => Arr::random(['1 год','2 года','3 года'])]);
            $this->setSelectValue($pid, $char_install, Arr::random(['Встраиваемые','Отдельностоящие']));
            $this->setSelectValue($pid, $char_comp,    Arr::random(['Инверторные','Стандартные']));
            $freezer = $this->faker->numberBetween(70, 120);
            $this->setSimpleValue($pid, $char_freezer, ['value_integer'=> $freezer]);
            $this->setSimpleValue($pid, $char_fridge,  ['value_integer'=> $total - $freezer]);
            $this->setSelectValue($pid, $char_country, Arr::random(['Румыния','Турция','Россия','Китай']));
            $this->setSelectValue($pid, $char_freezerpos, 'Снизу');
            $this->setSelectValue($pid, $char_defrost, 'No Frost');
            $this->setSimpleValue($pid, $char_shelvesb, ['value_integer'=> $this->faker->numberBetween(2, 4)]);
            $this->setSimpleValue($pid, $char_shelvest, ['value_string' => $this->faker->randomElement(['5 полок, 2 ящика','4 полки, 1 ящик'])]);
        }
    }

    /* ------------------------------------------------------------
     | Climate Control
     * ------------------------------------------------------------ */
    protected function seedClimateControl(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('climate-control', [61, 80]);
        if ($productIds->isEmpty()) return;

        $char_weight = $this->getOrCreateCharacteristic('weight', 'Вес', 'decimal', 'кг', 10);
        $char_color  = $this->getOrCreateCharacteristic('color', 'Цвет', 'select', null, 20);
        $char_size   = $this->getOrCreateCharacteristic('size', 'Размер', 'string', null, 30);
        $char_power  = $this->getOrCreateCharacteristic('power', 'Мощность', 'integer', 'Вт', 40);
        $char_feats  = $this->getOrCreateCharacteristic('features', 'Особенности', 'multiselect', null, 50);
        $char_mount  = $this->getOrCreateCharacteristic('mount-type', 'Тип установки', 'select', null, 60);
        $char_warr   = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 70);
        $char_prot   = $this->getOrCreateCharacteristic('protection', 'Функции защиты', 'multiselect', null, 80);
        $char_sections= $this->getOrCreateCharacteristic('sections', 'Количество секций', 'integer', null, 90);
        $char_area   = $this->getOrCreateCharacteristic('area', 'Площадь обогрева', 'integer', 'м2', 100);

        $this->ensureOptions($char_color, ['Белые','Черные','Серые']);
        $this->ensureOptions($char_feats, ['Бесшумные','С сушилкой','С колесиками']);
        $this->ensureOptions($char_mount, ['Горизонтальные','Вертикальные']);
        $this->ensureOptions($char_prot,  ['Защита от перегрева','Отключение при опрокид.', 'Влагозащита']);

        foreach ($productIds as $pid) {
            $w = $this->faker->randomFloat(1, 5, 20);
            $this->setSimpleValue($pid, $char_weight, ['value_decimal'=>$w]);
            $this->setSelectValue($pid, $char_color, 'Белые');
            $this->setSimpleValue($pid, $char_size, ['value_string'=>"ШхВхГ 66,5х66,5х16 см"]);
            $this->setSimpleValue($pid, $char_power, ['value_integer'=>$this->faker->numberBetween(1000, 3000)]);
            $this->setMultiSelectValue($pid, $char_feats, ['Бесшумные','С сушилкой','С колесиками']);
            $this->setSelectValue($pid, $char_mount, 'Горизонтальные');
            $this->setSimpleValue($pid, $char_warr, ['value_string'=>'1 год']);
            $this->setMultiSelectValue($pid, $char_prot, ['Защита от перегрева']);
            $this->setSimpleValue($pid, $char_sections, ['value_integer'=>$this->faker->numberBetween(10, 20)]);
            $this->setSimpleValue($pid, $char_area, ['value_integer'=>$this->faker->numberBetween(15, 35)]);
        }
    }

    /* ------------------------------------------------------------
     | Computers & Accessories
     * ------------------------------------------------------------ */
    protected function seedComputers(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('computers-accessories', [81, 100]);
        if ($productIds->isEmpty()) return;

        $char_ram   = $this->getOrCreateCharacteristic('ram', 'Объем ОЗУ', 'integer', 'ГБ', 10);
        $char_weight= $this->getOrCreateCharacteristic('weight', 'Вес', 'decimal', 'кг', 20);
        $char_drive = $this->getOrCreateCharacteristic('drive-type', 'Тип накопителя', 'select', null, 30);
        $char_class = $this->getOrCreateCharacteristic('class', 'Класс', 'multiselect', null, 40);
        $char_model = $this->getOrCreateCharacteristic('model', 'Модель', 'string', null, 50);
        $char_gpu_b = $this->getOrCreateCharacteristic('gpu-brand', 'Бренд графического процессора', 'select', null, 60);
        $char_cardr = $this->getOrCreateCharacteristic('cardreader', 'Картридер', 'select', null, 70);
        $char_cores = $this->getOrCreateCharacteristic('cpu-cores', 'Количество ядер процессора', 'integer', null, 80);
        $char_year  = $this->getOrCreateCharacteristic('release-year', 'Год релиза', 'integer', null, 90);
        $char_panel = $this->getOrCreateCharacteristic('panel', 'Тип матрицы', 'select', null, 100);
        $char_gpu_m = $this->getOrCreateCharacteristic('gpu-model', 'Видеокарта', 'string', null, 110);
        $char_screen= $this->getOrCreateCharacteristic('screen', 'Диагональ экрана', 'string', null, 120);
        $char_color = $this->getOrCreateCharacteristic('color', 'Цвет товара', 'select', null, 130);
        $char_dev   = $this->getOrCreateCharacteristic('device-type', 'Тип устройства', 'multiselect', null, 140);
        $char_batt  = $this->getOrCreateCharacteristic('battery-life', 'Время автономной работы', 'string', null, 150);
        $char_coat  = $this->getOrCreateCharacteristic('screen-coating', 'Покрытие экрана', 'select', null, 160);
        $char_warr  = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 170);

        $this->ensureOptions($char_drive, ['SSD','HDD','SSD + HDD']);
        $this->ensureOptions($char_class, ['Универсальные','Для офиса','Для учебы','Для бизнеса']);
        $this->ensureOptions($char_gpu_b, ['Apple','NVIDIA','AMD','Intel']);
        $this->ensureOptions($char_cardr, ['-','Есть']);
        $this->ensureOptions($char_panel, ['IPS','OLED','TN']);
        $this->ensureOptions($char_color, ['Черный','Серебристый','Серый','Синий']);
        $this->ensureOptions($char_dev, ['Ноутбук','Ультрабук']);
        $this->ensureOptions($char_coat, ['Антибликовое','Глянцевое']);

        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_ram,   ['value_integer'=> Arr::random([8,16,32])]);
            $this->setSimpleValue($pid, $char_weight,['value_decimal'=> $this->faker->randomFloat(2, 0.99, 2.5)]);
            $this->setSelectValue($pid, $char_drive, 'SSD');
            $this->setMultiSelectValue($pid, $char_class, $this->some(['Универсальные','Для офиса','Для учебы','Для бизнеса'], 1, 2));
            $this->setSimpleValue($pid, $char_model, ['value_string'=> 'Model ' . $this->faker->bothify('??-####')]);
            $this->setSelectValue($pid, $char_gpu_b, Arr::random(['Apple','NVIDIA','AMD','Intel']));
            $this->setSelectValue($pid, $char_cardr, Arr::random(['-','Есть']));
            $this->setSimpleValue($pid, $char_cores, ['value_integer'=> Arr::random([8,10,12])]);
            $this->setSimpleValue($pid, $char_year,  ['value_integer'=> Arr::random([2023,2024,2025])]);
            $this->setSelectValue($pid, $char_panel, 'IPS');
            $this->setSimpleValue($pid, $char_gpu_m, ['value_string'=> Arr::random(['Apple graphics 10-core','Intel Arc','RTX 4050'])]);
            $this->setSimpleValue($pid, $char_screen,['value_string'=> Arr::random(['13"','14"','15.6"'])]);
            $this->setSelectValue($pid, $char_color, Arr::random(['Черный','Серебристый','Серый']));
            $this->setMultiSelectValue($pid, $char_dev, ['Ноутбук','Ультрабук']);
            $this->setSimpleValue($pid, $char_batt,  ['value_string'=> 'до ' . Arr::random([12,15,18]) . ' часов']);
            $this->setSelectValue($pid, $char_coat,  'Антибликовое');
            $this->setSimpleValue($pid, $char_warr,  ['value_string'=> '1 год']);
        }
    }

    /* ------------------------------------------------------------
     | Sports & Outdoors (few fields only)
     * ------------------------------------------------------------ */
    protected function seedSportsOutdoors(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('sports-outdoors', [101, 120]);
        if ($productIds->isEmpty()) return;

        $char_cap = $this->getOrCreateCharacteristic('max-user-weight', 'Вес', 'string', null, 10);
        $char_size= $this->getOrCreateCharacteristic('size', 'Размер', 'string', null, 20);
        $char_country = $this->getOrCreateCharacteristic('country', 'Страна происхождения', 'select', null, 30);
        $this->ensureOptions($char_country, ['Китай','Россия','Турция']);

        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_cap,  ['value_string'=>'максимальный вес пользователя: 130 кг.']);
            $this->setSimpleValue($pid, $char_size, ['value_string'=>'размеры: 174х73х130 см.']);
            $this->setSelectValue($pid, $char_country, 'Китай');
        }
    }

    /* ------------------------------------------------------------
     | Home & Office Supplies (very few)
     * ------------------------------------------------------------ */
    protected function seedHomeOfficeSupplies(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('home-office-supplies', [121, 140]);
        if ($productIds->isEmpty()) return;

        $char_w = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 10);
        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_w, ['value_string'=>'2 года']);
        }
    }

    /* ------------------------------------------------------------
     | TV, Video & Audio
     * ------------------------------------------------------------ */
    protected function seedTvVideoAudio(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('tv-video-audio', [141, 160]);
        if ($productIds->isEmpty()) return;

        $char_diag  = $this->getOrCreateCharacteristic('diag', 'Диагональ', 'string', null, 10);
        $char_frame = $this->getOrCreateCharacteristic('frame-color', 'Цвет рамки', 'select', null, 20);
        $char_res   = $this->getOrCreateCharacteristic('resolution', 'Разрешение экрана', 'select', null, 30);
        $char_type  = $this->getOrCreateCharacteristic('tv-type', 'Тип телевизора', 'select', null, 40);
        $char_warr  = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 50);
        $char_os    = $this->getOrCreateCharacteristic('os', 'Операционная система', 'select', null, 60);
        $char_country = $this->getOrCreateCharacteristic('country', 'Страна происхождения', 'select', null, 70);
        $char_tech  = $this->getOrCreateCharacteristic('tech', 'Технологии', 'multiselect', null, 80);
        $char_purpose = $this->getOrCreateCharacteristic('purpose', 'Назначение', 'select', null, 90);

        $this->ensureOptions($char_frame, ['Черные','Серые','Серебристые']);
        $this->ensureOptions($char_res,   ['HD (1366x768)','Full HD (1920x1080)','4K (3840x2160)']);
        $this->ensureOptions($char_type,  ['LED','QLED','OLED']);
        $this->ensureOptions($char_os,    ['Android TV','Google TV','Tizen','webOS']);
        $this->ensureOptions($char_country,['Узбекистан','Китай','Турция']);
        $this->ensureOptions($char_tech,  ['HDR','WiFi','Smart TV']);
        $this->ensureOptions($char_purpose,['В спальню','В гостиную','Для кухни']);

        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_diag,  ['value_string'=>Arr::random(['32"','43"','50"','55"'])]);
            $this->setSelectValue($pid, $char_frame, 'Черные');
            $this->setSelectValue($pid, $char_res,   'HD (1366x768)');
            $this->setSelectValue($pid, $char_type,  'LED');
            $this->setSimpleValue($pid, $char_warr,  ['value_string'=>'1 год']);
            $this->setSelectValue($pid, $char_os,    'Android TV');
            $this->setSelectValue($pid, $char_country,'Узбекистан');
            $this->setMultiSelectValue($pid, $char_tech, ['HDR','WiFi','Smart TV']);
            $this->setSelectValue($pid, $char_purpose, 'В спальню');
        }
    }

    /* ------------------------------------------------------------
     | Gaming Gear (few)
     * ------------------------------------------------------------ */
    protected function seedGamingGear(): void
    {
        $productIds = $this->getProductIdsByCategorySlugOrRange('gaming-gear', [161, 180]);
        if ($productIds->isEmpty()) return;

        $char_weight = $this->getOrCreateCharacteristic('weight', 'Вес', 'integer', 'г', 10);
        $char_warr   = $this->getOrCreateCharacteristic('warranty', 'Гарантийный срок', 'string', null, 20);

        foreach ($productIds as $pid) {
            $this->setSimpleValue($pid, $char_weight, ['value_integer'=> Arr::random([240, 250, 260, 270, 280])]);
            $this->setSimpleValue($pid, $char_warr,   ['value_string'=>'1 год']);
        }
    }


}
