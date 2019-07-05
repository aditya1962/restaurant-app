function add_order(id)
{
	var item_id = id[id.length-1];
	var quantity_val = document.getElementById("quantity-"+item_id).textContent;
	if(parseInt(quantity_val)===0)
	{
		alert("Item quantity cannot be zero");
	}
}