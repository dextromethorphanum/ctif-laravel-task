var $jq = jQuery.noConflict();
$jq(document).ready(function() {
    $jq('#districts_div').css('display', $jq('#operator_raion').is(':checked') ? 'block' : 'none');
	$jq('#operator_raion').click(function() {
        $jq('#districts_div').css('display', $jq('#operator_raion').is(':checked') ? 'block' : 'none');
    });
});
