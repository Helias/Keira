<?php
include "db-config.php";
include "menu.php";
include "character_menu.php";
$Databases=mysql_select_db("$Characters", $connect);
if (!$Databases)
{
	echo "Can't connect to the database characters!";
	header("location:Connect.php");
}
$guid=$_GET['guid'];
if ($guid== "")
{
	$query=mysql_query("SELECT * FROM characters");
}
else
{
	$query=mysql_query("SELECT * FROM characters WHERE guid=$guid");
}
while ($row=mysql_fetch_array($query))
{
if ($guid == "")
{
	$guid="Write guid";
	$row="";
}
?>
<style type="text/css">
td {
	font-size:90%;
}
</style>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" name="form">
<table>
<tr>
<td>online</td>
<td>is_logout_resting</td>
<td>cinematic</td>
</tr>
<tr>
<td><input type="checkbox" <?php if(htmlspecialchars($row['online'])==1){echo "checked=\"true\"";}?> name="online"></td>
<td><input type="checkbox" <?php if (htmlspecialchars($row['is_logout_resting']) == 1){echo "checked=\"true\"";}?> name="is_logout_resting"></td>
<td><input type="checkbox" <?php if (htmlspecialchars($row['cinematic']) == 1){echo "checked=\"true\"";} ?> name="cinematic"></td>
</tr>
<tr>
<td>Guid</td>
<td>Account</td>
<td>Name</td>
<td>Race</td>
<td>class</td>
<td>gender</td>
<td>level</td>
<td>xp</td>
<td>money</td>
<td>extra_flags</td>
</tr>
<tr>
<td><input class="input_box" type="text" value="<?php echo $guid; ?>" name="guid" style="width: 100px;"><input type="submit" value=""></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['account']); ?>" name="account"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['name']); ?>" name="name"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['race']); ?>" name="races">
<select class="little" id="race" OnChange="get_value(this.id)">
<option value="ID Value" disabled="disabled" class="bold">ID Value</option>
<option value="1">1 Human</option><option value="2">
2  Orc</option><option  value="3">3 Dwarf</option>
<option value="4">4 Night Elf</option><option  value="5">5 Scourge</option>
<option value="6">6 Tauren</option>
<option value="7">7 Gnome</option>
<option value="8">8 Troll</option>
<option value="9">9 Goblin</option>
<option value="10">10 BloodElf</option>
<option value="11">11 Draenei</option>
<option value="12">12 FelOrc</option>
<option value="13">13 Naga_</option>
<option value="14">14 Broken</option>
<option value="15">15 Skeleton</option>
<option value="16">16 Vrykul</option>
<option value="17">17 Tuskarr</option>
<option value="18">18 ForestTroll</option>
<option value="19">19 Taunka</option>
<option value="20">20 NorthrendSkeleton</option>
<option value="21">21 IceTroll</option>
</select>
</td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['class']); ?>" name="classes">
<select class="little" id="class" OnChange="get_value(this.id)">
<option value="ID Value" disabled="disabled" class="bold">ID Value</option>
<option value="1">1 Warrior</option>
<option value="2">2 Paladin</option>
<option value="3">3 Hunter</option>
<option value="4">4 Rogue</option>
<option value="5">5 Priest</option>
<option value="6">6 Death Knight</option>
<option value="7">7 Shaman</option>
<option value="8">8 Mage</option>
<option value="9">9 Warlock</option>
<option value="11">11 Druid</option>
</select>
</td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['gender']); ?>" name="gender"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['level']); ?>" name="level"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['xp']); ?>" name="xp"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['money']); ?>" name="money"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['extra_flags']); ?>" name="extra_flags"></td>
</tr>
<tr>
<td>playerBytes</td>
<td>playerBytes2</td>
<td>playerFlags</td>
<td>instance_id</td>
<td>instance_mode</td>
<td>death_expire_time</td>
<td>taxi_path</td>
<td>knownCurrencies</td>
<td>watchedFaction</td>
</tr>
<tr>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['playerBytes']); ?>" name="playerBytes"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['playerBytes2']); ?>" name="playerBytes2"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['playerFlags']); ?>" name="playerFlags"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['instance_id']); ?>" name="instance_id"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['instance_mode_mask']); ?>" name="instance_mode_mask"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['death_expire_time']); ?>" name="death_expire_time"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['taxi_path']); ?>" name="taxi_path"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['knownCurrencies']); ?>" name="knownCurrencies"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['watchedFaction']); ?>" name="watchedFaction"></td>
</tr>
<tr>
<td>arenaPoints</td>
<td>totalHonorPoints</td>
<td>yesterdayHP</td>
<td>totalKills</td>
<td>todayKills</td>
<td>yesterdayKills</td>
<td>chosenTitle</td>
<td>drunk</td>
<td>ammoId</td>
</tr>
<tr>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['arenaPoints']); ?>" name="arenaPoints"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['totalHonorPoints']); ?>" name="totalHonorPoints"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['yesterdayHonorPoints']); ?>" name="yesterdayHonorPoints"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['totalKills']); ?>" name="totalKills"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['todayKills']); ?>" name="todayKills"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['yesterdayKills']); ?>" name="yesterdayKills"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['chosenTitle']); ?>" name="chosenTitle"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['drunk']); ?>" name="drunk"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['ammoId']); ?>" name="ammoId"></td>
</tr>
<tr>
<td>health</td>
<td>power1</td>
<td>power2</td>
<td>power3</td>
<td>power4</td>
<td>power5</td>
<td>power6</td>
<td>power7</td>
<td>latency</td>
<td>speccount</td>
</tr><tr>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['health']); ?>" name="health"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power1']); ?>" name="power1"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power2']); ?>" name="power2"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power3']); ?>" name="power3"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power4']); ?>" name="power4"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power5']); ?>" name="power5"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power6']); ?>" name="power6"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['power7']); ?>" name="power7"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['latency']); ?>" name="latency"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['speccount']); ?>" name="speccount"></td>
</tr>
<tr>
<td>activespec</td>
<td>map</td>
<td>position_x</td>
<td>position_y</td>
<td>position_z</td>
<td>orientation</td>
<td>zone</td>
<td>logout_time</td>
<td>rest_bonus</td>
<td>leveltime</td>
</tr>
<tr>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['activespec']); ?>" name="activespec"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['map']) ?>" name="maps">
<select class="little" id="map" OnChange="get_value(this.id)">
<option value="ID Value" disabled="disabled" class="bold">ID Value</option>
<option value="0">0 Eastern Kingdoms</option>
<option value="1">1 Kalimdor</option>
<option value="13">13 Testing</option>
<option value="25">25 Scott Test</option>
<option value="30">30 Alterac Valley</option>
<option value="33">33 Shadowfang Keep</option>
<option value="34">34 Stormwind Stockade</option>
<option value="35">35 <unused>StormwindPrison</option>
<option value="36">36 Deadmines</option>
<option value="37">37 Azshara Crater</option>
<option value="42">42 Collin's Test</option>
<option value="43">43 Wailing Caverns</option>
<option value="44">44 <unused> Monastery</option>
<option value="47">47 Razorfen Kraul</option>
<option value="48">48 Blackfathom Deeps</option>
<option value="70">70 Uldaman</option>
<option value="90">90 Gnomeregan</option>
<option value="109">109 Sunken Temple</option>
<option value="129">129 Razorfen Downs</option>
<option value="169">169 Emerald Dream</option>
<option value="189">189 Scarlet Monastery</option>
<option value="209">209 Zul'Farrak</option>
<option value="229">229 Blackrock Spire</option>
<option value="230">230 Blackrock Depths</option>
<option value="249">249 Onyxia's Lair</option>
<option value="269">269 Opening of the Dark Portal</option>
<option value="289">289 Scholomance</option>
<option value="309">309 Zul'Gurub</option>
<option value="329">329 Stratholme</option>
<option value="349">349 Maraudon</option>
<option value="369">369 Deeprun Tram</option>
<option value="389">389 Ragefire Chasm</option>
<option value="409">409 Molten Core</option>
<option value="429">429 Dire Maul</option>
<option value="449">449 Alliance PVP Barracks</option>
<option value="450">450 Horde PVP Barracks</option>
<option value="451">451 Development Land</option>
<option value="469">469 Blackwing Lair</option>
<option value="489">489 Warsong Gulch</option>
<option value="509">509 Ruins of Ahn'Qiraj</option>
<option value="529">529 Arathi Basin</option>
<option value="530">530 Outland</option>
<option value="531">531 Ahn'Qiraj Temple</option>
<option value="532">532 Karazhan</option>
<option value="533">533 Naxxramas</option>
<option value="534">534 The Battle for Mount Hyjal</option>
<option value="540">540 Hellfire Citadel: The Shattered Halls</option>
<option value="542">542 Hellfire Citadel: The Blood Furnace</option>
<option value="543">543 Hellfire Citadel: Ramparts</option>
<option value="544">544 Magtheridon's Lair</option>
<option value="545">545 Coilfang: The Steamvault</option>
<option value="546">546 Coilfang: The Underbog</option>
<option value="547">547 Coilfang: The Slave Pens</option>
<option value="548">548 Coilfang: Serpentshrine Cavern</option>
<option value="550">550 Tempest Keep</option>
<option value="552">552 Tempest Keep: The Arcatraz</option>
<option value="553">553 Tempest Keep: The Botanica</option>
<option value="554">554 Tempest Keep: The Mechanar</option>
<option value="555">555 Auchindoun: Shadow Labyrinth</option>
<option value="556">556 Auchindoun: Sethekk Halls</option>
<option value="557">557 Auchindoun: Mana-Tombs</option>
<option value="558">558 Auchindoun: Auchenai Crypts</option>
<option value="559">559 Nagrand Arena</option>
<option value="560">560 The Escape From Durnholde</option>
<option value="562">562 Blade's Edge Arena</option>
<option value="564">564 Black Temple</option>
<option value="565">565 Gruul's Lair</option>
<option value="566">566 Eye of the Storm</option>
<option value="568">568 Zul'Aman</option>
<option value="571">571 Northrend</option>
<option value="572">572 Ruins of Lordaeron</option>
<option value="573">573 ExteriorTest</option>
<option value="574">574 Utgarde Keep</option>
<option value="575">575 Utgarde Pinnacle</option>
<option value="576">576 The Nexus</option>
<option value="578">578 The Oculus</option>
<option value="580">580 The Sunwell</option>
<option value="582">582 Transport: Rut'theran to Auberdine</option>
<option value="584">584 Transport: Menethil to Theramore</option>
<option value="585">585 Magister's Terrace</option>
<option value="586">586 Transport: Exodar to Auberdine</option>
<option value="587">587 Transport: Feathermoon Ferry</option>
<option value="588">588 Transport: Menethil to Auberdine</option>
<option value="589">589 Transport: Orgrimmar to Grom'Gol</option>
<option value="590">590 Transport: Grom'Gol to Undercity</option>
<option value="591">591 Transport: Undercity to Orgrimmar</option>
<option value="592">592 Transport: Borean Tundra Test</option>
<option value="593">593 Transport: Booty Bay to Ratchet</option>
<option value="594">594 Transport: Howling Fjord Sister Mercy (Quest)</option>
<option value="595">595 The Culling of Stratholme</option>
<option value="596">596 Transport: Naglfar</option>
<option value="597">597 Craig Test</option>
<option value="598">598 Sunwell Fix (Unused)</option>
<option value="599">599 Halls of Stone</option>
<option value="600">600 Drak'Tharon Keep</option>
<option value="601">601 Azjol-Nerub</option>
<option value="602">602 Halls of Lightning</option>
<option value="603">603 Ulduar</option>
<option value="604">604 Gundrak</option>
<option value="605">605 Development Land (non-weighted textures)</option>
<option value="606">606 QA and DVD</option>
<option value="607">607 Strand of the Ancients</option>
<option value="608">608 Violet Hold</option>
<option value="609">609 Ebon Hold</option>
<option value="610">610 Transport: Tirisfal to Vengeance Landing</option>
<option value="612">612 Transport: Menethil to Valgarde</option>
<option value="613">613 Transport: Orgrimmar to Warsong Hold</option>
<option value="614">614 Transport: Stormwind to Valiance Keep</option>
<option value="615">615 The Obsidian Sanctum</option>
<option value="616">616 The Eye of Eternity</option>
<option value="617">617 Dalaran Sewers</option>
<option value="618">618 The Ring of Valor</option>
<option value="619">619 Ahn'kahet: The Old Kingdom</option>
<option value="620">620 Transport: Moa'ki to Unu'pe</option>
<option value="621">621 Transport: Moa'ki to Kamagua</option>
<option value="622">622 Transport: Orgrim's Hammer</option>
<option value="623">623 Transport: The Skybreaker</option>
<option value="624">624 Vault of Archavon</option>
<option value="628">628 Isle of Conquest</option>
<option value="631">631 Icecrown Citadel</option>
<option value="632">632 The Forge of Souls</option>
<option value="641">641 Transport: Alliance Airship BG</option>
<option value="642">642 Transport: HordeAirshipBG</option>
<option value="647">647 Transport: Orgrimmar to Thunder Bluff</option>
<option value="649">649 Trial of the Crusader</option>
<option value="650">650 Trial of the Champion</option>
<option value="658">658 Pit of Saron</option>
<option value="668">668 Halls of Reflection</option>
<option value="672">672 Transport: The Skybreaker (Icecrown Citadel Raid)</option>
<option value="673">673 Transport: Orgrim's Hammer (Icecrown Citadel Raid)</option>
<option value="712">712 Transport: The Skybreaker (IC Dungeon)</option>
<option value="713">713 Transport: Orgrim's Hammer (IC Dungeon)</option>
<option value="718">718 Trasnport: The Mighty Wind (Icecrown Citadel Raid)</option>
<option value="723">723 Stormwind</option>
<option value="724">724 The Ruby Sanctum</option>
</select>
</td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_x']) ?>" name="position_x"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_y']) ?>" name="position_y"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_z']) ?>" name="position_z"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['orientation']) ?>" name="orientation"></td>
<td><select class="little" id="zone" OnChange="get_value(this.id)">
<option value="ID Value" disabled="disabled" class="bold">ID Value</option>
<option value="1">1 Dun Morogh</option>
<option value="2">2 Longshore</option>
<option value="3">3 Badlands</option>
<option value="4">4 Blasted Lands</option>
<option value="7">7 Blackwater Cove</option>
<option value="8">8 Swamp of Sorrows</option>
<option value="9">9 Northshire Valley</option>
<option value="10">10 Duskwood</option>
<option value="11">11 Wetlands</option>
<option value="12">12 Elwynn Forest</option>
<option value="13">13 The World Tree</option>
<option value="14">14 Durotar</option>
<option value="15">15 Dustwallow Marsh</option>
<option value="16">16 Azshara</option>
<option value="17">17 The Barrens</option>
<option value="18">18 Crystal Lake</option>
<option value="19">19 Zul'Gurub</option>
<option value="20">20 Moonbrook</option>
<option value="21">21 Kul Tiras</option>
<option value="22">22 Programmer Isle</option>
<option value="23">23 Northshire River</option>
<option value="24">24 Northshire Abbey</option>
<option value="25">25 Blackrock Mountain</option>
<option value="26">26 Lighthouse</option>
<option value="28">28 Western Plaguelands</option>
<option value="30">30 Nine</option>
<option value="32">32 The Cemetary</option>
<option value="33">33 Stranglethorn Vale</option>
<option value="34">34 Echo Ridge Mine</option>
<option value="35">35 Booty Bay</option>
<option value="36">36 Alterac Mountains</option>
<option value="37">37 Lake Nazferiti</option>
<option value="38">38 Loch Modan</option>
<option value="40">40 Westfall</option>
<option value="41">41 Deadwind Pass</option>
<option value="42">42 Darkshire</option>
<option value="43">43 Wild Shore</option>
<option value="44">44 Redridge Mountains</option>
<option value="45">45 Arathi Highlands</option>
<option value="46">46 Burning Steppes</option>
<option value="47">47 The Hinterlands</option>
<option value="49">49 Dead Man's Hole</option>
<option value="51">51 Searing Gorge</option>
<option value="53">53 Thieves Camp</option>
<option value="54">54 Jasperlode Mine</option>
<option value="55">55 Valley of Heroes UNUSED</option>
<option value="56">56 Heroes' Vigil</option>
<option value="57">57 Fargodeep Mine</option>
<option value="59">59 Northshire Vineyards</option>
<option value="60">60 Forest's Edge</option>
<option value="61">61 Thunder Falls</option>
<option value="62">62 Brackwell Pumpkin Patch</option>
<option value="63">63 The Stonefield Farm</option>
<option value="64">64 The Maclure Vineyards</option>
<option value="65">65 Dragonblight</option>
<option value="66">66 Zul'Drak</option>
<option value="67">67 The Storm Peaks</option>
<option value="68">68 Lake Everstill</option>
<option value="69">69 Lakeshire</option>
<option value="70">70 Stonewatch</option>
<option value="71">71 Stonewatch Falls</option>
<option value="72">72 The Dark Portal</option>
<option value="73">73 The Tainted Scar</option>
<option value="74">74 Pool of Tears</option>
<option value="75">75 Stonard</option>
<option value="76">76 Fallow Sanctuary</option>
<option value="77">77 Anvilmar</option>
<option value="80">80 Stormwind Mountains</option>
<option value="81">81 Jeff NE Quadrant Changed</option>
<option value="82">82 Jeff NW Quadrant</option>
<option value="83">83 Jeff SE Quadrant</option>
<option value="84">84 Jeff SW Quadrant</option>
<option value="85">85 Tirisfal Glades</option>
<option value="86">86 Stone Cairn Lake</option>
<option value="87">87 Goldshire</option>
<option value="88">88 Eastvale Logging Camp</option>
<option value="89">89 Mirror Lake Orchard</option>
<option value="91">91 Tower of Azora</option>
<option value="92">92 Mirror Lake</option>
<option value="93">93 Vul'Gol Ogre Mound</option>
<option value="94">94 Raven Hill</option>
<option value="95">95 Redridge Canyons</option>
<option value="96">96 Tower of Ilgalar</option>
<option value="97">97 Alther's Mill</option>
<option value="98">98 Rethban Caverns</option>
<option value="99">99 Rebel Camp</option>
<option value="100">100 Nesingwary's Expedition</option>
<option value="101">101 Kurzen's Compound</option>
<option value="102">102 Ruins of Zul'Kunda</option>
<option value="103">103 Ruins of Zul'Mamwe</option>
<option value="104">104 The Vile Reef</option>
<option value="105">105 Mosh'Ogg Ogre Mound</option>
<option value="106">106 The Stockpile</option>
<option value="107">107 Saldean's Farm</option>
<option value="108">108 Sentinel Hill</option>
<option value="109">109 Furlbrow's Pumpkin Farm</option>
<option value="111">111 Jangolode Mine</option>
<option value="113">113 Gold Coast Quarry</option>
<option value="115">115 Westfall Lighthouse</option>
<option value="116">116 Misty Valley</option>
<option value="117">117 Grom'gol Base Camp</option>
<option value="118">118 Whelgar's Excavation Site</option>
<option value="120">120 Westbrook Garrison</option>
<option value="121">121 Tranquil Gardens Cemetery</option>
<option value="122">122 Zuuldaia Ruins</option>
<option value="123">123 Bal'lal Ruins</option>
<option value="125">125 Kal'ai Ruins</option>
<option value="126">126 Tkashi Ruins</option>
<option value="127">127 Balia'mah Ruins</option>
<option value="128">128 Ziata'jai Ruins</option>
<option value="129">129 Mizjah Ruins</option>
<option value="130">130 Silverpine Forest</option>
<option value="131">131 Kharanos</option>
<option value="132">132 Coldridge Valley</option>
<option value="133">133 Gnomeregan</option>
<option value="134">134 Gol'Bolar Quarry</option>
<option value="135">135 Frostmane Hold</option>
<option value="136">136 The Grizzled Den</option>
<option value="137">137 Brewnall Village</option>
<option value="138">138 Misty Pine Refuge</option>
<option value="139">139 Eastern Plaguelands</option>
<option value="141">141 Teldrassil</option>
<option value="142">142 Ironband's Excavation Site</option>
<option value="143">143 Mo'grosh Stronghold</option>
<option value="144">144 Thelsamar</option>
<option value="145">145 Algaz Gate</option>
<option value="146">146 Stonewrought Dam</option>
<option value="147">147 The Farstrider Lodge</option>
<option value="148">148 Darkshore</option>
<option value="149">149 Silver Stream Mine</option>
<option value="150">150 Menethil Harbor</option>
<option value="151">151 Designer Island</option>
<option value="152">152 The Bulwark</option>
<option value="153">153 Ruins of Lordaeron</option>
<option value="154">154 Deathknell</option>
<option value="155">155 Night Web's Hollow</option>
<option value="156">156 Solliden Farmstead</option>
<option value="157">157 Agamand Mills</option>
<option value="158">158 Agamand Family Crypt</option>
<option value="159">159 Brill</option>
<option value="160">160 Whispering Gardens</option>
<option value="161">161 Terrace of Repose</option>
<option value="162">162 Brightwater Lake</option>
<option value="163">163 Gunther's Retreat</option>
<option value="164">164 Garren's Haunt</option>
<option value="165">165 Balnir Farmstead</option>
<option value="166">166 Cold Hearth Manor</option>
<option value="167">167 Crusader Outpost</option>
<option value="168">168 The North Coast</option>
<option value="169">169 Whispering Shore</option>
<option value="170">170 Lordamere Lake</option>
<option value="172">172 Fenris Isle</option>
<option value="173">173 Faol's Rest</option>
<option value="186">186 Dolanaar</option>
<option value="187">187 Darnassus UNUSED</option>
<option value="188">188 Shadowglen</option>
<option value="189">189 Steelgrill's Depot</option>
<option value="190">190 Hearthglen</option>
<option value="192">192 Northridge Lumber Camp</option>
<option value="193">193 Ruins of Andorhal</option>
<option value="195">195 School of Necromancy</option>
<option value="196">196 Uther's Tomb</option>
<option value="197">197 Sorrow Hill</option>
<option value="198">198 The Weeping Cave</option>
<option value="199">199 Felstone Field</option>
<option value="200">200 Dalson's Tears</option>
<option value="201">201 Gahrron's Withering</option>
<option value="202">202 The Writhing Haunt</option>
<option value="203">203 Mardenholde Keep</option>
<option value="204">204 Pyrewood Village</option>
<option value="205">205 Dun Modr</option>
<option value="206">206 Utgarde Keep</option>
<option value="207">207 The Great Sea</option>
<option value="208">208 Unused Ironcladcove</option>
<option value="209">209 Shadowfang Keep</option>
<option value="210">210 Icecrown</option>
<option value="211">211 Iceflow Lake</option>
<option value="212">212 Helm's Bed Lake</option>
<option value="213">213 Deep Elem Mine</option>
<option value="214">214 The Great Sea</option>
<option value="215">215 Mulgore</option>
<option value="219">219 Alexston Farmstead</option>
<option value="220">220 Red Cloud Mesa</option>
<option value="221">221 Camp Narache</option>
<option value="222">222 Bloodhoof Village</option>
<option value="223">223 Stonebull Lake</option>
<option value="224">224 Ravaged Caravan</option>
<option value="225">225 Red Rocks</option>
<option value="226">226 The Skittering Dark</option>
<option value="227">227 Valgan's Field</option>
<option value="228">228 The Sepulcher</option>
<option value="229">229 Olsen's Farthing</option>
<option value="230">230 The Greymane Wall</option>
<option value="231">231 Beren's Peril</option>
<option value="232">232 The Dawning Isles</option>
<option value="233">233 Ambermill</option>
<option value="235">235 Fenris Keep</option>
<option value="236">236 Shadowfang Keep</option>
<option value="237">237 The Decrepit Ferry</option>
<option value="238">238 Malden's Orchard</option>
<option value="239">239 The Ivar Patch</option>
<option value="240">240 The Dead Field</option>
<option value="241">241 The Rotting Orchard</option>
<option value="242">242 Brightwood Grove</option>
<option value="243">243 Forlorn Rowe</option>
<option value="244">244 The Whipple Estate</option>
<option value="245">245 The Yorgen Farmstead</option>
<option value="246">246 The Cauldron</option>
<option value="247">247 Grimesilt Dig Site</option>
<option value="249">249 Dreadmaul Rock</option>
<option value="250">250 Ruins of Thaurissan</option>
<option value="251">251 Flame Crest</option>
<option value="252">252 Blackrock Stronghold</option>
<option value="253">253 The Pillar of Ash</option>
<option value="254">254 Blackrock Mountain</option>
<option value="255">255 Altar of Storms</option>
<option value="256">256 Aldrassil</option>
<option value="257">257 Shadowthread Cave</option>
<option value="258">258 Fel Rock</option>
<option value="259">259 Lake Al'Ameth</option>
<option value="260">260 Starbreeze Village</option>
<option value="261">261 Gnarlpine Hold</option>
<option value="262">262 Ban'ethil Barrow Den</option>
<option value="263">263 The Cleft</option>
<option value="264">264 The Oracle Glade</option>
<option value="265">265 Wellspring River</option>
<option value="266">266 Wellspring Lake</option>
<option value="267">267 Hillsbrad Foothills</option>
<option value="268">268 Azshara Crater</option>
<option value="269">269 Dun Algaz</option>
<option value="271">271 Southshore</option>
<option value="272">272 Tarren Mill</option>
<option value="275">275 Durnholde Keep</option>
<option value="276">276 UNUSED Stonewrought Pass</option>
<option value="277">277 The Foothill Caverns</option>
<option value="278">278 Lordamere Internment Camp</option>
<option value="279">279 Dalaran Crater</option>
<option value="280">280 Strahnbrad</option>
<option value="281">281 Ruins of Alterac</option>
<option value="282">282 Crushridge Hold</option>
<option value="283">283 Slaughter Hollow</option>
<option value="284">284 The Uplands</option>
<option value="285">285 Southpoint Tower</option>
<option value="286">286 Hillsbrad Fields</option>
<option value="287">287 Hillsbrad</option>
<option value="288">288 Azurelode Mine</option>
<option value="289">289 Nethander Stead</option>
<option value="290">290 Dun Garok</option>
<option value="293">293 Thoradin's Wall</option>
<option value="294">294 Eastern Strand</option>
<option value="295">295 Western Strand</option>
<option value="296">296 South Seas UNUSED</option>
<option value="297">297 Jaguero Isle</option>
<option value="298">298 Baradin Bay</option>
<option value="299">299 Menethil Bay</option>
<option value="300">300 Misty Reed Strand</option>
<option value="301">301 The Savage Coast</option>
<option value="302">302 The Crystal Shore</option>
<option value="303">303 Shell Beach</option>
<option value="305">305 North Tide's Run</option>
<option value="306">306 South Tide's Run</option>
<option value="307">307 The Overlook Cliffs</option>
<option value="308">308 The Forbidding Sea</option>
<option value="309">309 Ironbeard's Tomb</option>
<option value="310">310 Crystalvein Mine</option>
<option value="311">311 Ruins of Aboraz</option>
<option value="312">312 Janeiro's Point</option>
<option value="313">313 Northfold Manor</option>
<option value="314">314 Go'Shek Farm</option>
<option value="315">315 Dabyrie's Farmstead</option>
<option value="316">316 Boulderfist Hall</option>
<option value="317">317 Witherbark Village</option>
<option value="318">318 Drywhisker Gorge</option>
<option value="320">320 Refuge Pointe</option>
<option value="321">321 Hammerfall</option>
<option value="322">322 Blackwater Shipwrecks</option>
<option value="323">323 O'Breen's Camp</option>
<option value="324">324 Stromgarde Keep</option>
<option value="325">325 The Tower of Arathor</option>
<option value="326">326 The Sanctum</option>
<option value="327">327 Faldir's Cove</option>
<option value="328">328 The Drowned Reef</option>
<option value="330">330 Thandol Span</option>
<option value="331">331 Ashenvale</option>
<option value="332">332 The Great Sea</option>
<option value="333">333 Circle of East Binding</option>
<option value="334">334 Circle of West Binding</option>
<option value="335">335 Circle of Inner Binding</option>
<option value="336">336 Circle of Outer Binding</option>
<option value="337">337 Apocryphan's Rest</option>
<option value="338">338 Angor Fortress</option>
<option value="339">339 Lethlor Ravine</option>
<option value="340">340 Kargath</option>
<option value="341">341 Camp Kosh</option>
<option value="342">342 Camp Boff</option>
<option value="343">343 Camp Wurg</option>
<option value="344">344 Camp Cagg</option>
<option value="345">345 Agmond's End</option>
<option value="346">346 Hammertoe's Digsite</option>
<option value="347">347 Dustbelch Grotto</option>
<option value="348">348 Aerie Peak</option>
<option value="349">349 Wildhammer Keep</option>
<option value="350">350 Quel'Danil Lodge</option>
<option value="351">351 Skulk Rock</option>
<option value="352">352 Zun'watha</option>
<option value="353">353 Shadra'Alor</option>
<option value="354">354 Jintha'Alor</option>
<option value="355">355 The Altar of Zul</option>
<option value="356">356 Seradane</option>
<option value="357">357 Feralas</option>
<option value="358">358 Brambleblade Ravine</option>
<option value="359">359 Bael Modan</option>
<option value="360">360 The Venture Co. Mine</option>
<option value="361">361 Felwood</option>
<option value="362">362 Razor Hill</option>
<option value="363">363 Valley of Trials</option>
<option value="364">364 The Den</option>
<option value="365">365 Burning Blade Coven</option>
<option value="366">366 Kolkar Crag</option>
<option value="367">367 Sen'jin Village</option>
<option value="368">368 Echo Isles</option>
<option value="369">369 Thunder Ridge</option>
<option value="370">370 Drygulch Ravine</option>
<option value="371">371 Dustwind Cave</option>
<option value="372">372 Tiragarde Keep</option>
<option value="373">373 Scuttle Coast</option>
<option value="374">374 Bladefist Bay</option>
<option value="375">375 Deadeye Shore</option>
<option value="377">377 Southfury River</option>
<option value="378">378 Camp Taurajo</option>
<option value="379">379 Far Watch Post</option>
<option value="380">380 The Crossroads</option>
<option value="381">381 Boulder Lode Mine</option>
<option value="382">382 The Sludge Fen</option>
<option value="383">383 The Dry Hills</option>
<option value="384">384 Dreadmist Peak</option>
<option value="385">385 Northwatch Hold</option>
<option value="386">386 The Forgotten Pools</option>
<option value="387">387 Lushwater Oasis</option>
<option value="388">388 The Stagnant Oasis</option>
<option value="390">390 Field of Giants</option>
<option value="391">391 The Merchant Coast</option>
<option value="392">392 Ratchet</option>
<option value="393">393 Darkspear Strand</option>
<option value="394">394 Grizzly Hills</option>
<option value="395">395 Grizzlemaw</option>
<option value="396">396 Winterhoof Water Well</option>
<option value="397">397 Thunderhorn Water Well</option>
<option value="398">398 Wildmane Water Well</option>
<option value="399">399 Skyline Ridge</option>
<option value="400">400 Thousand Needles</option>
<option value="401">401 The Tidus Stair</option>
<option value="403">403 Shady Rest Inn</option>
<option value="404">404 Bael'dun Digsite</option>
<option value="405">405 Desolace</option>
<option value="406">406 Stonetalon Mountains</option>
<option value="407">407 Orgrimmar UNUSED</option>
<option value="408">408 Gillijim's Isle</option>
<option value="409">409 Island of Doctor Lapidis</option>
<option value="410">410 Razorwind Canyon</option>
<option value="411">411 Bathran's Haunt</option>
<option value="412">412 The Ruins of Ordil'Aran</option>
<option value="413">413 Maestra's Post</option>
<option value="414">414 The Zoram Strand</option>
<option value="415">415 Astranaar</option>
<option value="416">416 The Shrine of Aessina</option>
<option value="417">417 Fire Scar Shrine</option>
<option value="418">418 The Ruins of Stardust</option>
<option value="419">419 The Howling Vale</option>
<option value="420">420 Silverwind Refuge</option>
<option value="421">421 Mystral Lake</option>
<option value="422">422 Fallen Sky Lake</option>
<option value="424">424 Iris Lake</option>
<option value="425">425 Moonwell</option>
<option value="426">426 Raynewood Retreat</option>
<option value="427">427 The Shady Nook</option>
<option value="428">428 Night Run</option>
<option value="429">429 Xavian</option>
<option value="430">430 Satyrnaar</option>
<option value="431">431 Splintertree Post</option>
<option value="432">432 The Dor'Danil Barrow Den</option>
<option value="433">433 Falfarren River</option>
<option value="434">434 Felfire Hill</option>
<option value="435">435 Demon Fall Canyon</option>
<option value="436">436 Demon Fall Ridge</option>
<option value="437">437 Warsong Lumber Camp</option>
<option value="438">438 Bough Shadow</option>
<option value="439">439 The Shimmering Flats</option>
<option value="440">440 Tanaris</option>
<option value="441">441 Lake Falathim</option>
<option value="442">442 Auberdine</option>
<option value="443">443 Ruins of Mathystra</option>
<option value="444">444 Tower of Althalaxx</option>
<option value="445">445 Cliffspring Falls</option>
<option value="446">446 Bashal'Aran</option>
<option value="447">447 Ameth'Aran</option>
<option value="448">448 Grove of the Ancients</option>
<option value="449">449 The Master's Glaive</option>
<option value="450">450 Remtravel's Excavation</option>
<option value="452">452 Mist's Edge</option>
<option value="453">453 The Long Wash</option>
<option value="454">454 Wildbend River</option>
<option value="455">455 Blackwood Den</option>
<option value="456">456 Cliffspring River</option>
<option value="457">457 The Veiled Sea</option>
<option value="458">458 Gold Road</option>
<option value="459">459 Scarlet Watch Post</option>
<option value="460">460 Sun Rock Retreat</option>
<option value="461">461 Windshear Crag</option>
<option value="463">463 Cragpool Lake</option>
<option value="464">464 Mirkfallon Lake</option>
<option value="465">465 The Charred Vale</option>
<option value="466">466 Valley of the Bloodfuries</option>
<option value="467">467 Stonetalon Peak</option>
<option value="468">468 The Talon Den</option>
<option value="469">469 Greatwood Vale</option>
<option value="470">470 Thunder Bluff UNUSED</option>
<option value="471">471 Brave Wind Mesa</option>
<option value="472">472 Fire Stone Mesa</option>
<option value="473">473 Mantle Rock</option>
<option value="474">474 Hunter Rise UNUSED</option>
<option value="475">475 Spirit RiseUNUSED</option>
<option value="476">476 Elder RiseUNUSED</option>
<option value="477">477 Ruins of Jubuwal</option>
<option value="478">478 Pools of Arlithrien</option>
<option value="479">479 The Rustmaul Dig Site</option>
<option value="480">480 Camp E'thok</option>
<option value="481">481 Splithoof Crag</option>
<option value="482">482 Highperch</option>
<option value="483">483 The Screeching Canyon</option>
<option value="484">484 Freewind Post</option>
<option value="485">485 The Great Lift</option>
<option value="486">486 Galak Hold</option>
<option value="487">487 Roguefeather Den</option>
<option value="488">488 The Weathered Nook</option>
<option value="489">489 Thalanaar</option>
<option value="490">490 Un'Goro Crater</option>
<option value="491">491 Razorfen Kraul</option>
<option value="492">492 Raven Hill Cemetery</option>
<option value="493">493 Moonglade</option>
<option value="495">495 Howling Fjord</option>
<option value="496">496 Brackenwall Village</option>
<option value="497">497 Swamplight Manor</option>
<option value="498">498 Bloodfen Burrow</option>
<option value="499">499 Darkmist Cavern</option>
<option value="500">500 Moggle Point</option>
<option value="501">501 Beezil's Wreck</option>
<option value="502">502 Witch Hill</option>
<option value="503">503 Sentry Point</option>
<option value="504">504 North Point Tower</option>
<option value="505">505 West Point Tower</option>
<option value="506">506 Lost Point</option>
<option value="507">507 Bluefen</option>
<option value="508">508 Stonemaul Ruins</option>
<option value="509">509 The Den of Flame</option>
<option value="510">510 The Dragonmurk</option>
<option value="511">511 Wyrmbog</option>
<option value="512">512 Blackhoof Village</option>
<option value="513">513 Theramore Isle</option>
<option value="514">514 Foothold Citadel</option>
<option value="515">515 Ironclad Prison</option>
<option value="516">516 Dustwallow Bay</option>
<option value="517">517 Tidefury Cove</option>
<option value="518">518 Dreadmurk Shore</option>
<option value="536">536 Addle's Stead</option>
<option value="537">537 Fire Plume Ridge</option>
<option value="538">538 Lakkari Tar Pits</option>
<option value="539">539 Terror Run</option>
<option value="540">540 The Slithering Scar</option>
<option value="541">541 Marshal's Refuge</option>
<option value="542">542 Fungal Rock</option>
<option value="543">543 Golakka Hot Springs</option>
<option value="556">556 The Loch</option>
<option value="576">576 Beggar's Haunt</option>
<option value="596">596 Kodo Graveyard</option>
<option value="597">597 Ghost Walker Post</option>
<option value="598">598 Sar'theris Strand</option>
<option value="599">599 Thunder Axe Fortress</option>
<option value="600">600 Bolgan's Hole</option>
<option value="602">602 Mannoroc Coven</option>
<option value="603">603 Sargeron</option>
<option value="604">604 Magram Village</option>
<option value="606">606 Gelkis Village</option>
<option value="607">607 Valley of Spears</option>
<option value="608">608 Nijel's Point</option>
<option value="609">609 Kolkar Village</option>
<option value="616">616 Hyjal</option>
<option value="618">618 Winterspring</option>
<option value="636">636 Blackwolf River</option>
<option value="637">637 Kodo Rock</option>
<option value="638">638 Hidden Path</option>
<option value="639">639 Spirit Rock</option>
<option value="640">640 Shrine of the Dormant Flame</option>
<option value="656">656 Lake Elune'ara</option>
<option value="657">657 The Harborage</option>
<option value="676">676 Outland</option>
<option value="696">696 Craftsmen's Terrace UNUSED</option>
<option value="697">697 Tradesmen's Terrace UNUSED</option>
<option value="698">698 The Temple Gardens UNUSED</option>
<option value="699">699 Temple of Elune UNUSED</option>
<option value="700">700 Cenarion Enclave UNUSED</option>
<option value="701">701 Warrior's Terrace UNUSED</option>
<option value="702">702 Rut'theran Village</option>
<option value="716">716 Ironband's Compound</option>
<option value="717">717 The Stockade</option>
<option value="718">718 Wailing Caverns</option>
<option value="719">719 Blackfathom Deeps</option>
<option value="720">720 Fray Island</option>
<option value="721">721 Gnomeregan</option>
<option value="722">722 Razorfen Downs</option>
<option value="736">736 Ban'ethil Hollow</option>
<option value="796">796 Scarlet Monastery</option>
<option value="797">797 Jerod's Landing</option>
<option value="798">798 Ridgepoint Tower</option>
<option value="799">799 The Darkened Bank</option>
<option value="800">800 Coldridge Pass</option>
<option value="801">801 Chill Breeze Valley</option>
<option value="802">802 Shimmer Ridge</option>
<option value="803">803 Amberstill Ranch</option>
<option value="804">804 The Tundrid Hills</option>
<option value="805">805 South Gate Pass</option>
<option value="806">806 South Gate Outpost</option>
<option value="807">807 North Gate Pass</option>
<option value="808">808 North Gate Outpost</option>
<option value="809">809 Gates of Ironforge</option>
<option value="810">810 Stillwater Pond</option>
<option value="811">811 Nightmare Vale</option>
<option value="812">812 Venomweb Vale</option>
<option value="813">813 The Bulwark</option>
<option value="814">814 Southfury River</option>
<option value="815">815 Southfury River</option>
<option value="816">816 Razormane Grounds</option>
<option value="817">817 Skull Rock</option>
<option value="818">818 Palemane Rock</option>
<option value="819">819 Windfury Ridge</option>
<option value="820">820 The Golden Plains</option>
<option value="821">821 The Rolling Plains</option>
<option value="836">836 Dun Algaz</option>
<option value="837">837 Dun Algaz</option>
<option value="838">838 North Gate Pass</option>
<option value="839">839 South Gate Pass</option>
<option value="856">856 Twilight Grove</option>
<option value="876">876 GM Island</option>
<option value="877">877 Delete ME</option>
<option value="878">878 Southfury River</option>
<option value="879">879 Southfury River</option>
<option value="880">880 Thandol Span</option>
<option value="881">881 Thandol Span</option>
<option value="896">896 Purgation Isle</option>
<option value="916">916 The Jansen Stead</option>
<option value="917">917 The Dead Acre</option>
<option value="918">918 The Molsen Farm</option>
<option value="919">919 Stendel's Pond</option>
<option value="920">920 The Dagger Hills</option>
<option value="921">921 Demont's Place</option>
<option value="922">922 The Dust Plains</option>
<option value="923">923 Stonesplinter Valley</option>
<option value="924">924 Valley of Kings</option>
<option value="925">925 Algaz Station</option>
<option value="926">926 Bucklebree Farm</option>
<option value="927">927 The Shining Strand</option>
<option value="928">928 North Tide's Hollow</option>
<option value="936">936 Grizzlepaw Ridge</option>
<option value="956">956 The Verdant Fields</option>
<option value="976">976 Gadgetzan</option>
<option value="977">977 Steamwheedle Port</option>
<option value="978">978 Zul'Farrak</option>
<option value="979">979 Sandsorrow Watch</option>
<option value="980">980 Thistleshrub Valley</option>
<option value="981">981 The Gaping Chasm</option>
<option value="982">982 The Noxious Lair</option>
<option value="983">983 Dunemaul Compound</option>
<option value="984">984 Eastmoon Ruins</option>
<option value="985">985 Waterspring Field</option>
<option value="986">986 Zalashji's Den</option>
<option value="987">987 Land's End Beach</option>
<option value="988">988 Wavestrider Beach</option>
<option value="989">989 Uldum</option>
<option value="990">990 Valley of the Watchers</option>
<option value="991">991 Gunstan's Post</option>
<option value="992">992 Southmoon Ruins</option>
<option value="996">996 Render's Camp</option>
<option value="997">997 Render's Valley</option>
<option value="998">998 Render's Rock</option>
<option value="999">999 Stonewatch Tower</option>
<option value="1000">1000 Galardell Valley</option>
<option value="1001">1001 Lakeridge Highway</option>
<option value="1002">1002 Three Corners</option>
<option value="1016">1016 Direforge Hill</option>
<option value="1017">1017 Raptor Ridge</option>
<option value="1018">1018 Black Channel Marsh</option>
<option value="1019">1019 The Green Belt</option>
<option value="1020">1020 Mosshide Fen</option>
<option value="1021">1021 Thelgen Rock</option>
<option value="1022">1022 Bluegill Marsh</option>
<option value="1023">1023 Saltspray Glen</option>
<option value="1024">1024 Sundown Marsh</option>
<option value="1025">1025 The Green Belt</option>
<option value="1036">1036 Angerfang Encampment</option>
<option value="1037">1037 Grim Batol</option>
<option value="1038">1038 Dragonmaw Gates</option>
<option value="1039">1039 The Lost Fleet</option>
<option value="1056">1056 Darrow Hill</option>
<option value="1057">1057 Thoradin's Wall</option>
<option value="1076">1076 Webwinder Path</option>
<option value="1097">1097 The Hushed Bank</option>
<option value="1098">1098 Manor Mistmantle</option>
<option value="1099">1099 Camp Mojache</option>
<option value="1100">1100 Grimtotem Compound</option>
<option value="1101">1101 The Writhing Deep</option>
<option value="1102">1102 Wildwind Lake</option>
<option value="1103">1103 Gordunni Outpost</option>
<option value="1104">1104 Mok'Gordun</option>
<option value="1105">1105 Feral Scar Vale</option>
<option value="1106">1106 Frayfeather Highlands</option>
<option value="1107">1107 Idlewind Lake</option>
<option value="1108">1108 The Forgotten Coast</option>
<option value="1109">1109 East Pillar</option>
<option value="1110">1110 West Pillar</option>
<option value="1111">1111 Dream Bough</option>
<option value="1112">1112 Jademir Lake</option>
<option value="1113">1113 Oneiros</option>
<option value="1114">1114 Ruins of Ravenwind</option>
<option value="1115">1115 Rage Scar Hold</option>
<option value="1116">1116 Feathermoon Stronghold</option>
<option value="1117">1117 Ruins of Solarsal</option>
<option value="1118">1118 Lower Wilds UNUSED</option>
<option value="1119">1119 The Twin Colossals</option>
<option value="1120">1120 Sardor Isle</option>
<option value="1121">1121 Isle of Dread</option>
<option value="1136">1136 High Wilderness</option>
<option value="1137">1137 Lower Wilds</option>
<option value="1156">1156 Southern Barrens</option>
<option value="1157">1157 Southern Gold Road</option>
<option value="1176">1176 Zul'Farrak</option>
<option value="1196">1196 Utgarde Pinnacle</option>
<option value="1216">1216 Timbermaw Hold</option>
<option value="1217">1217 Vanndir Encampment</option>
<option value="1218">1218 TESTAzshara</option>
<option value="1219">1219 Legash Encampment</option>
<option value="1220">1220 Thalassian Base Camp</option>
<option value="1221">1221 Ruins of Eldarath</option>
<option value="1222">1222 Hetaera's Clutch</option>
<option value="1223">1223 Temple of Zin-Malor</option>
<option value="1224">1224 Bear's Head</option>
<option value="1225">1225 Ursolan</option>
<option value="1226">1226 Temple of Arkkoran</option>
<option value="1227">1227 Bay of Storms</option>
<option value="1228">1228 The Shattered Strand</option>
<option value="1229">1229 Tower of Eldara</option>
<option value="1230">1230 Jagged Reef</option>
<option value="1231">1231 Southridge Beach</option>
<option value="1232">1232 Ravencrest Monument</option>
<option value="1233">1233 Forlorn Ridge</option>
<option value="1234">1234 Lake Mennar</option>
<option value="1235">1235 Shadowsong Shrine</option>
<option value="1236">1236 Haldarr Encampment</option>
<option value="1237">1237 Valormok</option>
<option value="1256">1256 The Ruined Reaches</option>
<option value="1276">1276 The Talondeep Path</option>
<option value="1277">1277 The Talondeep Path</option>
<option value="1296">1296 Rocktusk Farm</option>
<option value="1297">1297 Jaggedswine Farm</option>
<option value="1316">1316 Razorfen Downs</option>
<option value="1336">1336 Lost Rigger Cove</option>
<option value="1337">1337 Uldaman</option>
<option value="1338">1338 Lordamere Lake</option>
<option value="1339">1339 Lordamere Lake</option>
<option value="1357">1357 Gallows' Corner</option>
<option value="1377">1377 Silithus</option>
<option value="1397">1397 Emerald Forest</option>
<option value="1417">1417 Sunken Temple</option>
<option value="1437">1437 Dreadmaul Hold</option>
<option value="1438">1438 Nethergarde Keep</option>
<option value="1439">1439 Dreadmaul Post</option>
<option value="1440">1440 Serpent's Coil</option>
<option value="1441">1441 Altar of Storms</option>
<option value="1442">1442 Firewatch Ridge</option>
<option value="1443">1443 The Slag Pit</option>
<option value="1444">1444 The Sea of Cinders</option>
<option value="1445">1445 Blackrock Mountain</option>
<option value="1446">1446 Thorium Point</option>
<option value="1457">1457 Garrison Armory</option>
<option value="1477">1477 The Temple of Atal'Hakkar</option>
<option value="1497">1497 Undercity</option>
<option value="1517">1517 Uldaman</option>
<option value="1518">1518 Not Used Deadmines</option>
<option value="1519">1519 Stormwind City</option>
<option value="1537">1537 Ironforge</option>
<option value="1557">1557 Splithoof Hold</option>
<option value="1577">1577 The Cape of Stranglethorn</option>
<option value="1578">1578 Southern Savage Coast</option>
<option value="1579">1579 Unused The Deadmines 002</option>
<option value="1580">1580 Unused Ironclad Cove 003</option>
<option value="1581">1581 The Deadmines</option>
<option value="1582">1582 Ironclad Cove</option>
<option value="1583">1583 Blackrock Spire</option>
<option value="1584">1584 Blackrock Depths</option>
<option value="1597">1597 Raptor Grounds UNUSED</option>
<option value="1598">1598 Grol'dom Farm UNUSED</option>
<option value="1599">1599 Mor'shan Base Camp</option>
<option value="1600">1600 Honor's Stand UNUSED</option>
<option value="1601">1601 Blackthorn Ridge UNUSED</option>
<option value="1602">1602 Bramblescar UNUSED</option>
<option value="1603">1603 Agama'gor UNUSED</option>
<option value="1617">1617 Valley of Heroes</option>
<option value="1637">1637 Orgrimmar</option>
<option value="1638">1638 Thunder Bluff</option>
<option value="1639">1639 Elder Rise</option>
<option value="1640">1640 Spirit Rise</option>
<option value="1641">1641 Hunter Rise</option>
<option value="1657">1657 Darnassus</option>
<option value="1658">1658 Cenarion Enclave</option>
<option value="1659">1659 Craftsmen's Terrace</option>
<option value="1660">1660 Warrior's Terrace</option>
<option value="1661">1661 The Temple Gardens</option>
<option value="1662">1662 Tradesmen's Terrace</option>
<option value="1677">1677 Gavin's Naze</option>
<option value="1678">1678 Sofera's Naze</option>
<option value="1679">1679 Corrahn's Dagger</option>
<option value="1680">1680 The Headland</option>
<option value="1681">1681 Misty Shore</option>
<option value="1682">1682 Dandred's Fold</option>
<option value="1683">1683 Growless Cave</option>
<option value="1684">1684 Chillwind Point</option>
<option value="1697">1697 Raptor Grounds</option>
<option value="1698">1698 Bramblescar</option>
<option value="1699">1699 Thorn Hill</option>
<option value="1700">1700 Agama'gor</option>
<option value="1701">1701 Blackthorn Ridge</option>
<option value="1702">1702 Honor's Stand</option>
<option value="1703">1703 The Mor'shan Rampart</option>
<option value="1704">1704 Grol'dom Farm</option>
<option value="1717">1717 Razorfen Kraul</option>
<option value="1718">1718 The Great Lift</option>
<option value="1737">1737 Mistvale Valley</option>
<option value="1738">1738 Nek'mani Wellspring</option>
<option value="1739">1739 Bloodsail Compound</option>
<option value="1740">1740 Venture Co. Base Camp</option>
<option value="1741">1741 Gurubashi Arena</option>
<option value="1742">1742 Spirit Den</option>
<option value="1757">1757 The Crimson Veil</option>
<option value="1758">1758 The Riptide</option>
<option value="1759">1759 The Damsel's Luck</option>
<option value="1760">1760 Venture Co. Operations Center</option>
<option value="1761">1761 Deadwood Village</option>
<option value="1762">1762 Felpaw Village</option>
<option value="1763">1763 Jaedenar</option>
<option value="1764">1764 Bloodvenom River</option>
<option value="1765">1765 Bloodvenom Falls</option>
<option value="1766">1766 Shatter Scar Vale</option>
<option value="1767">1767 Irontree Woods</option>
<option value="1768">1768 Irontree Cavern</option>
<option value="1769">1769 Timbermaw Hold</option>
<option value="1770">1770 Shadow Hold</option>
<option value="1771">1771 Shrine of the Deceiver</option>
<option value="1777">1777 Itharius's Cave</option>
<option value="1778">1778 Sorrowmurk</option>
<option value="1779">1779 Draenil'dur Village</option>
<option value="1780">1780 Splinterspear Junction</option>
<option value="1797">1797 Stagalbog</option>
<option value="1798">1798 The Shifting Mire</option>
<option value="1817">1817 Stagalbog Cave</option>
<option value="1837">1837 Witherbark Caverns</option>
<option value="1857">1857 Thoradin's Wall</option>
<option value="1858">1858 Boulder'gor</option>
<option value="1877">1877 Valley of Fangs</option>
<option value="1878">1878 The Dustbowl</option>
<option value="1879">1879 Mirage Flats</option>
<option value="1880">1880 Featherbeard's Hovel</option>
<option value="1881">1881 Shindigger's Camp</option>
<option value="1882">1882 Plaguemist Ravine</option>
<option value="1883">1883 Valorwind Lake</option>
<option value="1884">1884 Agol'watha</option>
<option value="1885">1885 Hiri'watha</option>
<option value="1886">1886 The Creeping Ruin</option>
<option value="1887">1887 Bogen's Ledge</option>
<option value="1897">1897 The Maker's Terrace</option>
<option value="1898">1898 Dustwind Gulch</option>
<option value="1917">1917 Shaol'watha</option>
<option value="1937">1937 Noonshade Ruins</option>
<option value="1938">1938 Broken Pillar</option>
<option value="1939">1939 Abyssal Sands</option>
<option value="1940">1940 Southbreak Shore</option>
<option value="1941">1941 Caverns of Time</option>
<option value="1942">1942 The Marshlands</option>
<option value="1943">1943 Ironstone Plateau</option>
<option value="1957">1957 Blackchar Cave</option>
<option value="1958">1958 Tanner Camp</option>
<option value="1959">1959 Dustfire Valley</option>
<option value="1977">1977 Zul'Gurub</option>
<option value="1978">1978 Misty Reed Post</option>
<option value="1997">1997 Bloodvenom Post </option>
<option value="1998">1998 Talonbranch Glade </option>
<option value="2017">2017 Stratholme</option>
<option value="2037">2037 Quel'thalas</option>
<option value="2057">2057 Scholomance</option>
<option value="2077">2077 Twilight Vale</option>
<option value="2078">2078 Twilight Shore</option>
<option value="2079">2079 Alcaz Island</option>
<option value="2097">2097 Darkcloud Pinnacle</option>
<option value="2098">2098 Dawning Wood Catacombs</option>
<option value="2099">2099 Stonewatch Keep</option>
<option value="2100">2100 Maraudon</option>
<option value="2101">2101 Stoutlager Inn</option>
<option value="2102">2102 Thunderbrew Distillery</option>
<option value="2103">2103 Menethil Keep</option>
<option value="2104">2104 Deepwater Tavern</option>
<option value="2117">2117 Shadow Grave</option>
<option value="2118">2118 Brill Town Hall</option>
<option value="2119">2119 Gallows' End Tavern</option>
<option value="2137">2137 The Pools of VisionUNUSED</option>
<option value="2138">2138 Dreadmist Den</option>
<option value="2157">2157 Bael'dun Keep</option>
<option value="2158">2158 Emberstrife's Den</option>
<option value="2159">2159 Onyxia's Lair</option>
<option value="2160">2160 Windshear Mine</option>
<option value="2161">2161 Roland's Doom</option>
<option value="2177">2177 Battle Ring</option>
<option value="2197">2197 The Pools of Vision</option>
<option value="2198">2198 Shadowbreak Ravine</option>
<option value="2217">2217 Broken Spear Village</option>
<option value="2237">2237 Whitereach Post</option>
<option value="2238">2238 Gornia</option>
<option value="2239">2239 Zane's Eye Crater</option>
<option value="2240">2240 Mirage Raceway</option>
<option value="2241">2241 Frostsaber Rock</option>
<option value="2242">2242 The Hidden Grove</option>
<option value="2243">2243 Timbermaw Post</option>
<option value="2244">2244 Winterfall Village</option>
<option value="2245">2245 Mazthoril</option>
<option value="2246">2246 Frostfire Hot Springs</option>
<option value="2247">2247 Ice Thistle Hills</option>
<option value="2248">2248 Dun Mandarr</option>
<option value="2249">2249 Frostwhisper Gorge</option>
<option value="2250">2250 Owl Wing Thicket</option>
<option value="2251">2251 Lake Kel'Theril</option>
<option value="2252">2252 The Ruins of Kel'Theril</option>
<option value="2253">2253 Starfall Village</option>
<option value="2254">2254 Ban'Thallow Barrow Den</option>
<option value="2255">2255 Everlook</option>
<option value="2256">2256 Darkwhisper Gorge</option>
<option value="2257">2257 Deeprun Tram</option>
<option value="2258">2258 The Fungal Vale</option>
<option value="2259">2259 UNUSEDThe Marris Stead</option>
<option value="2260">2260 The Marris Stead</option>
<option value="2261">2261 The Undercroft</option>
<option value="2262">2262 Darrowshire</option>
<option value="2263">2263 Crown Guard Tower</option>
<option value="2264">2264 Corin's Crossing</option>
<option value="2265">2265 Scarlet Base Camp</option>
<option value="2266">2266 Tyr's Hand</option>
<option value="2267">2267 The Scarlet Basilica</option>
<option value="2268">2268 Light's Hope Chapel</option>
<option value="2269">2269 Browman Mill</option>
<option value="2270">2270 The Noxious Glade</option>
<option value="2271">2271 Eastwall Tower</option>
<option value="2272">2272 Northdale</option>
<option value="2273">2273 Zul'Mashar</option>
<option value="2274">2274 Mazra'Alor</option>
<option value="2275">2275 Northpass Tower</option>
<option value="2276">2276 Quel'Lithien Lodge</option>
<option value="2277">2277 Plaguewood</option>
<option value="2278">2278 Scourgehold</option>
<option value="2279">2279 Stratholme</option>
<option value="2280">2280 DO NOT USE</option>
<option value="2297">2297 Darrowmere Lake</option>
<option value="2298">2298 Caer Darrow</option>
<option value="2299">2299 Darrowmere Lake</option>
<option value="2300">2300 Caverns of Time</option>
<option value="2301">2301 Thistlefur Village</option>
<option value="2302">2302 The Quagmire</option>
<option value="2303">2303 Windbreak Canyon</option>
<option value="2317">2317 South Seas</option>
<option value="2318">2318 The Great Sea</option>
<option value="2319">2319 The Great Sea</option>
<option value="2320">2320 The Great Sea</option>
<option value="2321">2321 The Great Sea</option>
<option value="2322">2322 The Veiled Sea</option>
<option value="2323">2323 The Veiled Sea</option>
<option value="2324">2324 The Veiled Sea</option>
<option value="2325">2325 The Veiled Sea</option>
<option value="2326">2326 The Veiled Sea</option>
<option value="2337">2337 Razor Hill Barracks</option>
<option value="2338">2338 South Seas</option>
<option value="2339">2339 The Great Sea</option>
<option value="2357">2357 Bloodtooth Camp</option>
<option value="2358">2358 Forest Song</option>
<option value="2359">2359 Greenpaw Village</option>
<option value="2360">2360 Silverwing Outpost</option>
<option value="2361">2361 Nighthaven</option>
<option value="2362">2362 Shrine of Remulos</option>
<option value="2363">2363 Stormrage Barrow Dens</option>
<option value="2364">2364 The Great Sea</option>
<option value="2365">2365 The Great Sea</option>
<option value="2366">2366 The Black Morass</option>
<option value="2367">2367 Old Hillsbrad Foothills</option>
<option value="2368">2368 Tarren Mill</option>
<option value="2369">2369 Southshore</option>
<option value="2370">2370 Durnholde Keep</option>
<option value="2371">2371 Dun Garok</option>
<option value="2372">2372 Hillsbrad Fields</option>
<option value="2373">2373 Eastern Strand</option>
<option value="2374">2374 Nethander Stead</option>
<option value="2375">2375 Darrow Hill</option>
<option value="2376">2376 Southpoint Tower</option>
<option value="2377">2377 Thoradin's Wall</option>
<option value="2378">2378 Western Strand</option>
<option value="2379">2379 Azurelode Mine</option>
<option value="2397">2397 The Great Sea</option>
<option value="2398">2398 The Great Sea</option>
<option value="2399">2399 The Great Sea</option>
<option value="2400">2400 The Forbidding Sea</option>
<option value="2401">2401 The Forbidding Sea</option>
<option value="2402">2402 The Forbidding Sea</option>
<option value="2403">2403 The Forbidding Sea</option>
<option value="2404">2404 Tethris Aran</option>
<option value="2405">2405 Ethel Rethor</option>
<option value="2406">2406 Ranazjar Isle</option>
<option value="2407">2407 Kormek's Hut</option>
<option value="2408">2408 Shadowprey Village</option>
<option value="2417">2417 Blackrock Pass</option>
<option value="2418">2418 Morgan's Vigil</option>
<option value="2419">2419 Slither Rock</option>
<option value="2420">2420 Terror Wing Path</option>
<option value="2421">2421 Draco'dar</option>
<option value="2437">2437 Ragefire Chasm</option>
<option value="2457">2457 Nightsong Woods</option>
<option value="2477">2477 The Veiled Sea</option>
<option value="2478">2478 Morlos'Aran</option>
<option value="2479">2479 Emerald Sanctuary</option>
<option value="2480">2480 Jadefire Glen</option>
<option value="2481">2481 Ruins of Constellas</option>
<option value="2497">2497 Bitter Reaches</option>
<option value="2517">2517 Rise of the Defiler</option>
<option value="2518">2518 Lariss Pavilion</option>
<option value="2519">2519 Woodpaw Hills</option>
<option value="2520">2520 Woodpaw Den</option>
<option value="2521">2521 Verdantis River</option>
<option value="2522">2522 Ruins of Isildien</option>
<option value="2537">2537 Grimtotem Post</option>
<option value="2538">2538 Camp Aparaje</option>
<option value="2539">2539 Malaka'jin</option>
<option value="2540">2540 Boulderslide Ravine</option>
<option value="2541">2541 Sishir Canyon</option>
<option value="2557">2557 Dire Maul</option>
<option value="2558">2558 Deadwind Ravine</option>
<option value="2559">2559 Diamondhead River</option>
<option value="2560">2560 Ariden's Camp</option>
<option value="2561">2561 The Vice</option>
<option value="2562">2562 Karazhan</option>
<option value="2563">2563 Morgan's Plot</option>
<option value="2577">2577 Dire Maul</option>
<option value="2597">2597 Alterac Valley</option>
<option value="2617">2617 Scrabblescrew's Camp</option>
<option value="2618">2618 Jadefire Run</option>
<option value="2619">2619 Thondroril River</option>
<option value="2620">2620 Thondroril River</option>
<option value="2621">2621 Lake Mereldar</option>
<option value="2622">2622 Pestilent Scar</option>
<option value="2623">2623 The Infectis Scar</option>
<option value="2624">2624 Blackwood Lake</option>
<option value="2625">2625 Eastwall Gate</option>
<option value="2626">2626 Terrorweb Tunnel</option>
<option value="2627">2627 Terrordale</option>
<option value="2637">2637 Kargathia Keep</option>
<option value="2657">2657 Valley of Bones</option>
<option value="2677">2677 Blackwing Lair</option>
<option value="2697">2697 Deadman's Crossing</option>
<option value="2717">2717 Molten Core</option>
<option value="2737">2737 The Scarab Wall</option>
<option value="2738">2738 Southwind Village</option>
<option value="2739">2739 Twilight Base Camp</option>
<option value="2740">2740 The Crystal Vale</option>
<option value="2741">2741 The Scarab Dais</option>
<option value="2742">2742 Hive'Ashi</option>
<option value="2743">2743 Hive'Zora</option>
<option value="2744">2744 Hive'Regal</option>
<option value="2757">2757 Shrine of the Fallen Warrior</option>
<option value="2777">2777 UNUSED Alterac Valley</option>
<option value="2797">2797 Blackfathom Deeps</option>
<option value="2817">2817 Crystalsong Forest</option>
<option value="2837">2837 The Master's Cellar</option>
<option value="2838">2838 Stonewrought Pass</option>
<option value="2839">2839 Alterac Valley</option>
<option value="2857">2857 The Rumble Cage</option>
<option value="2877">2877 Chunk Test</option>
<option value="2897">2897 Zoram'gar Outpost</option>
<option value="2917">2917 Hall of Legends</option>
<option value="2918">2918 Champions' Hall</option>
<option value="2937">2937 Grosh'gok Compound</option>
<option value="2938">2938 Sleeping Gorge</option>
<option value="2957">2957 Irondeep Mine</option>
<option value="2958">2958 Stonehearth Outpost</option>
<option value="2959">2959 Dun Baldar</option>
<option value="2960">2960 Icewing Pass</option>
<option value="2961">2961 Frostwolf Village</option>
<option value="2962">2962 Tower Point</option>
<option value="2963">2963 Coldtooth Mine</option>
<option value="2964">2964 Winterax Hold</option>
<option value="2977">2977 Iceblood Garrison</option>
<option value="2978">2978 Frostwolf Keep</option>
<option value="2979">2979 Tor'kren Farm</option>
<option value="3017">3017 Frost Dagger Pass</option>
<option value="3037">3037 Ironstone Camp</option>
<option value="3038">3038 Weazel's Crater</option>
<option value="3039">3039 Tahonda Ruins</option>
<option value="3057">3057 Field of Strife</option>
<option value="3058">3058 Icewing Cavern</option>
<option value="3077">3077 Valor's Rest</option>
<option value="3097">3097 The Swarming Pillar</option>
<option value="3098">3098 Twilight Post</option>
<option value="3099">3099 Twilight Outpost</option>
<option value="3100">3100 Ravaged Twilight Camp</option>
<option value="3117">3117 Shalzaru's Lair</option>
<option value="3137">3137 Talrendis Point</option>
<option value="3138">3138 Rethress Sanctum</option>
<option value="3139">3139 Moon Horror Den</option>
<option value="3140">3140 Scalebeard's Cave</option>
<option value="3157">3157 Boulderslide Cavern</option>
<option value="3177">3177 Warsong Labor Camp</option>
<option value="3197">3197 Chillwind Camp</option>
<option value="3217">3217 The Maul</option>
<option value="3237">3237 The Maul UNUSED</option>
<option value="3257">3257 Bones of Grakkarond</option>
<option value="3277">3277 Warsong Gulch</option>
<option value="3297">3297 Frostwolf Graveyard</option>
<option value="3298">3298 Frostwolf Pass</option>
<option value="3299">3299 Dun Baldar Pass</option>
<option value="3300">3300 Iceblood Graveyard</option>
<option value="3301">3301 Snowfall Graveyard</option>
<option value="3302">3302 Stonehearth Graveyard</option>
<option value="3303">3303 Stormpike Graveyard</option>
<option value="3304">3304 Icewing Bunker</option>
<option value="3305">3305 Stonehearth Bunker</option>
<option value="3306">3306 Wildpaw Ridge</option>
<option value="3317">3317 Revantusk Village</option>
<option value="3318">3318 Rock of Durotan</option>
<option value="3319">3319 Silverwing Grove</option>
<option value="3320">3320 Warsong Lumber Mill</option>
<option value="3321">3321 Silverwing Hold</option>
<option value="3337">3337 Wildpaw Cavern</option>
<option value="3338">3338 The Veiled Cleft</option>
<option value="3357">3357 Yojamba Isle</option>
<option value="3358">3358 Arathi Basin</option>
<option value="3377">3377 The Coil</option>
<option value="3378">3378 Altar of Hir'eek</option>
<option value="3379">3379 Shadra'zaar</option>
<option value="3380">3380 Hakkari Grounds</option>
<option value="3381">3381 Naze of Shirvallah</option>
<option value="3382">3382 Temple of Bethekk</option>
<option value="3383">3383 The Bloodfire Pit</option>
<option value="3384">3384 Altar of the Blood God</option>
<option value="3397">3397 Zanza's Rise</option>
<option value="3398">3398 Edge of Madness</option>
<option value="3417">3417 Trollbane Hall</option>
<option value="3418">3418 Defiler's Den</option>
<option value="3419">3419 Pagle's Pointe</option>
<option value="3420">3420 Farm</option>
<option value="3421">3421 Blacksmith</option>
<option value="3422">3422 Lumber Mill</option>
<option value="3423">3423 Gold Mine</option>
<option value="3424">3424 Stables</option>
<option value="3425">3425 Cenarion Hold</option>
<option value="3426">3426 Staghelm Point</option>
<option value="3427">3427 Bronzebeard Encampment</option>
<option value="3428">3428 Ahn'Qiraj</option>
<option value="3429">3429 Ruins of Ahn'Qiraj</option>
<option value="3430">3430 Eversong Woods</option>
<option value="3431">3431 Sunstrider Isle</option>
<option value="3432">3432 Shrine of Dath'Remar</option>
<option value="3433">3433 Ghostlands</option>
<option value="3434">3434 Scarab Terrace</option>
<option value="3435">3435 General's Terrace</option>
<option value="3436">3436 The Reservoir</option>
<option value="3437">3437 The Hatchery</option>
<option value="3438">3438 The Comb</option>
<option value="3439">3439 Watchers' Terrace</option>
<option value="3440">3440 Scarab Terrace</option>
<option value="3441">3441 General's Terrace</option>
<option value="3442">3442 The Reservoir</option>
<option value="3443">3443 The Hatchery</option>
<option value="3444">3444 The Comb</option>
<option value="3445">3445 Watchers' Terrace</option>
<option value="3446">3446 Twilight's Run</option>
<option value="3447">3447 Ortell's Hideout</option>
<option value="3448">3448 Scarab Terrace</option>
<option value="3449">3449 General's Terrace</option>
<option value="3450">3450 The Reservoir</option>
<option value="3451">3451 The Hatchery</option>
<option value="3452">3452 The Comb</option>
<option value="3453">3453 Watchers' Terrace</option>
<option value="3454">3454 Ruins of Ahn'Qiraj</option>
<option value="3455">3455 The North Sea</option>
<option value="3456">3456 Naxxramas</option>
<option value="3457">3457 Karazhan</option>
<option value="3459">3459 City</option>
<option value="3460">3460 Golden Strand</option>
<option value="3461">3461 Sunsail Anchorage</option>
<option value="3462">3462 Fairbreeze Village</option>
<option value="3463">3463 Magisters Gate</option>
<option value="3464">3464 Farstrider Retreat</option>
<option value="3465">3465 North Sanctum</option>
<option value="3466">3466 West Sanctum</option>
<option value="3467">3467 East Sanctum</option>
<option value="3468">3468 Saltheril's Haven</option>
<option value="3469">3469 Thuron's Livery</option>
<option value="3470">3470 Stillwhisper Pond</option>
<option value="3471">3471 The Living Wood</option>
<option value="3472">3472 Azurebreeze Coast</option>
<option value="3473">3473 Lake Elrendar</option>
<option value="3474">3474 The Scorched Grove</option>
<option value="3475">3475 Zeb'Watha</option>
<option value="3476">3476 Tor'Watha</option>
<option value="3477">3477 Azjol-Nerub</option>
<option value="3478">3478 Gates of Ahn'Qiraj</option>
<option value="3479">3479 The Veiled Sea</option>
<option value="3480">3480 Duskwither Grounds</option>
<option value="3481">3481 Duskwither Spire</option>
<option value="3482">3482 The Dead Scar</option>
<option value="3483">3483 Hellfire Peninsula</option>
<option value="3484">3484 The Sunspire</option>
<option value="3485">3485 Falthrien Academy</option>
<option value="3486">3486 Ravenholdt Manor</option>
<option value="3487">3487 Silvermoon City</option>
<option value="3488">3488 Tranquillien</option>
<option value="3489">3489 Suncrown Village</option>
<option value="3490">3490 Goldenmist Village</option>
<option value="3491">3491 Windrunner Village</option>
<option value="3492">3492 Windrunner Spire</option>
<option value="3493">3493 Sanctum of the Sun</option>
<option value="3494">3494 Sanctum of the Moon</option>
<option value="3495">3495 Dawnstar Spire</option>
<option value="3496">3496 Farstrider Enclave</option>
<option value="3497">3497 An'daroth</option>
<option value="3498">3498 An'telas</option>
<option value="3499">3499 An'owyn</option>
<option value="3500">3500 Deatholme</option>
<option value="3501">3501 Bleeding Ziggurat</option>
<option value="3502">3502 Howling Ziggurat</option>
<option value="3503">3503 Shalandis Isle</option>
<option value="3504">3504 Toryl Estate</option>
<option value="3505">3505 Underlight Mines</option>
<option value="3506">3506 Andilien Estate</option>
<option value="3507">3507 Hatchet Hills</option>
<option value="3508">3508 Amani Pass</option>
<option value="3509">3509 Sungraze Peak</option>
<option value="3510">3510 Amani Catacombs</option>
<option value="3511">3511 Tower of the Damned</option>
<option value="3512">3512 Zeb'Sora</option>
<option value="3513">3513 Lake Elrendar</option>
<option value="3514">3514 The Dead Scar</option>
<option value="3515">3515 Elrendar River</option>
<option value="3516">3516 Zeb'Tela</option>
<option value="3517">3517 Zeb'Nowa</option>
<option value="3518">3518 Nagrand</option>
<option value="3519">3519 Terokkar Forest</option>
<option value="3520">3520 Shadowmoon Valley</option>
<option value="3521">3521 Zangarmarsh</option>
<option value="3522">3522 Blade's Edge Mountains</option>
<option value="3523">3523 Netherstorm</option>
<option value="3524">3524 Azuremyst Isle</option>
<option value="3525">3525 Bloodmyst Isle</option>
<option value="3526">3526 Ammen Vale</option>
<option value="3527">3527 Crash Site</option>
<option value="3528">3528 Silverline Lake</option>
<option value="3529">3529 Nestlewood Thicket</option>
<option value="3530">3530 Shadow Ridge</option>
<option value="3531">3531 Skulking Row</option>
<option value="3532">3532 Dawning Lane</option>
<option value="3533">3533 Ruins of Silvermoon</option>
<option value="3534">3534 Feth's Way</option>
<option value="3535">3535 Hellfire Citadel</option>
<option value="3536">3536 Thrallmar</option>
<option value="3537">3537 Borean Tundra</option>
<option value="3538">3538 Honor Hold</option>
<option value="3539">3539 The Stair of Destiny</option>
<option value="3540">3540 Twisting Nether</option>
<option value="3541">3541 Forge Camp: Mageddon</option>
<option value="3542">3542 The Path of Glory</option>
<option value="3543">3543 The Great Fissure</option>
<option value="3544">3544 Plain of Shards</option>
<option value="3545">3545 Hellfire Citadel</option>
<option value="3546">3546 Expedition Armory</option>
<option value="3547">3547 Throne of Kil'jaeden</option>
<option value="3548">3548 Forge Camp: Rage</option>
<option value="3549">3549 Invasion Point: Annihilator</option>
<option value="3550">3550 Borune Ruins</option>
<option value="3551">3551 Ruins of Sha'naar</option>
<option value="3552">3552 Temple of Telhamat</option>
<option value="3553">3553 Pools of Aggonar</option>
<option value="3554">3554 Falcon Watch</option>
<option value="3555">3555 Mag'har Post</option>
<option value="3556">3556 Den of Haal'esh</option>
<option value="3557">3557 The Exodar</option>
<option value="3558">3558 Elrendar Falls</option>
<option value="3559">3559 Nestlewood Hills</option>
<option value="3560">3560 Ammen Fields</option>
<option value="3561">3561 The Sacred Grove</option>
<option value="3562">3562 Hellfire Ramparts</option>
<option value="3563">3563 Hellfire Citadel</option>
<option value="3564">3564 Emberglade</option>
<option value="3565">3565 Cenarion Refuge</option>
<option value="3566">3566 Moonwing Den</option>
<option value="3567">3567 Pod Cluster</option>
<option value="3568">3568 Pod Wreckage</option>
<option value="3569">3569 Tides' Hollow</option>
<option value="3570">3570 Wrathscale Point</option>
<option value="3571">3571 Bristlelimb Village</option>
<option value="3572">3572 Stillpine Hold</option>
<option value="3573">3573 Odesyus' Landing</option>
<option value="3574">3574 Valaar's Berth</option>
<option value="3575">3575 Silting Shore</option>
<option value="3576">3576 Azure Watch</option>
<option value="3577">3577 Geezle's Camp</option>
<option value="3578">3578 Menagerie Wreckage</option>
<option value="3579">3579 Traitor's Cove</option>
<option value="3580">3580 Wildwind Peak</option>
<option value="3581">3581 Wildwind Path</option>
<option value="3582">3582 Zeth'Gor</option>
<option value="3583">3583 Beryl Coast</option>
<option value="3584">3584 Blood Watch</option>
<option value="3585">3585 Bladewood</option>
<option value="3586">3586 The Vector Coil</option>
<option value="3587">3587 The Warp Piston</option>
<option value="3588">3588 The Cryo-Core</option>
<option value="3589">3589 The Crimson Reach</option>
<option value="3590">3590 Wrathscale Lair</option>
<option value="3591">3591 Ruins of Loreth'Aran</option>
<option value="3592">3592 Nazzivian</option>
<option value="3593">3593 Axxarien</option>
<option value="3594">3594 Blacksilt Shore</option>
<option value="3595">3595 The Foul Pool</option>
<option value="3596">3596 The Hidden Reef</option>
<option value="3597">3597 Amberweb Pass</option>
<option value="3598">3598 Wyrmscar Island</option>
<option value="3599">3599 Talon Stand</option>
<option value="3600">3600 Bristlelimb Enclave</option>
<option value="3601">3601 Ragefeather Ridge</option>
<option value="3602">3602 Kessel's Crossing</option>
<option value="3603">3603 Tel'athion's Camp</option>
<option value="3604">3604 The Bloodcursed Reef</option>
<option value="3605">3605 Hyjal Past</option>
<option value="3606">3606 Hyjal Summit</option>
<option value="3607">3607 Serpentshrine Cavern</option>
<option value="3608">3608 Vindicator's Rest</option>
<option value="3609">3609 Unused3</option>
<option value="3610">3610 Burning Blade Ruins</option>
<option value="3611">3611 Clan Watch</option>
<option value="3612">3612 Bloodcurse Isle</option>
<option value="3613">3613 Garadar</option>
<option value="3614">3614 Skysong Lake</option>
<option value="3615">3615 Throne of the Elements</option>
<option value="3616">3616 Laughing Skull Ruins</option>
<option value="3617">3617 Warmaul Hill</option>
<option value="3618">3618 Gruul's Lair</option>
<option value="3619">3619 Auren Ridge</option>
<option value="3620">3620 Auren Falls</option>
<option value="3621">3621 Lake Sunspring</option>
<option value="3622">3622 Sunspring Post</option>
<option value="3623">3623 Aeris Landing</option>
<option value="3624">3624 Forge Camp: Fear</option>
<option value="3625">3625 Forge Camp: Hate</option>
<option value="3626">3626 Telaar</option>
<option value="3627">3627 Northwind Cleft</option>
<option value="3628">3628 Halaa</option>
<option value="3629">3629 Southwind Cleft</option>
<option value="3630">3630 Oshu'gun</option>
<option value="3631">3631 Spirit Fields</option>
<option value="3632">3632 Shamanar</option>
<option value="3633">3633 Ancestral Grounds</option>
<option value="3634">3634 Windyreed Village</option>
<option value="3635">3635 Unused2</option>
<option value="3636">3636 Elemental Plateau</option>
<option value="3637">3637 Kil'sorrow Fortress</option>
<option value="3638">3638 The Ring of Trials</option>
<option value="3639">3639 Silvermyst Isle</option>
<option value="3640">3640 Daggerfen Village</option>
<option value="3641">3641 Umbrafen Village</option>
<option value="3642">3642 Feralfen Village</option>
<option value="3643">3643 Bloodscale Enclave</option>
<option value="3644">3644 Telredor</option>
<option value="3645">3645 Zabra'jin</option>
<option value="3646">3646 Quagg Ridge</option>
<option value="3647">3647 The Spawning Glen</option>
<option value="3648">3648 The Dead Mire</option>
<option value="3649">3649 Sporeggar</option>
<option value="3650">3650 Ango'rosh Grounds</option>
<option value="3651">3651 Ango'rosh Stronghold</option>
<option value="3652">3652 Funggor Cavern</option>
<option value="3653">3653 Serpent Lake</option>
<option value="3654">3654 The Drain</option>
<option value="3655">3655 Umbrafen Lake</option>
<option value="3656">3656 Marshlight Lake</option>
<option value="3657">3657 Portal Clearing</option>
<option value="3658">3658 Sporewind Lake</option>
<option value="3659">3659 The Lagoon</option>
<option value="3660">3660 Blades' Run</option>
<option value="3661">3661 Blade Tooth Canyon</option>
<option value="3662">3662 Commons Hall</option>
<option value="3663">3663 Derelict Manor</option>
<option value="3664">3664 Huntress of the Sun</option>
<option value="3665">3665 Falconwing Square</option>
<option value="3666">3666 Halaani Basin</option>
<option value="3667">3667 Hewn Bog</option>
<option value="3668">3668 Boha'mu Ruins</option>
<option value="3669">3669 The Stadium</option>
<option value="3670">3670 The Overlook</option>
<option value="3671">3671 Broken Hill</option>
<option value="3672">3672 Mag'hari Procession</option>
<option value="3673">3673 Nesingwary Safari</option>
<option value="3674">3674 Cenarion Thicket</option>
<option value="3675">3675 Tuurem</option>
<option value="3676">3676 Veil Shienor</option>
<option value="3677">3677 Veil Skith</option>
<option value="3678">3678 Veil Shalas</option>
<option value="3679">3679 Skettis</option>
<option value="3680">3680 Blackwind Valley</option>
<option value="3681">3681 Firewing Point</option>
<option value="3682">3682 Grangol'var Village</option>
<option value="3683">3683 Stonebreaker Hold</option>
<option value="3684">3684 Allerian Stronghold</option>
<option value="3685">3685 Bonechewer Ruins</option>
<option value="3686">3686 Veil Lithic</option>
<option value="3687">3687 Olembas</option>
<option value="3688">3688 Auchindoun</option>
<option value="3689">3689 Veil Reskk</option>
<option value="3690">3690 Blackwind Lake</option>
<option value="3691">3691 Lake Ere'Noru</option>
<option value="3692">3692 Lake Jorune</option>
<option value="3693">3693 Skethyl Mountains</option>
<option value="3694">3694 Misty Ridge</option>
<option value="3695">3695 The Broken Hills</option>
<option value="3696">3696 The Barrier Hills</option>
<option value="3697">3697 The Bone Wastes</option>
<option value="3698">3698 Nagrand Arena</option>
<option value="3699">3699 Laughing Skull Courtyard</option>
<option value="3700">3700 The Ring of Blood</option>
<option value="3701">3701 Arena Floor</option>
<option value="3702">3702 Blade's Edge Arena</option>
<option value="3703">3703 Shattrath City</option>
<option value="3704">3704 The Shepherd's Gate</option>
<option value="3705">3705 Telaari Basin</option>
<option value="3706">3706 The Dark Portal</option>
<option value="3707">3707 Alliance Base</option>
<option value="3708">3708 Horde Encampment</option>
<option value="3709">3709 Night Elf Village</option>
<option value="3710">3710 Nordrassil</option>
<option value="3711">3711 Sholazar Basin</option>
<option value="3712">3712 Area 52</option>
<option value="3713">3713 The Blood Furnace</option>
<option value="3714">3714 The Shattered Halls</option>
<option value="3715">3715 The Steamvault</option>
<option value="3716">3716 The Underbog</option>
<option value="3717">3717 The Slave Pens</option>
<option value="3718">3718 Swamprat Post</option>
<option value="3719">3719 Bleeding Hollow Ruins</option>
<option value="3720">3720 Twin Spire Ruins</option>
<option value="3721">3721 The Crumbling Waste</option>
<option value="3722">3722 Manaforge Ara</option>
<option value="3723">3723 Arklon Ruins</option>
<option value="3724">3724 Cosmowrench</option>
<option value="3725">3725 Ruins of Enkaat</option>
<option value="3726">3726 Manaforge B'naar</option>
<option value="3727">3727 The Scrap Field</option>
<option value="3728">3728 The Vortex Fields</option>
<option value="3729">3729 The Heap</option>
<option value="3730">3730 Manaforge Coruu</option>
<option value="3731">3731 The Tempest Rift</option>
<option value="3732">3732 Kirin'Var Village</option>
<option value="3733">3733 The Violet Tower</option>
<option value="3734">3734 Manaforge Duro</option>
<option value="3735">3735 Voidwind Plateau</option>
<option value="3736">3736 Manaforge Ultris</option>
<option value="3737">3737 Celestial Ridge</option>
<option value="3738">3738 The Stormspire</option>
<option value="3739">3739 Forge Base: Oblivion</option>
<option value="3740">3740 Forge Base: Gehenna</option>
<option value="3741">3741 Ruins of Farahlon</option>
<option value="3742">3742 Socrethar's Seat</option>
<option value="3743">3743 Legion Hold</option>
<option value="3744">3744 Shadowmoon Village</option>
<option value="3745">3745 Wildhammer Stronghold</option>
<option value="3746">3746 The Hand of Gul'dan</option>
<option value="3747">3747 The Fel Pits</option>
<option value="3748">3748 The Deathforge</option>
<option value="3749">3749 Coilskar Cistern</option>
<option value="3750">3750 Coilskar Point</option>
<option value="3751">3751 Sunfire Point</option>
<option value="3752">3752 Illidari Point</option>
<option value="3753">3753 Ruins of Baa'ri</option>
<option value="3754">3754 Altar of Sha'tar</option>
<option value="3755">3755 The Stair of Doom</option>
<option value="3756">3756 Ruins of Karabor</option>
<option value="3757">3757 Ata'mal Terrace</option>
<option value="3758">3758 Netherwing Fields</option>
<option value="3759">3759 Netherwing Ledge</option>
<option value="3760">3760 The Barrier Hills</option>
<option value="3761">3761 The High Path</option>
<option value="3762">3762 Windyreed Pass</option>
<option value="3763">3763 Zangar Ridge</option>
<option value="3764">3764 The Twilight Ridge</option>
<option value="3765">3765 Razorthorn Trail</option>
<option value="3766">3766 Orebor Harborage</option>
<option value="3767">3767 Blades' Run</option>
<option value="3768">3768 Jagged Ridge</option>
<option value="3769">3769 Thunderlord Stronghold</option>
<option value="3770">3770 Blade Tooth Canyon</option>
<option value="3771">3771 The Living Grove</option>
<option value="3772">3772 Sylvanaar</option>
<option value="3773">3773 Bladespire Hold</option>
<option value="3774">3774 Gruul's Lair</option>
<option value="3775">3775 Circle of Blood</option>
<option value="3776">3776 Bloodmaul Outpost</option>
<option value="3777">3777 Bloodmaul Camp</option>
<option value="3778">3778 Draenethyst Mine</option>
<option value="3779">3779 Trogma's Claim</option>
<option value="3780">3780 Blackwing Coven</option>
<option value="3781">3781 Grishnath</option>
<option value="3782">3782 Veil Lashh</option>
<option value="3783">3783 Veil Vekh</option>
<option value="3784">3784 Forge Camp: Terror</option>
<option value="3785">3785 Forge Camp: Wrath</option>
<option value="3786">3786 Ogri'la</option>
<option value="3787">3787 Forge Camp: Anger</option>
<option value="3788">3788 The Low Path</option>
<option value="3789">3789 Shadow Labyrinth</option>
<option value="3790">3790 Auchenai Crypts</option>
<option value="3791">3791 Sethekk Halls</option>
<option value="3792">3792 Mana-Tombs</option>
<option value="3793">3793 Felspark Ravine</option>
<option value="3794">3794 Valley of Bones</option>
<option value="3795">3795 Sha'naari Wastes</option>
<option value="3796">3796 The Warp Fields</option>
<option value="3797">3797 Fallen Sky Ridge</option>
<option value="3798">3798 Haal'eshi Gorge</option>
<option value="3799">3799 Stonewall Canyon</option>
<option value="3800">3800 Thornfang Hill</option>
<option value="3801">3801 Mag'har Grounds</option>
<option value="3802">3802 Void Ridge</option>
<option value="3803">3803 The Abyssal Shelf</option>
<option value="3804">3804 The Legion Front</option>
<option value="3805">3805 Zul'Aman</option>
<option value="3806">3806 Supply Caravan</option>
<option value="3807">3807 Reaver's Fall</option>
<option value="3808">3808 Cenarion Post</option>
<option value="3809">3809 Southern Rampart</option>
<option value="3810">3810 Northern Rampart</option>
<option value="3811">3811 Gor'gaz Outpost</option>
<option value="3812">3812 Spinebreaker Post</option>
<option value="3813">3813 The Path of Anguish</option>
<option value="3814">3814 East Supply Caravan</option>
<option value="3815">3815 Expedition Point</option>
<option value="3816">3816 Zeppelin Crash</option>
<option value="3817">3817 Testing</option>
<option value="3818">3818 Bloodscale Grounds</option>
<option value="3819">3819 Darkcrest Enclave</option>
<option value="3820">3820 Eye of the Storm</option>
<option value="3821">3821 Warden's Cage</option>
<option value="3822">3822 Eclipse Point</option>
<option value="3823">3823 Isle of Tribulations</option>
<option value="3824">3824 Bloodmaul Ravine</option>
<option value="3825">3825 Dragons' End</option>
<option value="3826">3826 Daggermaw Canyon</option>
<option value="3827">3827 Vekhaar Stand</option>
<option value="3828">3828 Ruuan Weald</option>
<option value="3829">3829 Veil Ruuan</option>
<option value="3830">3830 Raven's Wood</option>
<option value="3831">3831 Death's Door</option>
<option value="3832">3832 Vortex Pinnacle</option>
<option value="3833">3833 Razor Ridge</option>
<option value="3834">3834 Ridge of Madness</option>
<option value="3835">3835 Dustquill Ravine</option>
<option value="3836">3836 Magtheridon's Lair</option>
<option value="3837">3837 Sunfury Hold</option>
<option value="3838">3838 Spinebreaker Mountains</option>
<option value="3839">3839 Abandoned Armory</option>
<option value="3840">3840 The Black Temple</option>
<option value="3841">3841 Darkcrest Shore</option>
<option value="3842">3842 Tempest Keep</option>
<option value="3844">3844 Mok'Nathal Village</option>
<option value="3845">3845 Tempest Keep</option>
<option value="3846">3846 The Arcatraz</option>
<option value="3847">3847 The Botanica</option>
<option value="3848">3848 The Arcatraz</option>
<option value="3849">3849 The Mechanar</option>
<option value="3850">3850 Netherstone</option>
<option value="3851">3851 Midrealm Post</option>
<option value="3852">3852 Tuluman's Landing</option>
<option value="3854">3854 Protectorate Watch Post</option>
<option value="3855">3855 Circle of Blood Arena</option>
<option value="3856">3856 Elrendar Crossing</option>
<option value="3857">3857 Ammen Ford</option>
<option value="3858">3858 Razorthorn Shelf</option>
<option value="3859">3859 Silmyr Lake</option>
<option value="3860">3860 Raastok Glade</option>
<option value="3861">3861 Thalassian Pass</option>
<option value="3862">3862 Churning Gulch</option>
<option value="3863">3863 Broken Wilds</option>
<option value="3864">3864 Bash'ir Landing</option>
<option value="3865">3865 Crystal Spine</option>
<option value="3866">3866 Skald</option>
<option value="3867">3867 Bladed Gulch</option>
<option value="3868">3868 Gyro-Plank Bridge</option>
<option value="3869">3869 Mage Tower</option>
<option value="3870">3870 Blood Elf Tower</option>
<option value="3871">3871 Draenei Ruins</option>
<option value="3872">3872 Fel Reaver Ruins</option>
<option value="3873">3873 The Proving Grounds</option>
<option value="3874">3874 Eco-Dome Farfield</option>
<option value="3875">3875 Eco-Dome Skyperch</option>
<option value="3876">3876 Eco-Dome Sutheron</option>
<option value="3877">3877 Eco-Dome Midrealm</option>
<option value="3878">3878 Ethereum Staging Grounds</option>
<option value="3879">3879 Chapel Yard</option>
<option value="3880">3880 Access Shaft Zeon</option>
<option value="3881">3881 Trelleum Mine</option>
<option value="3882">3882 Invasion Point: Destroyer</option>
<option value="3883">3883 Camp of Boom</option>
<option value="3884">3884 Spinebreaker Pass</option>
<option value="3885">3885 Netherweb Ridge</option>
<option value="3886">3886 Derelict Caravan</option>
<option value="3887">3887 Refugee Caravan</option>
<option value="3888">3888 Shadow Tomb</option>
<option value="3889">3889 Veil Rhaze</option>
<option value="3890">3890 Tomb of Lights</option>
<option value="3891">3891 Carrion Hill</option>
<option value="3892">3892 Writhing Mound</option>
<option value="3893">3893 Ring of Observance</option>
<option value="3894">3894 Auchenai Grounds</option>
<option value="3895">3895 Cenarion Watchpost</option>
<option value="3896">3896 Aldor Rise</option>
<option value="3897">3897 Terrace of Light</option>
<option value="3898">3898 Scryer's Tier</option>
<option value="3899">3899 Lower City</option>
<option value="3900">3900 Invasion Point: Overlord</option>
<option value="3901">3901 Allerian Post</option>
<option value="3902">3902 Stonebreaker Camp</option>
<option value="3903">3903 Boulder'mok</option>
<option value="3904">3904 Cursed Hollow</option>
<option value="3905">3905 Coilfang Reservoir</option>
<option value="3906">3906 The Bloodwash</option>
<option value="3907">3907 Veridian Point</option>
<option value="3908">3908 Middenvale</option>
<option value="3909">3909 The Lost Fold</option>
<option value="3910">3910 Mystwood</option>
<option value="3911">3911 Tranquil Shore</option>
<option value="3912">3912 Goldenbough Pass</option>
<option value="3913">3913 Runestone Falithas</option>
<option value="3914">3914 Runestone Shan'dor</option>
<option value="3915">3915 Fairbridge Strand</option>
<option value="3916">3916 Moongraze Woods</option>
<option value="3917">3917 Auchindoun</option>
<option value="3918">3918 Toshley's Station</option>
<option value="3919">3919 Singing Ridge</option>
<option value="3920">3920 Shatter Point</option>
<option value="3921">3921 Arklonis Ridge</option>
<option value="3922">3922 Bladespire Outpost</option>
<option value="3923">3923 Gruul's Lair</option>
<option value="3924">3924 Northmaul Tower</option>
<option value="3925">3925 Southmaul Tower</option>
<option value="3926">3926 Shattered Plains</option>
<option value="3927">3927 Oronok's Farm</option>
<option value="3928">3928 The Altar of Damnation</option>
<option value="3929">3929 The Path of Conquest</option>
<option value="3930">3930 Eclipsion Fields</option>
<option value="3931">3931 Bladespire Grounds</option>
<option value="3932">3932 Sketh'lon Base Camp</option>
<option value="3933">3933 Sketh'lon Wreckage</option>
<option value="3934">3934 Town Square</option>
<option value="3935">3935 Wizard Row</option>
<option value="3936">3936 Deathforge Tower</option>
<option value="3937">3937 Slag Watch</option>
<option value="3938">3938 Sanctum of the Stars</option>
<option value="3939">3939 Dragonmaw Fortress</option>
<option value="3940">3940 The Fetid Pool</option>
<option value="3941">3941 Test</option>
<option value="3942">3942 Razaan's Landing</option>
<option value="3943">3943 Invasion Point: Cataclysm</option>
<option value="3944">3944 The Altar of Shadows</option>
<option value="3945">3945 Netherwing Pass</option>
<option value="3946">3946 Wayne's Refuge</option>
<option value="3947">3947 The Scalding Pools</option>
<option value="3948">3948 Brian and Pat Test</option>
<option value="3949">3949 Magma Fields</option>
<option value="3950">3950 Crimson Watch</option>
<option value="3951">3951 Evergrove</option>
<option value="3952">3952 Wyrmskull Bridge</option>
<option value="3953">3953 Scalewing Shelf</option>
<option value="3954">3954 Wyrmskull Tunnel</option>
<option value="3955">3955 Hellfire Basin</option>
<option value="3956">3956 The Shadow Stair</option>
<option value="3957">3957 Sha'tari Outpost</option>
<option value="3958">3958 Sha'tari Base Camp</option>
<option value="3959">3959 Black Temple</option>
<option value="3960">3960 Soulgrinder's Barrow</option>
<option value="3961">3961 Sorrow Wing Point</option>
<option value="3962">3962 Vim'gol's Circle</option>
<option value="3963">3963 Dragonspine Ridge</option>
<option value="3964">3964 Skyguard Outpost</option>
<option value="3965">3965 Netherwing Mines</option>
<option value="3966">3966 Dragonmaw Base Camp</option>
<option value="3967">3967 Dragonmaw Skyway</option>
<option value="3968">3968 Ruins of Lordaeron</option>
<option value="3969">3969 Rivendark's Perch</option>
<option value="3970">3970 Obsidia's Perch</option>
<option value="3971">3971 Insidion's Perch</option>
<option value="3972">3972 Furywing's Perch</option>
<option value="3973">3973 Blackwind Landing</option>
<option value="3974">3974 Veil Harr'ik</option>
<option value="3975">3975 Terokk's Rest</option>
<option value="3976">3976 Veil Ala'rak</option>
<option value="3977">3977 Upper Veil Shil'ak</option>
<option value="3978">3978 Lower Veil Shil'ak</option>
<option value="3979">3979 The Frozen Sea</option>
<option value="3980">3980 Daggercap Bay</option>
<option value="3981">3981 Valgarde</option>
<option value="3982">3982 Wyrmskull Village</option>
<option value="3983">3983 Utgarde Keep</option>
<option value="3984">3984 Nifflevar</option>
<option value="3985">3985 Falls of Ymiron</option>
<option value="3986">3986 Echo Reach</option>
<option value="3987">3987 The Isle of Spears</option>
<option value="3988">3988 Kamagua</option>
<option value="3989">3989 Garvan's Reef</option>
<option value="3990">3990 Scalawag Point</option>
<option value="3991">3991 New Agamand</option>
<option value="3992">3992 The Ancient Lift</option>
<option value="3993">3993 Westguard Turret</option>
<option value="3994">3994 Halgrind</option>
<option value="3995">3995 The Laughing Stand</option>
<option value="3996">3996 Baelgun's Excavation Site</option>
<option value="3997">3997 Explorers' League Outpost</option>
<option value="3998">3998 Westguard Keep</option>
<option value="3999">3999 Steel Gate</option>
<option value="4000">4000 Vengeance Landing</option>
<option value="4001">4001 Baleheim</option>
<option value="4002">4002 Skorn</option>
<option value="4003">4003 Fort Wildervar</option>
<option value="4004">4004 Vileprey Village</option>
<option value="4005">4005 Ivald's Ruin</option>
<option value="4006">4006 Gjalerbron</option>
<option value="4007">4007 Tomb of the Lost Kings</option>
<option value="4008">4008 Shartuul's Transporter</option>
<option value="4009">4009 Illidari Training Grounds</option>
<option value="4010">4010 Mudsprocket</option>
<option value="4018">4018 Camp Winterhoof</option>
<option value="4019">4019 Development Land</option>
<option value="4020">4020 Mightstone Quarry</option>
<option value="4021">4021 Bloodspore Plains</option>
<option value="4022">4022 Gammoth</option>
<option value="4023">4023 Amber Ledge</option>
<option value="4024">4024 Coldarra</option>
<option value="4025">4025 The Westrift</option>
<option value="4026">4026 The Transitus Stair</option>
<option value="4027">4027 Coast of Echoes</option>
<option value="4028">4028 Riplash Strand</option>
<option value="4029">4029 Riplash Ruins</option>
<option value="4030">4030 Coast of Idols</option>
<option value="4031">4031 Pal'ea</option>
<option value="4032">4032 Valiance Keep</option>
<option value="4033">4033 Winterfin Village</option>
<option value="4034">4034 The Borean Wall</option>
<option value="4035">4035 The Geyser Fields</option>
<option value="4036">4036 Fizzcrank Pumping Station</option>
<option value="4037">4037 Taunka'le Village</option>
<option value="4038">4038 Magnamoth Caverns</option>
<option value="4039">4039 Coldrock Quarry</option>
<option value="4040">4040 Njord's Breath Bay</option>
<option value="4041">4041 Kaskala</option>
<option value="4042">4042 Transborea</option>
<option value="4043">4043 The Flood Plains</option>
<option value="4046">4046 Direhorn Post</option>
<option value="4047">4047 Nat's Landing</option>
<option value="4048">4048 Ember Clutch</option>
<option value="4049">4049 Tabetha's Farm</option>
<option value="4050">4050 Derelict Strand</option>
<option value="4051">4051 The Frozen Glade</option>
<option value="4052">4052 The Vibrant Glade</option>
<option value="4053">4053 The Twisted Glade</option>
<option value="4054">4054 Rivenwood</option>
<option value="4055">4055 Caldemere Lake</option>
<option value="4056">4056 Utgarde Catacombs</option>
<option value="4057">4057 Shield Hill</option>
<option value="4058">4058 Lake Cauldros</option>
<option value="4059">4059 Cauldros Isle</option>
<option value="4060">4060 Bleeding Vale</option>
<option value="4061">4061 Giants' Run</option>
<option value="4062">4062 Apothecary Camp</option>
<option value="4063">4063 Ember Spear Tower</option>
<option value="4064">4064 Shattered Straits</option>
<option value="4065">4065 Gjalerhorn</option>
<option value="4066">4066 Frostblade Peak</option>
<option value="4067">4067 Plaguewood Tower</option>
<option value="4068">4068 West Spear Tower</option>
<option value="4069">4069 North Spear Tower</option>
<option value="4070">4070 Chillmere Coast</option>
<option value="4071">4071 Whisper Gulch</option>
<option value="4072">4072 Sub zone</option>
<option value="4073">4073 Winter's Terrace</option>
<option value="4074">4074 The Waking Halls</option>
<option value="4075">4075 Sunwell Plateau</option>
<option value="4076">4076 Reuse Me 7</option>
<option value="4077">4077 Sorlof's Strand</option>
<option value="4078">4078 Razorthorn Rise</option>
<option value="4079">4079 Frostblade Pass</option>
<option value="4080">4080 Isle of Quel'Danas</option>
<option value="4081">4081 The Dawnchaser</option>
<option value="4082">4082 The Sin'loren</option>
<option value="4083">4083 Silvermoon's Pride</option>
<option value="4084">4084 The Bloodoath</option>
<option value="4085">4085 Shattered Sun Staging Area</option>
<option value="4086">4086 Sun's Reach Sanctum</option>
<option value="4087">4087 Sun's Reach Harbor</option>
<option value="4088">4088 Sun's Reach Armory</option>
<option value="4089">4089 Dawnstar Village</option>
<option value="4090">4090 The Dawning Square</option>
<option value="4091">4091 Greengill Coast</option>
<option value="4092">4092 The Dead Scar</option>
<option value="4093">4093 The Sun Forge</option>
<option value="4094">4094 Sunwell Plateau</option>
<option value="4095">4095 Magisters' Terrace</option>
<option value="4096">4096 ClaytÃ¶n's WoWEdit Land</option>
<option value="4097">4097 Winterfin Caverns</option>
<option value="4098">4098 Glimmer Bay</option>
<option value="4099">4099 Winterfin Retreat</option>
<option value="4100">4100 The Culling of Stratholme</option>
<option value="4101">4101 Sands of Nasam</option>
<option value="4102">4102 Krom's Landing</option>
<option value="4103">4103 Nasam's Talon</option>
<option value="4104">4104 Echo Cove</option>
<option value="4105">4105 Beryl Point</option>
<option value="4106">4106 Garrosh's Landing</option>
<option value="4107">4107 Warsong Jetty</option>
<option value="4108">4108 Fizzcrank Airstrip</option>
<option value="4109">4109 Lake Kum'uya</option>
<option value="4110">4110 Farshire Fields</option>
<option value="4111">4111 Farshire</option>
<option value="4112">4112 Farshire Lighthouse</option>
<option value="4113">4113 Unu'pe</option>
<option value="4114">4114 Death's Stand</option>
<option value="4115">4115 The Abandoned Reach</option>
<option value="4116">4116 Scalding Pools</option>
<option value="4117">4117 Steam Springs</option>
<option value="4118">4118 Talramas</option>
<option value="4119">4119 Festering Pools</option>
<option value="4120">4120 The Nexus</option>
<option value="4121">4121 Transitus Shield</option>
<option value="4122">4122 Bor'gorok Outpost</option>
<option value="4123">4123 Magmoth</option>
<option value="4124">4124 The Dens of Dying</option>
<option value="4125">4125 Temple City of En'kilah</option>
<option value="4126">4126 The Wailing Ziggurat</option>
<option value="4127">4127 Steeljaw's Caravan</option>
<option value="4128">4128 Naxxanar</option>
<option value="4129">4129 Warsong Hold</option>
<option value="4130">4130 Plains of Nasam</option>
<option value="4131">4131 Magisters' Terrace</option>
<option value="4132">4132 Ruins of Eldra'nath</option>
<option value="4133">4133 Charred Rise</option>
<option value="4134">4134 Blistering Pool</option>
<option value="4135">4135 Spire of Blood</option>
<option value="4136">4136 Spire of Decay</option>
<option value="4137">4137 Spire of Pain</option>
<option value="4138">4138 Frozen Reach</option>
<option value="4139">4139 Parhelion Plaza</option>
<option value="4140">4140 The Dead Scar</option>
<option value="4141">4141 Torp's Farm</option>
<option value="4142">4142 Warsong Granary</option>
<option value="4143">4143 Warsong Slaughterhouse</option>
<option value="4144">4144 Warsong Farms Outpost</option>
<option value="4145">4145 West Point Station</option>
<option value="4146">4146 North Point Station</option>
<option value="4147">4147 Mid Point Station</option>
<option value="4148">4148 South Point Station</option>
<option value="4149">4149 D.E.H.T.A. Encampment</option>
<option value="4150">4150 Kaw's Roost</option>
<option value="4151">4151 Westwind Refugee Camp</option>
<option value="4152">4152 Moa'ki Harbor</option>
<option value="4153">4153 Indu'le Village</option>
<option value="4154">4154 Snowfall Glade</option>
<option value="4155">4155 The Half Shell</option>
<option value="4156">4156 Surge Needle</option>
<option value="4157">4157 Moonrest Gardens</option>
<option value="4158">4158 Stars' Rest</option>
<option value="4159">4159 Westfall Brigade Encampment</option>
<option value="4160">4160 Lothalor Woodlands</option>
<option value="4161">4161 Wyrmrest Temple</option>
<option value="4162">4162 Icemist Falls</option>
<option value="4163">4163 Icemist Village</option>
<option value="4164">4164 The Pit of Narjun</option>
<option value="4165">4165 Agmar's Hammer</option>
<option value="4166">4166 Lake Indu'le</option>
<option value="4167">4167 Obsidian Dragonshrine</option>
<option value="4168">4168 Ruby Dragonshrine</option>
<option value="4169">4169 Fordragon Hold</option>
<option value="4170">4170 Kor'kron Vanguard</option>
<option value="4171">4171 The Court of Skulls</option>
<option value="4172">4172 Angrathar the Wrathgate</option>
<option value="4173">4173 Galakrond's Rest</option>
<option value="4174">4174 The Wicked Coil</option>
<option value="4175">4175 Bronze Dragonshrine</option>
<option value="4176">4176 The Mirror of Dawn</option>
<option value="4177">4177 Wintergarde Keep</option>
<option value="4178">4178 Wintergarde Mine</option>
<option value="4179">4179 Emerald Dragonshrine</option>
<option value="4180">4180 New Hearthglen</option>
<option value="4181">4181 Crusader's Landing</option>
<option value="4182">4182 Sinner's Folly</option>
<option value="4183">4183 Azure Dragonshrine</option>
<option value="4184">4184 Path of the Titans</option>
<option value="4185">4185 The Forgotten Shore</option>
<option value="4186">4186 Venomspite</option>
<option value="4187">4187 The Crystal Vice</option>
<option value="4188">4188 The Carrion Fields</option>
<option value="4189">4189 Onslaught Base Camp</option>
<option value="4190">4190 Thorson's Post</option>
<option value="4191">4191 Light's Trust</option>
<option value="4192">4192 Frostmourne Cavern</option>
<option value="4193">4193 Scarlet Point</option>
<option value="4194">4194 Jintha'kalar</option>
<option value="4195">4195 Ice Heart Cavern</option>
<option value="4196">4196 Drak'Tharon Keep</option>
<option value="4197">4197 Wintergrasp</option>
<option value="4198">4198 Kili'ua's Atoll</option>
<option value="4199">4199 Silverbrook</option>
<option value="4200">4200 Vordrassil's Heart</option>
<option value="4201">4201 Vordrassil's Tears</option>
<option value="4202">4202 Vordrassil's Tears</option>
<option value="4203">4203 Vordrassil's Limb</option>
<option value="4204">4204 Amberpine Lodge</option>
<option value="4205">4205 Solstice Village</option>
<option value="4206">4206 Conquest Hold</option>
<option value="4207">4207 Voldrune</option>
<option value="4208">4208 Granite Springs</option>
<option value="4209">4209 Zeb'Halak</option>
<option value="4210">4210 Drak'Tharon Keep</option>
<option value="4211">4211 Camp Oneqwah</option>
<option value="4212">4212 Eastwind Shore</option>
<option value="4213">4213 The Broken Bluffs</option>
<option value="4214">4214 Boulder Hills</option>
<option value="4215">4215 Rage Fang Shrine</option>
<option value="4216">4216 Drakil'jin Ruins</option>
<option value="4217">4217 Blackriver Logging Camp</option>
<option value="4218">4218 Heart's Blood Shrine</option>
<option value="4219">4219 Hollowstone Mine</option>
<option value="4220">4220 Dun Argol</option>
<option value="4221">4221 Thor Modan</option>
<option value="4222">4222 Blue Sky Logging Grounds</option>
<option value="4223">4223 Maw of Neltharion</option>
<option value="4224">4224 The Briny Pinnacle</option>
<option value="4225">4225 Glittering Strand</option>
<option value="4226">4226 Iskaal</option>
<option value="4227">4227 Dragon's Fall</option>
<option value="4228">4228 The Oculus</option>
<option value="4229">4229 Prospector's Point</option>
<option value="4230">4230 Coldwind Heights</option>
<option value="4231">4231 Redwood Trading Post</option>
<option value="4232">4232 Vengeance Pass</option>
<option value="4233">4233 Dawn's Reach</option>
<option value="4234">4234 Naxxramas</option>
<option value="4235">4235 Heartwood Trading Post</option>
<option value="4236">4236 Evergreen Trading Post</option>
<option value="4237">4237 Spruce Point Post</option>
<option value="4238">4238 White Pine Trading Post</option>
<option value="4239">4239 Aspen Grove Post</option>
<option value="4240">4240 Forest's Edge Post</option>
<option value="4241">4241 Eldritch Heights</option>
<option value="4242">4242 Venture Bay</option>
<option value="4243">4243 Wintergarde Crypt</option>
<option value="4244">4244 Bloodmoon Isle</option>
<option value="4245">4245 Shadowfang Tower</option>
<option value="4246">4246 Wintergarde Mausoleum</option>
<option value="4247">4247 Duskhowl Den</option>
<option value="4248">4248 The Conquest Pit</option>
<option value="4249">4249 The Path of Iron</option>
<option value="4250">4250 Ruins of Tethys</option>
<option value="4251">4251 Silverbrook Hills</option>
<option value="4252">4252 The Broken Bluffs</option>
<option value="4253">4253 7th Legion Front</option>
<option value="4254">4254 The Dragon Wastes</option>
<option value="4255">4255 Ruins of Drak'Zin</option>
<option value="4256">4256 Drak'Mar Lake</option>
<option value="4257">4257 Dragonspine Tributary</option>
<option value="4258">4258 The North Sea</option>
<option value="4259">4259 Drak'ural</option>
<option value="4260">4260 Thorvald's Camp</option>
<option value="4261">4261 Ghostblade Post</option>
<option value="4262">4262 Ashwood Post</option>
<option value="4263">4263 Lydell's Ambush</option>
<option value="4264">4264 Halls of Stone</option>
<option value="4265">4265 The Nexus</option>
<option value="4266">4266 Harkor's Camp</option>
<option value="4267">4267 Vordrassil Pass</option>
<option value="4268">4268 Ruuna's Camp</option>
<option value="4269">4269 Shrine of Scales</option>
<option value="4270">4270 Drak'atal Passage</option>
<option value="4271">4271 Utgarde Pinnacle</option>
<option value="4272">4272 Halls of Lightning</option>
<option value="4273">4273 Ulduar</option>
<option value="4275">4275 The Argent Stand</option>
<option value="4276">4276 Altar of Sseratus</option>
<option value="4277">4277 Azjol-Nerub</option>
<option value="4278">4278 Drak'Sotra Fields</option>
<option value="4279">4279 Drak'Sotra</option>
<option value="4280">4280 Drak'Agal</option>
<option value="4281">4281 Acherus: The Ebon Hold</option>
<option value="4282">4282 The Avalanche</option>
<option value="4283">4283 The Lost Lands</option>
<option value="4284">4284 Nesingwary Base Camp</option>
<option value="4285">4285 The Seabreach Flow</option>
<option value="4286">4286 The Bones of Nozronn</option>
<option value="4287">4287 Kartak's Hold</option>
<option value="4288">4288 Sparktouched Haven</option>
<option value="4289">4289 The Path of the Lifewarden</option>
<option value="4290">4290 River's Heart</option>
<option value="4291">4291 Rainspeaker Canopy</option>
<option value="4292">4292 Frenzyheart Hill</option>
<option value="4293">4293 Wildgrowth Mangal</option>
<option value="4294">4294 Heb'Valok</option>
<option value="4295">4295 The Sundered Shard</option>
<option value="4296">4296 The Lifeblood Pillar</option>
<option value="4297">4297 Mosswalker Village</option>
<option value="4298">4298 Plaguelands: The Scarlet Enclave</option>
<option value="4299">4299 Kolramas</option>
<option value="4300">4300 Waygate</option>
<option value="4302">4302 The Skyreach Pillar</option>
<option value="4303">4303 Hardknuckle Clearing</option>
<option value="4304">4304 Sapphire Hive</option>
<option value="4306">4306 Mistwhisper Refuge</option>
<option value="4307">4307 The Glimmering Pillar</option>
<option value="4308">4308 Spearborn Encampment</option>
<option value="4309">4309 Drak'Tharon Keep</option>
<option value="4310">4310 Zeramas</option>
<option value="4311">4311 Reliquary of Agony</option>
<option value="4312">4312 Ebon Watch</option>
<option value="4313">4313 Thrym's End</option>
<option value="4314">4314 Voltarus</option>
<option value="4315">4315 Reliquary of Pain</option>
<option value="4316">4316 Rageclaw Den</option>
<option value="4317">4317 Light's Breach</option>
<option value="4318">4318 Pools of Zha'Jin</option>
<option value="4319">4319 Zim'Abwa</option>
<option value="4320">4320 Amphitheater of Anguish</option>
<option value="4321">4321 Altar of Rhunok</option>
<option value="4322">4322 Altar of Har'koa</option>
<option value="4323">4323 Zim'Torga</option>
<option value="4324">4324 Pools of Jin'Alai</option>
<option value="4325">4325 Altar of Quetz'lun</option>
<option value="4326">4326 Heb'Drakkar</option>
<option value="4327">4327 Drak'Mabwa</option>
<option value="4328">4328 Zim'Rhuk</option>
<option value="4329">4329 Altar of Mam'toth</option>
<option value="4342">4342 Acherus: The Ebon Hold</option>
<option value="4343">4343 New Avalon</option>
<option value="4344">4344 New Avalon Fields</option>
<option value="4345">4345 New Avalon Orchard</option>
<option value="4346">4346 New Avalon Town Hall</option>
<option value="4347">4347 Havenshire</option>
<option value="4348">4348 Havenshire Farms</option>
<option value="4349">4349 Havenshire Lumber Mill</option>
<option value="4350">4350 Havenshire Stables</option>
<option value="4351">4351 Scarlet Hold</option>
<option value="4352">4352 Chapel of the Crimson Flame</option>
<option value="4353">4353 Light's Point Tower</option>
<option value="4354">4354 Light's Point</option>
<option value="4355">4355 Crypt of Remembrance</option>
<option value="4356">4356 Death's Breach</option>
<option value="4357">4357 The Noxious Glade</option>
<option value="4358">4358 Tyr's Hand</option>
<option value="4359">4359 King's Harbor</option>
<option value="4360">4360 Scarlet Overlook</option>
<option value="4361">4361 Light's Hope Chapel</option>
<option value="4362">4362 Sinner's Folly</option>
<option value="4363">4363 Pestilent Scar</option>
<option value="4364">4364 Browman Mill</option>
<option value="4365">4365 Havenshire Mine</option>
<option value="4366">4366 Ursoc's Den</option>
<option value="4367">4367 The Blight Line</option>
<option value="4368">4368 The Bonefields</option>
<option value="4369">4369 Dorian's Outpost</option>
<option value="4371">4371 Mam'toth Crater</option>
<option value="4372">4372 Zol'Maz Stronghold</option>
<option value="4373">4373 Zol'Heb</option>
<option value="4374">4374 Rageclaw Lake</option>
<option value="4375">4375 Gundrak</option>
<option value="4376">4376 The Savage Thicket</option>
<option value="4377">4377 New Avalon Forge</option>
<option value="4378">4378 Dalaran Arena</option>
<option value="4379">4379 Valgarde</option>
<option value="4380">4380 Westguard Inn</option>
<option value="4381">4381 Waygate</option>
<option value="4382">4382 The Shaper's Terrace</option>
<option value="4383">4383 Lakeside Landing</option>
<option value="4384">4384 Strand of the Ancients</option>
<option value="4385">4385 Bittertide Lake</option>
<option value="4386">4386 Rainspeaker Rapids</option>
<option value="4387">4387 Frenzyheart River</option>
<option value="4388">4388 Wintergrasp River</option>
<option value="4389">4389 The Suntouched Pillar</option>
<option value="4390">4390 Frigid Breach</option>
<option value="4391">4391 Swindlegrin's Dig</option>
<option value="4392">4392 The Stormwright's Shelf</option>
<option value="4393">4393 Death's Hand Encampment</option>
<option value="4394">4394 Scarlet Tavern</option>
<option value="4395">4395 Dalaran</option>
<option value="4396">4396 Nozzlerust Post</option>
<option value="4399">4399 Farshire Mine</option>
<option value="4400">4400 The Mosslight Pillar</option>
<option value="4401">4401 Saragosa's Landing</option>
<option value="4402">4402 Vengeance Lift</option>
<option value="4403">4403 Balejar Watch</option>
<option value="4404">4404 New Agamand Inn</option>
<option value="4405">4405 Passage of Lost Fiends</option>
<option value="4406">4406 The Ring of Valor</option>
<option value="4407">4407 Hall of the Frostwolf</option>
<option value="4408">4408 Hall of the Stormpike</option>
<option value="4411">4411 Stormwind Harbor</option>
<option value="4412">4412 The Makers' Overlook</option>
<option value="4413">4413 The Makers' Perch</option>
<option value="4414">4414 Scarlet Tower</option>
<option value="4415">4415 The Violet Hold</option>
<option value="4416">4416 Gundrak</option>
<option value="4417">4417 Onslaught Harbor</option>
<option value="4418">4418 K3</option>
<option value="4419">4419 Snowblind Hills</option>
<option value="4420">4420 Snowblind Terrace</option>
<option value="4421">4421 Garm</option>
<option value="4422">4422 Brunnhildar Village</option>
<option value="4423">4423 Sifreldar Village</option>
<option value="4424">4424 Valkyrion</option>
<option value="4425">4425 The Forlorn Mine</option>
<option value="4426">4426 Bor's Breath River</option>
<option value="4427">4427 Argent Vanguard</option>
<option value="4428">4428 Frosthold</option>
<option value="4429">4429 Grom'arsh Crash-Site</option>
<option value="4430">4430 Temple of Storms</option>
<option value="4431">4431 Engine of the Makers</option>
<option value="4432">4432 The Foot Steppes</option>
<option value="4433">4433 Dragonspine Peaks</option>
<option value="4434">4434 Nidavelir</option>
<option value="4435">4435 Narvir's Cradle</option>
<option value="4436">4436 Snowdrift Plains</option>
<option value="4437">4437 Valley of Ancient Winters</option>
<option value="4438">4438 Dun Niffelem</option>
<option value="4439">4439 Frostfield Lake</option>
<option value="4440">4440 Thunderfall</option>
<option value="4441">4441 Camp Tunka'lo</option>
<option value="4442">4442 Brann's Base-Camp</option>
<option value="4443">4443 Gate of Echoes</option>
<option value="4444">4444 Plain of Echoes</option>
<option value="4445">4445 Ulduar</option>
<option value="4446">4446 Terrace of the Makers</option>
<option value="4447">4447 Gate of Lightning</option>
<option value="4448">4448 Path of the Titans</option>
<option value="4449">4449 Uldis</option>
<option value="4450">4450 Loken's Bargain</option>
<option value="4451">4451 Bor's Fall</option>
<option value="4452">4452 Bor's Breath</option>
<option value="4453">4453 Rohemdal Pass</option>
<option value="4454">4454 The Storm Foundry</option>
<option value="4455">4455 Hibernal Cavern</option>
<option value="4456">4456 Voldrune Dwelling</option>
<option value="4457">4457 Torseg's Rest</option>
<option value="4458">4458 Sparksocket Minefield</option>
<option value="4459">4459 Ricket's Folly</option>
<option value="4460">4460 Garm's Bane</option>
<option value="4461">4461 Garm's Rise</option>
<option value="4462">4462 Crystalweb Cavern</option>
<option value="4463">4463 Temple of Life</option>
<option value="4464">4464 Temple of Order</option>
<option value="4465">4465 Temple of Winter</option>
<option value="4466">4466 Temple of Invention</option>
<option value="4467">4467 Death's Rise</option>
<option value="4468">4468 The Dead Fields</option>
<option value="4469">4469 Dargath's Demise</option>
<option value="4470">4470 The Hidden Hollow</option>
<option value="4471">4471 Bernau's Happy Fun Land</option>
<option value="4472">4472 Frostgrip's Hollow</option>
<option value="4473">4473 The Frigid Tomb</option>
<option value="4474">4474 Twin Shores</option>
<option value="4475">4475 Zim'bo's Hideout</option>
<option value="4476">4476 Abandoned Camp</option>
<option value="4477">4477 The Shadow Vault</option>
<option value="4478">4478 Coldwind Pass</option>
<option value="4479">4479 Winter's Breath Lake</option>
<option value="4480">4480 The Forgotten Overlook</option>
<option value="4481">4481 Jintha'kalar Passage</option>
<option value="4482">4482 Arriga Footbridge</option>
<option value="4483">4483 The Lost Passage</option>
<option value="4484">4484 Bouldercrag's Refuge</option>
<option value="4485">4485 The Inventor's Library</option>
<option value="4486">4486 The Frozen Mine</option>
<option value="4487">4487 Frostfloe Deep</option>
<option value="4488">4488 The Howling Hollow</option>
<option value="4489">4489 Crusader Forward Camp</option>
<option value="4490">4490 Stormcrest</option>
<option value="4491">4491 Bonesnap's Camp</option>
<option value="4492">4492 Ufrang's Hall</option>
<option value="4493">4493 The Obsidian Sanctum</option>
<option value="4494">4494 Ahn'kahet: The Old Kingdom</option>
<option value="4495">4495 Fjorn's Anvil</option>
<option value="4496">4496 Jotunheim</option>
<option value="4497">4497 Savage Ledge</option>
<option value="4498">4498 Halls of the Ancestors</option>
<option value="4499">4499 The Blighted Pool</option>
<option value="4500">4500 The Eye of Eternity</option>
<option value="4501">4501 The Argent Vanguard</option>
<option value="4502">4502 Mimir's Workshop</option>
<option value="4503">4503 Ironwall Dam</option>
<option value="4504">4504 Valley of Echoes</option>
<option value="4505">4505 The Breach</option>
<option value="4506">4506 Scourgeholme</option>
<option value="4507">4507 The Broken Front</option>
<option value="4508">4508 Mord'rethar: The Death Gate</option>
<option value="4509">4509 The Bombardment</option>
<option value="4510">4510 Aldur'thar: The Desolation Gate</option>
<option value="4511">4511 The Skybreaker</option>
<option value="4512">4512 Orgrim's Hammer</option>
<option value="4513">4513 Ymirheim</option>
<option value="4514">4514 Saronite Mines</option>
<option value="4515">4515 The Conflagration</option>
<option value="4516">4516 Ironwall Rampart</option>
<option value="4517">4517 Weeping Quarry</option>
<option value="4518">4518 Corp'rethar: The Horror Gate</option>
<option value="4519">4519 The Court of Bones</option>
<option value="4520">4520 Malykriss: The Vile Hold</option>
<option value="4521">4521 Cathedral of Darkness</option>
<option value="4522">4522 Icecrown Citadel</option>
<option value="4523">4523 Icecrown Glacier</option>
<option value="4524">4524 Valhalas</option>
<option value="4525">4525 The Underhalls</option>
<option value="4526">4526 Njorndar Village</option>
<option value="4527">4527 Balargarde Fortress</option>
<option value="4528">4528 Kul'galar Keep</option>
<option value="4529">4529 The Crimson Cathedral</option>
<option value="4530">4530 Sanctum of Reanimation</option>
<option value="4531">4531 The Fleshwerks</option>
<option value="4532">4532 Vengeance Landing Inn</option>
<option value="4533">4533 Sindragosa's Fall</option>
<option value="4534">4534 Wildervar Mine</option>
<option value="4535">4535 The Pit of the Fang</option>
<option value="4536">4536 Frosthowl Cavern</option>
<option value="4537">4537 The Valley of Lost Hope</option>
<option value="4538">4538 The Sunken Ring</option>
<option value="4539">4539 The Broken Temple</option>
<option value="4540">4540 The Valley of Fallen Heroes</option>
<option value="4541">4541 Vanguard Infirmary</option>
<option value="4542">4542 Hall of the Shaper</option>
<option value="4543">4543 Temple of Wisdom</option>
<option value="4544">4544 Death's Breach</option>
<option value="4545">4545 Abandoned Mine</option>
<option value="4546">4546 Ruins of the Scarlet Enclave</option>
<option value="4547">4547 Halls of Stone</option>
<option value="4548">4548 Halls of Lightning</option>
<option value="4549">4549 The Great Tree</option>
<option value="4550">4550 The Mirror of Twilight</option>
<option value="4551">4551 The Twilight Rivulet</option>
<option value="4552">4552 The Decrepit Flow</option>
<option value="4553">4553 Forlorn Woods</option>
<option value="4554">4554 Ruins of Shandaral</option>
<option value="4555">4555 The Azure Front</option>
<option value="4556">4556 Violet Stand</option>
<option value="4557">4557 The Unbound Thicket</option>
<option value="4558">4558 Sunreaver's Command</option>
<option value="4559">4559 Windrunner's Overlook</option>
<option value="4560">4560 The Underbelly</option>
<option value="4564">4564 Krasus' Landing</option>
<option value="4567">4567 The Violet Hold</option>
<option value="4568">4568 The Eventide</option>
<option value="4569">4569 Sewer Exit Pipe</option>
<option value="4570">4570 Circle of Wills</option>
<option value="4571">4571 Silverwing Flag Room</option>
<option value="4572">4572 Warsong Flag Room</option>
<option value="4575">4575 Wintergrasp Fortress</option>
<option value="4576">4576 Central Bridge</option>
<option value="4577">4577 Eastern Bridge</option>
<option value="4578">4578 Western Bridge</option>
<option value="4579">4579 Dubra'Jin</option>
<option value="4580">4580 Crusaders' Pinnacle</option>
<option value="4581">4581 Flamewatch Tower</option>
<option value="4582">4582 Winter's Edge Tower</option>
<option value="4583">4583 Shadowsight Tower</option>
<option value="4584">4584 The Cauldron of Flames</option>
<option value="4585">4585 Glacial Falls</option>
<option value="4586">4586 Windy Bluffs</option>
<option value="4587">4587 The Forest of Shadows</option>
<option value="4588">4588 Blackwatch</option>
<option value="4589">4589 The Chilled Quagmire</option>
<option value="4590">4590 The Steppe of Life</option>
<option value="4591">4591 Silent Vigil</option>
<option value="4592">4592 Gimorak's Den</option>
<option value="4593">4593 The Pit of Fiends</option>
<option value="4594">4594 Battlescar Spire</option>
<option value="4595">4595 Hall of Horrors</option>
<option value="4596">4596 The Circle of Suffering</option>
<option value="4597">4597 Rise of Suffering</option>
<option value="4598">4598 Krasus' Landing</option>
<option value="4599">4599 Sewer Exit Pipe</option>
<option value="4601">4601 Dalaran Island</option>
<option value="4602">4602 Force Interior</option>
<option value="4603">4603 Vault of Archavon</option>
<option value="4604">4604 Gate of the Red Sun</option>
<option value="4605">4605 Gate of the Blue Sapphire</option>
<option value="4606">4606 Gate of the Green Emerald</option>
<option value="4607">4607 Gate of the Purple Amethyst</option>
<option value="4608">4608 Gate of the Yellow Moon</option>
<option value="4609">4609 Courtyard of the Ancients</option>
<option value="4610">4610 Landing Beach</option>
<option value="4611">4611 Westspark Workshop</option>
<option value="4612">4612 Eastspark Workshop</option>
<option value="4613">4613 Dalaran City</option>
<option value="4614">4614 The Violet Citadel Spire</option>
<option value="4615">4615 Naz'anak: The Forgotten Depths</option>
<option value="4616">4616 Sunreaver's Sanctuary</option>
<option value="4617">4617 Elevator</option>
<option value="4618">4618 Antonidas Memorial</option>
<option value="4619">4619 The Violet Citadel</option>
<option value="4620">4620 Magus Commerce Exchange</option>
<option value="4621">4621 UNUSED</option>
<option value="4622">4622 First Legion Forward Camp</option>
<option value="4623">4623 Hall of the Conquered Kings</option>
<option value="4624">4624 Befouled Terrace</option>
<option value="4625">4625 The Desecrated Altar</option>
<option value="4626">4626 Shimmering Bog</option>
<option value="4627">4627 Fallen Temple of Ahn'kahet</option>
<option value="4628">4628 Halls of Binding</option>
<option value="4629">4629 Winter's Heart</option>
<option value="4630">4630 The North Sea</option>
<option value="4631">4631 The Broodmother's Nest</option>
<option value="4632">4632 Dalaran Floating Rocks</option>
<option value="4633">4633 Raptor Pens</option>
<option value="4635">4635 Drak'Tharon Keep</option>
<option value="4636">4636 The Noxious Pass</option>
<option value="4637">4637 Vargoth's Retreat</option>
<option value="4638">4638 Violet Citadel Balcony</option>
<option value="4639">4639 Band of Variance</option>
<option value="4640">4640 Band of Acceleration</option>
<option value="4641">4641 Band of Transmutation</option>
<option value="4642">4642 Band of Alignment</option>
<option value="4646">4646 Ashwood Lake</option>
<option value="4650">4650 Iron Concourse</option>
<option value="4652">4652 Formation Grounds</option>
<option value="4653">4653 Razorscale's Aerie</option>
<option value="4654">4654 The Colossal Forge</option>
<option value="4655">4655 The Scrapyard</option>
<option value="4656">4656 The Conservatory of Life</option>
<option value="4657">4657 The Archivum</option>
<option value="4658">4658 Argent Tournament Grounds</option>
<option value="4665">4665 Expedition Base Camp</option>
<option value="4666">4666 Sunreaver Pavilion</option>
<option value="4667">4667 Silver Covenant Pavilion</option>
<option value="4668">4668 The Cooper Residence</option>
<option value="4669">4669 The Ring of Champions</option>
<option value="4670">4670 The Aspirants' Ring</option>
<option value="4671">4671 The Argent Valiants' Ring</option>
<option value="4672">4672 The Alliance Valiants' Ring</option>
<option value="4673">4673 The Horde Valiants' Ring</option>
<option value="4674">4674 Argent Pavilion</option>
<option value="4676">4676 Sunreaver Pavilion</option>
<option value="4677">4677 Silver Covenant Pavilion</option>
<option value="4679">4679 The Forlorn Cavern</option>
<option value="4688">4688 claytonio test area</option>
<option value="4692">4692 Quel'Delar's Rest</option>
<option value="4710">4710 Isle of Conquest</option>
<option value="4722">4722 Trial of the Crusader</option>
<option value="4723">4723 Trial of the Champion</option>
<option value="4739">4739 Runeweaver Square</option>
<option value="4740">4740 The Silver Enclave</option>
<option value="4741">4741 Isle of Conquest No Man's Land</option>
<option value="4742">4742 Hrothgar's Landing</option>
<option value="4743">4743 Deathspeaker's Watch</option>
<option value="4747">4747 Workshop</option>
<option value="4748">4748 Quarry</option>
<option value="4749">4749 Docks</option>
<option value="4750">4750 Hangar</option>
<option value="4751">4751 Refinery</option>
<option value="4752">4752 Horde Keep</option>
<option value="4753">4753 Alliance Keep</option>
<option value="4760">4760 The Sea Reaver's Run</option>
<option value="4763">4763 Transport: Alliance Gunship</option>
<option value="4764">4764 Transport: Horde Gunship</option>
<option value="4769">4769 Hrothgar's Landing</option>
<option value="4809">4809 The Forge of Souls</option>
<option value="4812">4812 Icecrown Citadel</option>
<option value="4813">4813 Pit of Saron</option>
<option value="4820">4820 Halls of Reflection</option>
<option value="4832">4832 Transport: Alliance Gunship (IGB)</option>
<option value="4833">4833 Transport: Horde Gunship (IGB)</option>
<option value="4859">4859 The Frozen Throne</option>
<option value="4862">4862 The Frozen Halls</option>
<option value="4889">4889 The Frost Queen's Lair</option>
<option value="4890">4890 Putricide's Laboratory of Alchemical Horrors and Fun</option>
<option value="4891">4891 The Sanctum of Blood</option>
<option value="4892">4892 The Crimson Hall</option>
<option value="4893">4893 The Frost Queen's Lair</option>
<option value="4894">4894 Putricide's Laboratory of Alchemical Horrors and Fun</option>
<option value="4895">4895 The Crimson Hall</option>
<option value="4896">4896 The Frozen Throne</option>
<option value="4897">4897 The Sanctum of Blood</option>
<option value="4898">4898 Frostmourne</option>
<option value="4904">4904 The Dark Approach</option>
<option value="4905">4905 Scourgelord's Command</option>
<option value="4906">4906 The Shadow Throne</option>
<option value="4908">4908 The Hidden Passage</option>
<option value="4910">4910 Frostmourne</option>
<option value="4987">4987 The Ruby Sanctum</option>
</select>
<input type="text" class="input_box" value="<?php echo htmlspecialchars($row['zone']) ?>" name="zones" style="width: 90px;"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['logout_time']) ?>" name="logout_time"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['rest_bonus']) ?>" name="rest_bonus"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['leveltime']) ?>" name="leveltime"></td>
</tr>
<tr>
<td>deleteInfos_Account</td>
<td>deleteInfos_Name</td>
<td>deleteDate</td>
<td>totaltime</td>
<td>actionBars</td>
<td>resettalents_cost</td>
<td>resettalents_time</td>
<td>at_login</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['deleteInfos_Account']) ?>" name="deleteInfos_Account"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['deleteInfos_Name']) ?>" name="deleteInfos_Name"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['deleteDate']) ?>" name="deleteDate"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['totaltime']) ?>" name="totaltime"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['actionBars']) ?>" name="actionBars"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['resettalents_cost']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['resettalents_time']); ?>" name="resettalents_time"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['at_login']); ?>" name="at_login"></td>
</tr>
<tr>
<td>trans_x</td>
<td>trans_y</td>
<td>trans_z</td>
<td>trans_o</td>
<td>transguid</td>
<td>stable_slots</td>
<td>grantableLevels</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_x']); ?>" name="trans_x"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_y']); ?>" name="trans_y"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_z']); ?>" name="trans_z"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_o']); ?>" name="trans_o"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['transguid']); ?>" name="transguid"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['stable_slots']); ?>" name="stable_slots"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['grantableLevels']); ?>" name="grantableLevels"></td>
</tr>
</table>
<table>
<tr><td>equipmentCache</td></tr>
<tr><td><input type="text" value="<?php echo htmlspecialchars($row['equipmentCache']) ?>" name="equipmentCache" class="long_width"></td></tr>
<tr><td>exploredZones</td></tr>
<tr><td><input type="text" value="<?php echo htmlspecialchars($row['exploredZones']) ?>" name="exploredZones" class="long_width"></td></tr>
<tr><td>knownTitles</td></tr>
<tr><td><input type="text" value="<?php echo htmlspecialchars($row['knownTitles']) ?>" name="knownTitles" class="long_width"></td></tr>
<tr><td>taximask</td></tr>
<tr><td><input type="text" value="<?php echo htmlspecialchars($row['taximask']) ?>" name="taximask" class="long_width"></td></tr>
</table>
<input type="hidden" name="code">
</form>
<script type="text/javascript">
function get_value(select)
{
	selects=document.getElementById(select);
	document.getElementsByName(select+"s")[0].value=selects.options[selects.selectedIndex].value;
}

