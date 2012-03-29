function search(form_ins)
{
	entry=false;
	name=false;
	subname=false;
	if (form_ins.Entry.value != "")
	entry=true;
	if (form_ins.Name.value != "")
	name=true;
	if (form_ins.Subname.value != "")
	subname=true;

	if (entry || name || subname)
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