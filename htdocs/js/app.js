/**
 * Il nous faut une fonction pour récupérer le JSON des
 * messages et les afficher correctement
 */
// function getMessages(){
async function getMessages() {
    let response = await fetch('handler.php');
    let result = await response.json();
    // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
    // const ajaxRequest = new XMLHttpRequest();
    // ajaxRequest.open('GET', 'handler.php');
    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    // ajaxRequest.onload = function(){
    //     const resultat = JSON.parse(ajaxRequest.responseText);
        let html = result.reverse().map(function(message){
          return `
            <div class="messageDiv container d-flex bg-secondary my-1 border">
                <div class="col-2 m-0">
                    <span class="userId">${message.userId}</span>
                    <br>
                    <span class="date">${message.dateAndTime.substring(11, 16)}</span>
                </div>
                <div class="col-10">
                    <span class="message">${message.message}</span>
                </div>
            </div>
          `
        }).join('');
    
        const messages = document.querySelector('.messages');
    
        messages.innerHTML = html;
        messages.scrollTop = messages.scrollHeight;

    
      // 3. On envoie la requête
    //   response.send();

    }
 

  /**
   * Il nous faut une fonction pour envoyer le nouveau
   * message au serveur et rafraichir les messages
   */
  

  function postMessage(event){
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

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'handler.php?task=write');
    
    requeteAjax.onload = function(){
      message.value = '';
      message.focus();
      getMessages();
    }
  
    requeteAjax.send(data);
  }
  
  document.querySelector('form').addEventListener('submit', postMessage);
  
//   /**
//    * Il nous faut une intervale qui demande le rafraichissement
//    * des messages toutes les 3 secondes et qui donne 
//    * l'illusion du temps réel.
//    */
  const interval = window.setInterval(getMessages, 3000);
  
  getMessages();

