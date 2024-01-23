export function saveScore(score, nameGame) {

    const requete = new XMLHttpRequest();
    requete.open('GET', '/saveScore?score='+score+'&name_game='+nameGame, true)
    requete.onreadystatechange = function() {
        if(requete.readyState === 4 && requete.status === 200) {
            const response = JSON.parse(requete.responseText);
            if(response.success) {
                console.log("Evenement symfony marche bien");
            }
        }
    }

    requete.send();

}


 