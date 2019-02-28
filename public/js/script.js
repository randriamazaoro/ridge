function toggleActiveClass(target){
	$(target).toggleClass('is-active');
}

function showMenu(section, scrolled, animation) {
	if (
		document.body.scrollTop > scrolled ||
		document.documentElement.scrollTop > scrolled
	) {
		$(section).addClass(animation);
		$(section).removeClass("is-invisible");
	}
}

function showProgramThemes() {

		
	var form = document.forms['initiation'],
		radio = form.elements['program'];
		theme = document.getElementsByClassName('theme');



	for (var i = 0; i < radio.length; i++) {
		
		theme[i].classList.add('is-hidden');

		if (radio[i].checked){
			theme[i].classList.remove('is-hidden');
		}
	}

}

var didScroll,
	lastScrollTop = 0,
	delta = 5,
	navbarHeight = $('#is-fixed').outerHeight();


$(window).scroll(function(even) {
	didScroll = true;
})

setInterval(function() {
	if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400){
		if (didScroll){
			hasScrolled();
			didScroll = false;

		}
	}

	else{
		$('#is-fixed').css("top","-4rem");
	}
}, 50);

function hasScrolled(){
	var st = $(this).scrollTop();
	if (Math.abs(lastScrollTop - st) <= delta)
	return;

	if (st > lastScrollTop && st > navbarHeight){
		$('#is-fixed').css("top","-4rem");
	}

	else
	{
		if (st + $(window).height() < $(document).height()) {
			$('#is-fixed').css("top","0rem");
		}
	}

	lastScrollTop = st;
}


$(document).ready(function (){

	$('#is-fixed .navbar-burger').click(function () {
		
		$('#is-fixed .navbar-burger').toggleClass('is-active');
		$('#is-fixed .navbar-menu').toggleClass('is-active');
	});

	$('#is-positionned .navbar-burger').click(function () {
		
		$('#is-positionned .navbar-burger').toggleClass('is-active');
		$('#is-positionned .navbar-menu').toggleClass('is-active');
	});
});

function textControl(textarea, type) {
	var text = $(textarea).val();

	switch(type) {
    case "bold":
        q = "<b> Insèrer un texte ici </b>";
        break;

    case "italic":
        q = "<i> Insèrer un texte ici </i>";
        break;

    case "underlined":
        q = "<u> Insèrer un texte ici </u>";
        break;

    case "quotes":
        q = "&ldquo; Insèrer un texte ici &rdquo;";
        break;

    case "h1":
        q = "<h1> Insèrer un texte ici </h1>";
        break;

    case "link":
        q = "<a href='insèrer le url ici'> Insèrer le titre du lien ici </a>";
        break;
	}

	$(textarea).val(text + q);
}

function modifyModal(q, id) {

	$("#modify-" + q).toggleClass("is-active");

	if (q == "category") {
		var data = $("#categories #id-" + id);
		var title = data.attr('data-title');
		var color = data.attr('data-color');

		$("#modify-category #modify-category-id").val(id);
		$("#modify-category #modify-category-title").val(title);
		$("#modify-category #modify-category-" + color).attr(
			"checked",
			"checked"
		);
	}

	if (q == "post") {
		var data = $("#posts #id-" + id);
		var subject = data.attr('data-subject');
		var content = data.attr('data-content');

		$("#modify-post #modify-post-id").val(id);
		$("#modify-post #modify-post-subject").val(subject);
		$("#modify-post #modify-post-content").val(content);
	}

	if (q == "theme") {
		var data = $("#themes #id-" + id);
		var id = data.attr("data-id");
		var title = data.attr("data-title");
		var url = data.attr("data-url");
		var description = data.attr("data-description");

		$("#modify-theme #modify-theme-id").val(id);
		$("#modify-theme #modify-theme-title").val(title);
		$("#modify-theme #modify-theme-url").val(url);
		$("#modify-theme #modify-theme-description").val(description);
	}

	if (q == "faq") {
		var data = $("#faqs #id-" + id);
		var id = data.attr("data-id");
		var question = data.attr("data-question");
		var answer = data.attr("data-answer");

		$("#modify-faq #modify-faq-id").val(id);
		$("#modify-faq #modify-faq-question").val(question);
		$("#modify-faq #modify-faq-answer").val(answer);
	}
}

function deleteModal(q, id) {
	var url = $('#delete-' + q + '-url-' + id).attr('data-url');

	switch(q) {
    case "post":
        text = "Etes-vous sûr de vouloir supprimer cet article avec tous les commentaires ?";
        break;
    case "category":
        text = "Etes-vous sûr de vouloir supprimer cette categorie avec tous les articles ?";
        break;
    case "transfer":
        text = "Etes-vous sûr de vouloir annuler votre demande de virement ?";
        break;
    case "faq":
        text = "Etes-vous sûr de vouloir supprimer cette information ?";
        break;
	}

	$('#delete').toggleClass('is-active');
	$('#delete-url').attr('href', url);
	$('#delete-text').text(text);


}