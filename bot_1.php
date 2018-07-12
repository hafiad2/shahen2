<?php 
##################################################################### Setting
$токен = 'b0e68eac84e382c5e8f9d3b6a8573fb132133959b960c8e85e36d62c675238477db783c987b905164bfac'; // токен
$пост = explode("_", '136168571_3962'); //vk.com/wall141418455_2938 нам нужно 141418455_2938
$версия = '5.25';
$админ = '136168571'; // тут твой ID для команды Игнор
##################################################################### Get
$комментарии = api('wall.getComments','owner_id='.$пост[0].'&post_id='.$пост[1].'&count=1&sort=desc&access_token='.$токен);
$айди_юзера = $комментарии['response']['1']['uid'];
$текст_комментария = $комментарии['response']['1']['text'];
$комментарий = explode(" ",mb_strtolower($текст_комментария,'UTF-8'));
$айди_комментария = $комментарии['response']['1']['cid'];
$инфа_о_боте = api('users.get','&access_token='.$токен);
if($комментарий[0] == '[id'.$инфа_о_боте['response']['uid'].'|'.mb_strtolower($инфа_о_боте['response']['first_name'],'UTF-8').'],') $x = '1';
else $x = '0';
$смещение = rand(1, 200);
##################################################################### Work
$filename = "ban.txt";
$fd = fopen($filename, "r");
$bufer = fread($fd, filesize($filename));
$strtmp = explode("\n", $bufer); 
foreach($strtmp as $word) {
if($айди_юзера == $word){
$status = 'true';
}
}
if($status == 'true') echo 'User is banned';
else{
if('игнор' == $комментарий[$x]){
if($админ != $айди_юзера) $текст = '❎У вас недостаточно прав не выполнение данной команды';
else{
if('' == $комментарий[$x+1]) $текст = 'Не указан параметр‼';
if(is_numeric($комментарий[$x+1])==true){
$id = $комментарий[$x+1];
лог($id,'бан');
$текст = '✅Пользователь успешно добавлен в игнор-лист';
}
if('очистить' == $комментарий[$x+1]) {
ftruncate(fopen("ban.txt", 'a'), 0); 
$текст = '✅Игнор-лист успешно очищен';
}
}
}
if('помощь' == $комментарий[$x]){
$текст = '➖Развлечение➖
'.рандом(array('&#9970;','&#9978;','&#127745;','&#127747;','&#127748;')).'Анимация
'.рандом(array('&#128125;','&#128122;','&#128121;','&#128233;')).'Анонимно [ID] [сообщение]
💥Башорг
'.рандом(array('📹','📺')).'Видео
'.рандом(array('&#127755;','&#127756;','&#127776;')).'Демотиватор
'.рандом(array('&#8505;','&#127921;','&#128175;')).'Инфа [фраза]
'.рандом(array('&#128196;','&#128195;')).'История
👶Кличко
'.рандом(array('&#128568;','&#128569;','&#128572;','&#128573;','&#128571;','&#128570;','&#128049;')).'Котика
'.рандом(array('&#128105;','&#128120;','&#128103;')).'Няша
'.рандом(array('&#128019;','&#128020;')).'Омич
'.рандом(array('&#127749;','&#127750;','&#127751;','&#127753;')).'Пикча
💬Повтори [фраза]
🎮Рандомная игра
'.рандом(array('&#9729;','💭','💬')).'Совет
'.рандом(array('&#127925;','&#127926;','&#127930;')).'Трек
'.рандом(array('&#128215;','&#128216;','&#128217;')).'Цитата
'.рандом(array('&#128518;','&#128540;','&#128527;','&#128524;','&#128516;','&#128563;','&#128514;','&#128559;','&#128541;')).'Юмор
&#127748;World
➖Поиск➖
'.рандом(array('&#127909;','&#128249;','&#128250;')).'Видео [искомое слово]
'.рандом(array('&#128210;','&#128211;','&#128212;','&#128213;','&#128214;','&#128215;','&#128216;','&#128217;','&#128218;')).'Википедия [искомое слово]
'.рандом(array('&#127924;','&#9970;','&#127748;','&#9978;','&#127749;','&#127745;','&#127747;','&#127750;','&#127751;','&#127752;','&#127753;','&#127754;')).'Пикча [искомое слово]
➖Полезное➖
💚Лайк на аву
'.рандом(array('&#9809;','&#9810;','&#9811;','&#9934;')).'Гороскоп [зодиак]
'.рандом(array('&#128197;','&#128198;')).'Дата регистрации
'.рандом(array('&#128180;','&#128181;','&#128182;','&#128183;','&#128184;')).'Курс валют
'.рандом(array('&#10133;','&#10135;')).'Математика [выражение]
'.рандом(array('&#128209;','&#128240;')).'Новости
'.рандом(array('&#9203;','&#8987;','&#127877;')).'Отсчеты
'.рандом(array('&#127464;&#127475;','&#127465;&#127466;','&#127479;&#127482;','&#127472;&#127479;','&#127471;&#127477;','&#127470;&#127481;','&#127468;&#127463;','&#127467;&#127479;')).'Переведи [фраза]
'.рандом(array('&#10052;','&#9925;','&#9728;','&#9729;','&#128262;','&#9748;','&#128261;')).'Погода [город]
'.рандом(array('&#127864;','&#127873;','&#127874;','&#127876;','&#127875;','&#127881;','&#127882;','&#127863;')).'Праздники
'.рандом(array('&#128209;','&#128203;','&#128196;')).'Факт
➖Информация➖
'.рандом(array('&#9410;','&#9745;','&#10004;')).'Автор
'.рандом(array('&#8265;','&#10067;','&#10068;')).'Бот тут?
'.рандом(array('&#9200;','&#8986;')).'Время
'.рандом(array('&#9986;','&#128684;','&#128218;')).'Как дела?
'.рандом(array('&#8252;','&#8265;')).'Как это работает
'.рандом(array('&#9888;','&#127384;')).'Помощь
🙏Спасибо
➖➖➖➖➖➖Игры➖➖➖➖➖➖
🎲Угадай число';
}
elseif('рандомная' == $комментарий[$x] && 'игра' == $комментарий[1]) $текст = рандом(array('Survarium', 'Metro Redux', 'Far Cry 3', 'BioShock Infinite', 'Black Mesa', 'Wolfenstein: The New Order', 'Dishonored', 'Mass Effect 3', 'BioShock Infinite: Burial at Sea', 'PayDay 2', 'Brothers: A Tale of Two Sons', 'MechWarrior Online', 'Metro: Last Light', 'Mass Effect 3', 'Max Payne 3', 'Assassins Creed IV: Black Flag', 'Haunted Memories', 'Dynasty Warriors 8: Xtreme Legends', 'Metal Gear Rising: Revengeance', 'Borderlands 2', 'Dishonored', 'Tomb Raider 2013', 'Prototype 2', 'Tom Clancys Splinter Cell: Blacklist', 'Space Engineers', 'Cry Of Fear', 'Darksiders 2', 'Age of Pirates: Captain Blood', 'Transistor', 'Spec Ops: The Line', 'Battlefield 3', 'Slender: The Arrival', 'Binary Domain', 'Hitman: Absolution', 'Resident Evil 4 Ultimate HD Edition', 'Sleeping Dogs', 'Castlevania: Lords of Shadow 2', 'Nexuiz', 'Resident Evil: Revelations', 'DayZ', 'DayZ Standalone', 'Resident Evil 6', 'Ravens Cry', 'Goat Simulator', 'Saints Row IV', 'Dont Starve', 'DmC: Devil May Cry', 'Natural Selection 2', 'Far Cry 3: Blood Dragon', 'Robocraft', 'Chivalry: Medieval Warfare', 'Titanfall', 'Arma III', 'LEGO Marvel Super Heroes', 'Outlast: Whistleblower', 'Outlast', 'Lone Survivor', 'Shadow Warrior', 'Thief', 'Bedlam', 'Call of Juarez: Gunslinger', 'State of Decay', 'Assassins Creed 3', 'War of the Vikings', 'PlanetSide 2', 'Tribes: Ascend', 'Blades of Time', 'Dead Space 3', 'Grey', 'Warframe', 'I Am Alive', 'Overgrowth', 'Sacrilegium', 'Batman: Arkham Origins', 'Among the Sleep', 'Divinity: Dragon Commander', 'Inversion', 'Iron Front: Liberation 1944', 'DreadOut', 'Dont Starve: Reign of Giants', 'Shelter', 'Afterfall: InSanity Extended Edition', 'Signal Ops', 'Rising Storm', 'Primal Carnage', 'Deadpool', 'Sniper Elite V2', 'Murdered: Soul Suspect', 'Crysis 3', 'Assassins Creed IV: Black Flag', 'Plants vs. Zombies: Garden Warfare', 'Far Cry 3: Deluxe Bundle DLC', 'Skylanders Giants', 'Call of Duty: Black Ops 2', 'Killer Is Dead: Nightmare Edition', 'War of the Roses', 'Alan Wake American Nightmare', 'Sniper: Ghost Warrior 2', 'Sanctum 2', 'Chivalry: Deadliest Warrior', 'Sleeping Dogs', 'CS: Global Offensive', 'Cloudbuilt', 'Remember Me', 'Guns of Icarus Online', 'Battlefield 4', 'Marlow Briggs and The Mask of Death', 'Sir You Are Being Hunted', 'Blacklight: Retribution', 'Strider 2014', 'Planet Explorers', 'ShootMania Storm', 'Magrunner: Dark Pulse', 'Betrayer', 'Sniper Elite: Nazi Zombie Army', 'Hawken', 'Shadow Warrior Classic Redux', 'Ace of Spades', 'Insurgency', 'Dead Island: Riptide', 'Brotherhood of Violence', '7 Days To Die', 'Sniper Elite III', 'Strike Suit Zero', 'Shadow Company: The Mercenary War', 'Black Fire', 'Lost Planet 3', 'Rise of the Triad 2013', 'Loadout', 'Watch Dogs', 'Nether', 'Smite', 'Assassins Creed: Liberation HD', 'Call of Duty: Modern Warfare 2', 'Call of Duty: Modern Warfare 3', 'Gettysburg: Armored Warfare', 'Special Forces: Team X', 'Line of Defense', 'Contagion', 'Eldritch', 'FarSky', 'Gotham City Impostors', 'Deadfall Adventures', 'Medal of Honor: Warfighter', 'Black Death', 'Forge', 'Enemy Front', 'Tactical Intervention', 'Refusion', 'Offensive Combat', 'Firefall', 'Rooks Keep', 'Call of Duty: Ghosts', 'AntiSquad', 'Alien Rage', 'God Mode', 'MIND: Path to Thalamus', 'Deep Black', 'Infestation: Survivor Stories', 'Infinity Runner', 'Disney Infinity', 'Ravensdale', 'State of Decay: Lifeline', 'Syndicate 2012', 'Haunted Memories Ep02: Welcome Home', 'Defiance 2013', 'Unturned', 'Titanfall: Expedition', 'Ravaged', 'Strike Vector', 'Blade Symphony', 'Scourge: Outbreak', 'Dungeonland', 'Doorways', 'World of Battleships', 'Archeblade', 'Retrovirus', 'Star Trek 2013', 'Zeno Clash 2', 'Grimlands', 'BloodBath', 'Epigenesis', 'Sniper Elite: Nazi Zombie Army 2', 'Battle for Freedom', 'Depth', 'Tribulation Knights', 'Heroes & Generals', 'Teenage Mutant Ninja Turtles: Out of the Shadows', 'Kingdoms Rise', 'Conquest: Hadrians Divide', 'Tribes Universe', 'Warsoup', 'Trinity Revolution', 'Adventurer', 'Tomes of Mephistopheles', 'Dark Meridian', 'Eternal Fate', 'StarForge', 'Deadly Walkers', 'Stone Wardens', 'Heavy Fire: Shattered Spear', 'Kromaia', 'Arcane Worlds', 'Skara: The Blade Remains', 'Recruits', 'Sanctum 2: The Last Stand', 'Windborne', 'Cosmochoria', 'Eldritch: Mountains of Madness', 'Ku: Shroud of the Morrigan', 'Iron Sea Defenders', 'Project Temporality', 'Iron Soul', 'Americas Army: Proving Grounds', 'Astebreed', 'Cloud Chamber', 'Dota 2', 'Grand Theft Auto 4', 'CS: Soruce', 'GTA: San Andreas SAMP', 'GTA: San Andreas MTA', 'The Walking Dead', 'Raven: Legacy of a Master Thief', 'Papers Please', 'Papo & Yo', 'The Crew', 'Need For Speed: Rivals', 'Lucius', 'Game of Thrones', 'Planets3', 'Miasmata', 'Grid 2', 'DiRT Showdown', 'Track Mania 2: Canyon', 'Test Drive', 'Test Drive 2', 'Rascal Rider', 'Next Car Game', 'Spintires', 'War Thunder', 'World of Tanks', 'World of Diving', 'ArcheAge', 'Gotham City Impostors')); 
elseif('комикс' == $комментарий[$x]) $объект = picture('kladovayacomiksov');
elseif('world' == $комментарий[$x]) $объект = picture('trvltrvl');
elseif('спасибо' == $комментарий[$x] || 'сенкс' == $комментарий[$x]) $текст = рандом(array('Всегда пожалуйста','Спасибо в кровать не положишь','Это так трогательно с Вашей стороны','Синхрофазотрон!','Не стоит благодарности','Пожалуйста'));
elseif('угадай' == $комментарий[$x] && 'число' == $комментарий[$x+1]){
if('' == $комментарий[$x+2]) $текст = 'В этой игре вам предстоит сразится в интеллектуальном поединке против бота. 
Бот будет загадывать число от 1 до 10, от вас потребуется лишь отгадать его. 
При победе у вас будет возможность выиграть плюшку 
Для начала игры напишите <<Угадай число старт>>';
elseif('старт' == $комментарий[$x+2]){
$текст = 'ℹУкажи число от 1 до 10';
$отправляем = api('wall.addComment','owner_id='.$пост[0].'&post_id='.$пост[1].'&text='.urlencode($текст).'&reply_to_comment='.$айди_комментария.'&access_token='.$токен);
for($i=0;$i<25;$i++){
$гет = api('wall.getComments','owner_id='.$пост[0].'&post_id='.$пост[1].'&count=1&sort=desc&access_token='.$токен);
$айди_юзера = $гет['response']['1']['uid'];
$введенное_число = $гет['response']['1']['text'];
$айди_комментария = $гет['response']['1']['cid'];
if($айди_юзера != $айди_бота){
if(is_numeric($введенное_число) == false) $текст = 'Необходимо указывать число в диапазоне от 1 до 10';
else{
$число = rand(1,10);
if($число == $введенное_число) $текст = '✅Поздравляю! Ты угадал число!✅';
else $текст = '❌Не угадал❌
Загаданным числом было: '.$число;
$отправляем = api('wall.addComment','owner_id='.$пост[0].'&post_id='.$пост[1].'&text='.urlencode($текст).'&reply_to_comment='.$айди_комментария.'&access_token='.$токен);
break;
}
}
}
}
else $текст = '⛔Указан неверный параметр.';
}
elseif ('кличко' == $комментарий[$x]){
$объект = 'photo263930472_340765734';
$текст = рандом(array('Водовод — первое слово в словаре словоблуда.',
'Эффектный ? эффективный. Дефектный = дефективный.',
'Эльдар Маркович застенчиво писал детям на форумах: «идите на х*й», чем неустанно доказывал, что даже в слове «хуй» можно сделать опечатку.',
'Электрические розетки «Пиздатые». Суй куда следует.',
'Лучше один раз увидеть, чем ноль.',
'Фотографируя чай, сфотографировал чашку.',
'Они жили долго и счастливо, и умерли в один день. Адольф и Ева.',
'Мороженное. Ешьте охлаждённым.',
'От дебюта до бенефиса одна жизнь.',
'Mac’овое поле. Притягивает дизайнеров.',
'Плащаницу пустили на плащи.',
'В эпицентре событий — плоскость.',
'Raw photo of war.',
'В крупную фирму для выездов за город требуется секретарь-репеллент.',
'Вселенная, конечно, бесконечна.',
'Плач палача печален.',
'Полнит попа попа.',
'Недостатки есть у каждого из возрастов. Но после пятидесяти пропадают все достоинства.',
'Онанимные пользователи интернета.',
'Если лето — это маленькая жизнь, то зима — небольшая смерть?',
'Стопицот — как кувырсот швырнадцать, на Пи в этой степени меньше, чем гугильон пупильонов.',
'Девочку надо назвать Именью. Если добьётся успеха и умрёт, лет через 30 появятся улицы имени Имени.',
'Отряд согласен на два подряда подряд.',
'Пиши «Каско» строчными.',
'ОСАГО — прописными.',
'Держи руку на курсе. Кризисная поговорка.',
'Если повезёт, прилетим Тушкой, если нет — тушками.',
'Охота. Н. А. Некрасов.',
'Fair sex — ярмарка секса.',
'Поддерживать порядок в ваших же интернетах.',
'Доклад на собрании белошвеек был белыми нитками шит.',
'Недалече маячил Маяковский.',
'С плющенного плющевого экстракта плющит.',
'Какая туша, тушите свет!',
'Активный пассивный гомосексуалист.',
'Требуется специалист по нехитрым манипуляциям.',
'Сканер скандирует с канонадой.',
'Представляем вашему вниманию текстовый тест «Тестовый текст».',
'Фотографы делятся на два вида — тех, кто снимает в ров и тех, кто ещё не разочаровался (в жопеге).',
'Геном Ньютона выведен методом математической репродукции.',
'А пароль-то: «golliy».',
'— Таки читал я ваш «Майн кампф».',
'И вышли мы из доширачной нечебуреково кусавши.',
'Трижды тридцать — девять десятин.',
'Отель «У побитого альтруиста».',
'Престижное тур. агентство (турецкое агентство).',
'Она заводится от двух пальчиков и батареек.',
'Служба ассенизации «Shit happens™».',
'Космополитическая партия Советского Союза.',
'Собрание велико. Душно — стоит отложить.',
'Горизонт событий оказался завален.'));
}
elseif('лайк' == $комментарий[$x] && 'на' == $комментарий[$x+1] && 'аву' == $комментарий[$x+2]){
$RequestsGet = curl('https://api.vk.com/method/photos.get?owner_id='.$айди_юзера.'&album_id=profile&rev=1&access_token='.$токен);
$json = json_decode($RequestsGet,1);
$photo = $json['response']['0']['pid'];
$RequestsGet1 = curl('https://api.vk.com/method/likes.add?type=photo&owner_id='.$айди_юзера.'&item_id='.$photo.'&count=1&access_token='.$токен);
$jsonS1 = json_decode($RequestsGet1,1);
$текст = 'Поставил брат.Поставь мне тоже :)';
}
elseif ('видео' == $комментарий[$x]){
if('' == $комментарий[$x+1]) {
while(true){
$гет = api('video.search','q='.рандом(array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ы','э','ю','я')).'&v='.$версия.'&offset='.$смещение.'&count=1&access_token='.$токен);
if($гет['response']['items']['0']['owner_id'] != '') break;
}
$объект = 'video'.$гет['response']['items']['0']['owner_id'].'_'.$гет['response']['items']['0']['id'];
}
else{
if($x == 0) $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария));
else $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария)));
$гет = api('video.search','q='.urlencode($выражение).'&adult=1&v='.$версия.'&count=1&access_token='.$токен);
$колво = $гет['response']['count'];
if($колво == '0') $текст = '⚠Видеозаписей по вашему запросу не обнаружено';
else{
if($колво < 150){
$гет = api('video.search','q='.urlencode($выражение).'&adult=1&v='.$версия.'&count='.$колво.'&access_token='.$токен);
$рандом = rand(1,$колво);
$рандом1 = rand(1,$колво);
}
else{
$гет = api('video.search','q='.urlencode($выражение).'&adult=1&v='.$версия.'&count=200&access_token='.$токен);
$рандом = rand(1,150);
$рандом1 = rand(1,150);
}
$текст = 'Приятного просмотра! 😊';
$объект = 'video'.$гет['response']['items'][$рандом]['owner_id'].'_'.$гет['response']['items'][$рандом]['id'].',video'.$гет['response']['items'][$рандом1]['owner_id'].'_'.$гет['response']['items'][$рандом1]['id'];
}
}
}
elseif('погода' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = '⚠Не указан дополнительный параметр. 
ℹПример: Погода Черновцы';
else{
$погода = xml_parser_create();
$погода1 = array();
$погода2 = array();
xml_parse_into_struct($погода,file_get_contents("http://weather.yandex.ru/static/cities.xml"), $погода2, $погода1);
xml_parser_free($погода);
$город = mb_convert_case(preg_replace("/^(\S+)\s+/","", $текст_комментария), MB_CASE_TITLE, "UTF-8");
foreach($погода2 as $key=>$value){
if($value['value'] === $город){
$needed_index = $key;
break;
}
}
if(isset($needed_index)) $погода3 = $needed_index;
$xml = xml_parser_create();
$indexes = array();
$values = array();
xml_parse_into_struct($xml,file_get_contents('http://informer.gismeteo.ru/xml/'.$погода2[$погода3]['attributes']['ID'].'_1.xml'), $values, $indexes);
xml_parser_free($xml);
function replace($str){
$rplc = array('0'=>"Ясно ☀",'1'=>"Переменная облачность ⛅",'2'=>"Облачно ☁",'3'=>"Пасмурно");
return strtr($str,$rplc);
}
function replace1($str){
$rplc=array('4'=>"Дождь ☔",'5'=>"Ливень 💧",'6'=>"Снег ❄",'7'=>"Снег ❄",'8'=>"Гроза ⚡",'9'=>"Нет данных",'10'=>"Без осадков");
return strtr($str,$rplc);
}
$wiz = $values['38']['attributes']['MAX'];
$wiz1 = $values['4']['attributes']['CLOUDINESS'];
$wiz2 = $values['4']['attributes']['PRECIPITATION'];
$cloudiness = replace($wiz1);
$precipitation = replace1($wiz2);
if($wiz == '') $текст = '⚠При получении информации произошла ошибка';
else $текст = '➖➖➖➖'.$город.'➖➖➖➖
Погода: '.$wiz.'°c ['.mb_strtolower($cloudiness,'UTF-8').' | '.mb_strtolower($precipitation,'UTF-8').']';
}
}
elseif ('пикча' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $объект = picture(рандом(array('iface','onlyorly','fuck_humor')));
else{
if($x == 0) $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария));
else $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария)));
$гет = api('photos.search','q='.urlencode($выражение).'&access_token='.$токен);
$колво = $гет['response']['0'];
if($колво == '') $текст = 'ℹК сожалению, картинок по вашему запросу не обнаружено';
else{
if($колво < 1000){
$гет = api('photos.search','q='.urlencode($выражение).'&count='.$колво.'&access_token='.$токен);
$рандом = rand(1,$колво);
$рандом1 = rand(1,$колво);
}
else{
$гет = api('photos.search','q='.urlencode($выражение).'&count=1000&access_token='.$токен);
$рандом = rand(1,800);
$рандом1 = rand(1,800);
}
$текст = 'Картинки по вашему запросу! 😊';
$объект = 'photo'.$гет['response'][$рандом]['owner_id'].'_'.$гет['response'][$рандом]['pid'].',photo'.$гет['response'][$рандом1]['owner_id'].'_'.$гет['response'][$рандом1]['pid'];
}
}
}
if ('трек' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = рандом(array('🎵Надеюсь, тебе понравится эта музыка🎵','🎶Слушай и наслаждайся🎶','🎹Мне кажется, что это лучшая музыка🎹','🎷Чудо, а не музыка🎷'));
else $текст = 'ℹНет необходимости писать параметры для данной функции';
while(true){
$гет = api('audio.getPopular','genre_id='.rand(1,10).'&count=1&offset='.$смещение.'&access_token='.$токен);
if($гет['response']['0']['owner_id'] != '') break;
}
$объект = 'audio'.$гет['response']['0']['owner_id'].'_'.$гет['response']['0']['aid'];
}

