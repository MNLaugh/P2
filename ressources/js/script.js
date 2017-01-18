//Affichage des notifications
function view_notif(notif){
	//Boucle sur le tableau en paramètre
	for (var i = notif.length - 1; i >= 0; i--) {
		//Appel la fonction de réglage et affichage de la notification //fichier: ./ressources/js/pages/ui/notifications.js
		showNotification("alert-" + notif[i]['type'] + "", "" + notif[i]['text'] + "" , "top", "center", "animated fadeInUp", "animated fadeOutUp");
	}
}