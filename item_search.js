function search(form_ins)
{
	entry=false;
	name=false;
	if (form_ins.entry.value != "")
	entry=true;
	if (form_ins.name.value != "")
	name=true;
	
	if (entry || name)
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