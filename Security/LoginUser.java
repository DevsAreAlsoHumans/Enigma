package Security;

import java.sql.SQLException;
import java.util.List;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPasswordField;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import Controller.UpdateUI;
import Model.User;
import Repository.SelectUserWithEmailAndPassword;
import Service.IsConnected;

public class LoginUser extends JFrame{
	
	   public void loginUser(JTextField emailField, JPasswordField passwordField, JTextArea userListTextArea) {
	        String email = emailField.getText();
	        String password = new String(passwordField.getPassword());

	        SelectUserWithEmailAndPassword selectUser = new SelectUserWithEmailAndPassword();
			

			List<User> userList = selectUser.getUser(email, password);
			if (!userList.isEmpty()) {
			    // Utilisez les données de l'utilisateur
			    JOptionPane.showMessageDialog(this, "Connexion réussie.", "Succès", JOptionPane.INFORMATION_MESSAGE);
			    new IsConnected().setConnected(true);
			    UpdateUI updateUIInstance = new UpdateUI();
			    updateUIInstance.interfaceUI(userListTextArea);
			} else {
			    JOptionPane.showMessageDialog(this, "Identifiants incorrects.", "Erreur", JOptionPane.ERROR_MESSAGE);
			}
	    }

}
