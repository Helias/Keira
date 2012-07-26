function get_value(select)
{
	selects=document.getElementById(select);
	var Element=document.getElementsByName(select)[0];
	if (Element.value=="")
	{
		Element.value=0;
	}
	Element.value=selects.options[selects.selectedIndex].value;
}

function get_value_flag(select)
{
	var Element=document.getElementsByName(select)[0];
	selects=document.getElementById(select);
	if (selects.options[selects.selectedIndex].className != "target")
	{
		selects.options[selects.selectedIndex].className="target";
		for (var i=1; i<selects.options.length; i++)
		{
			if(selects.options[i].className != "target")
			{
				if(Element.value=="")
				{
					Element.value=0;
				}
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