// public/js/script.js
$(document).ready(function() {
    $('#view').click(function(e) {
        // prevent the links default action
        // from firing
        e.preventDefault();
        // attempt to GET the new content
        $.ajax({
		type: "GET",
		dataType: "JSON",
		url: BASE+'/projects/1',
		success: processJSON
});
        
    })
    function processJSON(data){
    	alert(data.title);

}
});