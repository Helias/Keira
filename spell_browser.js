function spell(id)
{
	document.getElementById('spell'+id).innerHTML+=spells;
	document.getElementsByName("_spells")[0].id="requiredspell";
}
