function get_lootmode_value(select, name)
{
	var Element=document.getElementsByName(name)[0];
	selects=document.getElementById(select);
	if (selects.options[selects.selectedIndex].className != "target")
	{
		selects.options[selects.selectedIndex].className="target";
		for (var i=1; i<selects.options.length; i++)
		{
			if(selects.options[i].className != "target")
			{
				Element.value=parseInt(Element.value)+parseInt(selects.options[selects.selectedIndex].value);
				break;
			}
			else
			{
				if(i==selects.options.length-1)
				{
					Element.value="-1";
				}
			}
		}
		selects.selectedIndex=0;
	}
	else if (selects.options[selects.selectedIndex].className=="target")
	{
		Element.value=parseInt(Element.value)-parseInt(selects.options[selects.selectedIndex].value);
		selects.options[selects.selectedIndex].className="";
		selects.selectedIndex=0;
	}
}

var insert="";
var entries="";
function remove_target()
{
	for(var i=1; i<document.getElementById("loot").rows.length; i++)
	{
		if(document.getElementById(i).className != "del")
		{
			document.getElementById(i).className="";
		}
	}
	
	var LootMode=document.getElementsByName("lootmode")[0];
	selects=document.getElementById("LootMode");
	
	LootMode.value=parseInt(LootMode.value)-parseInt(selects.options[selects.selectedIndex].value);
	selects.options[1].className="";
	selects.options[2].className="";
	selects.options[3].className="";
	selects.options[4].className="";
	selects.options[5].className="";
	selects.selectedIndex=0;
}

function get_values(entry, item, ChanceOrQuestChance, groupid, mincountOrRef, maxcount, lootmode)
{
	var table=document.getElementById("loot");
	var tr=document.getElementsByClassName("target")[0].id;
	document.getElementById("loot_id").value=table.rows[tr].cells[0].innerHTML;
	document.getElementById("item").value=table.rows[tr].cells[1].innerHTML;
	document.getElementById("ChanceOrQuestChance").value=table.rows[tr].cells[2].innerHTML;
	document.getElementById("lootmode").value=table.rows[tr].cells[3].innerHTML;
	document.getElementById("groupid").value=table.rows[tr].cells[4].innerHTML;
	document.getElementById("mincountOrRef").value=table.rows[tr].cells[5].innerHTML;
	document.getElementById("maxcount").value=table.rows[tr].cells[6].innerHTML;
	var lootmode=document.getElementById("lootmode").value;
	for (var i=1; i<6; i++)
	{
		if(selects.options[i].value==lootmode)
		{
			selects.options[i].className="target";
			break;
		}
	}
}

function add()
{
	var loot_id=document.getElementById("loot_id").value;
	var item=document.getElementById("item").value;
	var ChanceOrQuestChance=document.getElementById("ChanceOrQuestChance").value;
	var groupid=document.getElementById("groupid").value;
	var mincountOrRef=document.getElementById("mincountOrRef").value;
	var maxcount=document.getElementById("maxcount").value;
	var lootmode=document.getElementById("lootmode").value;
	if ((item != "") && (ChanceOrQuestChance != "") && (groupid != "") && (mincountOrRef != "") && (maxcount != "") && (lootmode != ""))
	{
		var table=document.getElementById("loot");
		var check=true;
		for(var i=0; i<table.rows.length; i++)
		{
			if(table.rows[i].className != "del")
			{	
				if(item==table.rows[i].cells[1].innerHTML)
				{
					check=false;
					alert("This item is already used!");
					break;
				}
			}
		}
		if(check==true)
		{
			var tr=table.insertRow(table.rows.length);
			var td0=tr.insertCell(0);
			var td1=tr.insertCell(1);
			var td2=tr.insertCell(2);
			var td3=tr.insertCell(3);
			var td4=tr.insertCell(4);
			var td5=tr.insertCell(5);
			var td6=tr.insertCell(6);
			tr.id=table.rows.length-1;
			td0.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td1.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td2.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td3.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td4.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td5.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td6.onclick=function() { remove_target(); tr.className='target'; get_values(loot_id, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount); }
			td0.innerHTML=loot_id;
			td1.innerHTML=item;
			td2.innerHTML=ChanceOrQuestChance;
			td3.innerHTML=lootmode;
			td4.innerHTML=groupid;
			td5.innerHTML=mincountOrRef;
			td6.innerHTML=maxcount;
			entries+=","+document.getElementById("item").value;
			insert+="<br>("+tr.cells[0].innerHTML+","+tr.cells[1].innerHTML+","+tr.cells[2].innerHTML+","+tr.cells[3].innerHTML+","+tr.cells[4].innerHTML+","+tr.cells[5].innerHTML+","+tr.cells[6].innerHTML+"),";
		}
	}
	else
	{
		var message="Fill the box of:";
		if (item == "") { message+=" item"; }
		if (ChanceOrQuestChance == "") { message+=" ChanceOrQuestChance"; }
		if (groupid == "") { message+=" groupid"; }
		if (mincountOrRef == "") { message+=" mincountOrRef"; }
		if (maxcount == "") { message+=" maxcount"; }
		if (lootmode == "") { message+=" lootmode"; }
		alert(message);
	}
}

