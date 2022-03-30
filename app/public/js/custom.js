var $jq = jQuery.noConflict();
$jq(document).ready(function() {
		
	$jq("#iban-export").on('click', function() {
		var budget_year = $jq("[name=anul]").val();
		window.location = "export.php?anul="+budget_year;
	});
		
	$jq("[name=iban_form]").submit(function(event) {
		event.preventDefault();
		$jq("#iban-placeholder").html("");
		var formData = $jq(this).serialize();
		formData += "&getiban=1";
			$jq.ajax({
				type: "POST",
				url: "../php/ibanAPI.php",
				data: formData,
				dataType:'TEXT',
				success: function(data){
					$jq("#iban-placeholder").html(data);
					$jq('.spoiler-body').hide();
				}
			});
	});
		
	$jq('.spoiler-body').hide();
	$jq('.spoiler-title').click(function()
	{
		$jq(this).next().toggle()});	
		$jq("[name=anul]").select2({theme: "classic"});

		var kd_eco = $jq("[name=eco]").select2({theme: "classic"});
		var kd_raion = $jq("[name=raion]").select2({theme: "classic"});
		var kd_local = $jq("[name=loc]").select2({theme: "classic"});
	if(!kd_local.val())
		changeRaion(kd_raion.val());

	if(kdEco)
		$jq(kd_eco).val(kdEco).trigger("change");

	if(kdRaion)
		$jq(kd_raion).val(kdRaion).trigger("change");

	if(kdLoc)
		$jq(kd_local).val(kdLoc).trigger("change");

});

function changeRaion(raion) {
	$jq.ajax({
		type: "POST",
		url: "../php/ibanAPI.php",
		data: {
			raion: raion,
			apiRequest: 1
		},
		dataType: 'JSON',
		success: function(data){
			$jq("[name=loc]").empty().select2({
				theme: "classic",
				data: data,
				placeholder: "Selectati codul localitate",
				cache: true
			})
		}
	});
}
