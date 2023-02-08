/**
 * Il nous faut une fonction pour récupérer le JSON des
 * messages et les afficher correctement
 */
async function getMessages(){
    let response = await fetch('./handler.php');
    let result = await response.json();
    // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php

    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    let html = result.reverse().map(function(message){

      return `
        <div class="messageDiv container d-flex my-1 p-0 border rounded" style="background-color:${message.color}">
            <div class="col-4 m-0 p-0 border rounded text-center">
                <span class="userId"><strong>${message.pseudo}</strong></span>
                <br>
                <span class="date">${message.niceDate}</span>
            </div>
            <div class="col-8 ms-2">
                <span class="message">${message.message}</span>
            </div>
            <?= var_dump(message) ?>
        </div>
      `
    }).join('');
    const messages = document.querySelector('.messages');

    messages.innerHTML = html;
    messages.scrollTop = messages.scrollHeight;

  }
 

  /**
   * Il nous faut une fonction pour envoyer le nouveau
   * message au serveur et rafraichir les messages
   */
  

async function postMessage(event){
  //     // 1. Elle doit stoper le submit du formulaire
  event.preventDefault();
  
  //     // 2. Elle doit récupérer les données du formulaire
  const userId = document.querySelector('#userId');
  const message = document.querySelector('#message');
  
  //     // 3. Elle doit conditionner les données
  const data = new FormData();
  data.append('userId', userId.value);
  data.append('message', message.value);
  
  //     // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  // REMPLACER PAR FETCH !!!!!!!!!!!!!!!

  let test = await fetch('./handler.php?task=write', {
    method: 'POST',
    body: data
  });
  if (test.ok){
    message.value = '';
    message.focus();
    getMessages();
  }
};
  
    // requeteAjax.send(data);
  
  
document.querySelector('form').addEventListener('submit', postMessage);
  
//   /**
//    * Il nous faut une intervale qui demande le rafraichissement
//    * des messages toutes les 3 secondes et qui donne 
//    * l'illusion du temps réel.
//    */
// let interval = window.setInterval(getMessages, 10000);

getMessages();