function exchange()
{
	var tr=document.getElementsByClassName("target")[0];
	var table=document.getElementById("loot");
	var loot_id=document.getElementById("loot_id").value;
	var item=document.getElementById("item").value;
	var ChanceOrQuestChance=document.getElementById("ChanceOrQuestChance").value;
	var lootmode=document.getElementById("lootmode").value;
	var groupid=document.getElementById("groupid").value;
	var mincountOrRef=document.getElementById("mincountOrRef").value;
	var maxcount=document.getElementById("maxcount").value;
	var check=true;
	if ((item != "") && (ChanceOrQuestChance != "") && (groupid != "") && (mincountOrRef != "") && (maxcount != "") && (lootmode != ""))
	{
		if(item != tr.cells[1].innerHTML)
		{
			for(var i=0; i<table.rows.length; i++)
			{
				if(table.rows[i].className != "del")
				{
					if(item==table.rows[i].cells[1].innerHTML)
					{
						check=false;
						alert("This item is already used!");
						break;
					}
				}
			}
		}
		if(check==true)
		{
			entries+=","+tr.cells[1].innerHTML;
			tr.cells[0].innerHTML=document.getElementById("loot_id").value;
			tr.cells[1].innerHTML=document.getElementById("item").value;
			tr.cells[2].innerHTML=document.getElementById("ChanceOrQuestChance").value;
			tr.cells[3].innerHTML=document.getElementById("lootmode").value;
			tr.cells[4].innerHTML=document.getElementById("groupid").value;
			tr.cells[5].innerHTML=document.getElementById("mincountOrRef").value;
			tr.cells[6].innerHTML=document.getElementById("maxcount").value;
			tr.cells[7].innerHTML="";
			insert+="<br>("+tr.cells[0].innerHTML+","+tr.cells[1].innerHTML+","+tr.cells[2].innerHTML+","+tr.cells[3].innerHTML+","+tr.cells[4].innerHTML+","+tr.cells[5].innerHTML+","+tr.cells[6].innerHTML+"),";
		}
	}
	else
	{
		var message="Fill the box of:";
		if (item == "") { message+=" item"; }
		if (ChanceOrQuestChance == "") { message+=" ChanceOrQuestChance"; }
		if (groupid == "") { message+=" groupid"; }
		if (mincountOrRef == "") { message+=" mincountOrRef"; }
		if (maxcount == "") { message+=" maxcount"; }
		if (lootmode == "") { message+=" lootmode"; }
		alert(message);
	}
}

function del()
{
	var tr=document.getElementsByClassName("target")[0];
	entries+=","+tr.cells[1].innerHTML;
	tr.className="del";
}

function Scripts(table)
{
	var Script="";
	var loot_id=document.getElementById("loot_id").value;
	entries=entries.replace(",","");
	if(entries != "")
	{
		if(insert != "")
		{
			Script="DELETE FROM `"+table+"` WHERE entry="+loot_id+" AND item IN ("+entries+"); <br>INSERT INTO `"+table+"` (`entry`,`item`,`ChanceOrQuestChance`,`lootmode`,`groupid`,`mincountOrRef`,`maxcount`) VALUES"+insert;
			Script=Script.substr(0, Script.length-1);
			Script+=";";
		}
		else
		{
			Script="DELETE FROM `"+table+"` WHERE entry="+loot_id+" AND item IN ("+entries+");";
		}
	}
	location.href="Script.php?code="+Script;
}