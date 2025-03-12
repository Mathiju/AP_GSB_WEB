// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js';
import { getFirestore, doc, collection, getDoc, setDoc, addDoc, query, where, getDocs } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js';
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js';
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyB24J4yHKRpk59CG-mnLUzJzizIuSo64-Q",
  authDomain: "ap-gsp.firebaseapp.com",
  projectId: "ap-gsp",
  storageBucket: "ap-gsp.firebasestorage.app",
  messagingSenderId: "817436331010",
  appId: "1:817436331010:web:b4f49704fd32d367bf6b1b"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const _db = getFirestore(app);


export async function createUser(email, password, nom, prenom) {
    try {
        // Create user with email and password in Firebase Authentication
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Hash the password
        // const hashedPassword = await bcrypt.hash(password, 10);

        // Create a new document in the 'user' collection with the UID as the document ID
        const userRef = doc(collection(_db, 'user'), user.uid);
        await setDoc(userRef, {
            identifiant: email,
            // mdp: hashedPassword,
            nom: nom,
            prenom: prenom,
            usertype: "['USER']"
        });

        console.log("User created with ID:", user.uid);
    } catch (error) {
        console.error("Error creating user:", error);
    }
}

// Example usage
// createUser('user@example.com', 'userpassword', 'John', 'Doe', ['USER']);

export async function logAsUser(email, password) {
    try {
        const userCredential = await signInWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Récupérer les informations de l'utilisateur depuis Firestore
        const userRef = doc(_db, 'user', user.uid);
        const userSnap = await getDoc(userRef);

        if (userSnap.exists()) {
            const userInfo = userSnap.data();

            // Stocker les informations utilisateur en cookies
            document.cookie = `userInfo=${JSON.stringify(userInfo)}; path=/;`;
            document.cookie = `nom=${userInfo.nom}; path=/;`;
            document.cookie = `prenom=${userInfo.prenom}; path=/;`;
            document.cookie = `usertype=${userInfo.usertype}; path=/;`;
            document.cookie = `uid=${user.uid}; path=/;`;

            console.log("User logged in with ID:", user.uid);

            // 🔥 **Envoyer l'UID à Symfony pour stocker la session**
            fetch('/api/setSession', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ uid: user.uid })  // Envoi de l'UID
            })
            .then(response => response.json())
            .then(data => console.log("Session Symfony mise à jour:", data))
            .catch(error => console.error("Erreur mise à jour session Symfony:", error));

            // Rediriger vers /home après connexion
            window.location.href = '/home/home.html.twig';
        } else {
            console.log("No such user!");
        }
    } catch (error) {
        console.error("Error logging in user:", error);
    }
}