if('анонимно' == $комментарий[$x]){
if('' == $комментарий[$x+1] || '' == $комментарий[$x+2]) $текст = '⛔Указаны не все параметры
ℹВот вам наглядный пример использования функции: 
Анонимно 141418455 Привет!';
else{
if(is_numeric($комментарий[$x+1]) == true) $комментарий[$x+1] = 'id'.$комментарий[$x+1];
$гет = api('users.get','user_ids='.$комментарий[$x+1].'&fields=can_write_private_message&access_token='.$токен);
if($гет['response']['0']['can_write_private_message'] == '0') $текст = '⚠К сожалению, пользователь ограничивает круг лиц, которые могут присылать ему сообщения.';
else{
if($x == 0) $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария));
else $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария)));
$title = 'Анонимка';
$message = 'Приветствую тебя, мой милый друг✌ 
Меня попросили написать тебе сообщение такого содержания👇
'.preg_replace('/\s+/', ' ', str_replace(array('.','&#46;'), ' ', trim(trim($выражение)))).'
👆Отвечать на моё сообщение не обязательно
Всё равно отправитель его не получит😒';
$сэнд = api('messages.send','domain='.$комментарий[$x+1].'&title='.urlencode($title).'&message='.urlencode($message).'&attachment='.рандом(array('photo263930472_336093193','photo263930472_336093199','photo263930472_336093204','photo263930472_336093206')).'&access_token='.$токен);
if($сэнд['response'] > 0) $текст = 'Ваше сообщение доставлено! '.рандом(array('&#128518;','&#128540;','&#128527;','&#128524;','&#128516;','&#128563;','&#128514;','&#128559;','&#128541;'));
else $текст = '‼К сожалению, ваше сообщение не было доставлено адресату.';
}
}
}
if('переведи' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = '⚠Для перевода текста необходимо указать фразу. 
ℹНапример: <<переведи привет>> или <<переведи hello>>';
else{
if($x == '0') $выражение = preg_replace("/^(\S+)\s+/","",$текст_комментария);
else $выражение = preg_replace("/^(\S+)\s+/","",preg_replace("/^(\S+)\s+/","",$текст_комментария));
$яндексАпи = curl('https://translate.yandex.net/api/v1.5/tr.json/detect?key=trnsl.1.1.20140907T175159Z.beaccc6c434f23cd.f3831615afdf639fdfa4c1d5b84ca2bc7834b328&text='.urlencode($выражение));
$json = json_decode($яндексАпи,1);
$язык = $json['lang'];
if($язык == 'ru') $второй_язык = 'en';
else $второй_язык = 'ru';
$яндексАпи = curl('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20140907T175159Z.beaccc6c434f23cd.f3831615afdf639fdfa4c1d5b84ca2bc7834b328&text='.urlencode($выражение).'&lang='.$язык.'-'.$второй_язык);
$json = json_decode($яндексАпи,1);
$перевод = $json['text']['0'];
if($выражение == $перевод) $текст = '⛔При переводе текста произошла ошибка';
else $текст = '🇷🇺Перевод: <<'.$перевод.'>>🇷🇺';
}
}
if('гороскоп' == $комментарий[$x]){
$гет = simplexml_load_string(file_get_contents('http://img.ignio.com/r/daily/index.xml'));
if('' == $комментарий[1]) $текст = '⚠Для получения гороскопа укажите знак зодиака
ℹНапример: <<Гороскоп рыбы>>';
else{
if('овен' == $комментарий[1]) $знак = 'aries';
if('лев' == $комментарий[1]) $знак = 'leo';
if('стрелец' == $комментарий[1]) $знак = 'sagittarius';
if('телец' == $комментарий[1])$знак = 'taurus';
if('дева' == $комментарий[1]) $знак = 'virgo';
if('козерог' == $комментарий[1]) $знак = 'capricorn';
if('близнецы' == $комментарий[1]) $знак = 'gemini';
if('весы' == $комментарий[1]) $знак = 'libra';
if('водолей' == $комментарий[1]) $знак = 'aquarius';
if('рак' == $комментарий[1]) $знак = 'cancer';
if('скорпион' == $комментарий[1]) $знак = 'scorpio';
if('рыбы' == $комментарий[1]) $знак = 'pisces';
$текст = '➖➖➖➖➖➖Гороскоп➖➖➖➖➖➖
'.$гет->$знак->today;
}

if('лайк' == $комментарий[$x] && 'на' == $комментарий[$x+1] && 'аву' == $комментарий[$x+2]){
$RequestsGet = curl('https://api.vk.com/method/photos.get?owner_id='.$айди_юзера.'&album_id=profile&rev=1&access_token='.$токен);
$json = json_decode($RequestsGet,1);
$photo = $json['response']['0']['pid'];
$RequestsGet1 = curl('https://api.vk.com/method/likes.add?type=photo&owner_id='.$айди_юзера.'&item_id='.$photo.'&count=1&access_token='.$токен);
$jsonS1 = json_decode($RequestsGet1,1);
$текст = urlencode('Поставил!');
}
}
if('время' == $комментарий[$x]){
$мск = mydate('Europe/Moscow');
$украина = mydate('Europe/Kiev');
$германия = mydate('Europe/Berlin');
$франция = mydate('Europe/Paris');
$великобритания = mydate('Europe/London');
$япония = mydate('Asia/Tokyo');
$испания = mydate('Europe/Madrid');
$италия = mydate('Europe/Rome');
$америка = mydate('America/New_York');
$emojiTime = array('&#127358;', '1⃣', '2⃣', '3⃣', '4⃣', '5⃣', '6⃣', '7⃣', '8⃣', '9⃣',  '🔟');
$текст = '🇺🇸 '.$emojiTime[$америка[0][0]].$emojiTime[$америка[0][1]].':'.$emojiTime[$америка[1][0]].$emojiTime[$америка[1][1]].':'.$emojiTime[$америка[2][0]].$emojiTime[$америка[2][1]].'
🇬🇧 '.$emojiTime[$великобритания[0][0]].$emojiTime[$великобритания[0][1]] . ':' . $emojiTime[$великобритания[1][0]] . $emojiTime[$великобритания[1][1]].':' . $emojiTime[$великобритания[2][0]] . $emojiTime[$великобритания[2][1]].'
🇪🇸 '.$emojiTime[$испания[0][0]].$emojiTime[$испания[0][1]] . ':' . $emojiTime[$испания[1][0]] . $emojiTime[$испания[1][1]].':' . $emojiTime[$испания[2][0]] . $emojiTime[$испания[2][1]].'
🇮🇹 '.$emojiTime[$италия[0][0]].$emojiTime[$италия[0][1]] . ':' . $emojiTime[$италия[1][0]] . $emojiTime[$италия[1][1]].':' . $emojiTime[$италия[2][0]] . $emojiTime[$италия[2][1]].'
🇫🇷 '.$emojiTime[$франция[0][0]].$emojiTime[$франция[0][1]] . ':' . $emojiTime[$франция[1][0]] . $emojiTime[$франция[1][1]].':' . $emojiTime[$франция[2][0]] . $emojiTime[$франция[2][1]].'
🇩🇪 '.$emojiTime[$германия[0][0]].$emojiTime[$германия[0][1]] . ':' . $emojiTime[$германия[1][0]] . $emojiTime[$германия[1][1]].':' . $emojiTime[$германия[2][0]] . $emojiTime[$германия[2][1]].'
🔰 '.$emojiTime[$украина[0][0]].$emojiTime[$украина[0][1]] . ':' . $emojiTime[$украина[1][0]] . $emojiTime[$украина[1][1]].':' . $emojiTime[$украина[2][0]] . $emojiTime[$украина[2][1]].'
🇷🇺 '.$emojiTime[$мск[0][0]].$emojiTime[$мск[0][1]] . ':' . $emojiTime[$мск[1][0]] . $emojiTime[$мск[1][1]].':' . $emojiTime[$мск[2][0]] . $emojiTime[$мск[2][1]].'
🇯🇵 '.$emojiTime[$япония[0][0]].$emojiTime[$япония[0][1]] . ':' . $emojiTime[$япония[1][0]] . $emojiTime[$япония[1][1]]. ':' . $emojiTime[$япония[2][0]] . $emojiTime[$япония[2][1]];
}
if('как' == $комментарий[$x] && 'дела?' == $комментарий[$x+1]) $текст = рандом(array('Да пока живу, и вроде умирать не собираюсь', 'Все пучком', 'Отлично! Чего и вам желаю', 'А у Вас?', 'Все хорошо, а будет еще лучше!', 'Отлично, не дождётесь', 'Хорошо — не поверишь, плохо — не поможешь', 'Вчера сломал два ребра', 'Как в сказке', 'Как всегда, то есть хорошо', 'Как всегда, то есть плохо', 'Хорово', 'Как у тебя', 'Какие, собственно, дела?', 'Как всегда', 'Как видишь', 'Не умер и не женился', 'А как в самом деле дела?', 'А дела ли это?', 'А что такое?', 'Нет никаких дел', 'Какие дела? Я не при делах нынче!', 'Ах я бедный-несчастный, так устал, мне каждый день приходится придумывать ответ на вопрос «Как дела?»', 'Есть два способа поставить человека в тупик: спросить у него «Как дела» и попросить рассказать что-нибудь', 'Не знаю', 'Затрудняюсь ответить', 'Амбивалентно', 'Вялотекуще', 'Дела идут, контора пишет', 'А вы не торопитесь?', 'День на карете, два пешком', 'Как у попугая, которого кошка тянет за лапу по полу, а он радостно кричит «Поехали!»', 'Как у зебры', 'Как в такси. Чем дальше, тем дороже', 'Как у колобка — слева и справа одинаково', 'Как сосиска в тесте, весело и сердито', 'По сравнению с Бубликовым неплохо', 'Так же как у Майкла Джексона 15 лет назад', 'Лучше чем вчера, но хуже чем завтрa', 'Какие дела с такими делами', 'Дела??? Нет их, не деловой я…', 'Также, как и пять минут назад…', 'Тебе все сразу или частями?', 'Я от природы бездельник.', 'Столько не сделано, столько не сделано! А сколько еще предстоит не сделать!', 'Дел много', 'Ногсшибательно', 'Регулярно', 'Терпимо', 'Безусловно', 'В Анголе дети голодают, а так все в порядке', 'Всё в шоколаде, даже клавиатура!', 'Расту, цвету, старею… Всё как обычно', 'Вы несравненно оригинальны в своих вопросах', 'Да нормально, вчера нобелевскую премию получила за вклад в развитие экоструктурных подразделений в области китообразных инфузорий туфелек и тапочек и за открытие нано-технологий, которые помогут пингвинам преодолеть ледниковый период в африканских борах и гавайских пустынях в штате Масса Чуссетс округ Вашингтон.', 'Как Скрудж Макдак', 'Тяжела жизнь без Ново-Пассита…', 'Вашими молитвами', 'Пока еще никого не загрыз', 'В среднем по району', 'Относительно. Если сравнивать с Лениным — то хорошо, если с миллионером — то не очень.', 'Эх, какие у нас дела? У нас делишки, а ДЕЛА у прокурора', 'Чего только ни…', 'Ничего', 'Нормально', 'Всё ок!', 'По тихой грусти', 'Лучше всех!')); 
if('башорг' == $комментарий[$x]) $текст = strip_tags(file_get_contents('http://bohdash.com/random/bash/random.php'));
if('цитата' == $комментарий[$x]) $текст = strip_tags(file_get_contents('http://bohdash.com/random/citata/random.php'));
if('факт' == $комментарий[$x]){
preg_match('/<title>	(.*?) #factroom/', file_get_contents('http://www.factroom.ru/random/'), $a);
$текст = $a[1];
}
if('привет' == $комментарий[$x]) $текст = рандом(array('Привет','Здравствуй','Доброго времени суток','✌','✋','Хай')); 
if('история' == $комментарий[$x]) $текст = strip_tags(file_get_contents('http://bohdash.com/random/sram/random.php'));
if('бот' == $комментарий[$x] && 'тут?' == $комментарий[1]) $текст = 'Естественно'; 
if('праздники' == $комментарий[$x]){
include 'simple_html_dom.php';
$html = file_get_html('http://kakoysegodnyaprazdnik.ru/');
$a = $html->find("span", 2);
$b = $html->find("span", 4);
$c = $html->find("span", 6);
$d = $html->find("span", 8);
$текст = '➖➖➖➖➖Ближайшие праздники➖➖➖➖➖
📅'.date("d.m.y").' '.$a->plaintext.'
📅'.date("d.m.y").' '.$b->plaintext.'
📅'.date("d.m.y").' '.$c->plaintext.'
📅'.date("d.m.y").' '.$d->plaintext;
}
if('википедия' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = '⚠Для получения информации просьба указывать искомое слово';
else{
$гет = file_get_contents('http://ru.wikipedia.org/w/api.php?action=opensearch&search='.urlencode(preg_replace("/^(\S+)\s+/","",$текст_комментария)).'&prop=info&format=xml&inprop=url');
$вики2 = xml_parser_create();
$вики4 = array();
$вики3 = array();
xml_parse_into_struct($вики2,$гет, $вики3, $вики4);
xml_parser_free($вики2);
if($вики3['10']['value'] == '') $текст = 'ℹПо вашему запросу ничего не найдено';
else $текст = '📙'.str_replace(",", "&#44;", $вики3['9']['value']).'
📖Больше информации: '.file_get_contents('http://shrt.org.ua/--?url='.$вики3['10']['value'].'&s=goo.gl');
}
}
if ('юмор' == $комментарий[$x]) $текст = strip_tags(file_get_contents(рандом(array('http://bohdash.com/random/joke/random.php','http://bohdash.com/random/anekdot/random.php'))));
if('курс' == $комментарий[$x] && 'валют' == $комментарий[$x+1]){
$file = file_get_contents('http://www.cbr.ru/scripts/XML_daily.asp');
preg_match("/\<Valute ID=\"R01235\".*?\>(.*?)\<\/Valute\>/is", $file, $m);
preg_match("/<Value>(.*?)<\/Value>/is", $m[1], $r);
preg_match("/\<Valute ID=\"R01239\".*?\>(.*?)\<\/Valute\>/is", $file, $eu);
preg_match("/<Value>(.*?)<\/Value>/is", $eu[1], $eur);
preg_match("/\<Valute ID=\"R01720\".*?\>(.*?)\<\/Valute\>/is", $file, $uk);
preg_match("/<Value>(.*?)<\/Value>/is", $uk[1], $ukr);
$dollar = str_replace(",", ".", $r[1]);
$euro = str_replace(",", ".", $eur[1]);
$urka = str_replace(",", ".", $ukr[1]);
$текст = '💰Курс валют💰
💵 Доллар $ - '.$dollar.' 💵
💶 Евро € - '.$euro.' 💶
🔰 Гривна - '.$urka.' 🔰';
}
if('котика' == $комментарий[$x]) $объект = picture(рандом(array('v.kote','catism')));
if('автор' == $комментарий[$x]) $текст = 'Создатель этой поебони 🔧*id232211248';
if('анимация' == $комментарий[$x]){
$гет = api('wall.get','domain=gifochka&count=1&offset='.$смещение.'&extended=1&access_token='.$токен);
$объект = 'doc'.$гет['response']['wall']['1']['attachments']['0']['doc']['owner_id'].'_'.$гет['response']['wall']['1']['attachments']['0']['doc']['did'];
}
if('совет' == $комментарий[$x]){
$совет = curl('http://fucking-great-advice.ru/api/random');
$json = json_decode($совет,1);
$текст = htmlspecialchars_decode($json['text']);
}
if('как' == $комментарий[$x] && 'это'  == $комментарий[$x+1] && 'работает'  == $комментарий[$x+2] || 'работает?'  == $комментарий[$x+2]) $текст = '💯Вопрос довольно таки распространенный, некоторые же в недоумении думают, что отвечает реальный человек😹
📍Не будем отходить от темы вопроса. И так. Как же это всё таки работает:
1⃣ При помощи методов API получаем комментарий данного поста.
2⃣ Проводим проверку среди написанных заранее в скрипте команд.
3⃣ Если команда присутствует, то отвечаем на него, иначе -- игнорируем.
🙏Буду рад любым вашим предложениям по развитию развлекающего бота у себя в лс.';
if('повтори' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = '&#1;';
else $текст = preg_replace('/\s+/', ' ', str_replace(array('.'), ' ', trim(trim(preg_replace("/^(\S+)\s+/","",$текст_комментария)))));
}
if('обновления' == $комментарий[$x]) $текст = 'ℹПоследние обновления можете увидеть (⏩здесь⏪)';
if('математика' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = $математика.'Мсье, вы забыли написать пример для решения'.$математика;
else{
if (!preg_match("#^[0-9+*/-]+$#i", preg_replace("/^(\S+)\s+/","",$текст_комментария))) $текст = $математика.'Задай нормально! Например: '.rand(1,50).'+'.rand(1,50).$математика;
else{
$строка = "return (".preg_replace("/^(\S+)\s+/","",$текст_комментария).");";
$результат = eval($строка);
$текст = $математика.'Ответ: '.$результат.$математика;
}
}
}
if('отсчеты' == $комментарий[$x] || 'отсчёты' == $комментарий[$x]){
date_default_timezone_set ('Europe/Moscow');
$дата_рождения = api('users.get','user_ids='.$айди_юзера.'&fields=bdate&access_token='.$токен);
$дата_рождения = explode(".", $дата_рождения['response']['0']['bdate']);
$оригинал = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
$кастом = array('1⃣', '2⃣', '3⃣', '4⃣', '5⃣', '6⃣', '7⃣', '8⃣', '9⃣', '&#127358;'); 
if($месяц< date("m")) $j = 2015;
else $j = 2014;
if($день > 0) $день_рождения = str_replace($оригинал, $кастом, '🎂До твоего дня рождения '.ceil((mktime(0,0,0, $дата_рождения[1], $дата_рождения[0], $j) - time())/86400).' дней');
function rdate($param, $time=0) {
if(intval($time)==0)$time=time();
$MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
if(strpos($param,'M')===false) return date($param, $time);
else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}
$date1 = rdate("d M");
$date2 = strtotime("1 January 2015");
$enddate = strtotime("1 January 2016");
$diff = $enddate - $date2;
$now = time() - $date2;
$текст = '➖➖➖➖➖➖➖Отсчеты➖➖➖➖➖➖➖
'.str_replace($оригинал, $кастом, '⏳2015 год прошёл на '.round((100 * $now) / $diff, 3).'%').'
'.str_replace($оригинал, $кастом, рандом(array('❤','💔','💖','💟','💑')).'❄До 14 февраля '.ceil((mktime(0,0,0, 2, 14, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '✈До 23 февраля '.ceil((mktime(0,0,0, 2, 23, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '🌱До весны '.ceil((mktime(0,0,0, 3, 1, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '👩До 8 марта '.ceil((mktime(0,0,0, 3, 8, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '👲До 1 апреля '.ceil((mktime(0,0,0, 4, 1, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '☀До лета '.ceil((mktime(0,0,0, 6, 1, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '🍂До осени '.ceil((mktime(0,0,0, 9, 1, 2015) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '❄До зимы '.ceil((mktime(0,0,0, 12, 1, 2014) - time())/86400).' дней').'
'.str_replace($оригинал, $кастом, '🎄До нового года '.ceil((mktime(0,0,0, 1, 1, 2015) - time())/86400).' дней').'
'.$день_рождения;
}
if('омич' == $комментарий[$x]) $объект = picture('omich');
if('новости' == $комментарий[$x]){
$url= рандом(array('http://news.yandex.ru/index.rss','http://news.yandex.ua/world.rss','http://news.yandex.ua/sport.rss','http://news.yandex.ua/auto.rss','http://news.yandex.ua/science.rss','http://news.yandex.ua/internet.rss','http://news.yandex.ua/computers.rss')); 
$xml = xml_parser_create();
xml_parser_set_option($xml, XML_OPTION_SKIP_WHITE, 1);
xml_parse_into_struct($xml, file_get_contents($url), $element, $index); 
xml_parser_free($xml); 
$текст = strip_tags('➖➖➖➖➖➖➖Новости➖➖➖➖➖➖➖
📰'.$element[$index["TITLE"][2]]["value"].'
📰'.$element[$index["TITLE"][3]]["value"].'
📰'.$element[$index["TITLE"][4]]["value"].'
📰'.$element[$index["TITLE"][5]]["value"]); 
}
if('инфа' == $комментарий[$x]){
if('' == $комментарий[$x+1]) $текст = urlencode('⛔Для проверки достоверности необходимо указывать информацию');
else $текст = 'ℹ '.rand(0,100).'%';
}
if('няша' == $комментарий[$x]) $объект = picture(рандом(array('so4nye','sexx_public','baregirl'))); 
if('демотиватор' == $комментарий[$x]) $объект = picture('bestdemotivators');
if('дата' == $комментарий[$x] && 'регистрации' == $комментарий[$x+1]){
$информация = file_get_contents('http://vk.com/foaf.php?id='.$айди_юзера);
$вырезка = '/<ya:created dc:date="([\\d]{4}-[\\d]{2}-[\\d]{2}T[\\d]{2}:[\\d]{2}:[\\d]{2}\\+[\\d]{2}:[\\d]{2})"/i';
if(preg_match($вырезка, $информация, $matches)){ }
$кастрация = explode("T", $matches[1]);
$время = trim($кастрация[1]);
$время = str_replace(array('+04:00'), ' ', trim($время));
$время = preg_replace('/\s+/', ' ', $время);
$кастрация1 = explode("-", $кастрация[0]);
if($кастрация1[1] == '01') $месяц = 'января';
if($кастрация1[1] == '02') $месяц = 'февраля';
if($кастрация1[1] == '03') $месяц = 'марта';
if($кастрация1[1] == '04') $месяц = 'апреля';
if($кастрация1[1] == '05') $месяц = 'мая';
if($кастрация1[1] == '06') $месяц = 'июня';
if($кастрация1[1] == '07') $месяц = 'июля';
if($кастрация1[1] == '08') $месяц = 'августа';
if($кастрация1[1] == '09') $месяц = 'сентября';
if($кастрация1[1] == '10') $месяц = 'октября';
if($кастрация1[1] == '11') $месяц = 'ноября';
if($кастрация1[1] == '12') $месяц = 'декабря';
$текст =  '📅Дата: '.$кастрация1[2].' '.$месяц.' '.$кастрация1[0].'
⌚Время: '.$время.'
⏳На сайте уже: '.((int)((mktime (0,0,0,$кастрация1[1],$кастрация1[2],$кастрация1[0]) - time(void))/86400) * -1 ).' дней';
}
##################################################################### Send
$отвечаем_на_комментарий = api('wall.addComment','owner_id='.$пост[0].'&post_id='.$пост[1].'&text='.urlencode($текст).'&attachments='.$объект.'&reply_to_comment='.$айди_комментария.'&access_token='.$токен);
}
##################################################################### Function
function лог($лог,$параметр){
if($параметр == 'бан') $error = 'ban.txt';
else $error = 'last.txt';
fwrite(fopen('./'.$error.'','a'),$лог.PHP_EOL);
}
function mydate($пояс){
date_default_timezone_set($пояс);
return explode(':', date('H:i:s'));
}
function api($метод,$параметры){
$запрос = curl("https://api.vk.com/method/$метод?$параметры");
return json_decode($запрос,1);
}
function рандом($text){
$рандом = mt_rand(0,count($text)-1); 
return $text[$рандом]; 
}
function picture($паблик){
$парсим_пикчу = curl('https://api.vk.com/method/wall.get?domain='.$паблик.'&count=1&offset='.rand(1,50).'&extended=1');
$json = json_decode($парсим_пикчу,1);
$объект = 'photo'.$json['response']['wall']['1']['attachment']['photo']['owner_id'].'_'.$json['response']['wall']['1']['attachment']['photo']['pid'];
return $объект;
}
function curl($url){
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
$response = curl_exec( $ch );
curl_close( $ch );
return $response;
}
?>