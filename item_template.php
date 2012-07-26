<?php
include "db-config";
include "menu.php"; 
include "item_menu.php";
$entry=$_GET['entry'];
if ($entry == "")
{
	$query=mysql_query("SELECT * FROM item_template WHERE entry=17");
}
else
{
	$query=mysql_query("SELECT * FROM item_template WHERE entry=$entry");
}
while ($row=mysql_fetch_array($query))
{
if ($entry == "")
{
	$entry="";
	$row="";
}
?>
<style type="text/css">
td,input {
    font-size:80%;
}
</style>
<?php
if(eregi("chrome", $_SERVER['HTTP_USER_AGENT']))
{
?>
<script type="text/javascript" src="spells2.js"></script>
<?php
 }
 else
 {
 ?>
 <script type="text/javascript" src="spells.js"></script>
 <?php
 }
 ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" name="form" id="form">
<table>
<tr>
<td>entry</td>
<td>class</td>
<td>subclass</td>
<td>name</td>
<td>description</td>
<td>StatsCount</td>
</tr>
<tr>
<td><input type="text" value="<?php echo $entry; ?>" class="input_box" name="entry" title="This is the unique ID of an item."/><input type="submit" value="" OnClick="location.href='item_template.php?entry=<?php echo $entry ?>'" class="little"/></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['class']); ?>" class="input_box" name="class" title="Defines the class of an item"/>
<select class="little" id="class" OnChange="get_value(this.id);">
<option value="0">0 Consumable</option>
<option value="1">1 Container</option>
<option value="2">2 Weapon</option>
<option value="3">3 Gem</option>
<option value="4">4 Armor</option>
<option value="5">5 Reagent</option>
<option value="6">6 Projectile</option>
<option value="7">7 Trade Goods</option>
<option value="8">8 Generic(OBSOLETE)</option>
<option value="9">9 Recipe</option>
<option value="10">10 Money</option>
<option value="11">11 Quiver</option>
<option value="12">12 Quest</option>
<option value="13">13 Key</option>
<option value="14">14 Permanent(OBSOLETE)</option>
<option value="15">15 Miscellaneous</option>
<option value="16">16 Glyph</option>
</select>
</td>
<td><input type="text" value="<?php echo htmlspecialchars($row['subclass']); ?>" class="input_box" name="subclass" title="Defines the subclass of an item."/></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['name']); ?>" style="width: 305px;" name="name" title="The name of an item."/></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['description']); ?>" style="width: 305px;" name="description" title="Brief description of this item, appears in orange at the botton of an item label ingame."/></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['StatsCount']); ?>" class="input_box" name="StatsCount" title="Number of slots that this bag holds."/></td>
</tr>
</table>
<table>
<tr>
<td>displayId</td>
<td>Quality</td>
<td>Flags</td>
<td>FlagsExtra</td>
<td>BuyCount</td>
<td>BuyPrice</td>
<td>SellPrice</td>
<td>InventoryType</td>
<td>maxcount</td>
<td>stackable</td>
<td>ContainerSlots</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['displayid']); ?>" class="input_box" name="displayid"/></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['Quality']); ?>" class="input_box" name="quality" title="The overall quality of an item."/>
<select class="little" id="quality" OnChange="get_value(this.id);">
<option value="0">0 Grey Poor</option>
<option value="1">1 White Common</option>
<option value="2">2 Green Uncommon</option>
<option value="3">3 Blue Rare</option>
<option value="4">4 Purple Epic</option>
<option value="5">5 Orange Legendary</option>
<option value="6">6 LightYellow Artifact</option>
<option value="7">7 Heirloom</option>
</select>
</td>
<td><input type="text" value="<?php echo htmlspecialchars($row['Flags']); ?>" class="input_box" name="Flags" title=""/>
<select class="little" id="Flags" OnChange="get_value_flag(this.id)">
<option value="-1" selected="selected" disabled="disabled" class="bold">Flags</option>
<option value="1">BINDED</option>
<option value="2">CONJURED</option>
<option value="4">OPENABLE</option>
<option value="8">HEROIC</option>
<option value="16">DEPRECATED</option>
<option value="32">INDESTRUCTIBLE</option>
<option value="64">UNK2</option>
<option value="128">NO_EQUIP_COOLDOWN</option>
<option value="256">UNK3</option>
<option value="512">WRAPPER</option>
<option value="1024">UNK4</option>
<option value="2048">PARTY_LOOT</option>
<option value="4096">REFUNDABLE</option>
<option value="8192">CHARTER</option>
<option value="16384">UNK5</option>
<option value="32768">UNK6</option>
<option value="65536">UNK7</option>
<option value="131072">UNK8</option>
<option value="262144">PROSPECTABLE</option>
<option value="524288">UNIQUE_EQUIPPED</option>
<option value="1048576">UNK9</option>
<option value="2097152">USEABLE_IN_ARENA</option>
<option value="4194304">THROWABLE</option>
<option value="8388608">USABLE_WHEN_SHAPESHIFTED</option>
<option value="16777216">UNK10</option>
<option value="33554432">SMART_LOOT</option>
<option value="67108864">NOT_USEABLE_IN_ARENA</option>
<option value="134217728">BIND_TO_ACCOUNT</option>
<option value="268435456">TRIGGERED_CAST</option>
<option value="536870912">MILLABLE</option>
<option value="1073741824">UNK11</option>
<option value="2147483648">UNK12</option>
</select>
</td>
<td><input type="text"  name="FlagsExtra" value="<?php echo htmlspecialchars($row['FlagsExtra']); ?>" class="input_box" title="Faction: 0 == Either team; 1 == Horde; 2 == Alliance;"/></td>
<td><input type="text"  name="BuyCount" value="<?php echo htmlspecialchars($row['BuyCount']); ?>" class="input_box" title="Size of the stack in which the item is sold by vendors."/></td>
<td><input type="text"  name="BuyPrice" value="<?php echo htmlspecialchars($row['BuyPrice']); ?>" class="input_box" title="Price (in copper) of a stack of #BuyCount items."/></td>
<td><input type="text"  name="SellPrice" value="<?php echo htmlspecialchars($row['SellPrice']); ?>" class="input_box" title="How much a vendor will buy this item for from the players. If omitted the item will sell for nothing (no sell price)."/></td>
<td><input type="text"  name="InventoryType" value="<?php echo htmlspecialchars($row['InventoryType']); ?>" class="input_box" title="Where an item can be equipped."/>
<select class="little" id="InventoryType" OnChange="get_value(this.id);">
<option value="0">0 Non Equip</option>
<option value="1">1 Head</option>
<option value="2">2 Neck</option>
<option value="3">3 Shoulder</option>
<option value="4">4 Body</option>
<option value="5">5 Chest</option>
<option value="6">6 Waist (Belt)</option>
<option value="7">7 Legs (Pants)</option>
<option value="8">8 Feet (Boots)</option>
<option value="9">9 Wrists (Bracers)</option>
<option value="10">10 Hands (Gloves)</option>
<option value="11">11 Finger (Ring)</option>
<option value="12">12 Trinket</option>
<option value="13">13 WEAPON One Hand</option>
<option value="14">14 WEAPON Off Hand/SHIELD</option>
<option value="15">15 Ranged (Bows)</option>
<option value="16">16 Cloak (Back)</option>
<option value="17">17 2HWEAPON Two Hand</option>
<option value="18">18 Bag (incl. Quivers)</option>
<option value="19">19 Tabard</option>
<option value="20">20 Robe</option>
<option value="21">21 Main Hand</option>
<option value="22">22 Off Hand (Misc Items)</option>
<option value="23">23 Holdable (Tome)</option>
<option value="24">24 Ammunition</option>
<option value="25">25 Thrown</option>
<option value="26">26 Ranged Right (Gun)</option>
<option value="27">27 Quiver</option>
<option value="28">28 Relic</option>
</select>
</td>
<td><input type="text"  name="maxcount" value="<?php echo htmlspecialchars($row['maxcount']); ?>" class="input_box" title="Maximum number of this item that the player can have. "/></td>
<td><input type="text"  name="stackable" value="<?php echo htmlspecialchars($row['stackable']); ?>" class="input_box" title="The amount of this item that a player can carry in the same slot."/></td>
<td><input type="text"  name="ContainerSlots" value="<?php echo htmlspecialchars($row['ContainerSlots']); ?>" class="input_box" title="Number of slots that this bag holds."/></td>
</tr>
</table>
<hr style="color:transparent; border-color:transparent;" />
<table>
<tr>
<td>requirements</td>
<td></td>
<td></td>
<td style="width:25px;"></td>
<td>weapons</td>
<td></td>
<td style="width:25px;"></td>
<td>resistance</td>
<td></td>
<td style="width:25px;"></td>
<td>socket</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr></tr>
<tr></tr>
<tr>
<td>AllowableClass</td>
<td>AllowableRace</td>
<td>RequiredReputationFaction</td>
<td></td>
<td>itemset</td>
<td>bonding</td>
<td style="width:25px;"></td>
<td>holy_res</td>
<td>frost_res</td>
<td></td>
<td>socketColor</td>
<td>socketContent</td>
</tr>
<tr>
<td><input type="text" name="AllowableClass" class="input_box" value="<?php echo htmlspecialchars($row['AllowableClass']); ?>" title="Mask for character classes that can use this item. Use -1 if usable by all classes."/>
<select class="little" id="AllowableClass" OnChange="get_value_flag(this.id);">
<option value="-1" class="bold" disabled="disabled">Classes</option>
<option value="1">WARRIOR</option>
<option value="2">PALADIN</option>
<option value="4">HUNTER</option>
<option value="8">ROGUE</option>
<option value="16">PRIEST</option>
<option value="32">DEATH_KNIGHT </option>
<option value="64">SHAMAN</option>
<option value="128">MAGE</option>
<option value="256">WARLOCK</option>
<option value="512">UNK</option>
<option value="1024">DRUID</option>
</select>
</td>
<td><input type="text" name="AllowableRace" class="input_box" value="<?php echo htmlspecialchars($row['AllowableRace']); ?>" title="Mask for races which can use this item. Use -1 if usable by all races."/>
<select class="little" id="AllowableRace" OnChange="get_value_flag(this.id);">
<option value="-1" class="bold" disabled="disabled">Races</option>
<option value="1">HUMAN</option>
<option value="2">ORC</option>
<option value="4">DWARF</option>
<option value="8">NIGHTELF</option>
<option value="16">UNDEAD_PLAYER</option>
<option value="32">TAUREN</option>
<option value="64">GNOME</option>
<option value="128">TROLL</option>
<option value="256">GOBLIN (NOT USED)</option>
<option value="512">BLOODELF</option>
<option value="1024">DRAENEI</option>
<option value="2048">FEL_ORC (NOT USED)</option>
<option value="4096">NAGA (NOT USED)</option>
<option value="8192">BROKEN (NOT USED)</option>
<option value="16384">SKELETON (NOT USED)</option>
<option value="32768">VRYKUL (NOT USED)</option>
<option value="65536">TUSKARR (NOT USED)</option>
<option value="131072">FOREST_TROLL (NOT USED)</option>
<option value="262144">TAUNKA (NOT USED)</option>
<option value="524288">NORTHREND_SKELETON (NOT USED)</option>
<option value="1048576">ICE_TROLL (NOT USED)</option>
</select>
</td>
<td><input type="text" name="RequiredReputationFaction" class="input_box" value="<?php echo htmlspecialchars($row['RequiredReputationFaction']); ?>" title="Faction id (from Faction.dbc) for which a minimum rank is required to equip/use the item."/>
<select class="little" id="RequiredReputationFaction" OnChange="get_value(this.id);">
<option value="1">1 PLAYER, Human</option>
<option value="2">2 PLAYER, Orc</option>
<option value="3">3 PLAYER, Dwarf</option>
<option value="4">4 PLAYER, Night Elf</option>
<option value="5">5 PLAYER, Undead</option>
<option value="6">6 PLAYER, Tauren </option>
<option value="7">7 Creature</option>
<option value="8">8 PLAYER, Gnome</option>
<option value="9">9 PLAYER, Troll</option>
<option value="14">14 Monster</option>
<option value="15">15 Defias Brotherhood</option>
<option value="16">16 Gnoll - Riverpaw</option>
<option value="17">17 Gnoll - Redridge</option>
<option value="18">18 Gnoll - Shadowhide</option>
<option value="19">19 Murloc</option>
<option value="20">20 Undead, Scourge</option>
<option value="21">21 Booty Bay</option>
<option value="22">22 Beast - Spider</option>
<option value="23">23 Beast - Boar</option>
<option value="24">24 Worgen</option>
<option value="25">25 Kobold</option>
<option value="26">26 Troll, Bloodscalp</option>
<option value="27">27 Troll, Skullsplitter</option>
<option value="28">28 Prey</option>
<option value="29">29 Beast - Wolf</option>
<option value="30">30 Defias Brotherhood Traitor</option>
<option value="31">31 Friendly</option>
<option value="32">32 Trogg</option>
<option value="33">33 Troll, Frostmane</option>
<option value="34">34 Orc, Blackrock</option>
<option value="35">35 Villian</option>
<option value="36">36 Victim</option>
<option value="37">37 Beast - Bear</option>
<option value="38">38 Ogre</option>
<option value="39">39 Kurzen's Mercenaries</option>
<option value="40">40 Escortee</option>
<option value="41">41 Venture Company</option>
<option value="42">42 Beast - Raptor</option>
<option value="43">43 Basilisk</option>
<option value="44">44 Dragonflight, Green</option>
<option value="45">45 Lost Ones</option>
<option value="46">46  Blacksmithing - Armorsmithing</option>
<option value="47">47 Ironforge</option>
<option value="48">48 Dark Iron Dwarves</option>
<option value="49">49 Human, Night Watch</option>
<option value="50">50 Dragonflight, Red</option>
<option value="51">51 Gnoll - Mosshide</option>
<option value="52">52 Orc, Dragonmaw</option>
<option value="53">53 Gnome - Leper</option>
<option value="54">54 Gnomeregan Exiles</option>
<option value="55">55 Leopard</option>
<option value="56">56 Scarlet Crusade</option>
<option value="57">57 Gnoll - Rothide</option>
<option value="58">58 Beast - Gorilla</option>
<option value="59">59 Thorium Brotherhood</option>
<option value="60">60 Naga</option>
<option value="61">61 Dalaran</option>
<option value="62">62 Forlorn Spirit</option>
<option value="63">63 Darkhowl</option>
<option value="64">64 Grell</option>
<option value="65">65 Furbolg</option>
<option value="66">66 Horde Generic</option>
<option value="67">67 Horde</option>
<option value="68">68 Undercity</option>
<option value="69">69 Darnassus</option>
<option value="70">70 Syndicate</option>
<option value="71">71 Hillsbrad Militia</option>
<option value="72">72 Stormwind</option>
<option value="73">73 Demon</option>
<option value="74">74 Elemental</option>
<option value="75">75 Spirit</option>
<option value="76">76 Orgrimmar</option>
<option value="77">77 Treasure</option>
<option value="78">78 Gnoll - Mudsnout</option>
<option value="79">79 HIllsbrad, Southshore Mayor</option>
<option value="80">80 Dragonflight, Black</option>
<option value="81">81 Thunder Bluff</option>
<option value="82">82 Troll, Witherbark</option>
<option value="83">83  Leatherworking - Elemental</option>
<option value="84">84 Quilboar, Razormane</option>
<option value="85">85 Quilboar, Bristleback</option>
<option value="86">86  Leatherworking - Dragonscale</option>
<option value="87">87 Bloodsail Buccaneers</option>
<option value="88">88 Blackfathom</option>
<option value="89">89 Makrura</option>
<option value="90">90 Centaur, Kolkar</option>
<option value="91">91 Centaur, Galak</option>
<option value="92">92 Gelkis Clan Centaur</option>
<option value="93">93 Magram Clan Centaur</option>
<option value="94">94 Maraudine</option>
<option value="108">108 Theramore</option>
<option value="109">109 Quilboar, Razorfen</option>
<option value="110">110 Quilboar, Razormane 2</option>
<option value="111">111 Quilboar, Deathshead</option>
<option value="128">128 Enemy</option>
<option value="148">148 Ambient</option>
<option value="168">168 Nethergarde Caravan</option>
<option value="169">169 Steamwheedle Cartel</option>
<option value="189">189 Alliance Generic</option>
<option value="209">209 Nethergarde</option>
<option value="229">229 Wailing Caverns</option>
<option value="249">249 Silithid</option>
<option value="269">269 Silvermoon Remnant</option>
<option value="270">270 Zandalar Tribe</option>
<option value="289">289  Blacksmithing - Weaponsmithing</option>
<option value="309">309 Scorpid</option>
<option value="310">310 Beast - Bat</option>
<option value="311">311 Titan</option>
<option value="329">329 Taskmaster Fizzule</option>
<option value="349">349 Ravenholdt</option>
<option value="369">369 Gadgetzan</option>
<option value="389">389 Gnomeregan Bug</option>
<option value="409">409 Harpy</option>
<option value="429">429 Burning Blade</option>
<option value="449">449 Shadowsilk Poacher</option>
<option value="450">450 Searing Spider</option>
<option value="469">469 Alliance</option>
<option value="470">470 Ratchet</option>
<option value="471">471 Wildhammer Clan</option>
<option value="489">489 Goblin, Dark Iron Bar Patron</option>
<option value="509">509 The League of Arathor</option>
<option value="510">510 The Defilers</option>
<option value="511">511 Giant</option>
<option value="529">529 Argent Dawn</option>
<option value="530">530 Darkspear Trolls</option>
<option value="531">531 Dragonflight, Bronze</option>
<option value="532">532 Dragonflight, Blue</option>
<option value="549">549  Leatherworking - Tribal</option>
<option value="550">550  Engineering - Goblin</option>
<option value="551">551  Engineering - Gnome</option>
<option value="569">569  Blacksmithing - Hammersmithing</option>
<option value="570">570  Blacksmithing - Axesmithing</option>
<option value="571">571  Blacksmithing - Swordsmithing</option>
<option value="572">572 Troll, Vilebranch</option>
<option value="573">573 Southsea Freebooters</option>
<option value="574">574 Caer Darrow</option>
<option value="575">575 Furbolg, Uncorrupted</option>
<option value="576">576 Timbermaw Hold</option>
<option value="577">577 Everlook</option>
<option value="589">589 Wintersaber Trainers</option>
<option value="609">609 Cenarion Circle</option>
<option value="629">629 Shatterspear Trolls</option>
<option value="630">630 Ravasaur Trainers</option>
<option value="649">649 Majordomo Executus</option>
<option value="669">669 Beast - Carrion Bird</option>
<option value="670">670 Beast - Cat</option>
<option value="671">671 Beast - Crab</option>
<option value="672">672 Beast - Crocilisk</option>
<option value="673">673 Beast - Hyena</option>
<option value="674">674 Beast - Owl</option>
<option value="675">675 Beast - Scorpid</option>
<option value="676">676 Beast - Tallstrider</option>
<option value="677">677 Beast - Turtle</option>
<option value="678">678 Beast - Wind Serpent</option>
<option value="679">679 Training Dummy</option>
<option value="689">689 Dragonflight, Black - Bait</option>
<option value="709">709 Battleground Neutral</option>
<option value="729">729 Frostwolf Clan</option>
<option value="730">730 Stormpike Guard</option>
<option value="749">749 Hydraxian Waterlords</option>
<option value="750">750 Sulfuron Firelords</option>
<option value="769">769 Gizlock's Dummy</option>
<option value="770">770 Gizlock's Charm</option>
<option value="771">771 Gizlock</option>
<option value="789">789 Moro'gai</option>
<option value="790">790 Spirit Guide - Alliance</option>
<option value="809">809 Shen'dralar</option>
<option value="829">829 Ogre (Captain Kromcrush)</option>
<option value="849">849 Spirit Guide - Horde</option>
<option value="869">869 Jaedenar</option>
<option value="889">889 Warsong Outriders</option>
<option value="890">890 Silverwing Sentinels</option>
<option value="891">891 Alliance Forces</option>
<option value="892">892 Horde Forces</option>
<option value="893">893 Revantusk Trolls</option>
<option value="909">909 Darkmoon Faire</option>
<option value="910">910 Brood of Nozdormu</option>
<option value="911">911 Silvermoon City</option>
<option value="912">912 Might of Kalimdor</option>
<option value="914">914 PLAYER, Blood Elf</option>
<option value="915">915 Armies of C'Thun</option>
<option value="916">916 Silithid Attackers</option>
<option value="917">917 The Ironforge Brigade</option>
<option value="918">918 RC Enemies</option>
<option value="919">919 RC Objects</option>
<option value="920">920 Red</option>
<option value="921">921 Blue</option>
<option value="922">922 Tranquillien</option>
<option value="923">923 Farstriders</option>
<option value="924">924 DEPRECATED</option>
<option value="925">925 Sunstriders</option>
<option value="926">926 Magister's Guild</option>
<option value="927">927 PLAYER, Draenei</option>
<option value="928">928 Scourge Invaders</option>
<option value="929">929 Bloodmaul Clan</option>
<option value="930">930 Exodar</option>
<option value="931">931 Test Faction (not a real faction)</option>
<option value="932">932 The Aldor</option>
<option value="933">933 The Consortium</option>
<option value="934">934 The Scryers</option>
<option value="935">935 The Sha'tar</option>
<option value="936">936 Shattrath City</option>
<option value="937">937 Troll, Forest</option>
<option value="938">938 The Omenai</option>
<option value="939">939 DEPRECATED</option>
<option value="940">940 The Sons of Lothar</option>
<option value="941">941 The Mag'har</option>
<option value="942">942 Cenarion Expedition</option>
<option value="943">943 Fel Orc</option>
<option value="944">944 Fel Orc Ghost</option>
<option value="945">945 Sons of Lothar Ghosts</option>
<option value="946">946 Honor Hold</option>
<option value="947">947 Thrallmar</option>
<option value="948">948 Test Faction 2</option>
<option value="949">949 Test Faction 1</option>
<option value="950">950 ToWoW - Flag</option>
<option value="951">951 ToWoW - Flag Trigger Alliance (DND)</option>
<option value="952">952 Test Faction 3</option>
<option value="953">953 Test Faction 4</option>
<option value="954">954 ToWoW - Flag Trigger Horde (DND)</option>
<option value="955">955 Broken</option>
<option value="956">956 Ethereum</option>
<option value="957">957 Earth Elemental</option>
<option value="958">958 Fighting Robots</option>
<option value="959">959 Actor Good</option>
<option value="960">960 Actor Evil</option>
<option value="961">961 Stillpine Furbolg</option>
<option value="962">962 Crazed Owlkin</option>
<option value="963">963 Chess Alliance</option>
<option value="964">964 Chess Horde</option>
<option value="965">965 Monster Spar</option>
<option value="966">966 Monster Spar Buddy</option>
<option value="967">967 The Violet Eye</option>
<option value="968">968 Sunhawks</option>
<option value="969">969 Hand of Argus</option>
<option value="970">970 Sporeggar</option>
<option value="971">971 Fungal Giant</option>
<option value="972">972 Spore Bat</option>
<option value="973">973 Monster, Predator</option>
<option value="974">974 Monster, Prey</option>
<option value="975">975 Void Anomaly</option>
<option value="976">976 Hyjal Defenders</option>
<option value="977">977 Hyjal Invaders</option>
<option value="978">978 Kurenai</option>
<option value="979">979 Earthen Ring</option>
<option value="980">980 The Burning Crusade</option>
<option value="981">981 Arakkoa</option>
<option value="982">982 Zangarmarsh Banner (Alliance)</option>
<option value="983">983 Zangarmarsh Banner (Horde)</option>
<option value="984">984 Zangarmarsh Banner (Neutral)</option>
<option value="985">985 Caverns of Time - Thrall</option>
<option value="986">986 Caverns of Time - Durnholde</option>
<option value="987">987 Caverns of Time - Southshore Guards</option>
<option value="988">988 Shadow Council Covert</option>
<option value="989">989 Keepers of Time</option>
<option value="990">990 The Scale of the Sands</option>
<option value="991">991 Dark Portal Defender, Alliance</option>
<option value="992">992 Dark Portal Defender, Horde</option>
<option value="993">993 Dark Portal Attacker, Legion</option>
<option value="994">994 Inciter Trigger</option>
<option value="995">995 Inciter Trigger 2</option>
<option value="996">996 Inciter Trigger 3</option>
<option value="997">997 Inciter Trigger 4</option>
<option value="998">998 Inciter Trigger 5</option>
<option value="999">999 Mana Creature</option>
<option value="1000">1000 Khadgar's Servant</option>
<option value="1001">1001 Bladespire Clan</option>
<option value="1002">1002 Ethereum Sparbuddy</option>
<option value="1003">1003 Protectorate</option>
<option value="1004">1004 Arcane Annihilator (DNR)</option>
<option value="1005">1005 Friendly, Hidden</option>
<option value="1006">1006 Kirin'Var - Dathric</option>
<option value="1007">1007 Kirin'Var - Belmara</option>
<option value="1008">1008 Kirin'Var - Luminrath</option>
<option value="1009">1009 Kirin'Var - Cohlien</option>
<option value="1010">1010 Servant of Illidan</option>
<option value="1011">1011 Lower City</option>
<option value="1012">1012 Ashtongue Deathsworn</option>
<option value="1013">1013 Spirits of Shadowmoon 1</option>
<option value="1014">1014 Spirits of Shadowmoon 2</option>
<option value="1015">1015 Netherwing</option>
<option value="1016">1016 Wyrmcult</option>
<option value="1017">1017 Treant</option>
<option value="1018">1018 Leotheras Demon I</option>
<option value="1019">1019 Leotheras Demon II</option>
<option value="1020">1020 Leotheras Demon III</option>
<option value="1021">1021 Leotheras Demon IV</option>
<option value="1022">1022 Leotheras Demon V</option>
<option value="1023">1023 Azaloth</option>
<option value="1024">1024 Rock Flayer</option>
<option value="1025">1025 Flayer Hunter</option>
<option value="1026">1026 Shadowmoon Shade</option>
<option value="1027">1027 Legion Communicator</option>
<option value="1028">1028 Ravenswood Ancients</option>
<option value="1029">1029 Chess, Friendly to All Chess</option>
<option value="1030">1030 Black Temple Gates - Illidari</option>
<option value="1031">1031 Sha'tari Skyguard</option>
<option value="1032">1032 Area 52</option>
<option value="1033">1033 Maiev</option>
<option value="1034">1034 Skettis Shadowy Arakkoa</option>
<option value="1035">1035 Skettis Arakkoa</option>
<option value="1036">1036 Dragonmaw Enemy</option>
<option value="1037">1037 Alliance Vanguard</option>
<option value="1038">1038 Ogri'la</option>
<option value="1039">1039 Ravager</option>
<option value="1040">1040 REUSE</option>
<option value="1041">1041 Frenzy</option>
<option value="1042">1042 Skyguard Enemy</option>
<option value="1043">1043 Skunk, Petunia</option>
<option value="1044">1044 Theramore Deserter</option>
<option value="1045">1045 Vrykul</option>
<option value="1046">1046 Northsea Pirates</option>
<option value="1047">1047 Tuskarr</option>
<option value="1048">1048 UNUSED</option>
<option value="1049">1049 Troll, Amani</option>
<option value="1050">1050 Valiance Expedition</option>
<option value="1051">1051 UNUSED</option>
<option value="1052">1052 Horde Expedition</option>
<option value="1053">1053 Westguard</option>
<option value="1054">1054 Spotted Gryphon</option>
<option value="1055">1055 Tamed Plaguehound</option>
<option value="1056">1056 Vrykul (Ancient Spirit 1)</option>
<option value="1057">1057 Vrykul (Ancient Siprit 2)</option>
<option value="1058">1058 Vrykul (Ancient Siprit 3)</option>
<option value="1059">1059 CTF - Flag - Alliance</option>
<option value="1060">1060 Test</option>
<option value="1061">1061 vrykul</option>
<option value="1062">1062 Vrykul Gladiator</option>
<option value="1063">1063 Valgarde Combatant</option>
<option value="1064">1064 The Taunka</option>
<option value="1065">1065 Monster, Zone Force Reaction 1</option>
<option value="1066">1066 Monster, Zone Force Reaction 2</option>
<option value="1067">1067 The Hand of Vengeance</option>
<option value="1068">1068 Explorers' League</option>
<option value="1069">1069 Ram Racing Powerup DND</option>
<option value="1070">1070 Ram Racing Trap DND</option>
<option value="1071">1071 Craig's Squirrels</option>
<option value="1072">1072 REUSE</option>
<option value="1073">1073 The Kalu'ak</option>
<option value="1074">1074 Holiday - Water Barrel</option>
<option value="1075">1075 Holiday - Generic</option>
<option value="1076">1076 Iron Dwarves</option>
<option value="1077">1077 Shattered Sun Offensive</option>
<option value="1078">1078 Fighting Vanity Pet</option>
<option value="1079">1079 Murloc, Winterfin</option>
<option value="1080">1080 Friendly, Force Reaction</option>
<option value="1081">1081 Object, Force Reaction</option>
<option value="1082">1082 REUSE</option>
<option value="1083">1083 REUSE</option>
<option value="1084">1084 Vrykul, Sea</option>
<option value="1085">1085 Warsong Offensive</option>
<option value="1086">1086 Poacher</option>
<option value="1087">1087 Holiday Monster</option>
<option value="1088">1088 Furbolg, Redfang</option>
<option value="1089">1089 Furbolg, Frostpaw</option>
<option value="1090">1090 Kirin Tor</option>
<option value="1091">1091 The Wyrmrest Accord</option>
<option value="1092">1092 Azjol-Nerub</option>
<option value="1093">1093 REUSE</option>
<option value="1094">1094 The Silver Covenant</option>
<option value="1095">1095 Grizzly Hills Trapper</option>
<option value="1096">1096 REUSE</option>
<option value="1097">1097 Wrath of the Lich King</option>
<option value="1098">1098 Knights of the Ebon Blade</option>
<option value="1099">1099 Wrathgate Scourge</option>
<option value="1100">1100 Wrathgate Alliance</option>
<option value="1101">1101 Wrathgate Horde</option>
<option value="1102">1102 CTF - Flag - Horde</option>
<option value="1103">1103 CTF - Flag - Neutral</option>
<option value="1104">1104 Frenzyheart Tribe</option>
<option value="1105">1105 The Oracles</option>
<option value="1106">1106 Argent Crusade</option>
<option value="1107">1107 Troll, Drakkari</option>
<option value="1108">1108 CoT Arthas</option>
<option value="1109">1109 CoT Stratholme Citizen</option>
<option value="1110">1110 CoT Scourge</option>
<option value="1111">1111 Freya</option>
<option value="1112">1112 Mount - Taxi - Alliance</option>
<option value="1113">1113 Mount - Taxi - Horde</option>
<option value="1114">1114 Mount - Taxi - Neutral</option>
<option value="1115">1115 Elemental, Water</option>
<option value="1116">1116 Elemental, Air</option>
<option value="1117">1117 Sholazar Basin</option>
<option value="1118">1118 Classic</option>
<option value="1119">1119 The Sons of Hodir</option>
<option value="1120">1120 Iron Giants</option>
<option value="1121">1121 Frost Vrykul</option>
<option value="1122">1122 Earthen</option>
<option value="1123">1123 Monster Referee</option>
<option value="1124">1124 The Sunreavers</option>
<option value="1125">1125 Hyldsmeet</option>
<option value="1126">1126 The Frostborn</option>
<option value="1127">1127 Orgrimmar (Alex Test)</option>
<option value="1136">1136 Tranquillien Conversion</option>
<option value="1137">1137 Wintersaber Conversion</option>
<option value="1145">1145 Hates Everything</option>
<option value="1154">1154 Silver Covenant Conversion</option>
<option value="1155">1155 Sunreavers Conversion</option>
<option value="1156">1156 The Ashen Verdict</option>
<option value="1159">1159 CTF - Flag - Alliance 2</option>
<option value="1160">1160 CTF - Flag - Horde 2</option>
</select>
</td>
<td></td>
<td><input type="text" name="itemset" class="input_box" value="<?php echo htmlspecialchars($row['itemset']); ?>" title="The ID of an item set this item (weapon/armor) belongs to."/>
<select class="little" id="itemset" OnChange="get_value(this.id);">
<option value="1">1 The Gladiator</option>
<option value="41">41 Dal'Rend's Arms</option>
<option value="65">65 Spider's Kiss</option>
<option value="81">81 The Postmaster</option>
<option value="121">121 Cadaverous Garb</option>
<option value="122">122 Necropile Raiment</option>
<option value="123">123 Bloodmail Regalia</option>
<option value="124">124 Deathbone Guardian</option>
<option value="141">141 Volcanic Armor</option>
<option value="142">142 Stormshroud Armor</option>
<option value="143">143 Devilsaur Armor</option>
<option value="144">144 Ironfeather Armor</option>
<option value="161">161 Defias Leather</option>
<option value="162">162 Embrace of the Viper</option>
<option value="163">163 Chain of the Scarlet Crusade</option>
<option value="181">181 Magister's Regalia</option>
<option value="182">182 Vestments of the Devout</option>
<option value="183">183 Dreadmist Raiment</option>
<option value="184">184 Shadowcraft Armor</option>
<option value="185">185 Wildheart Raiment</option>
<option value="186">186 Beaststalker Armor</option>
<option value="187">187 The Elements</option>
<option value="188">188 Lightforge Armor</option>
<option value="189">189 Battlegear of Valor</option>
<option value="201">201 Arcanist Regalia</option>
<option value="202">202 Vestments of Prophecy</option>
<option value="203">203 Felheart Raiment</option>
<option value="204">204 Nightslayer Armor</option>
<option value="205">205 Cenarion Raiment</option>
<option value="206">206 Giantstalker Armor</option>
<option value="207">207 The Earthfury</option>
<option value="208">208 Lawbringer Armor</option>
<option value="209">209 Battlegear of Might</option>
<option value="210">210 Netherwind Regalia</option>
<option value="211">211 Vestments of Transcendence</option>
<option value="212">212 Nemesis Raiment</option>
<option value="213">213 Bloodfang Armor</option>
<option value="214">214 Stormrage Raiment</option>
<option value="215">215 Dragonstalker Armor</option>
<option value="216">216 The Ten Storms</option>
<option value="217">217 Judgement Armor</option>
<option value="218">218 Battlegear of Wrath</option>
<option value="221">221 Garb of Thero-shan</option>
<option value="241">241 Shard of the Gods</option>
<option value="261">261 Spirit of Eskhandar</option>
<option value="281">281 Champion's Battlegear</option>
<option value="282">282 Lieutenant Commander's Battlegear</option>
<option value="301">301 Champion's Earthshaker</option>
<option value="321">321 Imperial Plate</option>
<option value="341">341 Champion's Regalia</option>
<option value="342">342 Champion's Raiment</option>
<option value="343">343 Lieutenant Commander's Regalia</option>
<option value="344">344 Lieutenant Commander's Raiment</option>
<option value="345">345 Champion's Threads</option>
<option value="346">346 Lieutenant Commander's Threads</option>
<option value="347">347 Champion's Vestments</option>
<option value="348">348 Lieutenant Commander's Vestments</option>
<option value="361">361 Champion's Pursuit</option>
<option value="362">362 Lieutenant Commander's Pursuit</option>
<option value="381">381 Lieutenant Commander's Sanctuary</option>
<option value="382">382 Champion's Sanctuary</option>
<option value="383">383 Warlord's Battlegear</option>
<option value="384">384 Field Marshal's Battlegear</option>
<option value="386">386 Warlord's Earthshaker</option>
<option value="387">387 Warlord's Regalia</option>
<option value="388">388 Field Marshal's Regalia</option>
<option value="389">389 Field Marshal's Raiment</option>
<option value="390">390 Warlord's Raiment</option>
<option value="391">391 Warlord's Threads</option>
<option value="392">392 Field Marshal's Threads</option>
<option value="393">393 Warlord's Vestments</option>
<option value="394">394 Field Marshal's Vestments</option>
<option value="395">395 Field Marshal's Pursuit</option>
<option value="396">396 Warlord's Pursuit</option>
<option value="397">397 Field Marshal's Sanctuary</option>
<option value="398">398 Warlord's Sanctuary</option>
<option value="401">401 Lieutenant Commander's Aegis</option>
<option value="402">402 Field Marshal's Aegis</option>
<option value="421">421 Bloodvine Garb</option>
<option value="441">441 Primal Batskin</option>
<option value="442">442 Blood Tiger Harness</option>
<option value="443">443 Bloodsoul Embrace</option>
<option value="444">444 The Darksoul</option>
<option value="461">461 The Twin Blades of Hakkari</option>
<option value="462">462 Zanzil's Concentration</option>
<option value="463">463 Primal Blessing</option>
<option value="464">464 Overlord's Resolution</option>
<option value="465">465 Prayer of the Primal</option>
<option value="466">466 Major Mojo Infusion</option>
<option value="467">467 The Highlander's Resolution</option>
<option value="468">468 The Highlander's Resolve</option>
<option value="469">469 The Highlander's Determination</option>
<option value="470">470 The Highlander's Fortitude</option>
<option value="471">471 The Highlander's Purpose</option>
<option value="472">472 The Highlander's Will</option>
<option value="473">473 The Highlander's Intent</option>
<option value="474">474 Vindicator's Battlegear</option>
<option value="475">475 Freethinker's Armor</option>
<option value="476">476 Augur's Regalia</option>
<option value="477">477 Predator's Armor</option>
<option value="478">478 Madcap's Outfit</option>
<option value="479">479 Haruspex's Garb</option>
<option value="480">480 Confessor's Raiment</option>
<option value="481">481 Demoniac's Threads</option>
<option value="482">482 Illusionist's Attire</option>
<option value="483">483 The Defiler's Determination</option>
<option value="484">484 The Defiler's Fortitude</option>
<option value="485">485 The Defiler's Intent</option>
<option value="486">486 The Defiler's Purpose</option>
<option value="487">487 The Defiler's Resolution</option>
<option value="488">488 The Defiler's Will</option>
<option value="489">489 Black Dragon Mail</option>
<option value="490">490 Green Dragon Mail</option>
<option value="491">491 Blue Dragon Mail</option>
<option value="492">492 Twilight Trappings</option>
<option value="493">493 Genesis Raiment</option>
<option value="494">494 Symbols of Unending Life</option>
<option value="495">495 Battlegear of Unyielding Strength</option>
<option value="496">496 Conqueror's Battlegear</option>
<option value="497">497 Deathdealer's Embrace</option>
<option value="498">498 Emblems of Veiled Shadows</option>
<option value="499">499 Doomcaller's Attire</option>
<option value="500">500 Implements of Unspoken Names</option>
<option value="501">501 Stormcaller's Garb</option>
<option value="502">502 Gift of the Gathering Storm</option>
<option value="503">503 Enigma Vestments</option>
<option value="504">504 Trappings of Vaulted Secrets</option>
<option value="505">505 Avenger's Battlegear</option>
<option value="506">506 Battlegear of Eternal Justice</option>
<option value="507">507 Garments of the Oracle</option>
<option value="508">508 Finery of Infinite Wisdom</option>
<option value="509">509 Striker's Garb</option>
<option value="510">510 Trappings of the Unseen Path</option>
<option value="511">511 Battlegear of Heroism</option>
<option value="512">512 Darkmantle Armor</option>
<option value="513">513 Feralheart Raiment</option>
<option value="514">514 Vestments of the Virtuous</option>
<option value="515">515 Beastmaster Armor</option>
<option value="516">516 Soulforge Armor</option>
<option value="517">517 Sorcerer's Regalia</option>
<option value="518">518 Deathmist Raiment</option>
<option value="519">519 The Five Thunders</option>
<option value="520">520 Ironweave Battlesuit</option>
<option value="521">521 Dreamwalker Raiment</option>
<option value="522">522 Champion's Guard</option>
<option value="523">523 Dreadnaught's Battlegear</option>
<option value="524">524 Bonescythe Armor</option>
<option value="525">525 Vestments of Faith</option>
<option value="526">526 Frostfire Regalia</option>
<option value="527">527 The Earthshatterer</option>
<option value="528">528 Redemption Armor</option>
<option value="529">529 Plagueheart Raiment</option>
<option value="530">530 Cryptstalker Armor</option>
<option value="533">533 Battlegear of Undead Slaying</option>
<option value="534">534 Undead Slayer's Armor</option>
<option value="535">535 Garb of the Undead Slayer</option>
<option value="536">536 Regalia of Undead Cleansing</option>
<option value="537">537 Champion's Battlearmor</option>
<option value="538">538 Champion's Stormcaller</option>
<option value="539">539 Champion's Refuge</option>
<option value="540">540 Champion's Investiture</option>
<option value="541">541 Champion's Dreadgear</option>
<option value="542">542 Champion's Arcanum</option>
<option value="543">543 Champion's Pursuance</option>
<option value="544">544 Lieutenant Commander's Redoubt</option>
<option value="545">545 Lieutenant Commander's Battlearmor</option>
<option value="546">546 Lieutenant Commander's Arcanum</option>
<option value="547">547 Lieutenant Commander's Dreadgear</option>
<option value="548">548 Lieutenant Commander's Guard</option>
<option value="549">549 Lieutenant Commander's Investiture</option>
<option value="550">550 Lieutenant Commander's Pursuance</option>
<option value="551">551 Lieutenant Commander's Refuge</option>
<option value="552">552 Wrath of Spellfire</option>
<option value="553">553 Shadow's Embrace</option>
<option value="554">554 Primal Mooncloth</option>
<option value="555">555 Netherweave Vestments</option>
<option value="556">556 Imbued Netherweave</option>
<option value="557">557 Soulcloth Embrace</option>
<option value="558">558 Arcanoweave Vestments</option>
<option value="559">559 Spellstrike Infusion</option>
<option value="560">560 Fel Iron Plate</option>
<option value="561">561 Fel Iron Chain</option>
<option value="562">562 Adamantite Battlegear</option>
<option value="563">563 Enchanted Adamantite Armor</option>
<option value="564">564 Flame Guard</option>
<option value="565">565 Khorium Ward</option>
<option value="566">566 Burning Rage</option>
<option value="567">567 Gladiator's Battlegear</option>
<option value="568">568 Gladiator's Dreadgear</option>
<option value="569">569 Faith in Felsteel</option>
<option value="570">570 The Unyielding</option>
<option value="571">571 Whitemend Wisdom</option>
<option value="572">572 Battlecast Garb</option>
<option value="573">573 Fel Skin</option>
<option value="574">574 Strength of the Clefthoof</option>
<option value="575">575 Felstalker Armor</option>
<option value="576">576 Fury of the Nether</option>
<option value="577">577 Gladiator's Vestments</option>
<option value="578">578 Gladiator's Earthshaker</option>
<option value="579">579 Gladiator's Regalia</option>
<option value="580">580 Gladiator's Thunderfist</option>
<option value="581">581 Gladiator's Raiment</option>
<option value="582">582 Gladiator's Aegis</option>
<option value="583">583 Gladiator's Vindication</option>
<option value="584">584 Gladiator's Sanctuary</option>
<option value="585">585 Gladiator's Wildhide</option>
<option value="586">586 Gladiator's Pursuit</option>
<option value="587">587 High Warlord's Aegis</option>
<option value="588">588 High Warlord's Battlegear</option>
<option value="589">589 Grand Marshal's Aegis</option>
<option value="590">590 Grand Marshal's Battlegear</option>
<option value="591">591 Grand Marshal's Dreadgear</option>
<option value="592">592 High Warlord's Dreadgear</option>
<option value="593">593 Grand Marshal's Earthshaker</option>
<option value="594">594 High Warlord's Earthshaker</option>
<option value="595">595 Grand Marshal's Pursuit</option>
<option value="596">596 High Warlord's Pursuit</option>
<option value="597">597 Grand Marshal's Raiment</option>
<option value="598">598 High Warlord's Raiment</option>
<option value="599">599 Grand Marshal's Regalia</option>
<option value="600">600 High Warlord's Regalia</option>
<option value="601">601 Grand Marshal's Sanctuary</option>
<option value="602">602 High Warlord's Sanctuary</option>
<option value="603">603 Grand Marshal's Thunderfist</option>
<option value="604">604 High Warlord's Thunderfist</option>
<option value="605">605 Grand Marshal's Vestments</option>
<option value="606">606 High Warlord's Vestments</option>
<option value="607">607 Grand Marshal's Vindication</option>
<option value="608">608 High Warlord's Vindication</option>
<option value="609">609 Grand Marshal's Wildhide</option>
<option value="610">610 High Warlord's Wildhide</option>
<option value="611">611 Felscale Armor</option>
<option value="612">612 Scaled Draenic Armor</option>
<option value="613">613 Thick Draenic Armor</option>
<option value="614">614 Wild Draenish Armor</option>
<option value="615">615 Gladiator's Felshroud</option>
<option value="616">616 Netherscale Armor</option>
<option value="617">617 Netherstrike Armor</option>
<option value="618">618 Windhawk Armor</option>
<option value="619">619 Primal Intent</option>
<option value="620">620 Assassination Armor</option>
<option value="621">621 Netherblade</option>
<option value="622">622 Deathmantle</option>
<option value="623">623 Righteous Armor</option>
<option value="624">624 Justicar Raiment</option>
<option value="625">625 Justicar Armor</option>
<option value="626">626 Justicar Battlegear</option>
<option value="627">627 Crystalforge Raiment</option>
<option value="628">628 Crystalforge Armor</option>
<option value="629">629 Crystalforge Battlegear</option>
<option value="630">630 Tidefury Raiment</option>
<option value="631">631 Cyclone Raiment</option>
<option value="632">632 Cyclone Regalia</option>
<option value="633">633 Cyclone Harness</option>
<option value="634">634 Cataclysm Raiment</option>
<option value="635">635 Cataclysm Regalia</option>
<option value="636">636 Cataclysm Harness</option>
<option value="637">637 Moonglade Raiment</option>
<option value="638">638 Malorne Raiment</option>
<option value="639">639 Malorne Regalia</option>
<option value="640">640 Malorne Harness</option>
<option value="641">641 Nordrassil Harness</option>
<option value="642">642 Nordrassil Raiment</option>
<option value="643">643 Nordrassil Regalia</option>
<option value="644">644 Oblivion Raiment</option>
<option value="645">645 Voidheart Raiment</option>
<option value="646">646 Corruptor Raiment</option>
<option value="647">647 Incanter's Regalia</option>
<option value="648">648 Aldor Regalia</option>
<option value="649">649 Tirisfal Regalia</option>
<option value="650">650 Beast Lord Armor</option>
<option value="651">651 Demon Stalker Armor</option>
<option value="652">652 Rift Stalker Armor</option>
<option value="653">653 Bold Armor</option>
<option value="654">654 Warbringer Armor</option>
<option value="655">655 Warbringer Battlegear</option>
<option value="656">656 Destroyer Armor</option>
<option value="657">657 Destroyer Battlegear</option>
<option value="658">658 Mana-Etched Regalia</option>
<option value="659">659 Wastewalker Armor</option>
<option value="660">660 Desolation Battlegear</option>
<option value="661">661 Doomplate Battlegear</option>
<option value="662">662 Hallowed Raiment</option>
<option value="663">663 Incarnate Raiment</option>
<option value="664">664 Incarnate Regalia</option>
<option value="665">665 Avatar Raiment</option>
<option value="666">666 Avatar Regalia</option>
<option value="667">667 The Twin Stars</option>
<option value="668">668 Slayer's Armor</option>
<option value="669">669 Gronnstalker's Armor</option>
<option value="670">670 Malefic Raiment</option>
<option value="671">671 Tempest Regalia</option>
<option value="672">672 Onslaught Battlegear</option>
<option value="673">673 Onslaught Armor</option>
<option value="674">674 Absolution Regalia</option>
<option value="675">675 Vestments of Absolution</option>
<option value="676">676 Thunderheart Harness</option>
<option value="677">677 Thunderheart Regalia</option>
<option value="678">678 Thunderheart Raiment</option>
<option value="679">679 Lightbringer Armor</option>
<option value="680">680 Lightbringer Battlegear</option>
<option value="681">681 Lightbringer Raiment</option>
<option value="682">682 Skyshatter Harness</option>
<option value="683">683 Skyshatter Raiment</option>
<option value="684">684 Skyshatter Regalia</option>
<option value="685">685 Gladiator's Refuge</option>
<option value="686">686 Gladiator's Wartide</option>
<option value="687">687 Gladiator's Investiture</option>
<option value="688">688 Grand Marshal's Refuge</option>
<option value="689">689 High Warlord's Refuge</option>
<option value="690">690 Gladiator's Redemption</option>
<option value="691">691 Grand Marshal's Investiture</option>
<option value="692">692 High Warlord's Investiture</option>
<option value="693">693 Grand Marshal's Redemption</option>
<option value="694">694 High Warlord's Redemption</option>
<option value="695">695 Grand Marshal's Wartide</option>
<option value="696">696 High Warlord's Wartide</option>
<option value="697">697 Champion's Redoubt</option>
<option value="698">698 Warlord's Aegis</option>
<option value="699">699 The Twin Blades of Azzinoth</option>
<option value="700">700 Merciless Gladiator's Aegis</option>
<option value="701">701 Merciless Gladiator's Battlegear</option>
<option value="702">702 Merciless Gladiator's Dreadgear</option>
<option value="703">703 Merciless Gladiator's Earthshaker</option>
<option value="704">704 Merciless Gladiator's Felshroud</option>
<option value="705">705 Merciless Gladiator's Investiture</option>
<option value="706">706 Merciless Gladiator's Pursuit</option>
<option value="707">707 Merciless Gladiator's Raiment</option>
<option value="708">708 Merciless Gladiator's Redemption</option>
<option value="709">709 Merciless Gladiator's Refuge</option>
<option value="710">710 Merciless Gladiator's Regalia</option>
<option value="711">711 Merciless Gladiator's Sanctuary</option>
<option value="712">712 Merciless Gladiator's Thunderfist</option>
<option value="713">713 Merciless Gladiator's Vestments</option>
<option value="714">714 Merciless Gladiator's Vindication</option>
<option value="715">715 Merciless Gladiator's Wartide</option>
<option value="716">716 Merciless Gladiator's Wildhide</option>
<option value="717">717 Field Marshal's Earthshaker</option>
<option value="718">718 Lieutenant Commander's Earthshaker</option>
<option value="719">719 The Fists of Fury</option>
<option value="720">720 Vengeful Gladiator's Refuge</option>
<option value="721">721 Vengeful Gladiator's Sanctuary</option>
<option value="722">722 Vengeful Gladiator's Wildhide</option>
<option value="723">723 Vengeful Gladiator's Pursuit</option>
<option value="724">724 Vengeful Gladiator's Regalia</option>
<option value="725">725 Vengeful Gladiator's Redemption</option>
<option value="726">726 Vengeful Gladiator's Vindication</option>
<option value="727">727 Vengeful Gladiator's Aegis</option>
<option value="728">728 Vengeful Gladiator's Investiture</option>
<option value="729">729 Vengeful Gladiator's Raiment</option>
<option value="730">730 Vengeful Gladiator's Vestments</option>
<option value="731">731 Vengeful Gladiator's Wartide</option>
<option value="732">732 Vengeful Gladiator's Earthshaker</option>
<option value="733">733 Vengeful Gladiator's Thunderfist</option>
<option value="734">734 Vengeful Gladiator's Dreadgear</option>
<option value="735">735 Vengeful Gladiator's Felshroud</option>
<option value="736">736 Vengeful Gladiator's Battlegear</option>
<option value="737">737 Latro's Flurry</option>
<option value="738">738 Dreadweave Battlegear</option>
<option value="739">739 Mooncloth Battlegear</option>
<option value="740">740 Satin Battlegear</option>
<option value="741">741 Evoker's Silk Battlegear</option>
<option value="742">742 Dragonhide Battlegear</option>
<option value="743">743 Wyrmhide Battlegear</option>
<option value="744">744 Kodohide Battlegear</option>
<option value="745">745 Opportunist's Battlegear</option>
<option value="746">746 Seer's Mail Battlegear</option>
<option value="747">747 Seer's Ringmail Battlegear</option>
<option value="748">748 Seer's Linked Battlegear</option>
<option value="749">749 Stalker's Chain Battlegear</option>
<option value="750">750 Savage Plate Battlegear</option>
<option value="751">751 Crusader's Ornamented Battlegear</option>
<option value="752">752 Crusader's Scaled Battlegear</option>
<option value="754">754 Borean Embrace</option>
<option value="755">755 Nerubian Hive</option>
<option value="756">756 Frostscale Binding</option>
<option value="757">757 Iceborne Embrace</option>
<option value="759">759 Raine's Revenge</option>
<option value="760">760 Gladiator's Dreadplate</option>
<option value="761">761 Winter Garb</option>
<option value="762">762 Brewfest Garb</option>
<option value="763">763 Frostwoven Power</option>
<option value="764">764 Duskweaver</option>
<option value="765">765 Gladiator's Battlegear</option>
<option value="766">766 Gladiator's Vindication</option>
<option value="767">767 Gladiator's Redemption</option>
<option value="768">768 Gladiator's Desecration</option>
<option value="769">769 Gladiator's Thunderfist</option>
<option value="770">770 Gladiator's Earthshaker</option>
<option value="771">771 Gladiator's Wartide</option>
<option value="772">772 Gladiator's Pursuit</option>
<option value="773">773 Gladiator's Refuge</option>
<option value="774">774 Gladiator's Wildhide</option>
<option value="775">775 Gladiator's Sanctuary</option>
<option value="776">776 Gladiator's Vestments</option>
<option value="777">777 Gladiator's Investiture</option>
<option value="778">778 Gladiator's Raiment</option>
<option value="779">779 Gladiator's Regalia</option>
<option value="780">780 Gladiator's Felshroud</option>
<option value="781">781 Blessed Regalia of Undead Cleansing</option>
<option value="782">782 Undead Slayer's Blessed Armor</option>
<option value="783">783 Blessed Garb of the Undead Slayer</option>
<option value="784">784 Blessed Battlegear of Undead Slaying</option>
<option value="785">785 Midsummer Reveler</option>
<option value="787">787 Dreadnaught Plate</option>
<option value="788">788 Dreadnaught Battlegear</option>
<option value="789">789 Redemption Battlegear</option>
<option value="790">790 Redemption Regalia</option>
<option value="791">791 Redemption Plate</option>
<option value="792">792 Scourgeborne Battlegear</option>
<option value="793">793 Scourgeborne Plate</option>
<option value="794">794 Cryptstalker Battlegear</option>
<option value="795">795 Earthshatter Battlegear</option>
<option value="796">796 Earthshatter Garb</option>
<option value="797">797 Earthshatter Regalia</option>
<option value="798">798 Dreamwalker Battlegear</option>
<option value="799">799 Dreamwalker Regalia</option>
<option value="800">800 Dreamwalker Garb</option>
<option value="801">801 Bonescythe Battlegear</option>
<option value="802">802 Plagueheart Garb</option>
<option value="803">803 Frostfire Garb</option>
<option value="804">804 Regalia of Faith</option>
<option value="805">805 Garb of Faith</option>
<option value="812">812 Spring Tuxedo</option>
<option value="813">813 Eviscerator's Battlegear</option>
<option value="814">814 Ornate Saronite Battlegear</option>
<option value="815">815 Overcaster Battlegear</option>
<option value="816">816 Savage Saronite Battlegear</option>
<option value="817">817 Stormhide Battlegear</option>
<option value="818">818 Swiftarrow Battlegear</option>
<option value="819">819 Frostsavage Battlegear</option>
<option value="820">820 Aegis Battlegear</option>
<option value="821">821 Aegis Plate</option>
<option value="822">822 Aegis Regalia</option>
<option value="823">823 Worldbreaker Battlegear</option>
<option value="824">824 Worldbreaker Garb</option>
<option value="825">825 Worldbreaker Regalia</option>
<option value="826">826 Terrorblade Battlegear</option>
<option value="827">827 Nightsong Battlegear</option>
<option value="828">828 Nightsong Garb</option>
<option value="829">829 Nightsong Regalia</option>
<option value="830">830 Siegebreaker Battlegear</option>
<option value="831">831 Siegebreaker Plate</option>
<option value="832">832 Sanctification Garb</option>
<option value="833">833 Sanctification Regalia</option>
<option value="834">834 Darkruned Battlegear</option>
<option value="835">835 Darkruned Plate</option>
<option value="836">836 Kirin Tor Garb</option>
<option value="837">837 Deathbringer Garb</option>
<option value="838">838 Scourgestalker Battlegear</option>
<option value="843">843 Khadgar's Regalia</option>
<option value="844">844 Sunstrider's Regalia</option>
<option value="845">845 Gul'dan's Regalia</option>
<option value="846">846 Kel'Thuzad's Regalia</option>
<option value="847">847 Velen's Raiment</option>
<option value="848">848 Zabra's Raiment</option>
<option value="849">849 Velen's Regalia</option>
<option value="850">850 Zabra's Regalia</option>
<option value="851">851 Malfurion's Garb</option>
<option value="852">852 Runetotem's Garb</option>
<option value="853">853 Malfurion's Regalia</option>
<option value="854">854 Runetotem's Regalia</option>
<option value="855">855 Malfurion's Battlegear</option>
<option value="856">856 Runetotem's Battlegear</option>
<option value="857">857 VanCleef's Battlegear</option>
<option value="858">858 Garona's Battlegear</option>
<option value="859">859 Windrunner's Battlegear</option>
<option value="860">860 Windrunner's Pursuit</option>
<option value="861">861 Nobundo's Garb</option>
<option value="862">862 Thrall's Garb</option>
<option value="863">863 Thrall's Regalia</option>
<option value="864">864 Nobundo's Regalia</option>
<option value="865">865 Nobundo's Battlegear</option>
<option value="866">866 Thrall's Battlegear</option>
<option value="867">867 Wrynn's Battlegear</option>
<option value="868">868 Hellscream's Battlegear</option>
<option value="869">869 Wrynn's Plate</option>
<option value="870">870 Hellscream's Plate</option>
<option value="871">871 Thassarian's Battlegear</option>
<option value="872">872 Koltira's Battlegear</option>
<option value="873">873 Thassarian's Plate</option>
<option value="874">874 Koltira's Plate</option>
<option value="875">875 Turalyon's Garb</option>
<option value="876">876 Liadrin's Garb</option>
<option value="877">877 Turalyon's Battlegear</option>
<option value="878">878 Liadrin's Battlegear</option>
<option value="879">879 Turalyon's Plate</option>
<option value="880">880 Liadrin's Plate</option>
<option value="881">881 Purified Shard of the Gods</option>
<option value="882">882 Shiny Shard of the Gods</option>
<option value="883">883 Bloodmage's Regalia</option>
<option value="884">884 Dark Coven's Regalia</option>
<option value="885">885 Crimson Acolyte's Raiment</option>
<option value="886">886 Crimson Acolyte's Regalia</option>
<option value="887">887 Lasherweave Garb</option>
<option value="888">888 Lasherweave Regalia</option>
<option value="889">889 Lasherweave Battlegear</option>
<option value="890">890 Shadowblade's Battlegear</option>
<option value="891">891 Ahn'Kahar Blood Hunter's Battlegear</option>
<option value="892">892 Frost Witch's Garb</option>
<option value="893">893 Frost Witch's Regalia</option>
<option value="894">894 Frost Witch's Battlegear</option>
<option value="895">895 Ymirjar Lord's Battlegear</option>
<option value="896">896 Ymirjar Lord's Plate</option>
<option value="897">897 Scourgelord's Battlegear</option>
<option value="898">898 Scourgelord's Plate</option>
<option value="899">899 Lightsworn Garb</option>
<option value="900">900 Lightsworn Battlegear</option>
<option value="901">901 Lightsworn Plate</option>
</select>
</td>
<td><input type="text" name="bonding" class="input_box" value="<?php echo htmlspecialchars($row['bonding']); ?>"/>
<select class="little" id="bonding" OnChange="get_value(this.id);">
<option value="0">0 No Bind</option>
<option value="1">1 Binds when Picked Up</option>
<option value="2">2 Binds when Equipped</option>
<option value="3">3 Binds when Used</option>
<option value="4">4 Quest Item</option>
<option value="5">5 Quest Item1</option>
</select>
</td>
<td></td>
<td><input type="text" name="holy_res" class="input_box" value="<?php echo htmlspecialchars($row['holy_res']); ?>" title="Holy resistance."/></td>
<td><input type="text" name="frost_res" class="input_box" value="<?php echo htmlspecialchars($row['frost_res']); ?>" title="Frost resistance."/></td>
<td></td>
<td><input type="text" name="socketColor_1" class="input_box" value="<?php echo htmlspecialchars($row['socketColor_1']); ?>" title="socketColor_1: Meta=1,Red=2,Yellow=4,Blue=8"/></td>
<td><input type="text" name="socketContent_1" class="input_box" value="<?php echo htmlspecialchars($row['socketContent_1']); ?>" title="socketContent_1"/></td>
</tr>
<tr>
<td>ItemLevel</td>
<td>RequiredLevel</td>
<td>RequiredReputationRank</td>
<td></td>
<td>armor</td>
<td>block</td>
<td></td>
<td>fire_res</td>
<td>shadow_res</td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td><input type="text" name="ItemLevel" class="input_box" value="<?php echo htmlspecialchars($row['ItemLevel']); ?>" title="Item base level."/></td>
<td><input type="text" name="RequiredLevel" class="input_box" value="<?php echo htmlspecialchars($row['RequiredLevel']); ?>" title="Minimum level to use/equip this item."/></td>
<td><input type="text" name="RequiredReputationRank" class="input_box" value="<?php echo htmlspecialchars($row['RequiredReputationRank']); ?>" title="Minimum required rank for the faction entered in RequiredReputationFaction."/>
<select class="little" id="RequiredReputationRank" OnChange="get_value(this.id);">
<option value="0">0 HATED</option>
<option value="1">1 HOSTILE</option>
<option value="2">2 UNFRIENDLY</option>
<option value="3">3 NEUTRAL</option>
<option value="4">4 FRIENDLY</option>
<option value="5">5 HONORED</option>
<option value="6">6 REVERED</option>
<option value="7">7 EXALTED</option>
</select>
</td>
<td></td>
<td><input type="text" name="armor" class="input_box" value="<?php echo htmlspecialchars($row['armor']); ?>" title="Armor for this item."/></td>
<td><input type="text" name="block" class="input_box" value="<?php echo htmlspecialchars($row['block']); ?>" title="Shield's chance to block an attack."/></td>
<td></td>
<td><input type="text" name="fire_res" class="input_box" value="<?php echo htmlspecialchars($row['fire_res']); ?>" title="Fire resistance."/></td>
<td><input type="text" name="shadow_res" class="input_box" value="<?php echo htmlspecialchars($row['shadow_res']); ?>" title="Shadow resistance."/></td>
<td></td>
<td><input type="text" name="socketColor_2" class="input_box" value="<?php echo htmlspecialchars($row['socketColor_2']); ?>" title="socketColor_2: Meta=1,Red=2,Yellow=4,Blue=8"/></td>
<td><input type="text" name="socketContent_2" class="input_box" value="<?php echo htmlspecialchars($row['socketContent_2']); ?>" title="socketContent_2"/></td>
</tr>
<tr>
<td>RequiredSkill</td>
<td>RequiredSkillRank</td>
<td>RequiredcityRank</td>
<td></td>
<td>delay</td>
<td>RangedModRange</td>
<td></td>
<td>nature_res</td>
<td>arcane_res</td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td><input type="text" name="RequiredSkill" class="input_box" value="<?php echo htmlspecialchars($row['RequiredSkill']); ?>" title="Skill required to use this item."/>
<select class="little" id="RequiredSkill" OnChange="get_value(this.id)">
<option value="6">6 Frost</option>
<option value="8">8 Fire</option>
<option value="26">26 Arms</option>
<option value="38">38 Combat</option>
<option value="39">39 Subtlety</option>
<option value="43">43 Swords</option>
<option value="44">44 Axes</option>
<option value="45">45 Bows</option>
<option value="46">46 Guns</option>
<option value="50">50 Beast Mastery</option>
<option value="51">51 Survival</option>
<option value="54">54 Maces</option>
<option value="55">55 Two-Handed Swords</option>
<option value="56">56 Holy</option>
<option value="78">78 Shadow Magic</option>
<option value="95">95 Defense</option>
<option value="98">98 Language: Common</option>
<option value="101">101 Dwarven Racial</option>
<option value="109">109 Language: Orcish</option>
<option value="111">111 Language: Dwarven</option>
<option value="113">113 Language: Darnassian</option>
<option value="115">115 Language: Taurahe</option>
<option value="118">118 Dual Wield</option>
<option value="124">124 Tauren Racial</option>
<option value="125">125 Orc Racial</option>
<option value="126">126 Night Elf Racial</option>
<option value="129">129 First Aid</option>
<option value="134">134 Feral Combat</option>
<option value="136">136 Staves</option>
<option value="137">137 Language: Thalassian</option>
<option value="138">138 Language: Draconic</option>
<option value="139">139 Language: Demon Tongue</option>
<option value="140">140 Language: Titan</option>
<option value="141">141 Language: Old Tongue</option>
<option value="142">142 Survival</option>
<option value="148">148 Horse Riding</option>
<option value="149">149 Wolf Riding</option>
<option value="150">150 Tiger Riding</option>
<option value="152">152 Ram Riding</option>
<option value="155">155 Swimming</option>
<option value="160">160 Two-Handed Maces</option>
<option value="162">162 Unarmed</option>
<option value="163">163 Marksmanship</option>
<option value="164">164 Blacksmithing</option>
<option value="165">165 Leatherworking</option>
<option value="171">171 Alchemy</option>
<option value="172">172 Two-Handed Axes</option>
<option value="173">173 Daggers</option>
<option value="176">176 Thrown</option>
<option value="182">182 Herbalism</option>
<option value="183">183 GENERIC (DND)</option>
<option value="184">184 Retribution</option>
<option value="185">185 Cooking</option>
<option value="186">186 Mining</option>
<option value="188">188 Pet - Imp</option>
<option value="189">189 Pet - Felhunter</option>
<option value="197">197 Tailoring</option>
<option value="202">202 Engineering</option>
<option value="203">203 Pet - Spider</option>
<option value="204">204 Pet - Voidwalker</option>
<option value="205">205 Pet - Succubus</option>
<option value="206">206 Pet - Infernal</option>
<option value="207">207 Pet - Doomguard</option>
<option value="208">208 Pet - Wolf</option>
<option value="209">209 Pet - Cat</option>
<option value="210">210 Pet - Bear</option>
<option value="211">211 Pet - Boar</option>
<option value="212">212 Pet - Crocolisk</option>
<option value="213">213 Pet - Carrion Bird</option>
<option value="214">214 Pet - Crab</option>
<option value="215">215 Pet - Gorilla</option>
<option value="217">217 Pet - Raptor</option>
<option value="218">218 Pet - Tallstrider</option>
<option value="220">220 Racial - Undead</option>
<option value="226">226 Crossbows</option>
<option value="228">228 Wands</option>
<option value="229">229 Polearms</option>
<option value="236">236 Pet - Scorpid</option>
<option value="237">237 Arcane</option>
<option value="251">251 Pet - Turtle</option>
<option value="253">253 Assassination</option>
<option value="256">256 Fury</option>
<option value="257">257 Protection</option>
<option value="267">267 Protection</option>
<option value="270">270 Pet - Generic Hunter</option>
<option value="293">293 Plate Mail</option>
<option value="313">313 Language: Gnomish</option>
<option value="315">315 Language: Troll</option>
<option value="333">333 Enchanting</option>
<option value="354">354 Demonology</option>
<option value="355">355 Affliction</option>
<option value="356">356 Fishing</option>
<option value="373">373 Enhancement</option>
<option value="374">374 Restoration</option>
<option value="375">375 Elemental Combat</option>
<option value="393">393 Skinning</option>
<option value="413">413 Mail</option>
<option value="414">414 Leather</option>
<option value="415">415 Cloth</option>
<option value="433">433 Shield</option>
<option value="473">473 Fist Weapons</option>
<option value="533">533 Raptor Riding</option>
<option value="553">553 Mechanostrider Piloting</option>
<option value="554">554 Undead Horsemanship</option>
<option value="573">573 Restoration</option>
<option value="574">574 Balance</option>
<option value="593">593 Destruction</option>
<option value="594">594 Holy</option>
<option value="613">613 Discipline</option>
<option value="633">633 Lockpicking</option>
<option value="653">653 Pet - Bat</option>
<option value="654">654 Pet - Hyena</option>
<option value="655">655 Pet - Bird of Prey</option>
<option value="656">656 Pet - Wind Serpent</option>
<option value="673">673 Language: Gutterspeak</option>
<option value="713">713 Kodo Riding</option>
<option value="733">733 Racial - Troll</option>
<option value="753">753 Racial - Gnome</option>
<option value="754">754 Racial - Human</option>
<option value="755">755 Jewelcrafting</option>
<option value="756">756 Blood Elf Racial</option>
<option value="758">758 Pet - Event - Remote Control</option>
<option value="759">759 Language: Draenei</option>
<option value="760">760 Draenei Racial</option>
<option value="761">761 Pet - Felguard</option>
<option value="762">762 Riding</option>
<option value="763">763 Pet - Dragonhawk</option>
<option value="764">764 Pet - Nether Ray</option>
<option value="765">765 Pet - Sporebat</option>
<option value="766">766 Pet - Warp Stalker</option>
<option value="767">767 Pet - Ravager</option>
<option value="768">768 Pet - Serpent</option>
<option value="769">769 Internal</option>
<option value="770">770 Blood</option>
<option value="771">771 Frost</option>
<option value="772">772 Unholy</option>
<option value="773">773 Inscription</option>
<option value="775">775 Pet - Moth</option>
<option value="776">776 Runeforging</option>
<option value="777">777 Mounts</option>
<option value="778">778 Companions</option>
<option value="780">780 Pet - Exotic Chimaera</option>
<option value="781">781 Pet - Exotic Devlisaur</option>
<option value="782">782 Pet - Ghoul</option>
<option value="783">783 Pet - Exotic Silithid</option>
<option value="784">784 Pet - Exotic Worm</option>
<option value="785">785 Pet- Wasp</option>
<option value="786">786 Pet - Exotic Rhino</option>
<option value="787">787 Pet - Exotic Core Hound</option>
<option value="788">788 Pet - Exotic Spirit Beast</option>
</select>
</td>
<td><input type="text" name="RequiredSkillRank" class="input_box" value="<?php echo htmlspecialchars($row['RequiredSkillRank']); ?>" title="Minimum proficiency in skill to use this item."/></td>
<td><input type="text" name="RequiredcityRank" class="input_box" value="<?php echo htmlspecialchars($row['RequiredcityRank']); ?>"/></td>
<td></td>
<td><input type="text" name="delay" class="input_box" value="<?php echo htmlspecialchars($row['delay']); ?>" title="Time in milliseconds between hits."/></td>
<td><input type="text" name="RangedModRange" class="input_box" value="<?php echo htmlspecialchars($row['RangedModRange']); ?>"/></td>
<td></td>
<td><input type="text" name="nature_res" class="input_box" value="<?php echo htmlspecialchars($row['nature_res']); ?>" title="Nature resistance."/></td>
<td><input type="text" name="arcane_res" class="input_box" value="<?php echo htmlspecialchars($row['arcane_res']); ?>" title="Arcane resistance."/></td>
<td></td>
<td><input type="text" name="socketColor_3" class="input_box" value="<?php echo htmlspecialchars($row['socketColor_3']); ?>" title="socketColor_3: Meta=1,Red=2,Yellow=4,Blue=8"/></td>
<td><input type="text" name="socketContent_3" class="input_box" value="<?php echo htmlspecialchars($row['socketContent_3']); ?>" title="socketContent_3"/></td>
</tr>
<tr>
<td>requiredspell</td>
<td>requiredhonorrank</td>
<td>RequiredDisenchantSkill</td>
<td></td>
<td>ammo_type</td>
<td>MaxDurability</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>socketBonus</td>
<td>GemProperties</td>
</tr>
<tr>
<td id="spellrequiredspell"><input type="text" name="requiredspell" class="input_box" value="<?php echo htmlspecialchars($row['requiredspell']); ?>" title="Player must know this spell to use the item."/>
<?php
if(eregi("chrome", $_SERVER['HTTP_USER_AGENT']))
{
?>
<script type="text/javascript">spell('requiredspell');</script>
<?php
}
else
{
?>
<input type="button" value="" class="little" OnClick="alert('I\'m importing the spells data, this will request some times..'); this.style.display='none'; spell('requiredspell');" />
<?php
}
?>
</td>
<td><input type="text" name="requiredhonorrank" class="input_box" value="<?php echo htmlspecialchars($row['requiredhonorrank']); ?>" title="The PvP Honor rank required to use this item."/></td>
<td><input type="text" name="RequiredDisenchantSkill" class="input_box" value="<?php echo htmlspecialchars($row['RequiredDisenchantSkill']); ?>" title="Skill required to use this item."/></td>
<td></td>
<td><input type="text" name="ammo_type" class="input_box" value="<?php echo htmlspecialchars($row['ammo_type']); ?>" title="2 = Arrows 3 = Bullets"/></td>
<td><input type="text" name="MaxDurability" class="input_box" value="<?php echo htmlspecialchars($row['MaxDurability']); ?>" title="Durability of an item."/></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td><input type="text" name="socketBonus" class="input_box" value="<?php echo htmlspecialchars($row['socketBonus']); ?>" title=""/></td>
<td><input type="text" name="GemProperties" class="input_box" value="<?php echo htmlspecialchars($row['GemProperties']); ?>" title=""/></td>
</tr>
</table>
<input type="hidden" name="code">
</form>
<script src="js_function.js"></script>
<script type="text/javascript">
function Scripts()
{
entry='<?php echo htmlspecialchars($row['entry']); ?>';
classs='<?php echo htmlspecialchars($row['class']); ?>';
subclass='<?php echo htmlspecialchars($row['subclass']); ?>';
name='<?php echo htmlspecialchars($row['name']); ?>';
description='<?php echo htmlspecialchars($row['description']); ?>';
StatsCount='<?php echo htmlspecialchars($row['StatsCount']); ?>';
displayid='<?php echo htmlspecialchars($row['displayid']); ?>';
quality='<?php echo htmlspecialchars($row['Quality']); ?>';
Flags='<?php echo htmlspecialchars($row['Flags']); ?>';
FlagsExtra='<?php echo htmlspecialchars($row['FlagsExtra']); ?>';
BuyCount='<?php echo htmlspecialchars($row['BuyCount']); ?>';
BuyPrice='<?php echo htmlspecialchars($row['BuyPrice']); ?>';
SellPrice='<?php echo htmlspecialchars($row['SellPrice']); ?>';
InventoryType='<?php echo htmlspecialchars($row['InventoryType']); ?>';
maxcount='<?php echo htmlspecialchars($row['maxcount']); ?>';
stackable='<?php echo htmlspecialchars($row['stackable']); ?>';
ContainerSlots='<?php echo htmlspecialchars($row['ContainerSlots']); ?>';
AllowableClass='<?php echo htmlspecialchars($row['AllowableClass']); ?>';
AllowableRace='<?php echo htmlspecialchars($row['AllowableRace']); ?>';
RequiredReputationFaction='<?php echo htmlspecialchars($row['RequiredReputationFaction']); ?>';
itemset='<?php echo htmlspecialchars($row['itemset']); ?>';
bonding='<?php echo htmlspecialchars($row['bonding']); ?>';
holy_res='<?php echo htmlspecialchars($row['holy_res']); ?>';
frost_res='<?php echo htmlspecialchars($row['frost_res']); ?>';
socketColor_1='<?php echo htmlspecialchars($row['socketColor_1']); ?>';
socketContent_1='<?php echo htmlspecialchars($row['socketContent_1']); ?>';
ItemLevel='<?php echo htmlspecialchars($row['ItemLevel']); ?>';
RequiredLevel='<?php echo htmlspecialchars($row['RequiredLevel']); ?>';
RequiredReputationRank='<?php echo htmlspecialchars($row['RequiredReputationRank']); ?>';
armor='<?php echo htmlspecialchars($row['armor']); ?>';
block='<?php echo htmlspecialchars($row['block']); ?>';
fire_res='<?php echo htmlspecialchars($row['fire_res']); ?>';
shadow_res='<?php echo htmlspecialchars($row['shadow_res']); ?>';
socketColor_2='<?php echo htmlspecialchars($row['socketColor_2']); ?>';
socketContent_2='<?php echo htmlspecialchars($row['socketContent_2']); ?>';
RequiredSkill='<?php echo htmlspecialchars($row['RequiredSkill']); ?>';
RequiredSkillRank='<?php echo htmlspecialchars($row['RequiredSkillRank']); ?>';
RequiredcityRank='<?php echo htmlspecialchars($row['RequiredcityRank']); ?>';
delay='<?php echo htmlspecialchars($row['delay']); ?>';
RangedModRange='<?php echo htmlspecialchars($row['RangedModRange']); ?>';
nature_res='<?php echo htmlspecialchars($row['nature_res']); ?>';
arcane_res='<?php echo htmlspecialchars($row['arcane_res']); ?>';
socketColor_3='<?php echo htmlspecialchars($row['socketColor_3']); ?>';
socketContent_3='<?php echo htmlspecialchars($row['socketContent_3']); ?>';
requiredspell='<?php echo htmlspecialchars($row['requiredspell']); ?>';
requiredhonorrank='<?php echo htmlspecialchars($row['requiredhonorrank']); ?>';
RequiredDisenchantSkill='<?php echo htmlspecialchars($row['RequiredDisenchantSkill']); ?>';
ammo_type='<?php echo htmlspecialchars($row['ammo_type']); ?>';
MaxDurability='<?php echo htmlspecialchars($row['MaxDurability']); ?>';
socketBonus='<?php echo htmlspecialchars($row['socketBonus']); ?>';
GemProperties='<?php echo htmlspecialchars($row['GemProperties']); ?>';

Script="UPDATE `item_template` SET";
if(document.getElementsByName("class")[0].value != classs){Script+=" `class`="+document.getElementsByName("class")[0].value+",";}
if(form.subclass.value != subclass){Script+=" `subclass`="+form.subclass.value+",";}
if(form.name.value != name){Script+=" `name`="+form.name.value+",";}
if(form.description.value != description){Script+=" `description`="+form.description.value+",";}
if(form.StatsCount.value != StatsCount){Script+=" `StatsCount`="+form.StatsCount.value+",";}
if(form.displayid.value != displayid){Script+=" `displayid`="+form.displayid.value+",";}
if(document.getElementsByName("quality")[0].value != quality){Script+=" `Quality`="+document.getElementsByName("quality")[0].value+",";}
if(document.getElementsByName("Flags")[0].value != Flags){Script+=" `Flags`="+document.getElementsByName("Flags")[0].value+",";}
if(form.FlagsExtra.value != FlagsExtra){Script+=" `FlagsExtra`="+form.FlagsExtra.value+",";}
if(form.BuyCount.value != BuyCount){Script+=" `BuyCount`="+form.BuyCount.value+",";}
if(form.BuyPrice.value != BuyPrice){Script+=" `BuyPrice`="+form.BuyPrice.value+",";}
if(form.SellPrice.value != SellPrice){Script+=" `SellPrice`="+form.SellPrice.value+",";}
if(document.getElementsByName("InventoryType")[0].value != InventoryType){Script+=" `InventoryType`="+document.getElementsByName("InventoryType")[0].value+",";}
if(form.maxcount.value != maxcount){Script+=" `maxcount`="+form.maxcount.value+",";}
if(form.stackable.value != stackable){Script+=" `stackable`="+form.stackable.value+",";}
if(form.ContainerSlots.value != ContainerSlots){Script+=" `ContainerSlots`="+form.ContainerSlots.value+",";}
if(document.getElementsByName("AllowableClass")[0].value != AllowableClass){Script+=" `AllowableClass`="+document.getElementsByName("AllowableClass")[0].value+",";}
if(document.getElementsByName("AllowableRace")[0].value != AllowableRace){Script+=" `AllowableRace`="+document.getElementsByName("AllowableRace")[0].value+",";}
if(document.getElementsByName("RequiredReputationFaction")[0].value != RequiredReputationFaction){Script+=" `RequiredReputationFaction`="+document.getElementsByName("RequiredReputationFaction")[0].value+",";}
if(document.getElementsByName("itemset")[0].value != itemset){Script+=" `itemset`="+document.getElementsByName("itemset")[0].value+",";}
if(document.getElementsByName("bonding")[0].value != bonding){Script+=" `bonding`="+document.getElementsByName("bonding")[0].value+",";}
if(form.holy_res.value != holy_res){Script+=" `holy_res`="+form.holy_res.value+",";}
if(form.frost_res.value != frost_res){Script+=" `frost_res`="+form.frost_res.value+",";}
if(form.socketColor_1.value != socketColor_1){Script+=" `socketColor_1`="+form.socketColor_1.value+",";}
if(form.socketContent_1.value != socketContent_1){Script+=" `socketContent_1`="+form.socketContent_1.value+",";}
if(form.ItemLevel.value != ItemLevel){Script+=" `ItemLevel`="+form.ItemLevel.value+",";}
if(form.RequiredLevel.value != RequiredLevel){Script+=" `RequiredLevel`="+form.RequiredLevel.value+",";}
if(document.getElementsByName("RequiredReputationRank")[0].value != RequiredReputationRank){Script+=" `RequiredReputationRank`="+document.getElementsByName("RequiredReputationRank")[0].value+",";}
if(form.armor.value != armor){Script+=" `armor`="+form.armor.value+",";}
if(form.block.value != block){Script+=" `block`="+form.block.value+",";}
if(form.fire_res.value != fire_res){Script+=" `fire_res`="+form.fire_res.value+",";}
if(form.shadow_res.value != shadow_res){Script+=" `shadow_res`="+form.shadow_res.value+",";}
if(form.socketColor_2.value != socketColor_2){Script+=" `socketColor_2`="+form.socketColor_2.value+",";}
if(form.socketContent_2.value != socketContent_2){Script+=" `socketContent_2`="+form.socketContent_2.value+",";}
if(document.getElementsByName("RequiredSkill")[0].value != RequiredSkill){Script+=" `RequiredSkill`="+document.getElementsByName("RequiredSkill")[0].value+",";}
if(form.RequiredSkillRank.value != RequiredSkillRank){Script+=" `RequiredSkillRank`="+form.RequiredSkillRank.value+",";}
if(form.RequiredcityRank.value != RequiredcityRank){Script+=" `RequiredcityRank`="+form.RequiredcityRank.value+",";}
if(form.delay.value != delay){Script+=" `delay`="+form.delay.value+",";}
if(form.RangedModRange.value != RangedModRange){Script+=" `RangedModRange`="+form.RangedModRange.value+",";}
if(form.nature_res.value != nature_res){Script+=" `nature_res`="+form.nature_res.value+",";}
if(form.arcane_res.value != arcane_res){Script+=" `arcane_res`="+form.arcane_res.value+",";}
if(form.socketColor_3.value != socketColor_3){Script+=" `socketColor_3`="+form.socketColor_3.value+",";}
if(form.socketContent_3.value != socketContent_3){Script+=" `socketContent_3`="+form.socketContent_3.value+",";}
if(document.getElementsByName("requiredspell")[0].value != requiredspell){Script+=" `requiredspell`="+document.getElementsByName("requiredspell")[0].value+",";}
if(form.requiredhonorrank.value != requiredhonorrank){Script+=" `requiredhonorrank`="+form.requiredhonorrank.value+",";}
if(form.RequiredDisenchantSkill.value != RequiredDisenchantSkill){Script+=" `RequiredDisenchantSkill`="+form.RequiredDisenchantSkill.value+",";}
if(form.ammo_type.value != ammo_type){Script+=" `ammo_type`="+form.ammo_type.value+",";}
if(form.MaxDurability.value != MaxDurability){Script+=" `MaxDurability`="+form.MaxDurability.value+",";}
if(form.socketBonus.value != socketBonus){Script+=" `socketBonus`="+form.socketBonus.value+",";}
if(form.GemProperties.value != GemProperties){Script+=" `GemProperties`="+form.GemProperties.value+",";}

Where=" WHERE `entry`="+entry;
Script=Script.substr(0, Script.length-1);
Script+=Where;
if (isNaN(form.entry.value) ==true){Script=""; Where="";}

form.code.value=Script;

location.href='Script.php?code='+Script+";";
}
</script>
<p align="right"><input type="submit" value="Show Item Template Script" OnClick='Scripts()'></p>
<?php
}
?>