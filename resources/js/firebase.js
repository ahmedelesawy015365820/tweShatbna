// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyA4Mb47zbEhofBvj0Ol2WEQrKoQe_EHpfA",
    authDomain: "shatbna-1b7d9.firebaseapp.com",
    databaseURL: "https://shatbna-1b7d9-default-rtdb.firebaseio.com",
    projectId: "shatbna-1b7d9",
    storageBucket: "shatbna-1b7d9.appspot.com",
    messagingSenderId: "982940089330",
    appId: "1:982940089330:web:314f3e47b905d4736c496b",
    measurementId: "G-P97Z0E5NG8"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
