//Général mask date input pour le model de date français
$("[name='date']").inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });

//Affichage des notifications
function view_notif(notif){
	//Boucle sur le tableau en paramètre
	for (var i = notif.length - 1; i >= 0; i--) {
		if(notif[i]['hP']){
			//Appel la fonction de réglage et affichage de la notification //fichier: ./ressources/js/pages/ui/notifications.js
			showNotification("alert-" + notif[i]['type'] + "", "" + notif[i]['text'] + "" , "top", "" + notif[i]['hP'] + "", "animated fadeInUp", "animated fadeOutUp");
		}else{
			//Appel la fonction de réglage et affichage de la notification //fichier: ./ressources/js/pages/ui/notifications.js
			showNotification("alert-" + notif[i]['type'] + "", "" + notif[i]['text'] + "" , "top", "center", "animated fadeInUp", "animated fadeOutUp");
		}
	}
}