function search(form_ins)
{
	entry=false;
	title=false;
	if (form_ins.Entry.value != "")
	entry=true;
	if (form_ins.Title.value != "")
	title=true;
	
	if (entry || title)
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