function Scripts()
{
guid='<?php echo htmlspecialchars($row['guid']);?>';
account='<?php echo htmlspecialchars($row['account']);?>';
name='<?php echo htmlspecialchars($row['name']);?>';
race='<?php echo htmlspecialchars($row['race']);?>';
classes='<?php echo htmlspecialchars($row['class']);?>';
gender='<?php echo htmlspecialchars($row['gender']);?>';
level='<?php echo htmlspecialchars($row['level']);?>';
xp='<?php echo htmlspecialchars($row['xp']);?>';
money='<?php echo htmlspecialchars($row['money']);?>';
playerBytes='<?php echo htmlspecialchars($row['playerBytes']);?>';
playerBytes2='<?php echo htmlspecialchars($row['playerBytes2']);?>';
playerFlags='<?php echo htmlspecialchars($row['playerFlags']);?>';
position_x='<?php echo htmlspecialchars($row['position_x']);?>';
position_y='<?php echo htmlspecialchars($row['position_y']);?>';
position_z='<?php echo htmlspecialchars($row['position_z']);?>';
map='<?php echo htmlspecialchars($row['map']);?>';
instance_id='<?php echo htmlspecialchars($row['instance_id']);?>';
instance_mode_mask='<?php echo htmlspecialchars($row['instance_mode_mask']);?>';
orientation='<?php echo htmlspecialchars($row['orientation']);?>';
taximask='<?php echo htmlspecialchars($row['taximask']);?>';
online='<?php echo htmlspecialchars($row['online']);?>';
cinematic='<?php echo htmlspecialchars($row['cinematic']);?>';
totaltime='<?php echo htmlspecialchars($row['totaltime']);?>';
leveltime='<?php echo htmlspecialchars($row['leveltime']);?>';
logout_time='<?php echo htmlspecialchars($row['logout_time']);?>';
is_logout_resting='<?php echo htmlspecialchars($row['is_logout_resting']);?>';
rest_bonus='<?php echo htmlspecialchars($row['rest_bonus']);?>';
resettalents_cost='<?php echo htmlspecialchars($row['resettalents_cost']);?>';
resettalents_time='<?php echo htmlspecialchars($row['resettalents_time']);?>';
trans_x='<?php echo htmlspecialchars($row['trans_x']);?>';
trans_y='<?php echo htmlspecialchars($row['trans_y']);?>';
trans_z='<?php echo htmlspecialchars($row['trans_z']);?>';
trans_o='<?php echo htmlspecialchars($row['trans_o']);?>';
transguid='<?php echo htmlspecialchars($row['transguid']);?>';
extra_flags='<?php echo htmlspecialchars($row['extra_flags']);?>';
stable_slots='<?php echo htmlspecialchars($row['stable_slots']);?>';
at_login='<?php echo htmlspecialchars($row['at_login']);?>';
zone='<?php echo htmlspecialchars($row['zone']);?>';
death_expire_time='<?php echo htmlspecialchars($row['death_expire_time']);?>';
taxi_path='<?php echo htmlspecialchars($row['taxi_path']);?>';
arenaPoints='<?php echo htmlspecialchars($row['arenaPoints']);?>';
totalHonorPoints='<?php echo htmlspecialchars($row['totalHonorPoints']);?>';
yesterdayHonorPoints='<?php echo htmlspecialchars($row['yesterdayHonorPoints']);?>';
totalKills='<?php echo htmlspecialchars($row['totalKills']);?>';
todayKills='<?php echo htmlspecialchars($row['todayKills']);?>';
yesterdayKills='<?php echo htmlspecialchars($row['yesterdayKills']);?>';
chosenTitle='<?php echo htmlspecialchars($row['chosenTitle']);?>';
knownCurrencies='<?php echo htmlspecialchars($row['knownCurrencies']);?>';
watchedFaction='<?php echo htmlspecialchars($row['watchedFaction']);?>';
drunk='<?php echo htmlspecialchars($row['drunk']);?>';
health='<?php echo htmlspecialchars($row['health']);?>';
power1='<?php echo htmlspecialchars($row['power1']);?>';
power2='<?php echo htmlspecialchars($row['power2']);?>';
power3='<?php echo htmlspecialchars($row['power3']);?>';
power4='<?php echo htmlspecialchars($row['power4']);?>';
power5='<?php echo htmlspecialchars($row['power5']);?>';
power6='<?php echo htmlspecialchars($row['power6']);?>';
power7='<?php echo htmlspecialchars($row['power7']);?>';
latency='<?php echo htmlspecialchars($row['latency']);?>';
speccount='<?php echo htmlspecialchars($row['speccount']);?>';
activespec='<?php echo htmlspecialchars($row['activespec']);?>';
exploredZones='<?php echo htmlspecialchars($row['exploredZones']);?>';
equipmentCache='<?php echo htmlspecialchars($row['equipmentCache']);?>';
ammoId='<?php echo htmlspecialchars($row['ammoId']);?>';
knownTitles='<?php echo htmlspecialchars($row['knownTitles']);?>';
actionBars='<?php echo htmlspecialchars($row['actionBars']);?>';
grantableLevels='<?php echo htmlspecialchars($row['grantableLevels']);?>';
deleteInfos_Account='<?php echo htmlspecialchars($row['deleteInfos_Account']);?>';
deleteInfos_Name='<?php echo htmlspecialchars($row['deleteInfos_Name']);?>';
deleteDate='<?php echo htmlspecialchars($row['deleteDate']);?>';

Script="UPDATE `characters` SET";
//checkbox
var check;
if (form.online.checked==false){check=0;} else { check=1; }
if (form.online.checked != online){Script+=" `online`="+check+",";}
if (form.is_logout_resting.checked==false){ check=0;}else {check=1;}
if (form.is_logout_resting.checked != is_logout_resting){Script+=" `is_logout_resting`="+check+",";}
if (form.cinematic.checked==false){ check=0;}else {check=1;}
if (form.cinematic.checked != cinematic){Script+=" `cinematic`="+check+",";}

if (form.guid.value != guid){Script+=" `guid`="+form.guid.value+",";}
if (form.account.value != account){Script+=" `account`="+form.account.value+",";}
if (form.name.value != name){Script+=" `name`='"+form.name.value+"',";}
if (form.races.value != race){Script+=" `race`="+form.races.value+",";}
if (form.classes.value != classes){Script+=" `class`="+form.classes.value+",";}
if (form.gender.value != gender){Script+=" `gender`="+form.gender.value+",";}
if (form.level.value != level){Script+=" `level`="+form.level.value+",";}
if (form.xp.value != xp){Script+=" `xp`="+form.xp.value+",";}
if (form.money.value != money){Script+=" `money`="+form.money.value+",";}
if (form.playerBytes.value != playerBytes){Script+=" `playerBytes`="+form.playerBytes.value+",";}
if (form.playerBytes2.value != playerBytes2){Script+=" `playerBytes2`="+form.playerBytes2.value+",";}
if (form.playerFlags.value != playerFlags){Script+=" `playerFlags`="+form.playerFlags.value+",";}
if (form.position_x.value != position_x){Script+=" `position_x`="+form.position_x.value+",";}
if (form.position_y.value != position_y){Script+=" `position_y`="+form.position_y.value+",";}
if (form.position_z.value != position_z){Script+=" `position_z`="+form.position_z.value+",";}
if (form.maps.value != map){Script+=" `map`="+form.maps.value+",";}
if (form.instance_id.value != instance_id){Script+=" `instance_id`="+form.instance_id.value+",";}
if (form.instance_mode_mask.value != instance_mode_mask){Script+=" `instance_mode_mask`="+form.instance_mode_mask.value+",";}
if (form.orientation.value != orientation){Script+=" `orientation`="+form.orientation.value+",";}
if (form.taximask.value != taximask){Script+=" `taximask`="+form.taximask.value+",";}
if (form.totaltime.value != totaltime){Script+=" `totaltime`="+form.totaltime.value+",";}
if (form.leveltime.value != leveltime){Script+=" `leveltime`="+form.leveltime.value+",";}
if (form.logout_time.value != logout_time){Script+=" `logout_time`="+form.logout_time.value+",";}
if (form.rest_bonus.value != rest_bonus){Script+=" `rest_bonus`="+form.rest_bonus.value+",";}
if (form.resettalents_cost.value != resettalents_cost){Script+=" `resettalents_cost`="+form.resettalents_cost.value+",";}
if (form.resettalents_time.value != resettalents_time){Script+=" `resettalents_time`="+form.resettalents_time.value+",";}
if (form.trans_x.value != trans_x){Script+=" `trans_x`="+form.trans_x.value+",";}
if (form.trans_y.value != trans_y){Script+=" `trans_y`="+form.trans_y.value+",";}
if (form.trans_z.value != trans_z){Script+=" `trans_z`="+form.trans_z.value+",";}
if (form.trans_o.value != trans_o){Script+=" `trans_o`="+form.trans_o.value+",";}
if (form.transguid.value != transguid){Script+=" `transguid`="+form.transguid.value+",";}
if (form.extra_flags.value != extra_flags){Script+=" `extra_flags`="+form.extra_flags.value+",";}
if (form.stable_slots.value != stable_slots){Script+=" `stable_slots`="+form.stable_slots.value+",";}
if (form.at_login.value != at_login){Script+=" `at_login`="+form.at_login.value+",";}
if (form.zones.value != zone){Script+=" `zone`="+form.zones.value+",";}
if (form.death_expire_time.value != death_expire_time){Script+=" `death_expire_time`="+form.death_expire_time.value+",";}
if (form.taxi_path.value != taxi_path){Script+=" `taxi_path`="+form.taxi_path.value+",";}
if (form.arenaPoints.value != arenaPoints){Script+=" `arenaPoints`="+form.arenaPoints.value+",";}
if (form.totalHonorPoints.value != totalHonorPoints){Script+=" `totalHonorPoints`="+form.totalHonorPoints.value+",";}
if (form.yesterdayHonorPoints.value != yesterdayHonorPoints){Script+=" `yesterdayHonorPoints`="+form.yesterdayHonorPoints.value+",";}
if (form.totalKills.value != totalKills){Script+=" `totalKills`="+form.totalKills.value+",";}
if (form.todayKills.value != todayKills){Script+=" `todayKills`="+form.todayKills.value+",";}
if (form.yesterdayKills.value != yesterdayKills){Script+=" `yesterdayKills`="+form.yesterdayKills.value+",";}
if (form.chosenTitle.value != chosenTitle){Script+=" `chosenTitle`="+form.chosenTitle.value+",";}
if (form.knownCurrencies.value != knownCurrencies){Script+=" `knownCurrencies`="+form.knownCurrencies.value+",";}
if (form.watchedFaction.value != watchedFaction){Script+=" `watchedFaction`="+form.watchedFaction.value+",";}
if (form.drunk.value != drunk){Script+=" `drunk`="+form.drunk.value+",";}
if (form.health.value != health){Script+=" `health`="+form.health.value+",";}
if (form.power1.value != power1){Script+=" `power1`="+form.power1.value+",";}
if (form.power2.value != power2){Script+=" `power2`="+form.power2.value+",";}
if (form.power3.value != power3){Script+=" `power3`="+form.power3.value+",";}
if (form.power4.value != power4){Script+=" `power4`="+form.power4.value+",";}
if (form.power5.value != power5){Script+=" `power5`="+form.power5.value+",";}
if (form.power6.value != power6){Script+=" `power6`="+form.power6.value+",";}
if (form.power7.value != power7){Script+=" `power7`="+form.power7.value+",";}
if (form.latency.value != latency){Script+=" `latency`="+form.latency.value+",";}
if (form.speccount.value != speccount){Script+=" `speccount`="+form.speccount.value+",";}
if (form.activespec.value != activespec){Script+=" `activespec`="+form.activespec.value+",";}
if (form.exploredZones.value != exploredZones){Script+=" `exploredZones`="+form.exploredZones.value+",";}
if (form.equipmentCache.value != equipmentCache){Script+=" `equipmentCache`="+form.equipmentCache.value+",";}
if (form.ammoId.value != ammoId){Script+=" `ammoId`="+form.ammoId.value+",";}
if (form.knownTitles.value != knownTitles){Script+=" `knownTitles`="+form.knownTitles.value+",";}
if (form.actionBars.value != actionBars){Script+=" `actionBars`="+form.actionBars.value+",";}
if (form.grantableLevels.value != grantableLevels){Script+=" `grantableLevels`="+form.grantableLevels.value+",";}
if (form.deleteInfos_Account.value != deleteInfos_Account){Script+=" `deleteInfos_Account`="+form.deleteInfos_Account.value+",";}
if (form.deleteInfos_Name.value != deleteInfos_Name){Script+=" `deleteInfos_Name`="+form.deleteInfos_Name.value+",";}
if (form.deleteDate.value != deleteDate){Script+=" `deleteDate`="+form.deleteDate.value+",";}
Where=" WHERE `guid`="+guid;
Script=Script.substr(0, Script.length-1);
Script+=Where;
if (isNaN(form.guid.value) ==true){Script=""; Where="";}

form.code.value=Script;

location.href='Script.php?code='+Script+";";
}
</script>
<p align="right"><input type="submit" value="Show Character Script" OnClick='Scripts()'></p>
<?php
}
?>