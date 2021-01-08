window.onload = function() {
	var categorysel = document.getElementById("category");
	for (var x in subjectObject) {
    	categorySel.options[categorySel.options.length] = new Option(x, x);
  	}
  	categorysel.onchange = function() {
    	categorySel.length = 1;
  	}
}
