importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyAomKICBn4ylLWe662hZf6b93BFVES79MI",
    projectId: "lravelpushnotif",
    messagingSenderId: "153977875047",
    appId: "1:153977875047:web:795aeef5d2f5cfca9242c2"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});