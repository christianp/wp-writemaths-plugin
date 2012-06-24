(function($) {
if(window.MathJax===undefined){
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src  = "https://c328740.ssl.cf1.rackcdn.com/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML.js";
	var config = 'MathJax.Hub.Config({' + 'extensions: ["tex2jax.js"],' + 'tex2jax: { inlineMath: [ ["$","$"]], displayMath: [["$$","$$"],["\\\\[","\\\\]"]], processEscapes: true },' + 'jax: ["input/TeX","output/HTML-CSS"]' + '});' + 'MathJax.Hub.Startup.onload();';
	if (window.opera) {
		script.innerHTML = config
	} 
	else {
		script.text = config
	}
	document.getElementsByTagName("head")[0].appendChild(script);
}

$(function() {
	$('textarea#comment').writemaths();

});
})(jQuery);
