$(document).ready(function() {
    $('.toggle-textarea').hide();

    $('.toggle-action').click(function(e) {
        e.preventDefault(); 

        $('#ask-question-form').slideToggle();
        $(this).text(function(i, text) {
            return text === "Poser une question" ? "Fermer" : "Poser une question";
        });
    });

    $('.toggle-reply').click(function(e) {
        e.preventDefault(); 

        $(this).next('.toggle-textarea').slideToggle();
        $(this).text(function(i, text) {
            return text === "Répondre" ? "Fermer la réponse" : "Répondre";
        });
    });
});
