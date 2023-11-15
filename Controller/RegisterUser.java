package Controller;

import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPasswordField;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import Repository.UserExists;

public class RegisterUser extends JFrame{
	public void registerUser(JTextField emailField, JPasswordField passwordField, JTextArea userListTextArea) {
        try {
            String email = emailField.getText();
            String password = new String(passwordField.getPassword());
            UserExists exist = new UserExists();
            if (exist.userExists(email)) {
                JOptionPane.showMessageDialog(this, "Cet utilisateur existe d�j�.", "Erreur", JOptionPane.ERROR_MESSAGE);
            } else {
                
                JOptionPane.showMessageDialog(this, "Inscription r�ussie.", "Succ�s", JOptionPane.INFORMATION_MESSAGE);
                UpdateUI updateUIInstance = new UpdateUI();
                updateUIInstance.interfaceUI(userListTextArea);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
