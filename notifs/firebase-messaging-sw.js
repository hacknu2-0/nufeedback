importScripts('https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.5/firebase-messaging.js');

var firebaseConfig = {
  apiKey: "AIzaSyBYFtUilMgTNKbxTvYRJkd-9G4SjzoiBHg",
  authDomain: "hacknu2-cd9e5.firebaseapp.com",
  databaseURL: "https://hacknu2-cd9e5.firebaseio.com",
  projectId: "hacknu2-cd9e5",
  storageBucket: "hacknu2-cd9e5.appspot.com",
  messagingSenderId: "889828413017",
  appId: "1:889828413017:web:facc566ee4a62103f4eb48",
  measurementId: "G-7DB7C6T9VS"
};
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
