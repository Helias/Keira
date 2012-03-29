function search(form_ins)
{
	guid=false;
	account=false;
	name=false;
	if (form_ins.guid.value != "")
	guid=true;
	if (form_ins.account.value != "")
	account=true;
	if (form_ins.name.value != "")
	name=true;

	if (guid || account || name)
	{
		form_ins.x.value=1;
		return true;
	}
	else
	{
		var Confirm=confirm("Search filter is empty. This task returns all entries from table. \n Are you sure to continue?");
		if (Confirm==true)
		{
			form_ins.x.value=1;
			return true;
		}
		else
		{
			form_ins.x.value=2;
			return false;
		}
	}
}